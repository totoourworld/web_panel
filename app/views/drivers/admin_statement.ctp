<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Driver Statement");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Driver Statement");?>
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
                        <?php $this->set("title_for_layout", "Driver Statement");?>
                        <?php echo $this->element('drivers/search_config_statement',array('action'=>'statement'));?>
                        <div style="background-color:#fff; border:0px solid #bbbbbb; padding:15px;">
                        <div class="print" id="print">
                            <div style="text-align:right"> 
                             <?php //echo $html->link($html->image("admin/pdf.jpg"), array('action' => 'weeklystatementpdf',0), array('escape'=>false)); ?>
                            </div>
                            <table class="table table-striped" border="0">
                                <tbody><tr>
                                        
                                        <td colspan="3" valign="top" align="center"><h5>Statement <?php echo date('d/m/Y',strtotime($from));?> - <?php echo date('d/m/Y',strtotime($to));?></h5></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <table class="table-striped" tyle="border-collapse:collapse" width="100%" cellspacing="0" border="0">
                                                <tbody><tr>
                                                        <td class="border" width="221">To: <?php echo $session->read('Auth.User.u_name');?></td>
                                                        <td width="136">&nbsp;</td>
                                                        <td class="border" align="center">Date</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2" width="400" class="border"><?php echo $session->read('Auth.User.u_street');?> <?php echo $session->read('Auth.User.u_address');?> <?php echo $session->read('Auth.User.u_city');?> <?php echo $session->read('Auth.User.u_state');?> <?php echo $session->read('Auth.User.u_country');?> <?php echo $session->read('Auth.User.u_zip');?></td>
                                                        <td class="border0" align="center">&nbsp;</td>
                                                        <td class="border" width="270" align="center"><?php echo date('d/m/Y H:i:s');?></td>
                                                    </tr>
                                                    
                                                </tbody></table>
                                            <br>
                                        </td>
                                    </tr>
                                </tbody></table>
                            <h2>Summary</h2>
                            <?php
                            if(!empty($statements))
                            {?>
                                <table class="table-striped" cellspacing="0" cellpadding="5" border="1" align="left">
                                    <tbody><tr>
                                            <td class="border" align="center">Count</td>
                                            <td class="border" align="center">Total Fare</td>
                                           <!-- <td class="border" align="center">Total Cash</td> -->
                                            <td class="border" align="center">Total CASH</td>
                                            <td class="border" align="center">Total Tax</td>
                                           <!-- <td class="border" align="center">Total Tip</td> -->
                                        </tr>
                                        <tr>
                                            <td class="border" align="center"><?php echo $statements['TotalSummary']['Count'];?></td>
                                            <td class="border" align="center">$<?php echo number_format($statements['TotalSummary']['TotalFare'],2);?></td>
                                          <!--  <td class="border" align="center">$<?php echo number_format($statements['TotalSummary']['TotalCash'],2);?></td> -->
                                            <td class="border" align="center">$<?php echo number_format($statements['TotalSummary']['TotalCC'],2);?></td>
                                            <td class="border" align="center">$<?php echo number_format($statements['TotalSummary']['TotalTax'],2);?></td>
                                          <!--  <td class="border" align="center">$<?php echo number_format($statements['TotalSummary']['TotalTip'],2);?></td> -->
                                        </tr>
                                    </tbody></table>
                                <br>
                                <?php
                                if(!empty($driverStatements))
                                {
                                    $currentPage = 1;
                                    foreach ($driverStatements as $key => $value)
                                    {
                                        
                                        if(isset($value['Count']) && $value['Count'])
                                        {
                                            ?>
                                            <div class="page " style="margin-top: 20px; margin-bottom: 10px;" align="right">Page: <?php echo $currentPage++;?> of <?php echo sizeof($driverStatements);?></div>
                                            <h2><?php echo $drivers[$key];?></h2>
                                            <div style="clear: both;">
                                                <table class="table-striped" style="clear: both;" cellspacing="0" cellpadding="5" border="1" align="left">
                                                    <tbody><tr>
                                                            <td class="border" align="center">Count</td>
                                                            <td class="border" align="center">Total Fare</td>
                                                          <!--  <td class="border" align="center">Total Cash</td> -->
                                                            <td class="border" align="center">Total CASH</td>
                                                            <td class="border" align="center">Total Tax</td>
                                                           <!-- <td class="border" align="center">Total Tip</td> -->
                                                        </tr>
                                                        <tr>
                                                            <td class="border" align="center"><?php echo $value['Count'];?></td>
                                                            <td class="border" align="center">$<?php echo number_format($value['TotalFare'],2);?></td>
                                                          <!--  <td class="border" align="center">$<?php echo number_format($value['TotalCash'],2);?></td> -->
                                                            <td class="border" align="center">$<?php echo number_format($value['TotalCC'],2);?></td>
                                                            <td class="border" align="center">$<?php echo number_format($value['TotalTax'],2);?></td>
                                                           <!-- <td class="border" align="center">$<?php echo number_format($value['TotalTip'],2);?></td> -->
                                                        </tr>
                                                    </tbody></table>
                                            </div>
                                            <div style="clear: both;"></div>
                                            <br>
                                            <table class="table-striped" style="border-collapse:collapse" width="100%" cellspacing="0" border="1">
                                                <tbody><tr>
                                                        <th align="center">Trip time</th>
                                                        <th align="center">Trip #</th>

                                                        <th align="center">Type</th>
                                                        <th align="center">Tax</th>
                                                        <th align="center">Trip Fare</th>
                                                       <!-- <th align="center">Tip</th> -->
                                                    </tr>
                                                    <?php
                                                    if(!empty($value['Trips']))
                                                    {
                                                        foreach ($value['Trips'] as $innerkey => $innervalue)
                                                        {
                                                            ?>
                                                            <tr class="">
                                                                <td nowrap="" align="center"><?php echo date('d/m/Y H:i:s',strtotime($innervalue['Trip']['trip_date']));?></td>
                                                                <td width="100" nowrap="" align="center">#<?php echo $innervalue['Trip']['trip_id'];?></td>

                                                                <td nowrap="" align="center"><?php echo strtoupper($innervalue['Trip']['trip_pay_mode']);?></td>
                                                                <td align="center"><?php echo number_format($innervalue['Trip']['tax_amt'],2);?></td>
                                                                <td align="center"><?php echo number_format($innervalue['Trip']['trip_pay_amount'],2);?></td>
                                                               <!-- <td align="center"><?php echo number_format($innervalue['Trip']['trip_tip'],2);?></td> -->
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody></table>
                                            <br><br>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                
                            <?php
                            }
                            else
                            {
                                ?>
                                <h5 style="text-align: center;">Order Not Found...</h5> 
                                <?php
                            }?>
                               
                        </div>
                        <div style="clear:both;font-size: xx-small;" align="right">v7</div>
                    </div>
                        <?php echo $form->end();?>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Striped Rows -->

    </div>
</section>
<style type="text/css">
    .table-striped td {
        padding:2px;
    }
    .table-striped th {
        padding:2px;
        text-align: center;
    }
</style>
