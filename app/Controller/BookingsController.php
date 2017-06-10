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
		$this->Paginator->settings += array('order'=>'Booking.id DESC');
		$this->set('bookings', $this->Paginator->paginate());
	}

	public function cancel() {
		$this->loadModel('Seat');
		$this->autoRender = false;
		return $this->Seat->updateAll(array('Seat.status'=>1),array('Seat.status'=>2,'Seat.modified < '=>date('Y-m-d H:i:s',strtotime('-10 minutes'))));
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
		$this->loadModel('Seat');
		$myseats = explode(',',$this->Session->read('myseats'));
		if ($this->request->is('post')) {
			$this->Booking->create();
			if ($this->Booking->save($this->request->data)) {
				$this->Seat->updateAll(array('Seat.status'=>3),array('Seat.status'=>2, 'Seat.schedule_id'=>$myseats[0],'Seat.id'=>$myseats));
				$this->Session->write('myseats','');
				$this->Flash->success(__('The booking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The booking could not be saved. Please, try again.'));
			}
		}
		if(!empty($myseats) && count($myseats) > 1){
			
			$seats = $this->Seat->find('all',array('conditions'=>array('Seat.id'=>$myseats, 'Seat.schedule_id'=>$myseats[0], 'Seat.status'=>2)));
			$total=0;$count=0;$seatNames='';
			foreach ($seats as $seat) {
				$seatNames .= ','.$seat['Seat']['name'];
				$total += $seat['Seat']['price'];
				$count++;
			}
			$this->request->data['Booking'] = array('schedule_id'=>$myseats[0],'seatNames'=>substr($seatNames,1),'seatCount'=>$count,'subTotal'=>$total,'totalAmount'=>$total);
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
