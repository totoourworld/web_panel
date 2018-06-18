<?php
class TripsController extends AppController
{

    var $name='Trips';
    var $layout='admin_inner';

    //--------------------
    function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('');
    }

    //--------------------Admin actions starts from here--------------------
    function admin_index()
    {
        $this->Redirect->urlToNamed();
        $this->Trip->recursive=0;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            //$conditions=$this->Search->getConditions();
        }
        $from = date('Y-m-d',strtotime(date('Y-m-d').' -7 day'));
        $to = date('Y-m-d', strtotime(' +1 day'));
        if(isset($this->params['named']['from']) && isset($this->params['named']['to']))
        {
            $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($this->params['named']['from'], $this->params['named']['to']));
            $from = $this->params['named']['from'];
            $to = $this->params['named']['to'];
        }
        else
        {
             $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($from, $to));
             $this->params['named']['from'] = $from;
             $this->params['named']['to'] = $to;
        }
        if(isset($this->params['named']['driver_id']) && !empty($this->params['named']['driver_id']))
        {
            $conditions[] = array('Trip.driver_id' => $this->params['named']['driver_id']);
        }
        if(isset($this->params['named']['trip_status']) && !empty($this->params['named']['trip_status']))
        {
            $conditions[] = array('Trip.trip_status' => $this->params['named']['trip_status']);
        }
        $trips=$this->paginate('Trip', $conditions);
        $drivers=$this->Trip->Driver->find('list', array('conditions' => array('Driver.d_active' => ACTIVE),'fields'=>array('driver_id','d_name')));
        $this->loadModel('Constant');
        $currency = $this->Constant->find('list', array('conditions' => array('Constant.constant_id'=>15), 'fields'=>array('constant_value')));
        $currency = $currency['15'];
        $paramiter = $this->Constant->find('list', array('conditions' => array('Constant.constant_id'=>17), 'fields'=>array('constant_value')));
        $paramiter = $paramiter['17'];
        $tripmodify = array();
        foreach ($trips as $key => $value) {
            if(!empty($value['Trip']['trip_promo_amt'])){
             $totalamount = $value['Trip']['trip_pay_amount'];             
             $promoamount = $value['Trip']['trip_promo_amt'];              
             $payamount = $totalamount - $promoamount;
             $value['Trip']['amout_after_promo'] = $payamount;
            }
            else{
                $value['Trip']['amout_after_promo'] = $value['Trip']['trip_pay_amount'];
            }
             array_push($tripmodify, $value);

        }

        $this->set(compact('tripmodify','drivers','currency','paramiter','payamount'));      
    }

    function admin_add()
    {
        $this->redirect(array('controller' => 'trips', 'action' => 'index', 'admin' => true), null, false);
        $this->getRecord();
        if ( ! empty($this->data))
        {
            $this->Trip->create();
            //---------
            if ($this->Trip->save($this->data))
            {
                $this->data=$this->Trip->read(null, $this->Trip->id);
                $this->Session->setFlash(__('The trip has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The trip could not be saved. Please, try again.', true));
            }
        }
        $drivers=$this->Trip->Driver->find('list', array('conditions' => array('Driver.d_active' => ACTIVE),'fields'=>array('driver_id','d_name')));
        $this->set(compact('trips','drivers'));
    }

    //--------------------
    function admin_edit($id=null)
    {
        // $this->redirect(array('controller' => 'trips', 'action' => 'index', 'admin' => true), null, false);
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid trip', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            //-----------
            if ($this->Trip->save($this->data))
            {
                $this->Session->setFlash(__('The trip has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The trip could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Trip->read(null, $id);
            
        }
        $totalamount = $this->data['Trip']['trip_pay_amount'];
        $promoamount = $this->data['Trip']['trip_promo_amt'];
        $payamount = $totalamount - $promoamount;
        $drivers=$this->Trip->Driver->find('list', array('conditions' => array('Driver.d_active' => ACTIVE),'fields'=>array('driver_id','d_name')));
        $this->set(compact('trips','drivers','payamount'));
    }

    //--------------------
    function getRecord($id=null)
    {
        $record=$this->Trip->read(null, $id);
        $this->set(compact('record'));
    }
    //------------------------------------------------------------------------------------
}