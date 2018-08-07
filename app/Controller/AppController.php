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
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

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
	public $helpers = array('Html', 'Form');
	public $components = array(
        'Session',
        'Auth' => array(
        	'loginAction' => array(
        		'admin'=>false,
        		'controller' => 'users',
        		'action' => 'login'
        	),
        	'loginRedirect' =>array(
        		'admin'=>true,
        		'controller' => 'homes',
        		'action' => 'index'
        	),
        	'authenticate' => array(
        		'Form' => array(
        			'userModel' => 'User',
        			'fields' => array(
        				'username' => 'username',
        				'password' => 'password'
                	),
                	'passwordHasher' => array(
	                    'className' => 'Simple',
	                    'hashType' => 'sha256'
                	)
        		)
        	),
        	'authorize' => array('Controller')
        )
    );
    function beforeFilter(){
	   
	   	$this->set('current_user', $this->Auth->user());//sau khi đăng nhập thành công biến current_user là thông tin user đăng nhập

        if(substr($this->request->params['action'], 0,6) == 'admin_'){
            $this->layout = 'admin';
        }else{
            $this->Auth->allow($this->request->params['action']);
        }
	}
	function isAuthorized(){
	   	return true;
	}
}
