<?php
class WorkList extends AppModel {
	public $name = 'WorkList';
	public $validate = array(
		'item' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This Field cannot be left blank..',
			),
		),
		'priority' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This value can be a number only',
			),
			'range' => array(
				'rule' => array('between', '1', '3'),
				'message' => 'This value can either be 1,2 or 3',
			),
		),
		'isComplete' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'this value can either be true or false',
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
