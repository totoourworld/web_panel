<?php
echo $this->element('global/search',
        array('singular' => 'Page', 'plural' => 'Pages', 'fields' =>
    array(
        0 => array(
            'name' => 'page_name',
            'label' => 'Page Name',
            'type' => 'text'
        ),
        1 => array(
            'name' => 'page_id',
            'label' => 'Parent Page',
            'type' => 'select',
            'options' => $searchPages
        )
)));
?>