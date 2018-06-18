<div class="content">
    <div class="breadLine">
        <ul class="breadcrumb">
            <li class="active"><?php __("Driver Requests");?></li>
        </ul>
    </div>
    <div class="workplace">
        <div class="page-header">
            <h1><?php __("Driver Requests");?></h1>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="head clearfix">
                    <div class="isw-grid"></div>
                    <h1><?php __("Driver Requests");?></h1>
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

                    <?php $this->set("title_for_layout", "Driver Requests");?>
                    <?php echo $this->element('drivers/search_config_custom',array('action'=>'request'));?>
                    <?php echo $form->create('Driver', array('controller' => 'drivers', 'action' => 'request'));?>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                        <thead>
                            <tr>
                                <th><?php echo $this->Paginator->sort('ID', 'driver_id');?></th>
                                <th><?php echo $this->Paginator->sort('Name','d_name');?></th>
                                <th><?php echo $this->Paginator->sort('Email','d_email');?></th>
                                <th><?php echo $this->Paginator->sort('Phone','d_phone');?></th>
                                <th><?php echo $this->Paginator->sort('City','d_city');?></th>	
                                <th class='center'><?php __("Status");?></th>	
                            </tr>
                        </thead>
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
                                    <td><?php echo $driver['Driver']['d_name'];?></td>
                                    <td><?php echo $driver['Driver']['d_email'];?></td>
                                    <td><?php echo $driver['Driver']['d_phone'];?></td>
                                    <td><?php echo $driver['Driver']['d_city'];?></td>
                                    
                                    <td><?php echo $this->Form->input('Driver.'.$driver['Driver']['driver_id'].'.status',array('div'=>false,'label'=>false ,'options'=>array('Request'=>'Request','Approved'=>'Approved','Reject'=>'Reject'),'class'=>'validate[required]','value'=>$driver['DriverRestaurant'][0]['status']));?></td>
                                  
                                    
                                </tr>
                            <?php endforeach;?>
                            <?php
                            echo $this->element('global/pagination_row_custom', array('cols' => 6));
                        }
                        else
                        {
                            ?>
                            <tr><td colspan="6" style="text-align:center;"><?php echo NORECORDFOUND;?></td></tr>
                        <?php 
                        
                        }
                    ?>
                    </table>
                    <?php echo $form->end();?>
                </div>
            </div>
        </div>
        <div class="dr"><span></span></div>
    </div>
</div>



