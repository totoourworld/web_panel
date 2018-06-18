<?php
class BillingsController extends AppController
{
    var $name='Billings';
    var $layout='admin_inner';
    //--------------------
    function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('getBrandRestaurants');
    }
    //--------------------
    function admin_index()
    {
        $this->Redirect->urlToNamed();
        $this->Billing->recursive=1;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $billings=$this->paginate('Billing', $conditions);
        $drivers=$this->Billing->Driver->find('list', array('conditions' => array('Driver.d_active' => ACTIVE),'fields'=>array('driver_id','d_name')));
        $this->set(compact('billings','drivers'));
        
        
    }
    //--------------------
    function admin_add()
    {
        $this->getRecord();
        if ( ! empty($this->data))
        {
            $user=$this->Auth->user();
            $this->data['Billing']['user_id'] = $user['User']['user_id'];
            $this->Billing->create();
            if ($this->Billing->save($this->data))
            {
                $this->Session->setFlash(__('The billing has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The billing could not be saved. Please, try again.', true));
            }
        }
        $drivers=$this->Billing->Driver->find('list', array('conditions' => array('Driver.d_active' => ACTIVE),'fields'=>array('driver_id','d_name')));
        $this->set(compact('drivers'));
    }

    //--------------------
    function admin_edit($id=null)
    {
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid billing', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            $user=$this->Auth->user();
            $this->data['Billing']['user_id'] = $user['User']['user_id'];
            
            if ($this->Billing->save($this->data))
            {
                $this->Session->setFlash(__('The billing has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The billing could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Billing->read(null, $id);
        }
        $drivers=$this->Billing->Driver->find('list', array('conditions' => array('Driver.d_active' => ACTIVE),'fields'=>array('driver_id','d_name')));
        $this->set(compact('drivers'));
    }
    //---------------------
    function getRecord($id=null)
    {
        $record=$this->Billing->read(null, $id);
        $this->set(compact('record'));
    }
}
