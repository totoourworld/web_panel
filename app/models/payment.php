<?php
class Payment extends AppModel {
    var $name = 'Payment';
    var $primaryKey = 'payment_id';
    var $displayField = 'pay_trans_id';
    var $order = 'Payment.payment_id DESC';
    var $belongsTo=array('Trip'=>array('className' => 'Trip', 'foreignKey' => 'trip_id',));
}
