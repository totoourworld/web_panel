<section class="content">
    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Edit Driver");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Edit Driver");?>
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
                    <div class="body demo-masked-input">
                        <?php $this->set("title_for_layout", "Edit Driver");?>
                        <?php echo $form->create('Driver', array('action' => 'add', 'type' => 'file', 'id' => "form_validation"));?>
                        <?php echo $form->input('Driver.driver_id')?>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <?php echo $this->element('drivers/form');?> 
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <?php echo $this->element('cars/driver_car_selection'); ?>
                        </div>
                        <div style="clear: both;">&nbsp;</div>
                        <?php echo $form->end();?>   

                    </div>
                </div>
            </div>
            
        </div>
        <!-- #END# Striped Rows -->
    </div>
</section>