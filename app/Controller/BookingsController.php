<?php
App::uses('AppController', 'Controller');
/**
 * Bookings Controller
 *
 * @property Booking $Booking
 * @property PaginatorComponent $Paginator
 */
class BookingsController extends AppController {

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
		$this->Booking->recursive = 0;
		$this->set('bookings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Booking->exists($id)) {
			throw new NotFoundException(__('Invalid booking'));
		}
		$options = array('conditions' => array('Booking.' . $this->Booking->primaryKey => $id));
		$this->set('booking', $this->Booking->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Booking->create();
			if ($this->Booking->save($this->request->data)) {
				$this->Flash->success(__('The booking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The booking could not be saved. Please, try again.'));
			}
		}
		$schedules = $this->Booking->Schedule->find('list');
		$users = $this->Booking->User->find('list');
		$this->set(compact('schedules', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Booking->exists($id)) {
			throw new NotFoundException(__('Invalid booking'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Booking->save($this->request->data)) {
				$this->Flash->success(__('The booking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The booking could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Booking.' . $this->Booking->primaryKey => $id));
			$this->request->data = $this->Booking->find('first', $options);
		}
		$schedules = $this->Booking->Schedule->find('list');
		$users = $this->Booking->User->find('list');
		$this->set(compact('schedules', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Booking->id = $id;
		if (!$this->Booking->exists()) {
			throw new NotFoundException(__('Invalid booking'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Booking->delete()) {
			$this->Flash->success(__('The booking has been deleted.'));
		} else {
			$this->Flash->error(__('The booking could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
