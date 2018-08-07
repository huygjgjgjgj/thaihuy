<?php

App::uses('AppController', 'Controller');

class ProductsController extends AppController
{
	public $components = array('session','RequestHandler');
	var $paginate = array();
	var $helpers = array('Js','Paginator','Html');
	 public $uses = array('Product');
	public function index(){

		$user = $this->Auth->user();
		$this->set('user',$user);
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
}