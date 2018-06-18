<?php
echo $this->element('global/custom_search',
        array('action'=>'storeindex','singular' => 'User', 'plural' => 'Users', 'fields' =>
    array(
        0 => array(
            'name' => 'username',
            'label' => 'Username',
            'type' => 'text'
        ),
        1 => array(
            'name' => 'u_name',
            'label' => 'Name',
            'type' => 'text'
        )
)));
?>