<?php
App::uses('AppController', 'Controller');
/**
 * Travels Controller
 *
 * @property Travel $Travel
 * @property PaginatorComponent $Paginator
 */
class TravelsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	// public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Travel->recursive = 0;
		$this->set('travels', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Travel->exists($id)) {
			throw new NotFoundException(__('Invalid travel'));
		}
		$options = array('conditions' => array('Travel.' . $this->Travel->primaryKey => $id));
		$this->set('travel', $this->Travel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Travel->create();
			if ($this->Travel->save($this->request->data)) {
				$this->Flash->success(__('The travel has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The travel could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Travel->exists($id)) {
			throw new NotFoundException(__('Invalid travel'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Travel->save($this->request->data)) {
				$this->Flash->success(__('The travel has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The travel could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Travel.' . $this->Travel->primaryKey => $id));
			$this->request->data = $this->Travel->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Travel->id = $id;
		if (!$this->Travel->exists()) {
			throw new NotFoundException(__('Invalid travel'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Travel->delete()) {
			$this->Flash->success(__('The travel has been deleted.'));
		} else {
			$this->Flash->error(__('The travel could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
