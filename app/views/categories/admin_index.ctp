<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Category Manager");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Category Manager");?>
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
                        <?php $this->set("title_for_layout", "Category Summary");?>
                       <!-- <?php echo $this->element('admin/addlink', array('linkNameAction' => 'categories', 'linkName' => 'Category'));?> -->
                        <?php echo $this->element('categories/search_config');?>
                        <?php echo $form->create('Category', array('controller' => 'categories', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('ID', 'category_id');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Name', 'cat_name');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Base Price', 'cat_base_price');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Fare Per KM', 'cat_fare_per_km');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Fare Per Minute', 'cat_fare_per_min');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Max Size', 'cat_max_size');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Is Fixed Price', 'cat_is_fixed_price');?></th>
                                  <!--  <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Prime Time %', 'cat_prime_time_percentage');?></th>
                                  -->
                                    <th class='center <?php echo BREADCRUMB_COLOR_CLASS;?>'><?php __("Status");?></th>	
                                    <th class='center <?php echo BREADCRUMB_COLOR_CLASS;?>'><?php __("Delete");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($categories))
                                {
                                    foreach ($categories as $category):
                                        $class=null;
                                        if ($i ++ % 2 == 0)
                                        {
                                            $class=' class="altrow"';
                                        }
                                        ?>
                                <tr<?php echo $class;?>>
                                    <td class="numeric"><?php echo $category['Category']['category_id'];?></td>
                                    <td><?php echo $html->link($category['Category']['cat_name'],array('action' => 'edit', $category['Category']['category_id']), array('escape' => false));?></td>
                                    <td><?php echo $category['Category']['cat_base_price'];?></td>
                                    <td><?php echo $category['Category']['cat_fare_per_km'];?></td>
                                    <td><?php echo $category['Category']['cat_fare_per_min'];?></td>
                                    <td><?php echo $category['Category']['cat_max_size'];?></td>
                                    <td><?php echo $status->createWithCustomField($category['Category']['category_id'], $category['Category']['cat_is_fixed_price'],'cat_is_fixed_price'); ?></td>
                                   
                                   <!--
                                    <td><?php echo $category['Category']['cat_prime_time_percentage'];?></td>
                                    -->
                                    
                                    <td><?php echo $status->createWithCustomField($category['Category']['category_id'], $category['Category']['cat_status'], 'cat_status');?></td>

                             <!--   <td>
                                                <?php
                                                $disabledFlag=true;
                                                echo $form->input('Category.' . ($i - 1) . '.id', array('label' => false, 'class'=>'demo-checkbox', 'type' => 'checkbox', 'value' => $category['Category']['category_id'], 'disabled' => $disabledFlag));
                                                ?>
                                    </td>   --> 
                                    <td style="color:white;">
                                            <?php
                                            $disabledFlag = true;
                                            echo $form->input('Category.'.($i-1).'.id', array('label'=>true,'class'=>'demo-checkbox', 'type'=>'checkbox', 'value'=>$category['Category']['category_id'],'disabled'=>$disabledFlag));
                                            ?>
                                    </td> 
                                </tr>
                                    <?php endforeach;?>
                                    <?php
                                    echo $this->element('global/pagination_row', array('cols' =>9));
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
