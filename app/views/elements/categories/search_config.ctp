<?php
echo $this->element('global/search',
        array('singular' => 'Category', 'plural' => 'Categories', 'fields' =>
    array(
        0 => array(
            'name' => 'cat_name',
            'label' => 'Name',
            'type' => 'text'
        )
)));
?>