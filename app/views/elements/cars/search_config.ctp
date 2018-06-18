<?php
echo $this->element('global/search',
        array('singular' => 'Car', 'plural' => 'Cars', 'fields' =>
    array(
        0=> array(
            'name' => 'category_id',
            'label' => 'Category',
            'type' => 'select',
            'options' => $categories
        ),
        1 => array(
            'name' => 'car_name',
            'label' => 'Name',
            'type' => 'text'
        ),
        2 => array(
            'name' => 'car_reg_no',
            'label' => 'Registration Number',
            'type' => 'text'
        )
)));
?>