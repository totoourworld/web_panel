<section class="content">
<?php $baseurl ="http://34.217.9.8/xeniaAPI/images/originals/"; ?>
 
    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Driver Manager");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Driver Manager");?>
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
                        <?php $this->set("title_for_layout", "Driver Summary");?>
                        <?php echo $this->element('admin/addlink', array('linkNameAction' => 'drivers', 'linkName' => 'Driver'));?>
                        <?php echo $this->element('drivers/search_config');?>
                        <?php echo $form->create('Driver', array('controller' => 'drivers', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('ID', 'driver_id');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Name','d_name');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Email','d_email');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Phone','d_phone');?></th>

                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('ID','document');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('License','document');?></th>
                                     
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Is Verified");?></th>	
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Is Available");?></th>	
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Status");?></th>	
                                    <?php /* <th class="center"><?php __("Edit");?></th> */ ?>
                                   
                                  
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Delete");?></th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($drivers))
                                {
                                    foreach ($drivers as $driver):
                                        $class=null;
                                        if ($i ++ % 2 == 0)
                                        {
                                            $class=' class="altrow"';
                                        }
                                        ?>
                                        <tr<?php echo $class;?>>

                                            <td class="numeric"><?php echo $driver['Driver']['driver_id'];?></td>
                                            <td><?php echo $html->link($driver['Driver']['d_name'],array('action' => 'edit', $driver['Driver']['driver_id']), array('escape' => false));?></td>
                                            <td><?php echo $driver['Driver']['d_email'];?></td>
                                            <td><?php echo $driver['Driver']['d_phone'];?></td>

                                             <td class="actions links"><a id="single_image" data-fancybox="gallery" href="<?php echo $baseurl.$driver['Image']['img_path'] ?>" ><img style="max-width:50px;" src="<?php echo $baseurl.$driver['Image']['img_path'] ?>" </img> </a>
                                              </td>
                                              <td class="actions links"><a id="single_image" data-fancybox="gallery" href="<?php echo $baseurl.$driver['Insorance']['img_path'] ?>" ><img style="max-width:50px;" src="<?php echo $baseurl.$driver['Insorance']['img_path'] ?>" </img> </a>
                                              </td>    

                                               

                                            <!-- <td class="actions links"><?php echo $html->link($html->image("admin/file.png"),array('action' => 'index1', $driver['Driver']['driver_id']), array('escape' => false));?>
                                              </td>  -->
                                               
                                    
                                            <td><?php echo $status->createWithCustomField($driver['Driver']['driver_id'], $driver['Driver']['d_is_verified'],'d_is_verified');?></td>
                                            <td><?php echo $status->createWithCustomField($driver['Driver']['driver_id'], $driver['Driver']['d_is_available'],'d_is_available');?></td>
                                            <td><?php echo $status->createWithCustomField($driver['Driver']['driver_id'], $driver['Driver']['d_active'],'d_active');?></td>
                                            <?php /* <td class="actions links"><?php echo $html->link($html->image("admin/edit.png"),array('action' => 'edit', $driver['Driver']['driver_id']), array('escape' => false));?> </td> */ ?>
                                             
                                         
                                         
                                            <td style="color:white;">
                                            <?php
                                            $disabledFlag = false;
                                            echo $form->input('Driver.'.($i-1).'.id', array('label'=>true,'class'=>'demo-checkbox', 'type'=>'checkbox', 'value'=>$driver['Driver']['driver_id'],'disabled'=>$disabledFlag));
                                            ?>
                                            </td>
                                            
                                           
                                        </tr>
                                    <?php endforeach;?>
                                    <?php
                                    echo $this->element('global/pagination_row', array('cols' => 10));
                                }
                                else
                                {
                                    ?>
                                    <tr><td colspan="10" style="text-align:center;"><?php echo NORECORDFOUND;?></td></tr>
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



