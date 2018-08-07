<?php

App::uses('AppController', 'Controller');

/**
 * 
 */
class UsersController extends AppController
{

	public $components = array('Session');
	public $uses = array('User');
	var $paginate = array();
	var $helpers = array('Paginator','Html');

	public function login(){
		if($this->Auth->user()){
			$this->Redirect('/');	
		}else{
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
		$this->set('title','Đăng nhập');
	}

	public function logout(){
		$this->Session->destroy();
		$this->Auth->logout();
		return $this->Redirect(array('controller'=>'users','action'=>'login'));
	}

	public function admin_index(){
		$user = $this->Auth->user();
		if($user['role'] != 'R'){
			echo "Bạn ko có quyền truy cập trang này";die();
		}
	}

	public function register(){
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
                return $this->Redirect('/login');
        	}

        }
        $this->set(compact('data','errors'));
        $this->set('title','Đăng ký tài khoản');
	}
}