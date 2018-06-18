<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Activity");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Activity");?>
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
                        <?php $this->set("title_for_layout", "Activity");?>
                        <?php echo $this->element('drivers/search_config_activity',array('action'=>'activity'));?>
                        <?php echo $form->create('Driver', array('controller' => 'drivers', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>">ID</th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>">Driver</th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>">Trip Date</th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Status");?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Pay Mode");?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Pay Amount");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    if ( ! empty($trips))
                                    {
                                        foreach ($trips as $trip):
                                            $class=null;
                                            if ($i ++ % 2 == 0)
                                            {
                                                $class=' class="altrow"';
                                            }
                                            ?>
                                            <tr<?php echo $class;?>>

                                                <td class="numeric"><?php echo $trip['Trip']['trip_id'];?></td>
                                                <td><?php echo $drivers[$trip['Trip']['driver_id']];?></td>
                                                <td><?php echo $trip['Trip']['trip_date'];?></td>
                                                <td><?php echo $trip['Trip']['trip_status'];?></td>
                                                <td><?php echo strtoupper($trip['Trip']['trip_pay_mode']);?></td>
                                                <td><?php echo $trip['Trip']['trip_pay_amount'];?></td>

                                            </tr>
                                        <?php endforeach;?>
                                        <?php
                                        echo $this->element('global/pagination_row', array('cols' =>6,'delete'=>1));
                                    }
                                    else
                                    {
                                        ?>
                                        <tr><td colspan="6" style="text-align:center;"><?php echo NORECORDFOUND;?></td></tr>
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





<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li class="active"><?php __("Activity");?></li>
        </ul>
    </div>
    <div class="workplace">
        <div class="page-header">
            <h1><?php __("Activity");?></h1>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="head clearfix">
                    <div class="isw-grid"></div>
                    <h1><?php __("Activity");?></h1>
                </div>
                <div class="block-fluid table-sorting clearfix">
                    <?php
                    $message=$session->flash();
                    if ( ! empty($message))
                    {
                        ?>
                        <div class="alert alert-block">                
                            <h4><?php __("Info");?>!</h4>
                            <?php echo $message;?>
                        </div>
                        <?php
                    }
                    $message=$session->flash('auth');
                    if ( ! empty($message))
                    {
                        ?>
                        <div class="alert alert-block">                
                            <h4><?php __("Info");?>!</h4>
                            <?php echo $message;?>
                        </div>
                        <?php
                    }
                    ?>

                    
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                        <thead>
                            <tr>
                                	
                                
                                
                            </tr>
                        </thead>
                        
                    </table>
                    <?php echo $form->end();?>
                </div>
            </div>
        </div>
        <div class="dr"><span></span></div>
    </div>
</div>



