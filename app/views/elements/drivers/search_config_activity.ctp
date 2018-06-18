<?php
echo $this->element('global/search', array('action'=>$action,'singular' => 'Driver', 'plural' => 'Drivers','is_paginagor'=>1, 'fields' =>
    array(
        0 => array(
            'name' => 'driver_id',
            'label' => 'Driver',
            'type' => 'select',
            'options' => $drivers
        ), 
        1 => array(
            'name' => 'from',
            'label' => 'From',
            'type' => 'text',
        ),
        2 => array(
            'name' => 'to',
            'label' => 'To',
            'type' => 'text',
        ), 
        3 => array(
            'name' => 'trip_status',
            'label' => 'Trip Status',
            'type' => 'select',
            'options' => array('New'=>'New','Completed'=>'Completed','Pending'=>'Pending','Cancelled'=>'Cancelled','Delivered'=>'Delivered','Accepted'=>'Accepted','Out for delivery'=>'Out for delivery','Ready'=>'Ready')
        ),
        
)));
?>