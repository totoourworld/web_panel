<?php
class Promo extends AppModel {
    var $name = 'Promo';
    var $primaryKey = 'promo_id';
    var $displayField = 'promo_code';
    var $order = 'Promo.promo_id DESC';
    
    var $validate=array(
        'promo_code' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'promo_code' => array
            (
            'isUnique' => array
                (
                'rule' => array('isUnique', true),
                'message' => 'Code Exists, Try Again.'
            ),
        ),
        'promo_status' => array(
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
}
