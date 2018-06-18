<?php

echo $this->element('global/search',
        array('action'=>$action,'singular' => 'Driver', 'plural' => 'Drivers', 'fields' =>
    array(
         0 => array(
            'name' => 'd_name',
            'label' => 'Name',
            'type' => 'text'
        ),
        1 => array(
            'name' => 'd_email',
            'label' => 'Email',
            'type' => 'text'
        ),
        2 => array(
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select',
            'options' => array('Request'=>'Request','Reject'=>'Reject')
        )
)));
?>