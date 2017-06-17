<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	// public $components = array('Paginator');

	function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow(array('admin_logout','admin_login'));
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

	public function admin_logout() {
	    $this->redirect($this->Auth->logout());
	}

	public function admin_login() {
		$error = '';
		if ($this->request->is('post')) {
	    	if($email = $this->User->findByEmail($this->request->data['User']['email'])){
		    	$status = $this->User->field('status',array('User.email LIKE'=>$this->request->data['User']['email']));
		    	if($status == 1){
		    		if ($this->Auth->login()) {
						//$user = $this->User->findById($this->Auth->user('id'));
						// echo 'Success';exit;
						$this->redirect($this->Auth->redirect());
				        
			        } else {
			        	$error = 'email or password is incorrect.';
			            $this->Flash->error(__('email or password is incorrect.'));
			            // echo $this->Auth->password('123456'); exit;
			        }
			        json_encode($this->Auth);exit;
		    	}else{
		    			$error = 'Your Email is not active yet.';
		    			$this->Flash->error(__('Your Email is not active yet.'),'default',array(),'auth');
		    	}
	    	}else{
	    		$error = 'email or password is incorrect.';
	    		$this->Flash->error(__('email or password is incorrect.'),'default',array(),'auth');
	    		
	    	}
	    }
	  //   else{
	  //   	error_reporting(E_ALL ^ E_NOTICE); 
		 //    if(isset($_SERVER["HTTP_REFERER"])){
			// 	$this->Session->write('referer-url',$_SERVER["HTTP_REFERER"]);
			// }else{
			// 	$this->Session->delete('referer-url');
			// }
	  //   }
	    //return $error;
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
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
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
