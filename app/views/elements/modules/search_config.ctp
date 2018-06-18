<?php
echo $this->element('global/search', array('singular' => 'Module', 'plural' => 'Modules', 'fields' =>
    array(
        0 => array(
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
        )
)));
?>