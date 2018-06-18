<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo $this->webroot;?>assets/images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $session->read('Auth.User.u_name');?></div>
            <div class="email">Hi, <?php echo $session->read('Auth.User.username');?></div>
          <!--  <div class="email">Hi, <?php echo $session->read('Auth.User.u_email');?></div> -->
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="<?php echo $this->base;?>/admin/users"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="<?php echo $this->base;?>/admin/users/change_password"><i class="material-icons">person</i>Password</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="<?php echo $this->base;?>/admin/users/logout"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN MENU</li>
            <li class="<?php echo (($this->params['controller'] == 'dashboards') && ($this->params['action'] == 'admin_index')) ? 'active' : '';?>">
                <a href="<?php echo $this->base;?>/admin/dashboards">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li class="<?php echo (($this->params['controller'] == 'users') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add' || $this->params['action'] == 'admin_change_password' || $this->params['action'] == 'admin_storeindex' || $this->params['action'] == 'admin_storeedit' || $this->params['action'] == 'admin_storeadd')) ? 'active' : '';?>">
                <a href="<?php echo $this->base;?>/admin/users/storeindex" class="toggled waves-effect waves-block">
                    <i class="material-icons">content_copy</i>
                    <span>Passengers Manager</span>
                </a>
            </li>
          
            <li class="<?php echo (($this->params['controller'] == 'drivers') || ($this->params['controller'] == 'billings')) ? 'active' : '';?>">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>Drivers Manager</span>
                </a>
                <ul class="ml-menu">
                    <li class="inactive">
                        <a href="<?php echo $this->base;?>/admin/drivers">
                            <i class="material-icons">content_copy</i>
                            <span>Approve / Edit Drivers</span>
                        </a>
                    </li>
                   <li class="inactive">
                        <a href="<?php echo $this->base;?>/admin/drivers/statement">
                            <i class="material-icons">content_copy</i>
                            <span>Driver Statement</span>
                        </a>
                    </li>  
                      
                   <!-- <li class="inactive">
                        <a href="<?php echo $this->base;?>/admin/drivers/activity">
                            <i class="material-icons">content_copy</i>
                            <span>Trip Payments</span>
                        </a>
                    </li>    -->
                   
                  <!--  <li class="inactive">
                        <a href="" onclick="return false;">
                            <i class="material-icons">content_copy</i>
                            <span>Ratings</span>
                        </a>
                    </li>  -->
                    <li class="inactive">
                        <a href="<?php echo $this->base;?>/admin/billings/index">
                            <i class="material-icons">content_copy</i>
                            <span>Driver Payouts</span>
                        </a>
                    </li> 

                </ul>
            </li>
            <li class="<?php echo (($this->params['controller'] == 'payments') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'active' : '';?>">
                <a href="<?php echo $this->base;?>/admin/payments" class="toggled waves-effect waves-block">
                    <i class="material-icons">content_copy</i>
                    <span>Payments Manager</span>
                </a>
            </li>
            <li class="<?php echo (($this->params['controller'] == 'promos') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'active' : '';?>">
                <a href="<?php echo $this->base;?>/admin/promos" class="toggled waves-effect waves-block">
                    <i class="material-icons">content_copy</i>
                    <span>Promo Manager</span>
                </a>
            </li>
            <li class="<?php echo (($this->params['controller'] == 'trips') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'active' : '';?>">
                <a href="<?php echo $this->base;?>/admin/trips" class="toggled waves-effect waves-block">
                    <i class="material-icons">content_copy</i>
                    <span>Trips Manager</span>
                </a>
            </li>
            
          <li class="<?php echo (($this->params['controller'] == 'categories') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'active' : '';?>">
                <a href="<?php echo $this->base;?>/admin/categories" class="toggled waves-effect waves-block">
                    <i class="material-icons">content_copy</i>
                    <span>Category Manager</span>
                </a>
            </li>
              
      <!--         <li class="<?php echo (($this->params['controller'] == 'cars') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'active' : '';?>">
                <a href="<?php echo $this->base;?>/admin/cars" class="toggled waves-effect waves-block">
                    <i class="material-icons">content_copy</i>
                    <span>Car Manager</span>
                </a>
            </li>
    -->          
              
             <li class="<?php echo (($this->params['controller'] == 'constants')) ? 'active' : '';?>">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>Settings</span>
                </a>
                <ul class="ml-menu">
                    <?php
                    if (isset($constants) && ! empty($constants))
                    {
                        foreach ($constants as $key => $value)
                        {
                            if(isset($hideConstants[$value['Constant']['constant_id']]))
                            {
                                continue;
                            }
                            ?>
                    <li>
                        <a href="<?php echo $this->base;?>/admin/constants/edit/<?php echo $value['Constant']['constant_id'];?>">
                            <i class="material-icons">content_copy</i><span><?php echo $value['Constant']['constant_display'];?></span>
                        </a>
                    </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </li>
            
            
    <!--        
            <li class="<?php echo (($this->params['controller'] == 'pages') || ($this->params['controller'] == 'supports') || ($this->params['controller'] == 'modules')) ? 'active' : '';?>">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span>Shared</span>
                </a>
                <ul class="ml-menu">
<!--                    <li class="<?php echo (($this->params['controller'] == 'pages') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;">
                        <a href="<?php echo $this->base;?>/admin/pages" style="padding-left:0px;">
                            <i class="<?php echo (($this->params['controller'] == 'pages') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'material-icons' : 'material-icons';?>">content_copy</i><span>com control</span>
                        </a>
                    </li>-->
    <!--                <li class="<?php echo (($this->params['controller'] == 'supports') && ($this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add' || $this->params['action'] == 'admin_index')) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;">
                        <a href="<?php echo $this->base;?>/admin/supports/index" style="padding-left:0px;">
                            <i class="<?php echo (($this->params['controller'] == 'supports') && ($this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add' || $this->params['action'] == 'admin_index')) ? 'material-icons' : 'material-icons';?>">content_copy</i><span>Support</span>
                        </a>
                    </li>
                    <li class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 1)) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;display:none;">
                        <a href="<?php echo $this->base;?>/admin/modules/edit/1" style="padding-left:0px;">
                            <i class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 1)) ? 'material-icons' : 'material-icons';?>">content_copy</i><span>Support</span>
                        </a>
                    </li>
                    <li class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 2)) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;">
                        <a href="<?php echo $this->base;?>/admin/modules/edit/2" style="padding-left:0px;">
                            <i class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 2)) ? 'material-icons' : 'material-icons';?>">content_copy</i><span>FAQs</span>
                        </a>
                    </li>
                    <li class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 3)) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;">
                        <a href="<?php echo $this->base;?>/admin/modules/edit/3" style="padding-left:0px;">
                            <i class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 3)) ? 'material-icons' : 'material-icons';?>">content_copy</i><span>App Updates</span>
                        </a>
                    </li>
                </ul>
            </li>
-->
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);"><?php echo ADMIN_NAME;?></a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
        <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
            <ul class="demo-choose-skin">
                <li data-theme="red" class="active">
                    <div class="red"></div>
                    <span>Red</span>
                </li>
                <li data-theme="pink">
                    <div class="pink"></div>
                    <span>Pink</span>
                </li>
                <li data-theme="purple">
                    <div class="purple"></div>
                    <span>Purple</span>
                </li>
                <li data-theme="deep-purple">
                    <div class="deep-purple"></div>
                    <span>Deep Purple</span>
                </li>
                <li data-theme="indigo">
                    <div class="indigo"></div>
                    <span>Indigo</span>
                </li>
                <li data-theme="blue">
                    <div class="blue"></div>
                    <span>Blue</span>
                </li>
                <li data-theme="light-blue">
                    <div class="light-blue"></div>
                    <span>Light Blue</span>
                </li>
                <li data-theme="cyan">
                    <div class="cyan"></div>
                    <span>Cyan</span>
                </li>
                <li data-theme="teal">
                    <div class="teal"></div>
                    <span>Teal</span>
                </li>
                <li data-theme="green">
                    <div class="green"></div>
                    <span>Green</span>
                </li>
                <li data-theme="light-green">
                    <div class="light-green"></div>
                    <span>Light Green</span>
                </li>
                <li data-theme="lime">
                    <div class="lime"></div>
                    <span>Lime</span>
                </li>
                <li data-theme="yellow">
                    <div class="yellow"></div>
                    <span>Yellow</span>
                </li>
                <li data-theme="amber">
                    <div class="amber"></div>
                    <span>Amber</span>
                </li>
                <li data-theme="orange">
                    <div class="orange"></div>
                    <span>Orange</span>
                </li>
                <li data-theme="deep-orange">
                    <div class="deep-orange"></div>
                    <span>Deep Orange</span>
                </li>
                <li data-theme="brown">
                    <div class="brown"></div>
                    <span>Brown</span>
                </li>
                <li data-theme="grey">
                    <div class="grey"></div>
                    <span>Grey</span>
                </li>
                <li data-theme="blue-grey">
                    <div class="blue-grey"></div>
                    <span>Blue Grey</span>
                </li>
                <li data-theme="black">
                    <div class="black"></div>
                    <span>Black</span>
                </li>
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="settings">
            <div class="demo-settings">
                <p>GENERAL SETTINGS</p>
                <ul class="setting-list">
                    <li>
                        <span>Report Panel Usage</span>
                        <div class="switch">
                            <label><input type="checkbox" checked><span class="lever"></span></label>
                        </div>
                    </li>
                    <li>
                        <span>Email Redirect</span>
                        <div class="switch">
                            <label><input type="checkbox"><span class="lever"></span></label>
                        </div>
                    </li>
                </ul>
                <p>SYSTEM SETTINGS</p>
                <ul class="setting-list">
                    <li>
                        <span>Notifications</span>
                        <div class="switch">
                            <label><input type="checkbox" checked><span class="lever"></span></label>
                        </div>
                    </li>
                    <li>
                        <span>Auto Updates</span>
                        <div class="switch">
                            <label><input type="checkbox" checked><span class="lever"></span></label>
                        </div>
                    </li>
                </ul>
                <p>ACCOUNT SETTINGS</p>
                <ul class="setting-list">
                    <li>
                        <span>Offline</span>
                        <div class="switch">
                            <label><input type="checkbox"><span class="lever"></span></label>
                        </div>
                    </li>
                    <li>
                        <span>Location Permission</span>
                        <div class="switch">
                            <label><input type="checkbox" checked><span class="lever"></span></label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
<!-- #END# Right Sidebar -->