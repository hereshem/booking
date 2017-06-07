<?php
App::uses('AppController', 'Controller');
/**
 * Seats Controller
 *
 * @property Seat $Seat
 * @property PaginatorComponent $Paginator
 */
class SeatsController extends AppController {

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
		$this->Seat->recursive = 0;
		$this->set('seats', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Seat->exists($id)) {
			throw new NotFoundException(__('Invalid seat'));
		}
		$options = array('conditions' => array('Seat.' . $this->Seat->primaryKey => $id));
		$this->set('seat', $this->Seat->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Seat->create();
			if ($this->Seat->save($this->request->data)) {
				$this->Flash->success(__('The seat has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The seat could not be saved. Please, try again.'));
			}
		}
		$schedules = $this->Seat->Schedule->find('list');
		$this->set(compact('schedules'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Seat->exists($id)) {
			throw new NotFoundException(__('Invalid seat'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Seat->save($this->request->data)) {
				$this->Flash->success(__('The seat has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The seat could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Seat.' . $this->Seat->primaryKey => $id));
			$this->request->data = $this->Seat->find('first', $options);
		}
		$schedules = $this->Seat->Schedule->find('list');
		$this->set(compact('schedules'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Seat->id = $id;
		if (!$this->Seat->exists()) {
			throw new NotFoundException(__('Invalid seat'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Seat->delete()) {
			$this->Flash->success(__('The seat has been deleted.'));
		} else {
			$this->Flash->error(__('The seat could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
