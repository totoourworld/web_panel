<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Payment Manager");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Payment Manager");?>
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
                        <?php $this->set("title_for_layout", "Payment Summary");?>
                        <?php echo $this->element('admin/addlink', array('linkNameAction' => 'payments', 'linkName' => 'Payment'));?>
                        <?php echo $this->element('payments/search_config');?>
                        <?php echo $form->create('Payment', array('controller' => 'payments', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('ID','payment_id');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Transaction ID','pay_trans_id');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Payment Date','pay_date');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Payment Mode','pay_mode');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Payment Amount','pay_amount');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('Payment Status','pay_status');?></th>	
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Edit");?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Delete");?></th>
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
                                    <td><?php echo $payment['Payment']['pay_trans_id'];?></td>
                                    <td><?php echo $payment['Payment']['pay_date'];?></td>
                                    <td><?php echo $payment['Payment']['pay_mode'];?></td>
                                    <td><?php echo $payment['Payment']['pay_amount'];?></td>
                                    <td><?php echo $payment['Payment']['pay_status'];?></td>
                                    <td class="actions links">
                                            <?php echo $html->link($html->image("admin/edit.png"), array('action' => 'edit', $payment['Payment']['payment_id']), array('escape' => false));?> </td>
                                     
                                    <td style="color:white;">
                                            <?php
                                            $disabledFlag = true;
                                            echo $form->input('Payment.'.($i-1).'.id', array('label'=>true,'class'=>'demo-checkbox', 'type'=>'checkbox', 'value'=>$payment['Payment']['payment_id'],'disabled'=>$disabledFlag));
                                            ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                <?php echo $this->element('global/pagination_row', array('cols' =>8));
                                }
                                else
                                {
                                    ?>
                                <tr><td colspan="8" style="text-align:center;"><?php echo NORECORDFOUND;?></td></tr>
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