<?php
App::uses('Model', 'Model');

class Product extends AppModel{
	public $useTable = 'products';

	public $validate = array();
}