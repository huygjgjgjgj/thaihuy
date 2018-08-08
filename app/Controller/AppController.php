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
            if($this->Auth->user()['role'] != 'R'){
                echo "Bạn ko có quyền truy cập trang này";die();
            }
        }else{
            $this->Auth->allow($this->request->params['action']);
        }
	}
	function isAuthorized(){
	   	return true;
	}
    function TokenRand($sokytu){
        $mang = array('q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m',
                        'Q','W','E','R','T','Y','U','I','O','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M',
                         1,2,3,4,5,6,7,8,9,0 );
        $kq = '';
        for ($i = 1; $i<$sokytu; $i++){
            $kq = $kq.$mang[rand(0,count($mang)-1)];
        }

        return $kq;

    }

    function checkToken(){
        $token = md5($this->TokenRand(32));// Tạo token 32 ký tự
        if(!$this->Session->check('token')){
            $this->Session->write('token',$token);
        }else{

        }
    }

    function checkAdd_Edit(){
        if ($this->Session->check('add_success')){
            $add_success = $this->Session->read('add_success');
        }else{
            $add_success = '';
        }
        if ($this->Session->check('edit_success')){
            $edit_success = $this->Session->read('edit_success');
        }else{
            $edit_success = '';
        }
        if ($this->Session->check('delete_success')){
            $delete_success = $this->Session->read('delete_success');
        }else{
            $delete_success = '';
        }
        $this->set(array(
            'edit_success' => $edit_success,
            'add_success' => $add_success,
            'delete_success' => $delete_success
        ));
        $this->Session->delete('delete_success');
        $this->Session->delete('add_success');
        $this->Session->delete('edit_success');
    }
}
