<?php
class Category extends AppModel {
    var $name = 'Category';
    var $primaryKey = 'category_id';
    var $displayField = 'cat_name';
    var $order = 'Category.category_id DESC';
    
    var $validate=array(
        'cat_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'cat_name' => array
            (
            'isUnique' => array
                (
                'rule' => array('isUnique', true),
                'message' => 'Name Exists, Try Again.'
            ),
        ),
        'cat_status' => array(
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
