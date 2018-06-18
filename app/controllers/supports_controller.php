<?php
class SupportsController extends AppController
{

    var $name='Supports';
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
        $this->Support->recursive=0;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $supports=$this->paginate('Support', $conditions);
        $this->set(compact('supports'));
    }

    function admin_add()
    {
        $this->getRecord();
        if ( ! empty($this->data))
        {
            $this->Support->create();
            //---------
            if ($this->Support->save($this->data))
            {
                $this->data=$this->Support->read(null, $this->Support->id);
                $this->Session->setFlash(__('The support has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The support could not be saved. Please, try again.', true));
            }
        }
    }

    //--------------------
    function admin_edit($id=null)
    {
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid support', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            //-----------
            if ($this->Support->save($this->data))
            {
                $this->Session->setFlash(__('The support has been saved', true));
                $this->redirect(array('action' => 'index')); 
            }
            else
            {
                $this->Session->setFlash(__('The support could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Support->read(null, $id);
        }
        if (empty($this->data))
        {
            $this->redirect(array('action' => 'index'));
        }
    }

    //--------------------
    function getRecord($id=null)
    {
        $record=$this->Support->read(null, $id);
        $this->set(compact('record'));
    }

    //---------------------------------------------------------------------------------------------------------------------
}