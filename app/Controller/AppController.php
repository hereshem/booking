<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	/**
	 * View
	 *
	 * @var string
	 * @access public
	 */
	public $viewClass = 'Theme';

	/**
	 * Theme
	 *
	 * @var string
	 * @access public
	 */
	public $theme;

	/**
	 * Pagination
	 */
	// public $paginate = array(
	// 	'limit' => 10,
	// );


	/**
	 * Helpers
	 *
	 * @var array
	 * @access public
	 */
	// public $helpers = array(
	// 	'Html',
	// 	'Form',
	// 	'Session',
	// 	'Text',
	// 	'Js',
	// 	'Time'	
	// 	);

	/**
	 * Cache pagination results
	 *
	 * @var boolean
	 * @access public
	 */
	// public $usePaginationCache = true;

	public $components = array(
	    'Session','RequestHandler','Email','Cookie',
	    'Paginator','Flash',
	    'Auth' => array(
			'loginAction' => array('controller' => 'users','action' => 'login','admin'=>true),
	        'loginRedirect' => '/admin',
	        'logoutRedirect' => '/',
			'authError' => 'You are not authorized to use this section.',
			'authorize' => array('Controller'),
			'authenticate' => array(
	            'Form' => array(
	                'fields' => array('username' => 'email')
				)
			)
		)
	);

	public function isAuthorized($user) {
		// Admin can access every action
		if (isset($user['role']) && $user['role'] == 'admin') {
			return true;
		}

		// Default deny
		return false;
	}


	function beforeFilter() {
		//$this->Auth->allow();
		if($this->isAdmin()){
			$this->Auth->allow();
		}
	}

	function isAdmin(){
		if($this->Auth->user('role') == 'admin'){
			return true;
		}
		return false;
	}

	function beforeRender() {
		/*
		 * Cache manage, use $setting variable application-wide
		 * @author Ashok Basnet
		 * @date 2012-11-16
		 */
		// $setting = Cache::read('settings', 'setting');
		// if (!$setting) {
		// 	$this->loadModel('Setting');
		// 	$setting = $this->Setting->find('list', array('fields' => array('key','value')));
		// 	Cache::write('settings', $setting, 'setting');
		// }
		// $this->set(compact('setting'));

		if (isset($this->request->params['admin'])){
			if($this->request->params['action']=='admin_login' || $this->request->params['action']=='admin_forgot_password'){
				$this->theme = 'Admin';
				$this->layout = 'login';
			}else{
				if($this->Auth->user())
				$this->theme = 'Admin';
				else
				$this->theme = 'Default';
			}
		}
		else {
			if($this->name == 'CakeError') {
				$this->layout = 'error';
			}
			// if( $this->_getSetting('Site.active') == 0){ // side under maintainance
			// 	$this->layout = 'maintenance';
			// 	$this->response->statusCode(503);
			// 	$this->set('title_for_layout', __('Site down for maintenance'));
			// }
			$this->theme = 'Default';
		}

		
	}

	//Generate a random password
	function _generatePassword($cnt)  {
		// characters to be included for randomization, here you can add or delete the characters
		$pwd = str_shuffle('abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#%$*');
		// here specify the 2nd parameter as start position, it can be anything, default 0
		return substr($pwd,0,$cnt);
	}

	/* getSettings($key)
	 * 2012-6-25
	 * Ashok Basnet
	 * @params key
	 * @return value
	 */
	// function _getSetting($key = null){
	// 	$this->loadModel('Setting');
	// 	$value = $this->Setting->field('value',array('Setting.key'=>$key));
	// 	return $value;
	// }
}
