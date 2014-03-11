<?php 
class DataImportShell extends AppShell {
	public $columns = array(
		'category',
		'item',
		'quantity',
		'unit',
		'unit_price',
		'winner',
		'hyvee',
		'aldi',
		'dahls',
		'trader_joes',
		'costco',
		'sams_club',
		'target',
		'walgreens',
		'walmart',
		'whole_foods'
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
		$category_column = array_search('category', $this->columns);
		$category_list = array();
		$categories = array();

		if($category_column === false) {
			throw new Exception("Unknown column: category");
		}

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
				'slug' => 'trader_joes',
				'name' => 'Trader Joe\'s',
			),
			5  => array(
				'slug' => 'costco',
				'name' => 'Costco',
			),
			6  => array(
				'slug' => 'sams_club',
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
				'slug' => 'whole_foods',
				'name' => 'Whole Foods',
			),
		);

		$category = ClassRegistry::init('Store');

		$category->saveAll($stores);
		/**
		INSERT INTO stores
			(id, name,location,created,modified)
		VALUES
			(1, "Aldi","",NOW(),NOW()),
			(2, "Costco","",NOW(),NOW()),
			(3, "Dahl's","",NOW(),NOW()),
			(4, "HyVee","",NOW(),NOW()),
			(5, "Sam's Club","",NOW(),NOW()),
			(6, "Target","",NOW(),NOW()),
			(7, "Trader Joe's","",NOW(),NOW()),
			(8, "Walgreens","",NOW(),NOW()),
			(9, "Walmart","",NOW(),NOW()),
			(10, "Whole Foods","",NOW(),NOW());
		*/
	}

	public function items() {
		/**
		INSERT INTO items
			(id, item, category_id, created, modified)
		VALUES
			(1, "Bread", 1, NOW(), NOW()),
			(2, "Small Flour Tortilla", 1, NOW(), NOW()),
			(3, "Baking Soda", 1, NOW(), NOW()),
			(4, "Cookie Dough", 1, NOW(), NOW()),
			(5, "Panko Bread Crumbs", 1, NOW(), NOW()),
			(6, "Carrot Juice", 2, NOW(), NOW()),
			(7, "K-cups", 2, NOW(), NOW()),
			(8, "Puffins Cereal", 3, NOW(), NOW()),
			(9, "Cereal Bars", 3, NOW(), NOW()),
			(10, "Black Beans", 4, NOW(), NOW()),
			(11, "Chili Beans", 4, NOW(), NOW()),
			(12, "Bruschetta", 4, NOW(), NOW()),
			(13, "Chicen Broth", 4, NOW(), NOW()),
			(14, "Diced Tomatoes", 4, NOW(), NOW()),
			(15, "Great Northern Beans", 4, NOW(), NOW()),
			(16, "Pumpkin", 4, NOW(), NOW()),
			(17, "Sour Kraut", 4, NOW(), NOW()),
			(18, "Cholula Hot Sauce", 5, NOW(), NOW()),
			(19, "Coconut Oil", 5, NOW(), NOW()),
			(20, "Croutons", 5, NOW(), NOW()),
			(21, "Honey", 5, NOW(), NOW()),
			(22, "Hummus", 5, NOW(), NOW()),
			(23, "Jelly", 5, NOW(), NOW()),
			(24, "Maple Syrup", 5, NOW(), NOW()),
			(25, "Parmesan Cheese", 5, NOW(), NOW()),
			(26, "Peanut Butter", 5, NOW(), NOW()),
			(27, "Salad Dressing", 5, NOW(), NOW()),
			(28, "Salsa", 5, NOW(), NOW()),
			(29, "Taco Seasoning", 5, NOW(), NOW()),
			(30, "Almond Milk", 6, NOW(), NOW()),
			(31, "Butter", 6, NOW(), NOW()),
			(32, "Babybel Cheese", 6, NOW(), NOW()),
			(33, "Dubliner Cheese", 6, NOW(), NOW()),
			(34, "Shredded Cheddar Cheese", 6, NOW(), NOW()),
			(35, "Coconut Milk", 6, NOW(), NOW()),
			(36, "Cottage Cheese", 6, NOW(), NOW()),
			(37, "Eggs", 6, NOW(), NOW()),
			(38, "Kefir", 6, NOW(), NOW()),
			(39, "String Cheese", 6, NOW(), NOW()),
			(40, "Greek Yogurt", 6, NOW(), NOW()),
			(41, "Corn", 7, NOW(), NOW()),
			(42, "Green Beans", 7, NOW(), NOW()),
			(43, "Hash Browns", 7, NOW(), NOW()),
			(44, "Mixed Berries", 7, NOW(), NOW()),
			(45, "Mixed Vegies", 7, NOW(), NOW()),
			(46, "Pizza", 7, NOW(), NOW()),
			(47, "Uncooked Tortillas", 7, NOW(), NOW()),
			(48, "Dishwasher Tabs", 8, NOW(), NOW()),
			(49, "Fabric Softener", 8, NOW(), NOW()),
			(50, "Laundry Detergent", 8, NOW(), NOW()),
			(51, "Toilet Paper", 8, NOW(), NOW()),
			(52, "Trash Bags", 8, NOW(), NOW()),
			(53, "Uncured Bacon", 9, NOW(), NOW()),
			(54, "Boneless Skinless Chicken Breast", 9, NOW(), NOW()),
			(55, "Chicken Sausage", 9, NOW(), NOW()),
			(56, "Ground Beef", 9, NOW(), NOW()),
			(57, "Grass Fed Ground Beef", 9, NOW(), NOW()),
			(58, "Pork Shoulder", 9, NOW(), NOW()),
			(59, "Turkey Breast", 9, NOW(), NOW()),
			(60, "Boneless Turkey Breast", 9, NOW(), NOW()),
			(61, "Raw Almonds", 10, NOW(), NOW()),
			(62, "Roasted Almonds", 10, NOW(), NOW()),
			(63, "Bulgar Wheat", 11, NOW(), NOW()),
			(64, "Brown Rice", 11, NOW(), NOW()),
			(65, "Dog Food", 12, NOW(), NOW()),
			(66, "Valarian Root", 13, NOW(), NOW()),
			(67, "Vitamins", 13, NOW(), NOW()),
			(68, "Apple", 14, NOW(), NOW()),
			(69, "Avocado", 14, NOW(), NOW()),
			(70, "Bananas", 14, NOW(), NOW()),
			(71, "Broccoli", 14, NOW(), NOW()),
			(72, "Brussel's Sprouts", 14, NOW(), NOW()),
			(73, "Carrots", 14, NOW(), NOW()),
			(74, "Baby Carrots", 14, NOW(), NOW()),
			(75, "English Seedless Cucumber", 14, NOW(), NOW()),
			(76, "Green Onions", 14, NOW(), NOW()),
			(77, "Lemon", 14, NOW(), NOW()),
			(78, "Lime", 14, NOW(), NOW()),
			(79, "Mushrooms", 14, NOW(), NOW()),
			(80, "Onions", 14, NOW(), NOW()),
			(81, "Clementines Oranges", 14, NOW(), NOW()),
			(82, "Navel Oranges", 14, NOW(), NOW()),
			(83, "Mini Sweet Peppers", 14, NOW(), NOW()),
			(84, "Multi color Peppers", 14, NOW(), NOW()),
			(85, "Red Skinned Potatoes", 14, NOW(), NOW()),
			(86, "Salad", 14, NOW(), NOW()),
			(87, "Spinach", 14, NOW(), NOW()),
			(88, "Sweet Potatoes", 14, NOW(), NOW()),
			(89, "Yellow Cherry Tomatoes", 14, NOW(), NOW()),
			(90, "Gum", 15, NOW(), NOW()),
			(91, "Turkey Jerkey", 15, NOW(), NOW()),
			(92, "Beef Jerky", 15, NOW(), NOW()),
			(93, "Pop Chips", 15, NOW(), NOW()),
			(94, "Premade Popcorn", 15, NOW(), NOW()),
			(95, "Prezel Crisps", 15, NOW(), NOW()),
			(96, "Prezels", 15, NOW(), NOW()),
			(97, "Garlic Powder", 16, NOW(), NOW());
		*/
	}

	public function units() {
		/**
		INSERT INTO units
			(id, unit, created, modified)
		VALUES
			(1, "package", NOW(), NOW()),
			(2, "serving", NOW(), NOW()),
			(3, "item", NOW(), NOW()),
			(4, "lb", NOW(), NOW()),
			(5, "oz", NOW(), NOW());
		*/
	}

	public function entries() {
		/**
		INSERT INTO entries
			(item_id, price, quantity, unit_id, unit_price, store_id, note, created, modified)
		VALUES
			(1, 1.58, 1, 1, price/quantity, 4,'', NOW(), NOW()),
			(1, 1.29, 1, 1, price/quantity, 1,'', NOW(), NOW()),
			(1, 2.89, 1, 1, price/quantity, 3,'', NOW(), NOW()),
			(2, 1.69, 20, 3, price/quantity, 1,'', NOW(), NOW()),
			(2, 1.29, 10, 3, price/quantity, 3,'', NOW(), NOW()),
			(3, 6.59, 13.5, 4, price/quantity, 2,'', NOW(), NOW()),
			(4, 1.99, 16, 5, price/quantity, 1,'', NOW(), NOW()),
			(5, 1.79, 7, 5, price/quantity, 7,'', NOW(), NOW()),
			(6, 6.99, 96, 5, price/quantity, 2,'', NOW(), NOW()),
			(7, 2.99, 7, 3, price/quantity, 7, "store-brand", NOW(), NOW()),
			(7, 31.89, 100, 3, price/quantity, 2, "store-brand", NOW(), NOW()),
			(7, 37.99, 80, 3, price/quantity, 2, "organic", NOW(), NOW()),
			(8, 3.99, 16, 5, price/quantity, 7,'', NOW(), NOW()),
			(9, 1.99, 6, 3, price/quantity, 7,'', NOW(), NOW()),
			(10, .59, 15, 5, price/quantity, 1,'', NOW(), NOW()),
			(10, 4.69, 180, 5, price/quantity, 2, "12 15 oz cans", NOW(), NOW()),
			(11, .59, 15, 5, price/quantity, 1,'', NOW(), NOW()),
			(12, 2.49, 12, 5, price/quantity, 7,'', NOW(), NOW()),
			(13, 1.69, 32, 5, price/quantity, 1, "organic", NOW(), NOW()),
			(14, 1.49, 28, 5, price/quantity, 1, "organic", NOW(), NOW()),
			(14, 7.69, 116, 5, price/quantity, 2, "organic", NOW(), NOW());
		*/
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
		$category = ClassRegistry::init('Category');
		$this->categories = $category->find('list');
	}
}