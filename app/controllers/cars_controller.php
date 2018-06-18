<?php
class CarsController extends AppController
{
    var $name='Cars';
    var $layout='admin_inner';
    //--------------------
    function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('');
    }
    //--------------------
    function admin_index()
    {
        $this->Redirect->urlToNamed();
        $this->Car->recursive=1;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $cars=$this->paginate('Car', $conditions);
        $categories = $this->Car->Category->find('list',array('conditions'=>array('Category.cat_status'=>ACTIVE)));
        $this->set(compact('cars','categories'));
    }
    
    //--------------------
    function admin_add()
    {
        $this->getRecord();
        if ( ! empty($this->data))
        {
            $this->Car->create();
            if ($this->Car->save($this->data))
            {
                $this->Session->setFlash(__('The car has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The car could not be saved. Please, try again.', true));
            }
        }
        $categories = $this->Car->Category->find('list',array('conditions'=>array('Category.cat_status'=>ACTIVE)));
        $this->set(compact('categories'));
    }

    //--------------------
    function admin_edit($id=null)
    {
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid car', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            if ($this->Car->save($this->data))
            {
                $this->Session->setFlash(__('The car has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The car could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Car->read(null, $id);
        }
        $categories = $this->Car->Category->find('list',array('conditions'=>array('Category.cat_status'=>ACTIVE)));
        $this->set(compact('categories'));
    }
    //---------------------
    function getRecord($id=null)
    {
        $record=$this->Car->read(null, $id);
        $this->set(compact('record'));
    }

}
