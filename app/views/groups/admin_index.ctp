<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Groups Summary");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Groups Summary");?>
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
                        <?php $this->set("title_for_layout", "Groups Summary");?>
                        <?php echo $this->element('admin/addlink', array('linkNameAction' => 'groups', 'linkName' => 'Group'));?>
                        <?php echo $this->element('groups/search_config');?>
                        <?php echo $form->create('Group', array('controller' => 'groups', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('id');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('Group Name', 'name');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Status");?></th>	
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Edit");?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Delete");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($groups))
                                {
                                    foreach ($groups as $group):
                                        $class=null;
                                        if ($i ++ % 2 == 0)
                                        {
                                            $class=' class="altrow"';
                                        }
                                        ?>
                                        <tr<?php echo $class;?>>
                                            <td class="numeric">
                                                <?php echo $group['Group']['id'];?>
                                            </td>
                                            <td>
                                                <?php echo $group['Group']['name'];?>
                                            </td>
                                            <td><?php echo $status->create($group['Group']['id'], $group['Group']['active']);?></td>
                                            <td class="actions links">
                                                <?php echo $html->link($html->image("admin/edit.png"), array('action' => 'edit', $group['Group']['id']),
                                                        array('escape' => false));?>
                                            </td>
                                            <td>
        <?php echo ("<input type='checkbox' disabled='disabled' />");?>
                                            </td>				
                                        </tr>
                                    <?php endforeach;?>
                                    <?php echo $this->element('global/pagination_row', array('cols' => 5));?>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <tr><td colspan="5" style="text-align:center;"><?php echo NORECORDFOUND;?></td></tr>
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