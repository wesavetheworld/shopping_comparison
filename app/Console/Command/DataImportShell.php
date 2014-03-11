<?php 
class DataImportShell extends AppShell {
	public $columns = array(
		'category',
		'item',
		'quantity',
		'unit',
		'unit-price',
		'winner',
		'hyvee',
		'aldi',
		'dahls',
		'trader-joes',
		'costco',
		'sams-club',
		'target',
		'walgreens',
		'walmart',
		'whole-foods'
	);

	public function main() {

	}

	public function all() {
		$this->resetDb();
		$this->categories();
		$this->stores();
		$this->items();
		$this->units();
		$this->entries();
	}

	public function resetDb() {
	    $this->dispatchShell('schema create -q');
	}

	public function categories()
	{
		$this->out("\n----------------- Importing Categories -----------------");
		$price_sheet = $this->getPriceSheet();
		$category = ClassRegistry::init('Category');
		$category_column = $this->getColumnIndex('category');
		$category_list = array();
		$categories = array();

		foreach ($price_sheet as $row) {
			$category->create();
			if(!empty($row[$category_column]) && array_search($row[$category_column], $category_list) === false) {
				$this->out("Adding {$row[$category_column]}");
				$categories[] = array('category' => $row[$category_column]);
				$category_list[] = $row[$category_column];
			}
		}

		$category->saveAll($categories);
	}

	public function stores() {
		$this->out("\n----------------- Importing Stores -----------------");
		$stores = array(
			1  => array(
				'slug' => 'hyvee',
				'name' => 'Hy-Vee',
			),
			2  => array(
				'slug' => 'aldi',
				'name' => 'Aldi',
			),
			3  => array(
				'slug' => 'dahls',
				'name' => 'Dahl\'s',
			),
			4  => array(
				'slug' => 'trader-joes',
				'name' => 'Trader Joe\'s',
			),
			5  => array(
				'slug' => 'costco',
				'name' => 'Costco',
			),
			6  => array(
				'slug' => 'sams-club',
				'name' => 'Sam\'s Club',
			),
			7  => array(
				'slug' => 'target',
				'name' => 'Target',
			),
			8  => array(
				'slug' => 'walgreens',
				'name' => 'Walgreen\'s',
			),
			9  => array(
				'slug' => 'walmart',
				'name' => 'WalMart',
			),
			10 => array(
				'slug' => 'whole-foods',
				'name' => 'Whole Foods',
			),
		);

		$store = ClassRegistry::init('Store');
		$store->saveAll($stores);
	}

	public function items() {
		$this->out("\n----------------- Importing Items -----------------");
		$price_sheet = $this->getPriceSheet();

		$item = ClassRegistry::init('Item');
		$item_column = $this->getColumnIndex('item');
		$item_list = array();
		$items = array();

		$categories = $this->readCategories();
		$category_column = $this->getColumnIndex('category');

		foreach ($price_sheet as $row) {
			$item->create();
			$category_id = $this->getCategoryIdForLabel($row[$category_column]);

			if(($item_name = $row[$item_column]) && array_search($row[$item_column], $item_list) === false) {
				$category = $this->categories[$category_id];
				$this->out("Adding $item_name with category $category");

				$items[] = array(
					'item' => $item_name,
					'category_id' => $category_id,
				);

				$item_list[] = $item_name;
			}
		}

		$item->saveAll($items);
	}

	public function units() {
		$this->out("\n----------------- Importing Units -----------------");
		$price_sheet = $this->getPriceSheet();
		$unit = ClassRegistry::init('Unit');
		$unit_column = $this->getColumnIndex('unit');
		$unit_list = array();
		$units = array();

		foreach ($price_sheet as $row) {
			$unit->create();
			if(!empty($row[$unit_column]) && array_search($row[$unit_column], $unit_list) === false) {
				$unit_name = $row[$unit_column];
				$this->out("Adding $unit_name");
				$units[] = array('unit' => $unit_name);
				$unit_list[] = $unit_name;
			}
		}

		$unit->saveAll($units);
	}

	public function entries() {
		$this->out("\n----------------- Importing Entries -----------------");
		$price_sheet = $this->getPriceSheet();
		$entry = ClassRegistry::init('Entry');
		$entries = array();

		$this->readItems();
		$item_column = $this->getColumnIndex('item');

		$this->readUnits();
		$unit_column = $this->getColumnIndex('unit');

		$this->readCategories();
		$category_column = $this->getColumnIndex('category');
		
		$this->readStoreSlugs();
		$store_columns = array();

		$this->readStores();

		foreach($this->store_slugs as $slug) {
			$store_columns[$slug] = $this->getColumnIndex($slug);
		}

		$unit_price_column = $this->getColumnIndex('unit-price');

		foreach ($price_sheet as $row) {
			// Bakery,Bread (store brand whole wheat),1,loaf,$1.29,Aldi,$1.58,$1.29,$2.89,p,p,,p,,,
			$item = $row[$item_column];
			$item_id = $this->getItemIdForLabel($item);
			$unit_id = $this->getUnitIdForLabel($row[$unit_column]);
			
			foreach ($store_columns as $store_column) {
				$unit_price = preg_replace('/[a-z$]/','',$row[$store_column]);

				if(empty($unit_price)) {
					continue;
				}

				if(empty($unit_price)) {
					continue;
				}

				$quantity = 1; // Need to make this grab from formula
				$price = $quantity * $unit_price;
				$store_id = $this->getStoreIdForSlug($this->columns[$store_column]);
				
				// Make an entry for each store column with a value in it 
				$entries[] = array(
					'item_id'    => $item_id,
					'price'      => $price,
					'quantity'   => $quantity,
					'unit_price' => $unit_price,
					'unit_id'    => $unit_id,
					'store_id'   => $store_id,
				);

				$this->out("Adding $item for {$this->stores[$store_id]}");
			}

		}
		
		$entry->saveAll($entries);
	}

	private function getPriceSheet() {
		if (empty($this->price_sheet)) {
			if (($handle = fopen(APP . "Console/Command/data_import/price_sheet.csv", "r")) !== FALSE) {
				$this->price_sheet = array();
				$num_title_rows = 2;

			    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
					if ($num_title_rows-- > 0)
					{
						continue;
					}

			    	$this->price_sheet[] = $row;
			    }
			    fclose($handle);
			}
		}

		return $this->price_sheet;
	}

	private function readCategories() {
		if(empty($this->categories)) {
			$category = ClassRegistry::init('Category');
			$this->categories = $category->find('list');
		}
	}

	private function getCategoryIdForLabel($label) {
		$this->readCategories();
		$category_id = array_search($label, $this->categories);

		if ($category_id === false) {
			throw new Exception('Unknown Category: $label');
		}

		return $category_id;
	}

	private function readStores() {
		if (empty($this->stores)) {
			$store = ClassRegistry::init('Store');
			$this->stores = $store->find('list');
		}
	}

	private function readStoreSlugs() {
		if (empty($this->store_slugs)) {
			$store = ClassRegistry::init('Store');
			$this->store_slugs = $store->find('list', array('fields' => array('id', 'slug')));
		}
	}

	private function getStoreIdForSlug($slug) {
		$this->readStoreSlugs();
		$store_id = array_search($slug, $this->store_slugs);

		if ($store_id === false) {
			throw new Exception("Unknown Store: $slug");
		}

		return $store_id;
	}

	private function getColumnIndex($label) {
		$column_index = array_search($label, $this->columns);

		if($column_index === false) {
			throw new Exception("Unknown column: $label");
		}

		return $column_index;
	}

	private function readUnits() {
		if (empty($this->units)) {
			$unit = ClassRegistry::init('Unit');
			$this->units = $unit->find('list');
		}
	}

	private function readItems() {
		if (empty($this->items)) {
			$item = ClassRegistry::init('Item');
			$this->items = $item->find('list');
		}
	}

	private function getItemIdForLabel($label) {
		$this->readItems();
		$item_id = array_search($label, $this->items);

		if ($item_id === false) {
			throw new Exception("Unknown Item: $label");
		}

		return $item_id;
	}

	private function getUnitIdForLabel($label) {
		$this->readUnits();
		$unit_id = array_search($label, $this->units);

		if ($unit_id === false) {
			return null;
		}

		return $unit_id;
	}
}