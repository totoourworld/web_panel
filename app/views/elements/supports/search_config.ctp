<?php
echo $this->element('global/search', array('singular' => 'Support', 'plural' => 'Supports', 'fields' =>
    array(
        0 => array(
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text'
        )
)));
?>