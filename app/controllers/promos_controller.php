<?php
class PromosController extends AppController
{
    var $name='Promos';
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
        $this->Promo->recursive=0;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $promos=$this->paginate('Promo', $conditions);
        $this->set(compact('promos'));
    }

    function admin_add()
    {
        $this->getRecord();
        if ( ! empty($this->data))
        {
            $this->Promo->create();
            //---------
            if ($this->Promo->save($this->data))
            {
                $this->data=$this->Promo->read(null, $this->Promo->id);
                $this->Session->setFlash(__('The promo has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The promo could not be saved. Please, try again.', true));
            }
        }
    }

    //--------------------
    function admin_edit($id=null)
    {
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid promo', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            //-----------
            if ($this->Promo->save($this->data))
            {
                $this->Session->setFlash(__('The promo has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The promo could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Promo->read(null, $id);
        }
    }

    //--------------------
    function getRecord($id=null)
    {
        $record=$this->Promo->read(null, $id);
        $this->set(compact('record'));
    }

    //---------------------------------------------------------------------------------------------------------------------
}