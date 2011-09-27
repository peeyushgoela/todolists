<?php
class User extends AppModel {
	public $name = 'User';
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field cannot be left empty',
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'This username has already been taken',
			)
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'cannot leave it empty',
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'the given email is not in proper format',
			),
			'isunique' => array(
				'rule' => array('isUnique'),
				'message' => 'one user is already registered with this email',
			)
		),
	);
	
	public function validateLogin($data)
	{
		$user = $this->find(array('username' => $data['Username'], 'password' => $data['Password'])); 
		if(!empty($user)) 
			return $user['User']; 
		return false; 
	}
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $hasMany = array(
		'WorkList' => array(
			'className' => 'WorkList',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
