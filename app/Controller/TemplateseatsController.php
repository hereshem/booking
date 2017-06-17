<?php
App::uses('AppController', 'Controller');
/**
 * Templateseats Controller
 *
 * @property Templateseat $Templateseat
 * @property PaginatorComponent $Paginator
 */
class TemplateseatsController extends AppController {

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
		$this->Templateseat->recursive = 0;
		$this->set('templateseats', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Templateseat->exists($id)) {
			throw new NotFoundException(__('Invalid templateseat'));
		}
		$options = array('conditions' => array('Templateseat.' . $this->Templateseat->primaryKey => $id));
		$this->set('templateseat', $this->Templateseat->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Templateseat->create();
			if ($this->Templateseat->save($this->request->data)) {
				$this->Flash->success(__('The templateseat has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The templateseat could not be saved. Please, try again.'));
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
		if (!$this->Templateseat->exists($id)) {
			throw new NotFoundException(__('Invalid templateseat'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Templateseat->save($this->request->data)) {
				$this->Flash->success(__('The templateseat has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The templateseat could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Templateseat.' . $this->Templateseat->primaryKey => $id));
			$this->request->data = $this->Templateseat->find('first', $options);
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
		$this->Templateseat->id = $id;
		if (!$this->Templateseat->exists()) {
			throw new NotFoundException(__('Invalid templateseat'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Templateseat->delete()) {
			$this->Flash->success(__('The templateseat has been deleted.'));
		} else {
			$this->Flash->error(__('The templateseat could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
