<?php
App::uses('AppController', 'Controller');
/**
 * Entries Controller
 *
 * @property Entry $Entry
 * @property PaginatorComponent $Paginator
 */
class EntriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Entry->recursive = 0;
		$this->set('entries', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Entry->exists($id)) {
			throw new NotFoundException(__('Invalid entry'));
		}
		$options = array('conditions' => array('Entry.' . $this->Entry->primaryKey => $id));
		$this->set('entry', $this->Entry->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Entry->create();
			if ($this->Entry->save($this->request->data)) {
				$this->Session->setFlash(__('The entry has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entry could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$items = $this->Entry->Item->find('list');
		$units = $this->Entry->Unit->find('list');
		$stores = $this->Entry->Store->find('list');
		$this->set(compact('items', 'units', 'stores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Entry->id = $id;
		if (!$this->Entry->exists($id)) {
			throw new NotFoundException(__('Invalid entry'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Entry->save($this->request->data)) {
				$this->Session->setFlash(__('The entry has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entry could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Entry.' . $this->Entry->primaryKey => $id));
			$this->request->data = $this->Entry->find('first', $options);
		}
		$items = $this->Entry->Item->find('list');
		$units = $this->Entry->Unit->find('list');
		$stores = $this->Entry->Store->find('list');
		$this->set(compact('items', 'units', 'stores'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Entry->id = $id;
		if (!$this->Entry->exists()) {
			throw new NotFoundException(__('Invalid entry'));
		}
		if ($this->Entry->delete()) {
			$this->Session->setFlash(__('Entry deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Entry was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

	public function beforeFilter() {
		$this->set('sidebar', array(
			'New Entry' => '/entries/add/',
			'List Items' => '/items/',
			'New Item' => '/items/add/',
			'List Units' => '/units/',
			'New Unit' => '/units/add/',
			'List Stores' => '/stores/',
			'New Store' => '/stores/add/',
		));
	}
}
