<?php

echo $this->element('global/search',
        array('singular' => 'Driver', 'plural' => 'Drivers', 'fields' =>
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
        )
)));
?>