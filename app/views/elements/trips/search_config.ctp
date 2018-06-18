<?php
echo $this->element('global/search', array('singular' => 'Trip', 'plural' => 'Trips', 'fields' =>
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
            'options' => array('paid'=>'Paid','end'=>'End','expired'=>'Expired','request'=>'Request')
        ),
)));
?>