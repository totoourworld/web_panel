<?php
class User extends AppModel {
	var $name = 'User';
        var $primaryKey='user_id';
        var $displayField = "u_name";
	var $order = "User.user_id DESC";
	var $conditions = array('User.active'=>1);
	var $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array
		(
			'isUnique'=>array
			(
				'rule' => array('isUnique',true),
				'message' => 'Name Exists, Try Again.'
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
            'Group' => array(
                    'className' => 'Group',
                    'foreignKey' => 'group_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
            ),
	);
        
        // var $hasMany = array('UserPetition' => array('className' => 'UserPetition','foreignKey' => 'user_id','dependent' => false));
        
	function parentNode()
	{
		if (!$this->id && empty($this->data))
		{
			return null;
		}
		if (isset($this->data['User']['group_id']))
		{
			$groupId = $this->data['User']['group_id'];
		}
		else
		{
			$groupId = $this->field('group_id');
		}
		if (!$groupId)
		{
			return null;
		}
		else
		{
			return array('Group' => array('id' => $groupId));
		}
	}
	//-----------------

}
