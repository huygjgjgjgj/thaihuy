<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController
{
	public $components = array('session','RequestHandler');
	var $paginate = array();
	var $helpers = array('Js','Paginator','Html');
	 public $uses = array('Product');
	public function index(){
		$this->paginate = array(
			'fields' => array('product_name','image','amount'),
			'order' =>array('Product.id'=>'desc'),
			'limit' => 6,
            'recursive' => 1,
            'paramType' => 'querystring'
		);
		$products = $this->paginate('Product');
		// echo "<pre>";print_r($products);die;
		$this->set('products',$products); 
		$this->set('title','Shop Laptop chính hãng runsystem');
	}



//back-end


	public function admin_list_product(){
		$this->checkAdd_Edit();
		$this->paginate = array(
			'order' =>array('Product.id'=>'desc'),
			'limit' => 6,
            'recursive' => 1,
            'paramType' => 'querystring'
		);
		$products = $this->paginate('Product');
		$this->set('products',$products); 
		$this->set('i',1);
		$this->set('title','List Product');
	}

	public function admin_add_product(){
		$data = array();
		$this->checkToken();
		$token = $this->Session->read('token');
		if($this->request->is('post')){
			 $data = $this->request->data;

			 $this->Product->set($data['Product']);
        	if($this->Product->validates() && $token = $data['token']){
        		$this->Product->save($product);
    			$this->Session->write('add_success','Bạn vừa thêm 1 sản phẩm mới thành công.');
    			return $this->redirect('/admin/list-product.html');
        	}else{
        		$error = $this->Product->validationErrors;
        		$this->set('error',$error); 
        	}
		}

		$this->set(compact('data'));
		$this->set('token',$token);
		$this->set('title','Add Product');
	}

	public function admin_edit_product($id = null){
		$product = $this->Product->find('all', array(
            'conditions' => array('Product.id' => $id),
        ));
		
        if(!empty($product)){
        	if($this->request->is('post')){
        		$data = $this->request->data;        		
        		$this->Product->set($data['Product']);
        		if($this->Product->validates()){
        			$this->Product->id = $id;
        			$this->Product->save($product);
        			$this->Session->write('edit_success','Bạn vừa sửa sản phẩm có id = '.$id.' thành công.');
        			return $this->redirect('/admin/list-product.html');
        		}else{
        			$error = $this->Product->validationErrors;
        			$this->set('error',$error);
        			// echo "<pre>";pr($error);die();
        		}
        	}
        	$this->set('product',$product);

        }else{
        	echo "<span>Dữ liệu không tồn tại.</span></br> <a href='/admin/add-product.html'>Thêm sản phẩm mới</a>";die();
        }
		$this->set('title','Edit Product');
	}
	public function admin_delete_product($id = null){
		if($id){
			$this->Product->delete($id);
			$this->Session->write('delete_success','Bạn vừa xóa sản phẩm có id = '.$id.' thành công');
			$this->redirect('/admin/list-product.html');
		}else{
			echo "<span>Dữ liệu không tồn tại.</span></br> <a href='/admin/add-product.html'>Thêm sản phẩm mới</a>";die();
		}
	}
}