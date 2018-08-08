<?php
App::uses('Model', 'Model');

class Product extends AppModel{
	public $useTable = 'products';

	public $validate = array(
		'product_name' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'message' => 'Chưa điền tên sản phẩm'
            ),
            'rule2' => array(
                'rule' => array('minLength' , 6),
                'message' => 'Tên sản phẩm phải trên 5 ký tự'
            ),

        ),
        'amount' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'message' => 'Chưa có giá tiền'
            ),
            'rule2' => array(
                'rule' => 'numeric',
                'message' => 'Số tiền phải là số'
            ),
            'rule3' => array(
                'rule' => array('range', 0 ,1000000000),
                'message' => 'Số tiền không được nhỏ hơn 0 hoặc lớn hơn 1000000000'
            ),
        ),
        'quantity' =>array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'message' => 'Chưa nhập số lượng sản phẩm'
            ),
            'rule2' => array(
                'rule' => 'numeric',
                'message' => 'Số lượng sản phẩm phải là số'
            ),
            'rule3' => array(
                'rule' => array('range', 0 ,100),
                'message' => 'Số lượng sản phẩm không được nhỏ hơn 0 hoặc lớn hơn 100'
            ),
        ),
	);
}