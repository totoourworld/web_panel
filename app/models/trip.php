<?php
class Trip extends AppModel {
    var $name = 'Trip';
    var $primaryKey = 'trip_id';
    var $displayField = 'trip_date';
    var $order = 'Trip.trip_id DESC';
    var $belongsTo=array('Driver'=>array('className' => 'Driver', 'foreignKey' => 'driver_id',));
}
