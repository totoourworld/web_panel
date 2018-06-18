<?php

class UsersController extends AppController
{

    var $name='Users';
    var $layout='admin_inner';
    var $facebook=NULL;

    //--------------------
    function beforeFilter()
    {
        $this->Auth->autoRedirect=false;
        parent::beforeFilter();
        $this->Auth->allow('admin_forgotpassword', 'admin_login');
    }

    //----------------	
    function admin_index()
    {
        $this->Redirect->urlToNamed();
        $this->User->recursive=0;
        $conditions=null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $conditions[]=array('User.group_id' => ADMIN_GROUP_ID);
        $users=$this->paginate('User', $conditions);
        $this->set(compact('users'));
    }

    function admin_storeindex()
    {
        $this->Redirect->urlToNamed();
        $this->User->recursive=0;
        $conditions=null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $conditions[]=array('User.group_id' => MEMBER_GROUP_ID);
        $users=$this->paginate('User', $conditions);
        $this->set(compact('users'));
    }

    //--------------------
    function admin_add()
    {
        $this->redirect(array('controller' => 'users', 'action' => 'storeadd', 'admin' => true), null, false);
        if ( ! empty($this->data))
        {
            // $this->data['User']['name'] = $this->data['User']['first_name']." ".$this->data['User']['last_name'];
            //$this->data['User']['group_id'] = MEMBER_GROUP_ID;
            $this->User->create();
            if ($this->User->save($this->data))
            {
                $this->Session->setFlash(__('The member has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.', true));
            }
        }
        $groups=$this->User->Group->find('list', array('conditions' => array('Group.id' => ADMIN_GROUP_ID)));
        $this->set(compact('groups'));
    }

    function admin_storeadd()
    {
        if ( ! empty($this->data))
        {
            //$this->data['User']['password']=$this->Auth->password($this->data['User']['text_password']);
            $this->data['User']['text_password']=$this->data['User']['text_password'];
            $this->data['User']['u_password']=md5($this->data['User']['text_password']);
            $this->data['User']['md5password']=md5($this->data['User']['text_password']);
            $this->data['User']['u_name']=$this->data['User']['u_fname'];
            $this->data['User']['group_id']=MEMBER_GROUP_ID;
            if ($this->User->save($this->data))
            {
                $this->Session->setFlash(__('The member has been saved', true));
                $this->redirect(array('action' => 'storeindex'));
            }
            else
            {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.', true));
            }
        }

        $groups=$this->User->Group->find('list', array('conditions' => array('Group.id' => MEMBER_GROUP_ID)));
        $this->set(compact('groups', 'password'));
    }

    //--------------------
    function admin_edit($id=null)
    {
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid User', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            $this->data['User']['password']=$this->Auth->password($this->data['User']['text_password']);
            $this->data['User']['md5password']=md5($this->data['User']['text_password']);
            $this->data['User']['u_name']=$this->data['User']['u_fname'];
            //$this->data['User']['group_id'] = MEMBER_GROUP_ID;
            if ($this->User->save($this->data))
            {
                $this->Session->setFlash(__('The member has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->User->read(null, $id);
            $password=$this->data['User']['password'];
        }
        $groups=$this->User->Group->find('list', array('conditions' => array('Group.id' => ADMIN_GROUP_ID)));
        $this->set(compact('groups', 'password'));
    }

    function admin_storeedit($id=null)
    {
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid User', true));
            $this->redirect(array('action' => 'storeindex'));
        }
        if ( ! empty($this->data))
        {

            //$this->data['User']['text_password']=$this->Auth->password($this->data['User']['text_password']);
            $this->data['User']['text_password']=$this->data['User']['text_password'];
            $this->data['User']['u_password']=md5($this->data['User']['text_password']);
            $this->data['User']['u_name']=$this->data['User']['u_fname'];
            $this->data['User']['group_id']=MEMBER_GROUP_ID;
            if ($this->User->save($this->data))
            {
                $this->Session->setFlash(__('The member has been saved', true));
                $this->redirect(array('action' => 'storeindex'));
            }
            else
            {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->User->read(null, $id);
            //print_r($this->data['User']['text_password']); exit;
        }
        $groups=$this->User->Group->find('list', array('conditions' => array('Group.id' => MEMBER_GROUP_ID)));
        $this->set(compact('groups', 'password'));
    }

    //-------------------
    function admin_login()
    {

        $this->layout='admin_login';
        if ($this->Session->read('Auth.User'))
        {
            $user=$this->Auth->user();
            $LoginUserGroupID=$user['User']['group_id'];
            if ($LoginUserGroupID != ADMIN_GROUP_ID)
            {
                $this->Session->setFlash(__('Invalid username and password', true));
                $this->Auth->logout();
                $this->redirect($this->referer());
            }
            else
            {

                $this->redirect(array('controller' => 'dashboards', 'action' => 'index', 'admin' => true), null, false);
            }
        }
    }

    //--------------------
    function admin_logout()
    {
        $this->redirect($this->Auth->logout());
    }

    //--------------------
    function admin_change_password()
    {
        $this->layout='admin_inner';
        if ( ! empty($this->data))
        {
            $cansave=true;
            $user=$this->User->findByUsername($this->data['User']['username']);
            if ( ! $user)
            {
                $this->Session->setFlash(__('Username not found', true));
                $this->User->validationErrors['username']='Username not found';
                $cansave=false;
            }
            if ($user && $user['User']['password'] != $this->Auth->password($this->data['User']['old_password']))
            {
                $this->Session->setFlash(__('Password is incorrect', true));
                $this->User->validationErrors['old_password']='Password is incorrect';
                $cansave=false;
            }
            else if ($this->data['User']['new_password'] != $this->data['User']['confirm_password'])
            {
                $this->Session->setFlash(__("Password didn't match", true));
                $this->User->validationErrors['confirm_password']="Password didn't match";
                $cansave=false;
            }
            if ($cansave)
            {
                $user['User']['text_password']=$this->data['User']['new_password'];
                $user['User']['md5password']=md5($this->data['User']['new_password']);
                $user['User']['password']=$this->Auth->password($this->data['User']['new_password']);
                $this->User->id=$user['User']['user_id'];
                if ($this->User->saveField('password', $user['User']['password']))
                {
                    $this->User->id=$user['User']['user_id'];
                    $this->User->saveField('text_password', $user['User']['text_password']);
                    //----------------
                    $this->User->id=$user['User']['user_id'];
                    $this->User->saveField('md5password', $user['User']['md5password']);

                    $this->Session->setFlash(__('Password is changed successfully', true));
                    $this->redirect(array('controller' => 'users', 'action' => 'index'));
                }
                else
                {
                    $this->Session->setFlash(__("password could not be changed", true));
                }
            }
        }
        $user=$this->Auth->user();
        $user=$this->User->findByUsername($user['User']['username']);
        $password=$user['User']['password'];
        $this->set(compact('password'));
    }

    //--------
    function admin_forgotpassword()
    {
        $this->layout='admin_login';
        //--------------------------------------------
        $title='Forgot Password';
        $meta_keyword='Forgot Password';
        $meta_description='Forgot Password';
        $this->set("title_for_layout", $title);
        $this->set("meta_keywords", $meta_keyword);
        $this->set("meta_description", $meta_description);
        //-----------------------------------------------
        if ( ! empty($this->data))
        {
            $user=$this->User->findByusername($this->data['User']['username']);
            if ( ! empty($user))
            {
                $length=9;
                $strength=8;
                $password=$this->generatePassword($length, $strength);
                $NewPassword=$this->Auth->password($password);
                //--------
                $this->User->id=$user['User']['user_id'];
                if ($this->User->saveField('password', $NewPassword))
                {
                    $this->User->id=$user['User']['user_id'];
                    $this->User->saveField('text_password', $password);
                    //----------------
                    $md5Password=md5($password);
                    $this->User->id=$user['User']['user_id'];
                    $this->User->saveField('md5password', $md5Password);

                    $user['User']['newpassword']=$password;
                    $this->forgotEmail($user);
                    $this->Session->setFlash(__('Email send to your email ID.', true));
                    //$this->redirect($this->referer());	
                }
            }
            else
            {
                $this->Session->setFlash(__('Email not found.', true));
                //$this->redirect($this->referer());	
            }
        }
    }

    //-----
    function forgotEmail($data)
    {
        $user_option['to']=$data['User']['username'];
        $user_option['from']=ADMIN_EMAIL;
        $user_option['subject']='Fotgot Password';
        $user_option['content']=$data;
        $user_option['contentTemplate']='forgot_password';
        $this->Mymail->sendEmail($user_option);
    }

    //----
}

?>