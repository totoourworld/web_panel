<?php
class ConstantsController extends AppController
{

    var $name='Constants';
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
        $this->Constant->recursive=0;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $constants=$this->paginate('Constant', $conditions);
        $this->set(compact('constants'));
    }

    function admin_add()
    {
        $this->getRecord();
        if ( ! empty($this->data))
        {
            $this->Constant->create();
            //---------
            if ($this->Constant->save($this->data))
            {
                $this->data=$this->Constant->read(null, $this->Constant->id);
                $this->Session->setFlash(__('The constant has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The constant could not be saved. Please, try again.', true));
            }
        }
    }

    //--------------------
    function admin_edit($id=null)
    {
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid constant', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            //-----------
            if ($this->Constant->save($this->data))
            {
                $this->Session->setFlash(__('The constant has been saved', true));
                $this->redirect($this->referer()); 
            }
            else
            {
                $this->Session->setFlash(__('The constant could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Constant->read(null, $id);
            
        }
        if (empty($this->data))
        {
            $this->Session->setFlash(__('Invalid constant', true));
            $this->redirect($this->referer()); 
        }
        $this->set(compact('id'));
    }

    //--------------------
    function getRecord($id=null)
    {
        $record=$this->Constant->read(null, $id);
        $this->set(compact('record','id'));
    }

    //---------------------------------------------------------------------------------------------------------------------
}