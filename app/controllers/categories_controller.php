<?php
class CategoriesController extends AppController
{

    var $name='Categories';
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
        $this->Category->recursive=0;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $categories=$this->paginate('Category', $conditions);
        $this->set(compact('categories'));
    }

    function admin_add()
    {
        $this->getRecord();
        if ( ! empty($this->data))
        {
            $this->Category->create();
            //---------
            if ($this->Category->save($this->data))
            {
                $this->data=$this->Category->read(null, $this->Category->id);
                $this->Session->setFlash(__('The category has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
            }
        }
    }

    //--------------------
    function admin_edit($id=null)
    {
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid category', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            //-----------
            if ($this->Category->save($this->data))
            {
                $this->Session->setFlash(__('The category has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Category->read(null, $id);
        }
    }

    //--------------------
    function getRecord($id=null)
    {
        $record=$this->Category->read(null, $id);
        $this->set(compact('record'));
    }

    //---------------------------------------------------------------------------------------------------------------------
}