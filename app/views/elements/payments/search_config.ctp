<?php
echo $this->element('global/search',
        array('singular' => 'Payment', 'plural' => 'Payments', 'fields' =>
    array(
        0 => array(
            'name' => 'pay_date',
            'label' => 'Payment Date',
            'type' => 'text',
            'class'=> 'datepicker'
        ),
        1 => array(
            'name' => 'pay_mode',
            'label' => 'Payment Mode',
            'type' => 'select',
            'options' => array('Cash'=>'Cash','PayPal'=>'PayPal')
        ),
        2 => array(
            'name' => 'pay_status',
            'label' => 'Payment Status',
            'type' => 'select',
            'options' => array('Paid'=>'Paid','Unpaid'=>'Unpaid')
        )
)));
?>