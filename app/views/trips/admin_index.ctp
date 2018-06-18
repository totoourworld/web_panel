<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Trips Manager");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Trips Manager");?>
                        </h2>
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
                    <div class="body table-responsive">
                        <?php
                        $message=$session->flash();
                        if ( ! empty($message))
                        {
                            ?>
                        <div class="alert <?php echo ALERT_COLOR_CLASS;?> alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4><?php __("Info");?>!</h4>
                                <?php echo $message;?>
                        </div>
                            <?php
                        }
                        $message=$session->flash('auth');
                        if ( ! empty($message))
                        {
                            ?>
                        <div class="alert <?php echo ALERT_COLOR_CLASS;?> alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4><?php __("Info");?>!</h4>
                                <?php echo $message;?>
                        </div>

                            <?php
                        }
                        ?>
                        <?php $this->set("title_for_layout", "Trips Summary");?>
                        <?php //echo $this->element('admin/addlink', array('linkNameAction' => 'trips', 'linkName' => 'Trip'));?>
                        <?php echo $this->element('trips/search_config');?>
                        <?php echo $form->create('Trip', array('controller' => 'trips', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('ID','trip_id');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Driver','driver_id');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Trip Date','trip_date');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('From Location','trip_from_loc');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('To Location','trip_to_loc');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Trip Distance'.'('.$paramiter.')','trip_distance');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Trip Pay Amount'.'('.$currency.')','trip_pay_amount');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Trip Status','trip_status');?></th>	
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Delete");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($tripmodify))
                                {
                                foreach ($tripmodify as $trip):
                                    $class=null;
                                    if ($i ++ % 2 == 0)
                                    {
                                        $class=' class="altrow"';
                                    }
                                    ?>
                                <tr<?php echo $class;?>>
                                    <td class="numeric"><?php echo $html->link($trip['Trip']['trip_id'], array('action' => 'edit', $trip['Trip']['trip_id']), array('escape' => false));?></td>
                                    <td><?php echo $trip['Driver']['d_name'];?></td>
                                    <td><?php echo $trip['Trip']['trip_date'];?></td>
                                    <td><?php echo $trip['Trip']['trip_from_loc'];?></td>
                                    <td><?php echo $trip['Trip']['trip_to_loc'];?></td>
                                    <td><?php echo $trip['Trip']['trip_distance'];?></td>
                                    <td><?php echo $trip['Trip']['amout_after_promo'];?></td>
                                   <!-- <td><?php echo $trip['Trip']['trip_pay_amount'];?></td> -->
                                    <td> 
                                    <?php echo $trip['Trip']['trip_status'];?></td> 
 
                                    <td style="color:white;">
                                            <?php
                                            $disabledFlag = true;
                                            echo $form->input('Trip.'.($i-1).'.id', array('label'=>true,'class'=>'demo-checkbox', 'type'=>'checkbox', 'value'=>$trip['Trip']['trip_id'],'disabled'=>$disabledFlag));
                                            ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                <?php echo $this->element('global/pagination_row', array('cols' =>9));
                                }
                                else
                                {
                                    ?>
                                <tr><td colspan="9" style="text-align:center;"><?php echo NORECORDFOUND;?></td></tr>
                                    <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php echo $form->end();?>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Striped Rows -->

    </div>
</section>