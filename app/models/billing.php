<?php

class Billing extends AppModel
{

    var $name='Billing';
    var $primaryKey='id';
    var $order = 'Billing.id DESC';
    var $belongsTo=array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Driver' => array(
            'className' => 'Driver',
            'foreignKey' => 'driver_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
    var $validate = array(
		'bill_number' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the Bill Number'
			),
		),
		'bill_number' => array
		(
			'isUnique'=>array
			(
				'rule' => array('isUnique',true),
				'message' => 'Bill Number Exists, Try Again.'
			),
		),
	);

}
