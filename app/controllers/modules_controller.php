<?php
class ModulesController extends AppController
{

    var $name='Modules';
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
        $this->redirect(array('controller' => 'brands', 'action' => 'index', 'admin' => true), null, false);
        $this->Redirect->urlToNamed();
        $this->Module->recursive=0;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $modules=$this->paginate('Module', $conditions);
        $this->set(compact('modules'));
    }

    function admin_add()
    {
        $this->redirect(array('controller' => 'brands', 'action' => 'index', 'admin' => true), null, false);
        $this->getRecord();
        if ( ! empty($this->data))
        {
            $this->Module->create();
            //---------
            if ($this->Module->save($this->data))
            {
                $this->data=$this->Module->read(null, $this->Module->id);
                $this->Session->setFlash(__('The module has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The module could not be saved. Please, try again.', true));
            }
        }
    }

    //--------------------
    function admin_edit($id=null)
    {
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid module', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            //-----------
            if ($this->Module->save($this->data))
            {
                $this->Session->setFlash(__('The module has been saved', true));
                $this->redirect(array('action' => 'edit',$this->data['Module']['id']));
            }
            else
            {
                $this->Session->setFlash(__('The module could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Module->read(null, $id);
        }
    }

    //--------------------
    function getRecord($id=null)
    {
        $record=$this->Module->read(null, $id);
        $this->set(compact('record'));
    }

    //---------------------------------------------------------------------------------------------------------------------
}