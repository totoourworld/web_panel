<?php
echo $this->element('global/search',
        array('singular' => 'Billing', 'plural' => 'Billings', 'fields' =>
    array(
        0 => array(
            'name' => 'bill_number',
            'label' => 'Bill Number',
            'type' => 'text'
        ),
        1 => array(
            'name' => 'driver_id',
            'label' => 'Driver',
            'type' => 'select',
            'options' => $drivers
        ),
        2 => array(
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select',
            'options' => array('Paid'=>'Paid','Unpaid'=>'Unpaid')
        ),
)));
?>