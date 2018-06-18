<?php

class DashboardsController extends AppController {

    var $name = 'Dashboards';
    var $layout = 'admin_dashboard';
    var $uses = array('User');

    //--------------------
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
    }

    //--------------------
    function admin_index() {
        $this->Redirect->urlToNamed();
        $conditions = null;

        $this->loadModel('Driver');
        $this->loadModel('Trip');
        $this->loadModel('User');
        $this->loadModel('Payment');

//        for total driver count
        $drivers = $this->Driver->find('count');
        $driver = $this->Driver->find('all',array('conditions'=>array('Driver.d_is_available' => 1,'Driver.d_is_verified' => 1,'Driver.d_active' => 1)));
        $drivername = $this->Driver->find('list');
        //debug($drivername); exit;
        $this->loadModel('Category'); 
        $categories = $this->Category->find('list');
        //debug($categories); exit;
        $payments=$this->paginate('Payment');
        //debug($payments); exit;
//        for total trips
        $totaltrips = $this->Trip->find('count');
//        for total users
        $users = $this->User->find('count');
//        for available users
        $availusers = $this->User->find('count', array('conditions'=>array('User.u_is_available' => 1)));
//        for avaliable drivers
        $availdrivers = $this->Driver->find('count', array('conditions'=>array('Driver.d_is_available' => 1)));
//        for today trips
       
       // $todaytrips = $this->Trip->find('count', array('conditions'=>array('Trip.trip_date' => date('Y-m-d'))));
         
         $todaytrips = $this->Trip->find('count');
        $todaytrip = $this->Trip->find('all', array('conditions'=>array('Trip.trip_date' => date('Y-m-d H:i:s')))); 
  $todaytripdate= $this->Trip->find('list');
         
        //print_r($todaytrips); exit;
        $this->Payment->virtualFields['total'] = 'SUM(Payment.pay_amount)';
        
        $totalPoints = $this->Payment->find('all', array('fields' => array('total')));
        
        $this->set(compact('drivers','totaltrips','users','availusers','availdrivers','todaytrips','totalPoints','trips','driver','payments','categories','drivername'));
        // for dashboard trips details
        $trips=$this->paginate('Trip');
        //debug($driver); exit;
         
    }

}
