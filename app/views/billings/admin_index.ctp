<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Billings");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Billings");?>
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
                        <?php $this->set("title_for_layout", "Billings");?>
                        <?php echo $this->element('admin/addlink', array('linkNameAction' => 'billings', 'linkName' => 'Billing'));?>
                        <?php echo $this->element('billings/search_config');?>
                        <?php echo $form->create('Billing', array('controller' => 'billings', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('ID','id');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Driver','driver_id');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Bill Number','bill_number');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Paid Amount','paid_amt');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Status','status');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Created','created');?></th>
                                    <?php /* <th class="center"><?php __("Edit");?></th> */ ?>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Delete");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($billings))
                                {
                                    foreach ($billings as $billing):
                                        $class=null;
                                        if ($i ++ % 2 == 0)
                                        {
                                            $class=' class="altrow"';
                                        }
                                        ?>
                                        <tr<?php echo $class;?>>

                                            <td class="numeric"><?php echo $billing['Billing']['id'];?></td>
                                            <td><?php echo $html->link($billing['Driver']['d_name'],array('action' => 'edit', $billing['Billing']['id']), array('escape' => false));?></td>
                                            <td><?php echo $html->link($billing['Billing']['bill_number'],array('action' => 'edit', $billing['Billing']['id']), array('escape' => false));?></td>
                                            <td><?php echo $billing['Billing']['paid_amt'];?></td>
                                            <td><?php echo $billing['Billing']['status'];?></td>
                                            <td><?php echo $billing['Billing']['created'];?></td>
                                            <?php /*
                                            <td class="actions links">
                                                <?php echo $html->link($html->image("admin/edit.png"),array('action' => 'edit', $brand['Brand']['brand_id']), array('escape' => false));?>
                                            </td>
                                            */
                                            ?>
                                             
                                            <td style="color:white;">
                                            <?php
                                            $disabledFlag = false;
                                            echo $form->input('Billing.'.($i-1).'.id', array('label'=>true,'class'=>'demo-checkbox', 'type'=>'checkbox', 'value'=>$billing['Billing']['id'],'disabled'=>$disabledFlag));
                                            ?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    <?php
                                    echo $this->element('global/pagination_row', array('cols' =>7));
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
                        <?php echo $form->end();?>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Striped Rows -->

    </div>
</section>