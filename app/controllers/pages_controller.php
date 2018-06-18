<?php

class PagesController extends AppController
{

    var $name='Pages';
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
        $this->Page->recursive=0;
        //$conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        if (empty($conditions))
        {
            $conditions['Page.page_id'] = 0;
        }
        $pages=$this->paginate('Page', $conditions);
        $this->Page->addChildCount($pages, 'page_id');
        $searchPages=$this->Page->find('list');
        $this->Page->addHierarchyInfo($searchPages, 'page_id');
        $this->set(compact('pages', 'searchPages'));
    }

    function admin_add()
    {
        $this->getRecord();
        if ( ! empty($this->data))
        {
            if (empty($this->data['Page']['content']))
            {
                $this->Session->setFlash(__('Please add content', true));
            }
            else
            {
                $this->Page->create();
                //---------
                if ($this->Page->save($this->data))
                {
                    $this->data=$this->Page->read(null, $this->Page->id);
                    $this->Session->setFlash(__('The page has been saved', true));
                    $this->redirect(array('action' => 'index'));
                }
                else
                {
                    $this->Session->setFlash(__('The page could not be saved. Please, try again.', true));
                }
            }
        }
        $pages=$this->Page->find('list');
        //----Parent Pages List------
        $parentPages=$this->Page->find('list');
        $this->Page->addHierarchyInfo($parentPages, 'page_id');
        //-------------------
        $this->set(compact('pages', 'parentPages'));
    }

    //--------------------
    function admin_edit($id=null)
    {
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid page', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            if (strlen($this->data['Page']['content']) <= 4)
            {
                $this->Session->setFlash(__('Please add content', true));
            }
            else
            {
                //-----------
                if ($this->Page->save($this->data))
                {
                    $this->Session->setFlash(__('The page has been saved', true));
                    $this->redirect(array('action' => 'index'));
                }
                else
                {
                    $this->Session->setFlash(__('The page could not be saved. Please, try again.', true));
                }
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Page->read(null, $id);
        }
        $pages=$this->Page->find('list');
        //----Parent Pages List------
        $parentPages=$this->Page->find('list');
        $this->Page->addHierarchyInfo($parentPages, 'page_id');
        //-------------------
        $this->set(compact('pages', 'parentPages'));
    }

    //--------------------
    function getRecord($id=null)
    {
        $record=$this->Page->read(null, $id);
        $this->set(compact('record'));
    }

    //---------------------------------------------------------------------------------------------------------------------
}
