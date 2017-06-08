<?php
App::uses('AppController', 'Controller');
/**
 * Schedules Controller
 *
 * @property Schedule $Schedule
 * @property PaginatorComponent $Paginator
 */
class SchedulesController extends AppController {

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
		$this->Schedule->recursive = 0;
		$this->set('schedules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Schedule->exists($id)) {
			throw new NotFoundException(__('Invalid schedule'));
		}
		$myseats = explode(',',$this->Session->read('myseats'));
		if(empty($myseats)){
			array_push($myseats, $id);
		}
		if(isset($this->request->query['seat'])){
			$this->loadModel('Seat');
			$seat_id = $this->request->query['seat'];
			$seat = $this->Seat->find('first', array('conditions' => array('Seat.id' => $seat_id)));
			if($seat['Seat']['status'] == 1){
				$seat['Seat']['status'] = 2;
				// $myseats = ' '.$seat_id.','.$myseats;
				array_push($myseats, $seat_id);
				if($myseats[0] != $id){
					$myseats[0] = $id;
				}
				$this->Seat->save($seat);
				$this->Session->write('myseats',implode(',', $myseats));
			}
			else if($seat['Seat']['status'] == 2 && in_array($seat_id, $myseats)){
				$seat['Seat']['status'] = 1;	
				//$myseats = str_replace(' '.$seat_id.',', '', $myseats);
				$myseats = array_diff($myseats, array($seat_id));
				$this->Seat->save($seat);
				$this->Session->write('myseats',implode(',', $myseats));
			}
			else{
				$this->Flash->error(__('Invalid seat selection'));
			}
		}
		$options = array('conditions' => array('Schedule.' . $this->Schedule->primaryKey => $id));
		$schedule = $this->Schedule->find('first', $options);
		$this->set(compact('myseats', 'schedule'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Schedule->create();
			if ($this->Schedule->save($this->request->data)) {
				$this->saveSeats($this->Schedule->id, $this->request->data['Schedule']['vehicle_id']);
				$this->Flash->success(__('The schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The schedule could not be saved. Please, try again.'));
			}
		}
		$vehicles = $this->Schedule->Vehicle->find('list');
		$this->set(compact('vehicles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Schedule->exists($id)) {
			throw new NotFoundException(__('Invalid schedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Schedule->save($this->request->data)) {
				$this->saveSeats($id, $this->request->data['Schedule']['vehicle_id']);
				$this->Flash->success(__('The schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The schedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Schedule.' . $this->Schedule->primaryKey => $id));
			$this->request->data = $this->Schedule->find('first', $options);
		}
		$vehicles = $this->Schedule->Vehicle->find('list');
		$this->set(compact('vehicles'));
	}

	private function saveSeats($schedule_id, $vehicle_id){
		$vehicle = $this->Schedule->Vehicle->find('first',array('conditions'=>array('Vehicle.id'=>$vehicle_id)));
		// print_r($vehicle['Templateseat']);
		if(count($vehicle['Templateseat'])){
			$seats = explode(',', $vehicle['Templateseat']['seatNames']);
			$prices = explode(',', $vehicle['Templateseat']['seatPrices']);
			$this->loadModel('Seat');
			$this->Seat->deleteAll(array('Seat.schedule_id' => $schedule_id));
			for ($i=0; $i < count($seats); $i++) { 
				$data['Seat'][$i]['name']=$seats[$i];
				$data['Seat'][$i]['price']=$prices[$i];
				$data['Seat'][$i]['schedule_id']=$schedule_id;
				$data['Seat'][$i]['status']=1;
				$data['Seat'][$i]['published']=1;
			}
			$this->Seat->saveAll($data['Seat']);
			// print_r($data['Seat']);
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
		$this->Schedule->id = $id;
		if (!$this->Schedule->exists()) {
			throw new NotFoundException(__('Invalid schedule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Schedule->delete()) {
			$this->Flash->success(__('The schedule has been deleted.'));
		} else {
			$this->Flash->error(__('The schedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
