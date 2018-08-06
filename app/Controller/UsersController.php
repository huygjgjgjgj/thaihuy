<?php

App::uses('AppController', 'Controller');

/**
 * 
 */
class UsersController extends AppController
{
	var $layout = 'admin';
	public $components = array('Session');
	public $uses = array('User');
	var $paginate = array();
	var $helpers = array('Paginator','Html');
	function beforeFilter(){
    	$this->Auth->allow('admin_register');
	   
	   	$this->set('current_user', $this->Auth->user());//sau khi đăng nhập thành công biến current_user là thông tin user đăng nhập
	}
	public function admin_login(){
		if ($this->request->is('post')) {
			if($this->Auth->login()){
				$this->Session->write('thongbao','Đăng nhập thành công');
				return $this->Redirect('/');
			}else{
				$this->Session->write('thongbao','Đăng nhập thất bại');
			}			
			$this->set('thongbao',$this->Session->read('thongbao'));
		}
	}

	public function logout(){
		$this->Session->destroy();
		$this->Auth->logout();
		return $this->Redirect(array('controller'=>'users','action'=>'admin'));
	}

	public function admin_index(){

	}

	public function admin_register(){
		$data = array();
        $errors = array();
        if($this->request->is('post')){
        	$data = $this->request->data;
        	$this->User->set($data['User']);
        	if(!$this->User->validates()){
        		$errors['User'] = $this->User->validationErrors;
        	}
        	if(empty($errors)){
        		$data['User']['role'] = 'L';
        		$this->User->save($data['User']);
                return $this->Redirect('/');
        	}

        }
        $this->set(compact('data','errors'));
	}
}