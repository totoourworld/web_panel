<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb <?php echo BREADCRUMB_COLOR_CLASS;?>">
            <li><a href="<?php echo $this->base;?>/admin/dashboards"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">library_books</i> <?php __("Webpages");?></a></li>
        </ol>
        <div class="block-header"></div>
        <!-- Striped Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php __("Webpages");?>
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
                        <?php $this->set("title_for_layout", "Webpages");?>
                        <?php echo $this->element('admin/addlink', array('linkNameAction' => 'pages', 'linkName' => 'Webpage'));?>
                        <?php echo $this->element('pages/search_config');?>
                        <?php echo $form->create('Page', array('controller' => 'pages', 'action' => 'deleteSelected'));?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('id');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('Page Name', 'page_name');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php echo $paginator->sort('Page Slug', 'slug');?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("No. of Sub Pages");?></th>
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Status");?></th>	
                                    <th class="center <?php echo BREADCRUMB_COLOR_CLASS;?>"><?php __("Delete");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                if ( ! empty($pages))
                                {
                                    foreach ($pages as $page):
                                        $class=null;
                                        if ($i ++ % 2 == 0)
                                        {
                                            $class=' class="altrow"';
                                        }
                                        ?>
                                        <tr<?php echo $class;?>>
                                            <td class="numeric">

                                                <?php echo $page['Page']['id'];?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($page['Page']['children_count'] > 0)
                                                    echo $html->link($page['Page']['page_name'], array("action" => 'index', 'page_id' => $page['Page']['id']));
                                                else
                                                    echo $html->link($page['Page']['page_name'], array('action' => 'edit', $page['Page']['id']), array('escape' => false));
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $page['Page']['slug'];?>
                                            </td>
                                            <td>
                                                <?php echo $page['Page']['children_count'];?>
                                            </td>
                                            <td>
                                            <?php echo $status->create($page['Page']['id'], $page['Page']['active']); ?>
                                            </td>

                                            <td>
                                                <?php
                                                if ($page['Page']['children_count'] > 0 || true)
                                                {
                                                    echo ("<input type='checkbox' disabled='disabled' />");
                                                }
                                                else
                                                {
                                                    echo $form->input('Page.' . ($i - 1) . '.id', array('label' => false, 'type' => 'checkbox', 'value' => $page['Page']['id']));
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    <?php echo $this->element('global/pagination_row', array('cols' => 6));?>
                                    <?php
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