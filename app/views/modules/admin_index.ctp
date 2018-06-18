<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Module Master");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Module Master");?>
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
                        <?php $this->set("title_for_layout", "Module Summary");?>
                        <?php echo $this->element('admin/addlink', array('linkNameAction' => 'modules', 'linkName' => 'Module'));?>
                        <?php echo $this->element('modules/search_config');?>
                        <?php echo $form->create('Module', array('controller' => 'modules', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('id');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('name');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('content');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('created');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Edit");?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Delete");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($modules))
                                {
                                foreach ($modules as $module):
                                    $class=null;
                                    if ($i ++ % 2 == 0)
                                    {
                                        $class=' class="altrow"';
                                    }
                                    ?>
                                    <tr<?php echo $class;?>>
                                        <td class="numeric"><?php echo $module['Module']['id'];?></td>
                                        <td><?php echo $module['Module']['name'];?></td>
                                        <td style="cursor:pointer;">
                                            <?php echo $html->image("icons/bb/ic_text_document.png", array('index'=>$module['Module']['id'],'class'=>'popup_3'));?>
                                            <?php echo $this->element('admin/popup',array('popupid'=>$module['Module']['id'],'popupname'=>$module['Module']['name'],'popupcontent'=>$module['Module']['content']));?>
                                        </td>
                                        <td><?php echo $module['Module']['created'];?></td>
                                        <td class="actions links">
                                            <?php echo $html->link($html->image("admin/edit.png"), array('action' => 'edit', $module['Module']['id']), array('escape' => false));?> </td>
                                        <td>
                                        <?php
                                        $disabledFlag=true;
                                        echo $form->input('Module.' . ($i - 1) . '.id', array('label' => false, 'type' => 'checkbox', 'value' => $module['Module']['id'], 'disabled' => $disabledFlag));
                                        ?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                <?php echo $this->element('global/pagination_row', array('cols' => 6));
                                }
                                else
                                {
                                    ?>
                                    <tr><td colspan="6" style="text-align:center;"><?php echo NORECORDFOUND;?></td></tr>
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