<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("My Login Info");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("My Login Info");?>
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
                        <?php $this->set("title_for_layout", "My Login Info");?>
                        <?php //echo $this->element('admin/addlink', array('linkNameAction' => 'users', 'linkName' => 'Registered Member'));?>
                        <?php echo $this->element('users/search_config');?>
                        <?php echo $form->create('User', array('controller' => 'users', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('ID','user_id');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('Group', 'group_id');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('Username', 'username');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('Name', 'u_name');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('Phone', 'phone');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('State', 'state');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('Country', 'country');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Status");?></th>	
                                    <?php /* <th class="center"><?php __("Edit");?></th> */ ?>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Delete");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($users))
                                {
                                    foreach ($users as $user):
                                        $class=null;
                                        if ($i ++ % 2 == 0)
                                        {
                                            $class=' class="altrow"';
                                        }
                                        ?>
                                        <tr<?php echo $class;?>>
                                            <td class="numeric"><?php echo $user['User']['user_id'];?></td>
                                            <td><?php echo $user['Group']['name'];?></td>
                                            <td><?php echo $html->link($user['User']['username'], array('action' => 'edit', $user['User']['user_id']), array('escape' => false));?></td>
                                            <td><?php echo $html->link($user['User']['u_name'], array('action' => 'edit', $user['User']['user_id']), array('escape' => false));?></td>
                                            <td><?php echo $user['User']['u_phone'];?></td>
                                            <td><?php echo $user['User']['u_state'];?></td>
                                            <td><?php echo $user['User']['u_country'];?></td>
                                            <td><?php echo $status->createWithCustomField($user['User']['user_id'], $user['User']['active'],'active');?></td>
                                            <?php /* <td class="actions links"><?php echo $html->link($html->image("admin/edit.png"), array('action' => 'edit', $user['User']['user_id']), array('escape' => false));?></td> */ ?>
                                             
                                            <td style="color:white;">
                                            <?php
                                            $disabledFlag = false;
                                            echo $form->input('User.'.($i-1).'.id', array('label'=>true,'class'=>'demo-checkbox', 'type'=>'checkbox', 'value'=>$user['User']['user_id'],'disabled'=>$disabledFlag));
                                            ?>
                                            </td>

                                        </tr>
                                    <?php endforeach;?>
                                    <?php echo $this->element('global/pagination_row', array('cols' => 9));?>
                                    <?php
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