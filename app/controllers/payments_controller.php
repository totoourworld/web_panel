<?php
class PaymentsController extends AppController
{

    var $name='Payments';
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
        $this->Payment->recursive=0;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $payments=$this->paginate('Payment', $conditions);
        $this->set(compact('payments'));
    }

    function admin_add()
    {
        $this->getRecord();
        if ( ! empty($this->data))
        {
            $this->Payment->create();
            //---------
            if ($this->Payment->save($this->data))
            {
                $this->data=$this->Payment->read(null, $this->Payment->id);
                $this->Session->setFlash(__('The payment has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The payment could not be saved. Please, try again.', true));
            }
        }
    }

    //--------------------
    function admin_edit($id=null)
    {
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid payment', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            //-----------
            if ($this->Payment->save($this->data))
            {
                $this->Session->setFlash(__('The payment has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The payment could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Payment->read(null, $id);
        }
    }

    //--------------------
    function getRecord($id=null)
    {
        $record=$this->Payment->read(null, $id);
        $this->set(compact('record'));
    }
    //----------------------------------------------------------------------------------------
}