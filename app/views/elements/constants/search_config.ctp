<?php
echo $this->element('global/search', array('singular' => 'Constant', 'plural' => 'Constants', 'fields' =>
    array(
        0 => array(
            'name' => 'constant_key',
            'label' => 'Constant Key',
            'type' => 'text'
        )
)));
?>