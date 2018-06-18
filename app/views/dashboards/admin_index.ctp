<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <!--<i class="material-icons">playlist_add_check</i> -->
                        <img style="margin-top:10px;" src="<?php echo $this->webroot; ?>dashboard/route.png" >
                    </div>
                    <div class="content">
                        <div class="text">TRIPS</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $totaltrips; ?>" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                       <i class="material-icons">face</i> 
                        
                    </div>
                    <div class="content">
                        <div class="text">USERS</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $users; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                      <!--  <i class="material-icons">face</i>  -->
                       <img style="margin-top:10px;" src="<?php echo $this->webroot; ?>dashboard/driver.png" > 
                    </div>
                    <div class="content">
                        <div class="text">DRIVERS</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $drivers; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                       <!-- <i class="material-icons">person_add</i>  -->
                       <img style="margin-top:10px;" src="<?php echo $this->webroot; ?>dashboard/route.png" >
                    </div>
                    <div class="content">
                        <div class="text">TRIPS TODAY</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $todaytrips; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
       <!-- <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>CPU USAGE (%)</h2>
                            </div>
                            <div class="col-xs-12 col-sm-6 align-right">
                                <div class="switch panel-switch-btn">
                                    <span class="m-r-10 font-12">REAL TIME</span>
                                    <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                                </div>
                            </div>
                        </div>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="real_time_chart" class="dashboard-flot-chart"></div>
                    </div>
                </div>
            </div>
        </div>  -->
        <!-- #END# Map show -->
         <!-- CPU Usage -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                         
                        <h4> Drivers location on Map </h4> 
                    </div>
                    <div class="body">
                         <script type="text/javascript">
    google.charts.load('current', {
        packages: ['map']
    });
    google.charts.setOnLoadCallback(drawMap);
     
    function drawMap() {
        var data = new google.visualization.DataTable();
        
        data.addColumn('string', 'Address');
        data.addColumn('string', 'Location');
        data.addColumn('string', 'Marker')

        <?php
                        $i = 0;
                        if(!empty($driver) && !empty($categories))
                        {
                            foreach ($driver as $template):
                                 
                                     
                             ?>


        var arr = ["<?php echo $template['Driver']['d_lat']; ?>,<?php echo $template['Driver']['d_lng']; ?>"];

        var name = ["<h4 style=color:red><?php echo  $template['Driver']['d_name']; ?></h4>   <br><h6> <?php echo '('.number_format((float)$template['Driver']['d_lat'],'6','.','') ;?>,<?php echo '&nbsp;'. number_format((float)$template['Driver']['d_lng'],6,'.','') .')' ; ?> </h6> "]; 


        var i = 0;
        for (i = 0; i < arr.length; i++) {




            data.addRows([
                [arr[i], name[i], 'blue']

            ]);
        }

        <?php endforeach;   ?>
        <?php  } ?>
        var url = 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/';

        var options = {
            zoomLevel: 4,
            mapType: 'terrain',
            showTooltip: true,
            showInfoWindow: true,
            useMapTypeControl: true,
            
            icons: {
                blue: {
                    normal: '<?php echo $this->webroot;?>marker.png',
                    selected: '<?php echo $this->webroot;?>marker.png'
                },
                green: {
                    normal: '<?php echo $this->webroot;?>marker.png',
                    selected: '<?php echo $this->webroot;?>marker.png'
                },
                pink: {
                    normal: '<?php echo $this->webroot;?>marker.png',
                    selected: '<?php echo $this->webroot;?>marker.png'
                }
            }
            
        };
        var map = new google.visualization.Map(document.getElementById('map_div'));
        //map.setMapTypeId('terrain');
        map.draw(data, options);
    }
</script>
   <!-- <P id="demo"> </p> -->
  
                        <div id="map_div"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# map show  -->

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Recents Payments</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                <tr>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('ID','payment_id');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Driver Name','Drivername');?></th>

                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Payment Date','PayDate');?></th>

                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Payment Mode','pay_mode');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Payment Amount','pay_amount');?></th>
                                  
                                  <!--
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Payment Status','pay_status');?></th>   
                                   
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Edit");?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Delete");?></th>
                                    -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($payments))
                                {
                                foreach ($payments as $payment):
                                    $class=null;
                                    if ($i ++ % 2 == 0)
                                    {
                                        $class=' class="altrow"';
                                    }
                                    ?>
                                <tr<?php echo $class;?>>
                                    <td class="numeric"><?php echo $payment['Payment']['payment_id'];?></td>
                                    <td><?php echo $drivername[$payment['Trip']['driver_id']];?></td> 

                                    <td><?php echo $payment['Payment']['pay_date'];?></td>
                                     
                                    <td><?php echo $payment['Payment']['pay_mode'];?></td>
                                    <td><?php echo $payment['Payment']['pay_amount'];?></td>
                             <!--       
                                    <td><?php echo $payment['Payment']['pay_status'];?></td>
                                    <td class="actions links">
                                            <?php echo $html->link($html->image("admin/edit.png"), array('action' => 'edit', $payment['Payment']['payment_id']), array('escape' => false));?> </td>
                                     
                                   <td style="color:white;">
                                            <?php
                                            $disabledFlag = false;
                                            echo $form->input('Payment.'.($i-1).'.id', array('label'=>true,'class'=>'demo-checkbox', 'type'=>'checkbox', 'value'=>$payment['Payment']['payment_id'],'disabled'=>$disabledFlag));
                                            ?>
                                    </td>
                                    -->
                                </tr>
                                <?php endforeach;?>
                                <?php  
                                }
                                else
                                {
                                    ?>
                                <tr><td colspan="7" style="text-align:center;"><?php echo NORECORDFOUND;?></td></tr>
                                    <?php 
                                }
                                ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
             
        </div>
    </div>
</section>
                
                 
            
        
       
     