<?php

class DriversController extends AppController
{

    var $name='Drivers';
    var $layout='admin_inner';

    //--------------------
    function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('admin_statementpdf','admin_weeklystatementpdfapi','admin_autoweeklystatementpdf');
    }
    //--------------------
    function admin_index($id = null)
    {
        $this->Redirect->urlToNamed();
        $this->Driver->recursive=1;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $drivers=$this->paginate('Driver', $conditions);
        $cars = $this->Driver->Car->find('list',array('conditions'=>array('Car.active'=>ACTIVE)));
        //debug($drivers); exit;
         
        $this->set(compact('drivers','cars'));
    }

    function admin_index1($id = null)
    {
        //print_r($id); exit;
        $this->layout = '';
        $this->Redirect->urlToNamed();
        $this->Driver->recursive=1;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $drivers=$this->paginate('Driver', $conditions);
        $cars = $this->Driver->Car->find('list',array('conditions'=>array('Car.active'=>ACTIVE))); 
        $sql = "SELECT d_rc, d_license_id FROM `drivers` WHERE driver_id = $id";
        $result  = $this->Driver->query($sql);
        $imageid = $result['0']['drivers']['d_rc'];
        $licenseid = $result['0']['drivers']['d_license_id'];

        $url = "SELECT img_path FROM `images` WHERE image_id = $imageid";
        $this->loadModel("Image");
        $new  = $this->Image->query($url);
        $imageurl = $new['0']['images']['img_path'];
         

        $licen = "SELECT img_path FROM `images` WHERE image_id = $licenseid";
        $license = $this->Image->query($licen);
        $licenseurl = $license['0']['images']['img_path'];
         
        
         
        $response = array('image' => $imageurl, 'licence' => $licenseurl);
        

         
        //$this->set(compact('drivers','cars','imageurl','licenseurl'));
        $this->set('response', $response);
    }
    
    
    
    function admin_activity()
    {
        $this->loadModel('Trip');
        $this->Redirect->urlToNamed();
        $this->Trip->recursive=0;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            //$conditions=$this->Search->getConditions();
        }
        $from = date('Y-m-d',strtotime(date('Y-m-d').' -7 day'));
        $to = date('Y-m-d', strtotime(' +1 day'));
        if(isset($this->params['named']['from']) && isset($this->params['named']['to']))
        {
            $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($this->params['named']['from'], $this->params['named']['to']));
            $from = $this->params['named']['from'];
            $to = $this->params['named']['to'];
        }
        else
        {
             $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($from, $to));
             $this->params['named']['from'] = $from;
             $this->params['named']['to'] = $to;
        }
        if(isset($this->params['named']['driver_id']) && !empty($this->params['named']['driver_id']))
        {
            $conditions[] = array('Trip.driver_id' => $this->params['named']['driver_id']);
        }
        if(isset($this->params['named']['trip_status']) && !empty($this->params['named']['trip_status']))
        {
            $conditions[] = array('Trip.trip_status' => $this->params['named']['trip_status']);
        }
        //debug($this->paginate);exit;
        $this->paginate['model']='Trip';
        
        $trips=$this->paginate('Trip', $conditions);
        //$trips = $this->Trip->find('all',array('conditions'=>$conditions));
        $this->loadModel('Driver');
        $drivers = $this->Driver->find('list',array('fields'=>array('driver_id','d_name')));
       
        
        $this->set(compact('trips','from','to','drivers'));
    }
    
    function admin_statement($driverId=0)
    {
        $this->loadModel('Trip');
        
        $this->Redirect->urlToNamed();
        $this->Trip->recursive=0;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $from = date('Y-m-d',strtotime(date('Y-m-d').' -7 day'));
        $to = date('Y-m-d');
        if(isset($this->params['named']['from']) && isset($this->params['named']['to']))
        {
            $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($this->params['named']['from'], $this->params['named']['to']));
            $from = $this->params['named']['from'];
            $to = $this->params['named']['to'];
        }
        else
        {
             $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($from, $to));
             $this->params['named']['from'] = $from;
             $this->params['named']['to'] = $to;
        }
        if($driverId)
        {
            $conditions[] = array('Trip.driver_id' => $driverId);
        }
        $conditions[] = array('Trip.trip_status' => 'end');
        $this->Session->write("Search.Driver.Statement",$conditions);
        $this->Session->write("Search.Driver.from",$from);
        $this->Session->write("Search.Driver.to",$to);
        $trips = $this->Trip->find('all',array('conditions'=>$conditions));
        //debug($trips);exit;
        $statements = array();
        $driverStatements = array();
        if(!empty($trips))
        {
            $statements['TotalSummary'] = array();
            $count = 0; $totalFare = 0; $totalCash = 0; $totalCC = 0; $totalTax = 0; $totalCoupons = 0; $totalTip = 0; $totalCommission = 0; $totalCFee = 0; $amountDue = 0;
            
            foreach ($trips as $key => $value)
            {
                $driverCount = 0; $driverTotalFare = 0; $driverTotalCash = 0; $driverTotalCC = 0; $driverTotalTax = 0; $driverTotalTip = 0;
                //-----------
                $count++;
                $totalFare += $value['Trip']['trip_pay_amount'];
                $totalCash += ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_pay_amount']:0;
                $totalCC += ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_pay_amount']:0;
                $totalTax += $value['Trip']['tax_amt'];
                $totalTip += $value['Trip']['trip_tip'];
                //----------------
                $driverCount++; $driverTotalFare = $value['Trip']['trip_pay_amount']; $driverTotalCash = ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_pay_amount']:0; $driverTotalCC = ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_pay_amount']:0; $driverTotalTax = $value['Trip']['tax_amt']; $driverTotalTip = $value['Trip']['trip_tip'];
                if($value['Trip']['driver_id'])
                {
                    if(isset($driverStatements[$value['Trip']['driver_id']]))
                    {
                        $driverStatements[$value['Trip']['driver_id']]['Count'] += $driverCount;
                        $driverStatements[$value['Trip']['driver_id']]['TotalFare'] += $driverTotalFare;
                        $driverStatements[$value['Trip']['driver_id']]['TotalCash'] += $driverTotalCash;
                        $driverStatements[$value['Trip']['driver_id']]['TotalCC'] += $driverTotalCC;
                        $driverStatements[$value['Trip']['driver_id']]['TotalTax'] += $driverTotalTax;
                        $driverStatements[$value['Trip']['driver_id']]['TotalTip'] += $driverTotalTip;
                        $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                    }
                    else
                    {
                        $driverStatements[$value['Trip']['driver_id']]['Count'] = $driverCount;
                        $driverStatements[$value['Trip']['driver_id']]['TotalFare'] = $driverTotalFare;
                        $driverStatements[$value['Trip']['driver_id']]['TotalCash'] = $driverTotalCash;
                        $driverStatements[$value['Trip']['driver_id']]['TotalCC'] = $driverTotalCC;
                        $driverStatements[$value['Trip']['driver_id']]['TotalTax'] = $driverTotalTax;
                        $driverStatements[$value['Trip']['driver_id']]['TotalTip'] = $driverTotalTip;
                        $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                    }
                }
            }
            //-------------
            $statements['TotalSummary']['Count'] = $count;
            $statements['TotalSummary']['TotalFare'] = $totalFare;
            $statements['TotalSummary']['TotalCash'] = $totalCash;
            $statements['TotalSummary']['TotalCC'] = $totalCC;
            $statements['TotalSummary']['TotalTax'] = $totalTax;
            $statements['TotalSummary']['TotalTip'] = $totalTip;
            //------
        }
        //----
        //debug($driverStatements);exit;
        $this->loadModel('Driver');
        $drivers = $this->Driver->find('list',array('fields'=>array('driver_id','d_name')));
        
        $this->set(compact('trips','from','to','statements','driverStatements','drivers'));
    }
    
    function admin_weekwisestatement($driverId=0)
    {
        $this->loadModel('Trip');
        $statements = array();
        $trips = array();
        $driverStatements = array();
            
        $this->Redirect->urlToNamed();
        $this->Trip->recursive=0;
        $conditions = null;
        if ( ! empty($this->params['named']))
        {
            $conditions=$this->Search->getConditions();
        }
        $currentMonthWeeks = array();
        // set current date
        $date = date('Y-m-01');
        $currentdate = date('y-m-d');
        $i=1;
        do {
            $currentMonthWeeks[$i] = $this->getWeekwiseDates($date);
            $date = end($currentMonthWeeks[$i]);
            $date = date('Y-m-d',strtotime($date.' +1 day'));
            $i++;
            
        } while(strtotime($date) <= strtotime($currentdate));
        //debug($currentMonthWeeks);exit;
        $statementWeekly = array();
        
        if(!empty($currentMonthWeeks) && true)
        {
            foreach ($currentMonthWeeks as $kkey => $vvalue)
            {
                $statements = array();
                $trips = array();
                $driverStatements = array();
                $conditions = null;
                
                $from = reset($vvalue);
                $to = end($vvalue);
                $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($from, $to));
                $this->params['named']['from'] = $from;
                $this->params['named']['to'] = $to;
                if($driverId)
                {
                    $conditions[] = array('Trip.driver_id' => $driverId);
                }
                $conditions[] = array('Trip.trip_status' => 'Completed');
                $this->Session->write("Search.Driver.Statement",$conditions);
                $this->Session->write("Search.Driver.from",$from);
                $this->Session->write("Search.Driver.to",$to);
                $trips = $this->Trip->find('all',array('conditions'=>$conditions));
                //debug($conditions);
                if(!empty($trips))
                {
                    $statements['TotalSummary'] = array();
                    $count = 0; $totalFare = 0; $totalCash = 0; $totalCC = 0; $totalTax = 0; $totalCoupons = 0; $totalTip = 0; $totalCommission = 0; $totalCFee = 0; $amountDue = 0;

                    foreach ($trips as $key => $value)
                    {
                        $driverCount = 0; $driverTotalFare = 0; $driverTotalCash = 0; $driverTotalCC = 0; $driverTotalTax = 0; $driverTotalTip = 0;
                        //-----------
                        $count++;
                        $totalFare += $value['Trip']['trip_delivery_fee'];
                        $totalCash += ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_delivery_fee']:0;
                        $totalCC += ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_delivery_fee']:0;
                        $totalTax += $value['Trip']['tax_amt'];
                        $totalTip += $value['Trip']['trip_tip'];
                        //----------------
                        $driverCount++; $driverTotalFare = $value['Trip']['trip_delivery_fee']; $driverTotalCash = ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_delivery_fee']:0; $driverTotalCC = ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_delivery_fee']:0; $driverTotalTax = $value['Trip']['tax_amt']; $driverTotalTip = $value['Trip']['trip_tip'];
                        if($value['Trip']['driver_id'])
                        {
                            if(isset($driverStatements[$value['Trip']['driver_id']]))
                            {
                                $driverStatements[$value['Trip']['driver_id']]['Count'] += $driverCount;
                                $driverStatements[$value['Trip']['driver_id']]['TotalFare'] += $driverTotalFare;
                                $driverStatements[$value['Trip']['driver_id']]['TotalCash'] += $driverTotalCash;
                                $driverStatements[$value['Trip']['driver_id']]['TotalCC'] += $driverTotalCC;
                                $driverStatements[$value['Trip']['driver_id']]['TotalTax'] += $driverTotalTax;
                                $driverStatements[$value['Trip']['driver_id']]['TotalTip'] += $driverTotalTip;
                                $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                            }
                            else
                            {
                                $driverStatements[$value['Trip']['driver_id']]['Count'] = $driverCount;
                                $driverStatements[$value['Trip']['driver_id']]['TotalFare'] = $driverTotalFare;
                                $driverStatements[$value['Trip']['driver_id']]['TotalCash'] = $driverTotalCash;
                                $driverStatements[$value['Trip']['driver_id']]['TotalCC'] = $driverTotalCC;
                                $driverStatements[$value['Trip']['driver_id']]['TotalTax'] = $driverTotalTax;
                                $driverStatements[$value['Trip']['driver_id']]['TotalTip'] = $driverTotalTip;
                                $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                            }
                        }
                    }
                    //-------------
                    $statements['TotalSummary']['Count'] = $count;
                    $statements['TotalSummary']['TotalFare'] = $totalFare;
                    $statements['TotalSummary']['TotalCash'] = $totalCash;
                    $statements['TotalSummary']['TotalCC'] = $totalCC;
                    $statements['TotalSummary']['TotalTax'] = $totalTax;
                    $statements['TotalSummary']['TotalTip'] = $totalTip;
                    //------
                }
                $statementWeekly[$kkey]['statements'] = $statements;
                $statementWeekly[$kkey]['driverStatements'] = $driverStatements;
                $statementWeekly[$kkey]['trips'] = $trips;
                $statementWeekly[$kkey]['from'] = $from;
                $statementWeekly[$kkey]['to'] = $to;
                
                //----
            }
            //debug($statementWeekly);exit;
           //exit;
        }
        else
        {
            $statements = array();
            $trips = array();
            $driverStatements = array();
                
            $from = date('Y-m-d',strtotime(date('Y-m-d').' -7 day'));
            $to = date('Y-m-d');
            if(isset($this->params['named']['from']) && isset($this->params['named']['to']))
            {
                $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($this->params['named']['from'], $this->params['named']['to']));
                $from = $this->params['named']['from'];
                $to = $this->params['named']['to'];
            }
            else
            {
                 $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($from, $to));
                 $this->params['named']['from'] = $from;
                 $this->params['named']['to'] = $to;
            }
            if($driverId)
            {
                $conditions[] = array('Trip.driver_id' => $driverId);
            }
            $conditions[] = array('Trip.trip_status' => 'Completed');
            $this->Session->write("Search.Driver.Statement",$conditions);
            $this->Session->write("Search.Driver.from",$from);
            $this->Session->write("Search.Driver.to",$to);
            $trips = $this->Trip->find('all',array('conditions'=>$conditions));
            //debug($trips);exit;
            if(!empty($trips))
            {
                $statements['TotalSummary'] = array();
                $count = 0; $totalFare = 0; $totalCash = 0; $totalCC = 0; $totalTax = 0; $totalCoupons = 0; $totalTip = 0; $totalCommission = 0; $totalCFee = 0; $amountDue = 0;

                foreach ($trips as $key => $value)
                {
                    $driverCount = 0; $driverTotalFare = 0; $driverTotalCash = 0; $driverTotalCC = 0; $driverTotalTax = 0; $driverTotalTip = 0;
                    //-----------
                    $count++;
                    $totalFare += $value['Trip']['trip_delivery_fee'];
                    $totalCash += ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_delivery_fee']:0;
                    $totalCC += ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_delivery_fee']:0;
                    $totalTax += $value['Trip']['tax_amt'];
                    $totalTip += $value['Trip']['trip_tip'];
                    //----------------
                    $driverCount++; $driverTotalFare = $value['Trip']['trip_delivery_fee']; $driverTotalCash = ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_delivery_fee']:0; $driverTotalCC = ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_delivery_fee']:0; $driverTotalTax = $value['Trip']['tax_amt']; $driverTotalTip = $value['Trip']['trip_tip'];
                    if($value['Trip']['driver_id'])
                    {
                        if(isset($driverStatements[$value['Trip']['driver_id']]))
                        {
                            $driverStatements[$value['Trip']['driver_id']]['Count'] += $driverCount;
                            $driverStatements[$value['Trip']['driver_id']]['TotalFare'] += $driverTotalFare;
                            $driverStatements[$value['Trip']['driver_id']]['TotalCash'] += $driverTotalCash;
                            $driverStatements[$value['Trip']['driver_id']]['TotalCC'] += $driverTotalCC;
                            $driverStatements[$value['Trip']['driver_id']]['TotalTax'] += $driverTotalTax;
                            $driverStatements[$value['Trip']['driver_id']]['TotalTip'] += $driverTotalTip;
                            $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                        }
                        else
                        {
                            $driverStatements[$value['Trip']['driver_id']]['Count'] = $driverCount;
                            $driverStatements[$value['Trip']['driver_id']]['TotalFare'] = $driverTotalFare;
                            $driverStatements[$value['Trip']['driver_id']]['TotalCash'] = $driverTotalCash;
                            $driverStatements[$value['Trip']['driver_id']]['TotalCC'] = $driverTotalCC;
                            $driverStatements[$value['Trip']['driver_id']]['TotalTax'] = $driverTotalTax;
                            $driverStatements[$value['Trip']['driver_id']]['TotalTip'] = $driverTotalTip;
                            $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                        }
                    }
                }
                //-------------
                $statements['TotalSummary']['Count'] = $count;
                $statements['TotalSummary']['TotalFare'] = $totalFare;
                $statements['TotalSummary']['TotalCash'] = $totalCash;
                $statements['TotalSummary']['TotalCC'] = $totalCC;
                $statements['TotalSummary']['TotalTax'] = $totalTax;
                $statements['TotalSummary']['TotalTip'] = $totalTip;
                //------
            }
            //----
            $statementWeekly[1]['statements'] = $statements;
            $statementWeekly[1]['driverStatements'] = $driverStatements;
            $statementWeekly[1]['trips'] = $trips;
        }
        
        //debug($driverStatements);exit;
        $this->loadModel('Driver');
        $drivers = $this->Driver->find('list',array('fields'=>array('driver_id','d_name')));
        $this->set(compact('trips','from','to','statements','driverStatements','drivers','statementWeekly'));
    }
    
    function admin_weeklystatementpdf($driverId=0,$ismobile=0)
    {
        $this->layout='pdf';

        ini_set('memory_limit', '-1');

        // Include Component
        App::import('Component', 'Pdf');
        // Make instance
        $Pdf=new PdfComponent();
        // Invoice name (output name)
        $Pdf->filename='statement'; // Without .pdf
        // You can use download or browser here
        $Pdf->output='download';
        $Pdf->init();
        // Render the view

        $Pdf->process(Router::url('/admin/drivers', true) . '/statementpdf/' . $driverId.'/'.$ismobile);
        
        $this->render(false);
    }
    
    function admin_weeklystatementpdfapi($driverId=0,$ismobile=1)
    {
        $this->layout='pdf';

        ini_set('memory_limit', '-1');
        $filename = time();
        // Include Component
        App::import('Component', 'Pdf');
        // Make instance
        $Pdf=new PdfComponent();
        // Invoice name (output name)
        $Pdf->filename = $filename; // Without .pdf
        // You can use download or browser here
        $Pdf->output='file';
        $Pdf->init();
        // Render the view

        $Pdf->process(Router::url('/admin/drivers', true) . '/autoweeklystatementpdf/' . $driverId.'/'.$ismobile);
        copy(STATEMENT_VENDOR_PATH.$filename.'.pdf', SAVED_STATEMENT_VENDOR_PATH.$filename.'.pdf');
        echo json_encode(array('filename'=>$filename,'path'=>MENU_URL.'app/files/'.$filename.'.pdf'));exit;
    }
    
    function admin_statementpdf($driverId=0,$ismobile=0)
    {
        $this->loadModel('Trip');
         $this->layout='pdf';
        $this->Redirect->urlToNamed();
        $this->Trip->recursive=0;
        $conditions = null;
        //-------
        $from = date('Y-m-d',strtotime(date('Y-m-d').' -50 day'));
        $to = date('Y-m-d');
        $conditions = array('Trip.trip_date BETWEEN ? and ?' => array($from, $to));
        if(count($this->Session->read("Search.Driver.Statement"))>0)
        {
            $conditions = $this->Session->read("Search.Driver.Statement");
        }
        if(count($this->Session->read("Search.Driver.from"))>0)
        {
            $from = $this->Session->read("Search.Driver.from");
        }
        if(count($this->Session->read("Search.Driver.to"))>0)
        {
            $to = $this->Session->read("Search.Driver.to");
        }
        
        if($ismobile)
        {
            $from = date('Y-m-d',strtotime(date('Y-m-d').' -50 day'));
            $to = date('Y-m-d');
            $conditions = array('Trip.trip_date BETWEEN ? and ?' => array($from, $to));
        }
        //---------
        if($driverId)
        {
            $conditions[] = array('Trip.driver_id' => $driverId);
        }     
        $conditions[] = array('Trip.trip_status' => 'Completed');
        $trips = $this->Trip->find('all',array('conditions'=>$conditions));
        //debug($trips);exit;
        $statements = array();
        $driverStatements = array();
        if(!empty($trips))
        {
            $statements['TotalSummary'] = array();
            $count = 0; $totalFare = 0; $totalCash = 0; $totalCC = 0; $totalTax = 0; $totalCoupons = 0; $totalTip = 0; $totalCommission = 0; $totalCFee = 0; $amountDue = 0;
            
            foreach ($trips as $key => $value)
            {
                $driverCount = 0; $driverTotalFare = 0; $driverTotalCash = 0; $driverTotalCC = 0; $driverTotalTax = 0; $driverTotalTip = 0;
                //-----------
                $count++;
                $totalFare += $value['Trip']['trip_delivery_fee'];
                $totalCash += ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_delivery_fee']:0;
                $totalCC += ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_delivery_fee']:0;
                $totalTax += $value['Trip']['tax_amt'];
                $totalTip += $value['Trip']['trip_tip'];
                //----------------
                $driverCount++; $driverTotalFare = $value['Trip']['trip_delivery_fee']; $driverTotalCash = ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_delivery_fee']:0; $driverTotalCC = ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_delivery_fee']:0; $driverTotalTax = $value['Trip']['tax_amt']; $driverTotalTip = $value['Trip']['trip_tip'];
                if($value['Trip']['driver_id'])
                {
                    if(isset($driverStatements[$value['Trip']['driver_id']]))
                    {
                        $driverStatements[$value['Trip']['driver_id']]['Count'] += $driverCount;
                        $driverStatements[$value['Trip']['driver_id']]['TotalFare'] += $driverTotalFare;
                        $driverStatements[$value['Trip']['driver_id']]['TotalCash'] += $driverTotalCash;
                        $driverStatements[$value['Trip']['driver_id']]['TotalCC'] += $driverTotalCC;
                        $driverStatements[$value['Trip']['driver_id']]['TotalTax'] += $driverTotalTax;
                        $driverStatements[$value['Trip']['driver_id']]['TotalTip'] += $driverTotalTip;
                        $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                    }
                    else
                    {
                        $driverStatements[$value['Trip']['driver_id']]['Count'] = $driverCount;
                        $driverStatements[$value['Trip']['driver_id']]['TotalFare'] = $driverTotalFare;
                        $driverStatements[$value['Trip']['driver_id']]['TotalCash'] = $driverTotalCash;
                        $driverStatements[$value['Trip']['driver_id']]['TotalCC'] = $driverTotalCC;
                        $driverStatements[$value['Trip']['driver_id']]['TotalTax'] = $driverTotalTax;
                        $driverStatements[$value['Trip']['driver_id']]['TotalTip'] = $driverTotalTip;
                        $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                    }
                }
            }
            //-------------
            $statements['TotalSummary']['Count'] = $count;
            $statements['TotalSummary']['TotalFare'] = $totalFare;
            $statements['TotalSummary']['TotalCash'] = $totalCash;
            $statements['TotalSummary']['TotalCC'] = $totalCC;
            $statements['TotalSummary']['TotalTax'] = $totalTax;
            $statements['TotalSummary']['TotalTip'] = $totalTip;
            //------
        }
        //----
        //debug($driverStatements);exit;
        $this->loadModel('Driver');
        $drivers = $this->Driver->find('list',array('fields'=>array('driver_id','d_name')));
        $this->set(compact('trips','from','to','statements','driverStatements','drivers'));
    }
    
    function admin_autoweeklystatementpdf($driverId=0,$ismobile=0)
    {
        $this->loadModel('Trip');
         $this->layout='pdf';
        $this->Redirect->urlToNamed();
        $this->Trip->recursive=0;
        $conditions = null;
        //-------
        $currentMonthWeeks = array();
        // set current date
        $date = date('Y-m-01');
        $currentdate = date('y-m-d');
        $i=1;
        do {
            $currentMonthWeeks[$i] = $this->getWeekwiseDates($date);
            $date = end($currentMonthWeeks[$i]);
            $date = date('Y-m-d',strtotime($date.' +1 day'));
            $i++;
            
        } while(strtotime($date) <= strtotime($currentdate));
        //debug($currentMonthWeeks);exit;
        $statementWeekly = array();
        
        if(!empty($currentMonthWeeks) && true)
        {
            foreach ($currentMonthWeeks as $kkey => $vvalue)
            {
                $statements = array();
                $trips = array();
                $driverStatements = array();
                $conditions = null;
                
                $from = reset($vvalue);
                $to = end($vvalue);
                $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($from, $to));
                $this->params['named']['from'] = $from;
                $this->params['named']['to'] = $to;
                if($driverId)
                {
                    $conditions[] = array('Trip.driver_id' => $driverId);
                }
                $conditions[] = array('Trip.trip_status' => 'Completed');
                $this->Session->write("Search.Driver.Statement",$conditions);
                $this->Session->write("Search.Driver.from",$from);
                $this->Session->write("Search.Driver.to",$to);
                $trips = $this->Trip->find('all',array('conditions'=>$conditions));
                //debug($conditions);
                if(!empty($trips))
                {
                    $statements['TotalSummary'] = array();
                    $count = 0; $totalFare = 0; $totalCash = 0; $totalCC = 0; $totalTax = 0; $totalCoupons = 0; $totalTip = 0; $totalCommission = 0; $totalCFee = 0; $amountDue = 0;

                    foreach ($trips as $key => $value)
                    {
                        $driverCount = 0; $driverTotalFare = 0; $driverTotalCash = 0; $driverTotalCC = 0; $driverTotalTax = 0; $driverTotalTip = 0;
                        //-----------
                        $count++;
                        $totalFare += $value['Trip']['trip_delivery_fee'];
                        $totalCash += ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_delivery_fee']:0;
                        $totalCC += ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_delivery_fee']:0;
                        $totalTax += $value['Trip']['tax_amt'];
                        $totalTip += $value['Trip']['trip_tip'];
                        //----------------
                        $driverCount++; $driverTotalFare = $value['Trip']['trip_delivery_fee']; $driverTotalCash = ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_delivery_fee']:0; $driverTotalCC = ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_delivery_fee']:0; $driverTotalTax = $value['Trip']['tax_amt']; $driverTotalTip = $value['Trip']['trip_tip'];
                        if($value['Trip']['driver_id'])
                        {
                            if(isset($driverStatements[$value['Trip']['driver_id']]))
                            {
                                $driverStatements[$value['Trip']['driver_id']]['Count'] += $driverCount;
                                $driverStatements[$value['Trip']['driver_id']]['TotalFare'] += $driverTotalFare;
                                $driverStatements[$value['Trip']['driver_id']]['TotalCash'] += $driverTotalCash;
                                $driverStatements[$value['Trip']['driver_id']]['TotalCC'] += $driverTotalCC;
                                $driverStatements[$value['Trip']['driver_id']]['TotalTax'] += $driverTotalTax;
                                $driverStatements[$value['Trip']['driver_id']]['TotalTip'] += $driverTotalTip;
                                $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                            }
                            else
                            {
                                $driverStatements[$value['Trip']['driver_id']]['Count'] = $driverCount;
                                $driverStatements[$value['Trip']['driver_id']]['TotalFare'] = $driverTotalFare;
                                $driverStatements[$value['Trip']['driver_id']]['TotalCash'] = $driverTotalCash;
                                $driverStatements[$value['Trip']['driver_id']]['TotalCC'] = $driverTotalCC;
                                $driverStatements[$value['Trip']['driver_id']]['TotalTax'] = $driverTotalTax;
                                $driverStatements[$value['Trip']['driver_id']]['TotalTip'] = $driverTotalTip;
                                $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                            }
                        }
                    }
                    //-------------
                    $statements['TotalSummary']['Count'] = $count;
                    $statements['TotalSummary']['TotalFare'] = $totalFare;
                    $statements['TotalSummary']['TotalCash'] = $totalCash;
                    $statements['TotalSummary']['TotalCC'] = $totalCC;
                    $statements['TotalSummary']['TotalTax'] = $totalTax;
                    $statements['TotalSummary']['TotalTip'] = $totalTip;
                    //------
                }
                $statementWeekly[$kkey]['statements'] = $statements;
                $statementWeekly[$kkey]['driverStatements'] = $driverStatements;
                $statementWeekly[$kkey]['trips'] = $trips;
                $statementWeekly[$kkey]['from'] = $from;
                $statementWeekly[$kkey]['to'] = $to;
                
                //----
            }
            //debug($statementWeekly);exit;
           //exit;
        }
        else
        {
            $statements = array();
            $trips = array();
            $driverStatements = array();
                
            $from = date('Y-m-d',strtotime(date('Y-m-d').' -7 day'));
            $to = date('Y-m-d');
            if(isset($this->params['named']['from']) && isset($this->params['named']['to']))
            {
                $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($this->params['named']['from'], $this->params['named']['to']));
                $from = $this->params['named']['from'];
                $to = $this->params['named']['to'];
            }
            else
            {
                 $conditions[] = array('Trip.trip_date BETWEEN ? and ?' => array($from, $to));
                 $this->params['named']['from'] = $from;
                 $this->params['named']['to'] = $to;
            }
            if($driverId)
            {
                $conditions[] = array('Trip.driver_id' => $driverId);
            }
            $conditions[] = array('Trip.trip_status' => 'Completed');
            $this->Session->write("Search.Driver.Statement",$conditions);
            $this->Session->write("Search.Driver.from",$from);
            $this->Session->write("Search.Driver.to",$to);
            $trips = $this->Trip->find('all',array('conditions'=>$conditions));
            //debug($trips);exit;
            if(!empty($trips))
            {
                $statements['TotalSummary'] = array();
                $count = 0; $totalFare = 0; $totalCash = 0; $totalCC = 0; $totalTax = 0; $totalCoupons = 0; $totalTip = 0; $totalCommission = 0; $totalCFee = 0; $amountDue = 0;

                foreach ($trips as $key => $value)
                {
                    $driverCount = 0; $driverTotalFare = 0; $driverTotalCash = 0; $driverTotalCC = 0; $driverTotalTax = 0; $driverTotalTip = 0;
                    //-----------
                    $count++;
                    $totalFare += $value['Trip']['trip_delivery_fee'];
                    $totalCash += ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_delivery_fee']:0;
                    $totalCC += ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_delivery_fee']:0;
                    $totalTax += $value['Trip']['tax_amt'];
                    $totalTip += $value['Trip']['trip_tip'];
                    //----------------
                    $driverCount++; $driverTotalFare = $value['Trip']['trip_delivery_fee']; $driverTotalCash = ($value['Trip']['trip_pay_mode'] == 'cod')?$value['Trip']['trip_delivery_fee']:0; $driverTotalCC = ($value['Trip']['trip_pay_mode'] != 'cod')?$value['Trip']['trip_delivery_fee']:0; $driverTotalTax = $value['Trip']['tax_amt']; $driverTotalTip = $value['Trip']['trip_tip'];
                    if($value['Trip']['driver_id'])
                    {
                        if(isset($driverStatements[$value['Trip']['driver_id']]))
                        {
                            $driverStatements[$value['Trip']['driver_id']]['Count'] += $driverCount;
                            $driverStatements[$value['Trip']['driver_id']]['TotalFare'] += $driverTotalFare;
                            $driverStatements[$value['Trip']['driver_id']]['TotalCash'] += $driverTotalCash;
                            $driverStatements[$value['Trip']['driver_id']]['TotalCC'] += $driverTotalCC;
                            $driverStatements[$value['Trip']['driver_id']]['TotalTax'] += $driverTotalTax;
                            $driverStatements[$value['Trip']['driver_id']]['TotalTip'] += $driverTotalTip;
                            $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                        }
                        else
                        {
                            $driverStatements[$value['Trip']['driver_id']]['Count'] = $driverCount;
                            $driverStatements[$value['Trip']['driver_id']]['TotalFare'] = $driverTotalFare;
                            $driverStatements[$value['Trip']['driver_id']]['TotalCash'] = $driverTotalCash;
                            $driverStatements[$value['Trip']['driver_id']]['TotalCC'] = $driverTotalCC;
                            $driverStatements[$value['Trip']['driver_id']]['TotalTax'] = $driverTotalTax;
                            $driverStatements[$value['Trip']['driver_id']]['TotalTip'] = $driverTotalTip;
                            $driverStatements[$value['Trip']['driver_id']]['Trips'][] = $value;
                        }
                    }
                }
                //-------------
                $statements['TotalSummary']['Count'] = $count;
                $statements['TotalSummary']['TotalFare'] = $totalFare;
                $statements['TotalSummary']['TotalCash'] = $totalCash;
                $statements['TotalSummary']['TotalCC'] = $totalCC;
                $statements['TotalSummary']['TotalTax'] = $totalTax;
                $statements['TotalSummary']['TotalTip'] = $totalTip;
                //------
            }
            //----
            $statementWeekly[1]['statements'] = $statements;
            $statementWeekly[1]['driverStatements'] = $driverStatements;
            $statementWeekly[1]['trips'] = $trips;
        }
        
        //debug($driverStatements);exit;
        $this->loadModel('Driver');
        $drivers = $this->Driver->find('list',array('fields'=>array('driver_id','d_name')));
        $this->set(compact('trips','from','to','statements','driverStatements','drivers','statementWeekly'));
    }
    
    //--------------------
    function admin_add()
    {
        $this->getRecord();
        if ( ! empty($this->data))
        {
            if(isset($this->data['Car']['car_name']) && !empty($this->data['Car']['car_name']))
            {
                $carId = $this->Driver->Car->SaveCar(array('Car'=>$this->data['Car']));
                if($carId)
                {
                    $this->data['Driver']['car_id'] = $carId;
                }
            }
            $this->data['Driver']['d_password'] = md5($this->data['Driver']['text_password']);
            $this->Driver->create();
            if ($this->Driver->save($this->data))
            {
                $driverId = $this->Driver->id;
                //----
                $this->Session->setFlash(__('The driver has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The driver could not be saved. Please, try again.', true));
            }
        }
        $this->loadModel('Category');
        $cars = $this->Driver->Car->find('list',array('conditions'=>array('Car.active'=>ACTIVE)));
        $categories = $this->Category->find('list',array('conditions'=>array('Category.cat_status'=>ACTIVE)));

        $this->set(compact('cars','categories'));
    }

    //--------------------
    function admin_edit($id=null)
    {
        $this->getRecord($id);
        if ( ! $id && empty($this->data))
        {
            $this->Session->setFlash(__('Invalid driver', true));
            $this->redirect(array('action' => 'index'));
        }
        if ( ! empty($this->data))
        {
            if(isset($this->data['Car']['car_name']) && !empty($this->data['Car']['car_name']))
            {
                $carId = $this->Driver->Car->SaveCar(array('Car'=>$this->data['Car']));
                if($carId)
                {
                    $this->data['Driver']['car_id'] = $carId;
                }
            }
            $this->data['Driver']['d_password'] = md5($this->data['Driver']['text_password']);
            
            if ($this->Driver->save($this->data))
            {
                $driverId = $this->Driver->id;
               
                $this->Session->setFlash(__('The driver has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                $this->Session->setFlash(__('The driver could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data))
        {
            $this->data=$this->Driver->read(null, $id);
        }
        $this->loadModel('Category');
        $cars = $this->Driver->Car->find('list',array('conditions'=>array('Car.active'=>ACTIVE)));
        $categories = $this->Category->find('list',array('conditions'=>array('Category.cat_status'=>ACTIVE)));
         
        $this->set(compact('cars','name','categories','id'));
     
    }
    
    //---------------------
    function getRecord($id=null)
    {
        $record=$this->Driver->read(null, $id);
        $this->set(compact('record'));
    }
    
    function getWeekwiseDates($date)
    {
        $weekDates = array();
        $currentdate = date('Y-m-d');
        $last_day_this_month  = date('Y-m-t');
        if(strtotime($date) <= strtotime($currentdate))
        {
            // parse about any English textual datetime description into a Unix timestamp 
            $ts = strtotime($date);
            // calculate the number of days since Monday
            $dow = date('w', $ts);
            $offset = $dow - 1;
            if ($offset < 0)
            {
                $offset = 6;
            }
            // calculate timestamp for the Monday
            $ts = $ts - $offset*86400;
            // loop from Monday till Sunday 
            for ($i = 0; $i < 7; $i++, $ts += 86400)
            {
                $weekDates[$i] = date("Y-m-d", $ts);
            }
        }
        return $weekDates;
    }

}
