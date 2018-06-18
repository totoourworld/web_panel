<?php
echo $this->element('global/search',
        array('singular' => 'Promo', 'plural' => 'Promos', 'fields' =>
    array(
        0 => array(
            'name' => 'promo_code',
            'label' => 'Promo Code',
            'type' => 'text'
        )
)));
?>