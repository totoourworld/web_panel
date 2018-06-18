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
)));
?>