<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("My Settings");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("My Settings");?>
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
                         <?php $this->set("title_for_layout", "My Settings");?>
                        <?php //echo $this->element('admin/addlink', array('linkNameAction' => 'constants', 'linkName' => 'Constant'));?>
                        <?php echo $this->element('constants/search_config');?>
                        <?php echo $form->create('Constant', array('controller' => 'constants', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                   <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('constant_id');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('constant_key');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('constant_value');?></th>
                                    <th class="<?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $this->Paginator->sort('created');?></th>
                                    <?php /* <th class="center"><?php __("Edit");?></th> */ ?>
                                    <th class='center <?php echo BREADCRUMB_COLOR_CLASS;?>'><?php __("Delete");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($constants))
                                {
                                foreach ($constants as $constant):
                                    $class=null;
                                    if ($i ++ % 2 == 0)
                                    {
                                        $class=' class="altrow"';
                                    }
                                    ?>
                                    <tr<?php echo $class;?>>
                                        <td class="numeric"><?php echo $constant['Constant']['constant_id'];?></td>
                                        <td><?php echo $html->link(str_replace('_',' ', $constant['Constant']['constant_key']), array('action' => 'edit', $constant['Constant']['constant_id']), array('escape' => false));?></td>
                                        <td style="cursor:pointer;"><?php echo $constant['Constant']['constant_value'];?></td>
                                        <td><?php echo date(DEFAULT_DATE,strtotime($constant['Constant']['created']));?></td>
                                        <?php /* <td class="actions links"><?php echo $html->link($html->image("admin/edit.png"), array('action' => 'edit', $constant['Constant']['constant_id']), array('escape' => false));?> </td> */ ?>
                                        <td>
                                        <?php
                                        $disabledFlag=true;
                                        echo $form->input('Constant.' . ($i - 1) . '.id', array('label' => false, 'type' => 'checkbox', 'value' => $constant['Constant']['constant_id'], 'disabled' => $disabledFlag));
                                        ?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                <?php echo $this->element('global/pagination_row', array('cols' => 5));
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