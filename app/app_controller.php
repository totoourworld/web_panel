<?php

class AppController extends Controller
{

    var $paginate=array('limit' => 10);
    var $helpers=array('Html', 'Html2', 'Html3', 'Html4', 'Javascript', 'Form', 'Fck', 'Session', 'Status');
    var $components=array('Auth', 'Redirect', 'Search', 'Session', 'Mymail');

    //------------------
    function beforeFilter()
    {
        $this->Auth->authorize='controller';
        $this->Auth->loginRedirect=array('admin' => true, 'controller' => 'users', 'action' => 'login');
        $this->Auth->loginError='Login failed! Invalid username/password.';
        $this->Auth->authError='You are not authorized to access that url.';
        $this->Auth->userScope=array('User.active' => 1);
        $this->Auth->allow('index', 'login');
        $this->getConstants();
        $this->hideConstants();
    }

    //------------------
    function isAuthorized()
    {
        return true;
    }
    //----
    function hideConstants()
    {
        $hideConstants = array(11=>11,12=>12,13=>13);
        $onOffConstants = array(4=>4,5=>5,7=>7,9=>9);
        $this->set('hideConstants', $hideConstants);
        $this->set('onOffConstants', $onOffConstants);
    }
    //------------------
    function admin_toggleStatus($id, $status)
    {
        $this->{$this->modelClass}->id=$id;
        $this->{$this->modelClass}->saveField('active', $status);
        $this->Session->setFlash(__('The status has been updated', true));
        $this->Session->write('FullMenuItemSuccessMessage', 'The status has been updated');
        $this->redirect($this->referer());
    }
    
    function admin_toggleStatusWithCustomField($id, $status, $field)
    {
        $this->{$this->modelClass}->id=$id;
        $this->{$this->modelClass}->saveField($field, $status);
        $this->Session->setFlash(__('The status has been updated', true));
        $this->Session->write('FullMenuItemSuccessMessage', 'The status has been updated');
        $this->redirect($this->referer());
    }

    function admin_toggleStatusRevised($id, $status)
    {
        $this->{$this->modelClass}->updateAll(array('active' => 0));
        $this->{$this->modelClass}->id=$id;
        $this->{$this->modelClass}->saveField('active', $status);
        $this->Session->setFlash(__('The status has been updated', true));
        $this->Session->write('FullMenuItemSuccessMessage', 'The status has been updated');
        $this->redirect($this->referer());
    }

    function viewer_toggleStatus($id, $status)
    {
        $this->{$this->modelClass}->id=$id;
        $this->{$this->modelClass}->saveField('active', $status);
        $this->Session->setFlash(__('The status has been updated', true));
        $this->Session->write('FullMenuItemSuccessMessage', 'The status has been updated');
        $this->redirect($this->referer());
    }

    //------------------
    function admin_deleteSelected($id=null)
    {
        foreach ($this->data[$this->modelClass] as $record)
        {
           
            if ($record['id'] > 0)
            {
                switch ($this->modelClass)
                {
                    case 'Restaurant':  
                        $this->{$this->modelClass}->restaurant_id=$record['id'];
                        $this->{$this->modelClass}->delete($record['id']);
                    break;
                    case 'Award':  
                        $this->{$this->modelClass}->award_id=$record['id'];
                        $this->{$this->modelClass}->delete($record['id']);
                    break;
                    case 'Review':  
                        $this->{$this->modelClass}->review_id=$record['id'];
                        $this->{$this->modelClass}->delete($record['id']);
                    break;
                    case 'Customer':  
                        $this->{$this->modelClass}->customer_id=$record['id'];
                        $this->{$this->modelClass}->delete($record['id']);
                    break;
                    case 'CustomerPhone':  
                        $this->{$this->modelClass}->phone_id=$record['id'];
                        $this->{$this->modelClass}->delete($record['id']);
                    break;
                    case 'CustomerAddress':  
                        $this->{$this->modelClass}->address_id=$record['id'];
                        $this->{$this->modelClass}->delete($record['id']);
                    break;
                    case 'Menu':  
                        $this->{$this->modelClass}->menu_id=$record['id'];
                        $this->{$this->modelClass}->delete($record['id']);
                    break;
                    default:
                        $this->{$this->modelClass}->id=$record['id'];
                        $this->{$this->modelClass}->delete();
                }
            }
        }
        $this->redirect($this->referer());
    }

    //------------------
    function DateConverter($date)
    {
        //Convert Date formats
        $newDate=explode('/', $date);
        $Date=$newDate[2] . '-' . $newDate[1] . '-' . $newDate[0];
        return $Date;
    }

    //------------------
    function DatePickerConverter($date)
    {
        //Convert Date formats
        $newDate=explode('-', $date);
        $Date=$newDate[2] . '/' . $newDate[1] . '/' . $newDate[0];
        return $Date;
    }

    //--------------------
    function generatePassword($length, $strength)
    {
        $vowels='aeuy';
        $consonants='bdghjmnpqrstvz';
        if ($strength & 1)
        {
            $consonants .= 'BDGHJLMNPQRSTVWXZ';
        }
        if ($strength & 2)
        {
            $vowels .= "AEUY";
        }
        if ($strength & 4)
        {
            $consonants .= '23456789';
        }
        if ($strength & 8)
        {
            $consonants .= '@#$%';
        }
        $password='';
        $alt=time() % 2;
        for ($i=0; $i < $length; $i ++ )
        {
            if ($alt == 1)
            {
                $password .= $consonants[(rand() % strlen($consonants))];
                $alt=0;
            }
            else
            {
                $password .= $vowels[(rand() % strlen($vowels))];
                $alt=1;
            }
        }
        return $password;
    }

    //-------------
    function getDaysBetweenDates($startDate, $endDate)
    {
        $startDate=strtotime($startDate);
        $endDate=strtotime($endDate);
        $diff=abs(($endDate) - ($startDate));
        //------
        $years=floor($diff / (365 * 60 * 60 * 24));
        $months=floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        //-------
        $days=floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        return $days;
    }

    //----------
    function getConstants()
    {
        $this->loadModel('Constant');
        $constants=$this->Constant->find('all', array('conditions' => array('Constant.active' => ACTIVE)));
        $this->set('constants', $constants);
    }
    
    function getRestaurants()
    {
        $this->loadModel('Restaurant');
        $restaurantsForSelection=$this->Restaurant->find('list', array('conditions' => array('Restaurant.active' => ACTIVE)));
        $this->set('restaurantsForSelection', $restaurantsForSelection);
    }

    function getCategories()
    {
        $this->loadModel('Category');
        //$categoryLists = $this->Category->find('list',array('conditions'=>array('Category.active'=>ACTIVE,'Category.category_id !='=>0)));
        $categoryLists=$this->Category->find('list', array('conditions' => array('Category.active' => ACTIVE)));
        $this->Category->addHierarchyInfo($categoryLists, 'category_id');
        $this->set('categoryLists', $categoryLists);
    }

    function getMembers()
    {
        $this->loadModel('User');
        $merchantLists=$this->User->find('list', array('conditions' => array('User.group_id' => MEMBER_GROUP_ID, 'User.active' => ACTIVE)));
        $this->set('merchantLists', $merchantLists);
    }

    function getUsers()
    {
        $this->loadModel('User');
        $userLists=$this->User->find('list', array('conditions' => array('User.active' => ACTIVE)));
        $this->set('userLists', $userLists);
    }
    
    function dataFromExternalDB($datbaseName=null,$tableName=null,$conditions=array(),$string=null)
    {
        $result = array();
        if(!is_null($datbaseName))
        {
            $servername = MYSQL_DBHOST;
            $username = MYSQL_USERNAME;
            $password = MYSQL_PASSWORD;
            $dbname = $datbaseName;
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            
            $fields = array_keys($conditions);
            $values = array_values($conditions);
            $count = count($fields);
            $item = "";
            for($i = 0; $i < $count; $i++)
            {
                if($count > 1 && $count - 1 != $i)
                {
                    if(is_string($values[$i]))
                    {
                        $item .=  $fields[$i] . " = " . "'{$values[$i]}' AND ";
                    }
                    else
                    {
                        $item .=  $fields[$i] . " = " . "'{$values[$i]}' AND ";
                    }
                }
                else
                {
                    if(is_string($values[$i]))
                    {
                        $item .=  $fields[$i] . " = " . "'{$values[$i]}'";
                    }
                    else
                    {
                        $item .=  $fields[$i] . " = " . "'{$values[$i]}'";
                    }
                }
            }
            if(!is_null($string))
            {
                $item .= $string;
            }
            $sql = "SELECT * FROM {$tableName} WHERE {$item}";
            $records = mysqli_query($conn, $sql);
            if (mysqli_num_rows($records) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($records)) {
                    $result[] = $row;
                }
            } 
            mysqli_close($conn);
        }
        return $result;
    }
    
    function updateDataFromExternalDB($datbaseName=null,$tableName=null,$conditions=array(),$string=null,$updateData=array())
    {
        $result = array();
        if(!is_null($datbaseName))
        {
            $servername = MYSQL_DBHOST;
            $username = MYSQL_USERNAME;
            $password = MYSQL_PASSWORD;
            $dbname = $datbaseName;
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            
            $fields = array_keys($conditions);
            $values = array_values($conditions);
            $count = count($fields);
            $item = "";
            for($i = 0; $i < $count; $i++)
            {
                if($count > 1 && $count - 1 != $i)
                {
                    if(is_string($values[$i]))
                    {
                        $item .=  $fields[$i] . " = " . "'{$values[$i]}' AND ";
                    }
                    else
                    {
                        $item .=  $fields[$i] . " = " . "'{$values[$i]}' AND ";
                    }
                }
                else
                {
                    if(is_string($values[$i]))
                    {
                        $item .=  $fields[$i] . " = " . "'{$values[$i]}'";
                    }
                    else
                    {
                        $item .=  $fields[$i] . " = " . "'{$values[$i]}'";
                    }
                }
            }
            if(!is_null($string))
            {
                $item .= $string;
            }
            $sql = "SELECT * FROM {$tableName} WHERE {$item}";
            
           
            if(!empty($updateData))
            {
                foreach ($updateData as $x => $y)
                {
                        $valuesa[] = "{$x} = '{$y}'";
                }
                $final = implode(", ", $valuesa);
                $sql = " UPDATE {$tableName} SET {$final} WHERE {$item}";
                $result = mysqli_query($conn, $sql);
            }  
            mysqli_close($conn);
        }
        return $result;
    }

}

?>