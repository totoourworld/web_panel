<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Car Manager");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Car Manager");?>
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
                        <?php $this->set("title_for_layout", "Car Summary");?>
                        <?php echo $this->element('admin/addlink', array('linkNameAction' => 'cars', 'linkName' => 'Car'));?>
                        <?php echo $this->element('cars/search_config');?>
                        <?php echo $form->create('Car', array('controller' => 'cars', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('ID','car_id');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Category','category_id');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Name','car_name');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Registration No','car_reg_no');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Model','car_model');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Fare Per KM','car_fare_per_km');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Fare Per Minute','car_fare_per_min');?></th>
                                    <th class='center <?php echo BREADCRUMB_COLOR_CLASS;?>'><?php __("Status");?></th>	
                                    <th class='center <?php echo BREADCRUMB_COLOR_CLASS;?>'><?php __("Delete");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($cars))
                                {
                                    foreach ($cars as $car):
                                        $class=null;
                                        if ($i ++ % 2 == 0)
                                        {
                                            $class=' class="altrow"';
                                        }
                                        ?>
                                        <tr<?php echo $class;?>>

                                            <td class="numeric"><?php echo $car['Car']['car_id'];?></td>
                                            <td><?php echo $car['Category']['cat_name'];?></td>
                                            <td><?php echo $html->link($car['Car']['car_name'],array('action' => 'edit', $car['Car']['car_id']), array('escape' => false));?></td>
                                            <td><?php echo $car['Car']['car_reg_no'];?></td>
                                            <td><?php echo $car['Car']['car_model'];?></td>
                                            <td><?php echo $car['Car']['car_fare_per_km'];?></td>
                                            <td><?php echo $car['Car']['car_fare_per_min'];?></td>
                                            <td><?php echo $status->create($car['Car']['car_id'], $car['Car']['active']);?></td>
                                            
                                     <!--   <td>
                                                <?php
                                                $disabledFlag=true;
                                                echo $form->input('Car.' . ($i - 1) . '.id',array('label' => false, 'type' => 'checkbox', 'value' => $car['Car']['car_id'], 'disabled' => $disabledFlag));
                                                ?>
                                            </td>-->
                                            <td style="color:white;">
                                            <?php
                                            $disabledFlag = false;
                                            echo $form->input('Car.'.($i-1).'.id', array('label'=>true,'class'=>'demo-checkbox', 'type'=>'checkbox', 'value'=>$car['Car']['car_id'],'disabled'=>$disabledFlag));
                                            ?>
                                            </td> 
                                        </tr>
                                    <?php endforeach;?>
                                    <?php
                                    echo $this->element('global/pagination_row', array('cols' => 9));
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



