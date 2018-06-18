<?php
class GroupsController extends AppController
{
	var $name='Groups';
	var $layout='admin_inner';
	//----------------
	function beforeFilter()
	{
		parent::beforeFilter();
	}
	//----------------	
	function admin_index()
	{
		$this->Redirect->urlToNamed();
		$this-> Group->recursive = 0;
		$conditions = null;
		if(!empty($this->params['named']))
		{
			$conditions = $this->Search->getConditions();
		}
		$groups=$this->paginate('Group',$conditions);
		$this->set(compact('groups'));
	}
	//----------------
	function admin_add()
	{
		if(!empty($this->data))
		{
			$this->Group->create();
			if($this->Group->save($this->data))
			{
				$this->Session->setFlash(__('The group has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('The group could not be saved. Please, try again.', true));
			}
		}
	}
	//----------------
	function admin_edit($id = null)
	{
		if(!$id && empty($this->data))
		{
			$this->Session->setFlash(__('Invalid Group', true));
			$this->redirect(array('action' => 'index'));
		}
		if(!empty($this->data))
		{
			if($this->Group->save($this->data))
			{
				$this->Session->setFlash(__('The group has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('The group could not be saved. Please, try again.', true));
			}
		}
		if(empty($this->data))
		{
			$this->data = $this->Group->read(null, $id);
		}
	}
	//----------------

}
?>