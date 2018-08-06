<?php
App::uses('Model', 'Model','SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel{
	public $useTable = 'users';
	public $name = 'User';
	public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
        	// $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
            $this->data['User']['confirm_password'] = $passwordHasher->hash($this->data['User']['confirm_password']);
        }
        return true;
    }
	public $validate = array(
		'username' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'message'  => 'ko được để rỗng'
            ),
            "rule2" =>array(
                "rule" => "checkUsername", // call function check Username
                "message" => "Username đã có người đăng ký",
            ),
        ),
        'email' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'message'  => 'ko được để rỗng'
            ),
            "rule2" =>array(
                "rule" => "checkEmail", // call function check Username
                "message" => "Email đã có người đăng ký",
            ),
        ),
        'password' => array(
            'rule' => 'notEmpty',
            'message' => 'Chưa nhập mật khẩu',
        ),
        'confirm_password'=>array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'message'  =>  'Chưa nhập lại mật khẩu',
            ),
            'rule2' => array(
                'rule'=>array('password_confirm'),
                'message'=>'Bạn nhập 2 mật khẩu khác nhau',
            )
        ),
	);
	function checkUsername(){
        if(isset($this->data['User']['id'])){
            $where = array(
                "id !=" => $this->data['User']['id'],
                "username" => $this->data['User']['username'],
            );
        }else{
            $where = array(
                "username" => $this->data['User']['username'],
            );
        }
        $this->find("first", array(
            'conditions' => $where
        ));
        $count = $this->getNumRows();
        if($count!=0){
            return false;
        }else{
            return true;
        }
    }
    function checkEmail(){
        if(isset($this->data['User']['id'])){
            $where = array(
                "id !=" => $this->data['User']['id'],
                "email" => $this->data['User']['email'],
            );
        }else{
            $where = array(
                "email" => $this->data['User']['email'],
            );
        }
        $this->find("first", array(
            'conditions' => $where
        ));
        $count = $this->getNumRows();
        if($count!=0){
            return false;
        }else{
            return true;
        }
    }

    public function password_confirm(){
        if ($this->data['User']['password'] !== $this->data['User']['confirm_password']){
            return false;
        }
        return true;
    }
}