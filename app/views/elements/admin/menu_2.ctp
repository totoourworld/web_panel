<div class="menu">
    <div class="breadLine">
        <div class="arrow"></div>
        <div class="adminControl active">
            Hi, <?php echo $session->read('Auth.User.u_name');?>
        </div>
    </div>
    <div class="admin">
        <div class="image">
            <img src="<?php echo $this->webroot;?>img/users/usericon.png" class="img-polaroid"/>                
        </div>
        <ul class="control">
            <li><span class="icon-share-alt"></span>&nbsp;<?php echo $html->link('Logout', array('controller' => 'users', 'action' => 'admin_logout', 'admin' => 1));?></li>
        </ul>
        <div class="info">
            <span>Welcome back!</span>
        </div>
    </div>
    <ul class="navigation">
        <li class="openable <?php echo (($this->params['controller'] == 'pages') || ($this->params['controller'] == 'users') || ($this->params['controller'] == 'restaurants') || ($this->params['controller'] == 'categories') || ($this->params['controller'] == 'promos') || ($this->params['controller'] == 'cars') || ($this->params['controller'] == 'drivers') || ($this->params['controller'] == 'trips') || ($this->params['controller'] == 'payments') || ($this->params['controller'] == 'brands') || ($this->params['controller'] == 'billings') || ($this->params['controller'] == 'modules') || ($this->params['controller'] == 'supports')) ? 'active' : '';?>">
            <a href="#">
                <span class="isw-list"></span><span class="text">Accounts</span>
            </a>
            <ul>
                <li class="<?php echo (($this->params['controller'] == 'brands') ) ? 'listactive' : '';?>">
                     <a href="<?php echo $this->base;?>/admin/brands">
                        <span class="<?php echo (($this->params['controller'] == 'brands') ) ? 'isw-folder' : 'icon-th';?>"></span><span class="text">Info</span>
                    </a>
                </li>
                <li>
                     <a href="#" onclick="return false;">
                        <span class="icon-th"></span><span class="text">Activity</span>
                    </a>
                </li>
                <li class="<?php echo (($this->params['controller'] == 'billings') ) ? 'listactive' : '';?>">
                     <a href="<?php echo $this->base;?>/admin/billings">
                        <span class="<?php echo (($this->params['controller'] == 'billings') ) ? 'isw-folder' : 'icon-th';?>"></span><span class="text">Billings</span>
                    </a>
                </li>
                <li>
                     <a href="#" onclick="return false;">
                        <span class="icon-th"></span><span class="text">Users</span>
                    </a>
                    <ul style="margin:0;">
                        <li class="<?php echo (($this->params['controller'] == 'users') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;">
                            <a href="<?php echo $this->base;?>/admin/users" style="padding-left:0px;">
                               <span class="<?php echo (($this->params['controller'] == 'users') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'isw-folder' : 'icon-chevron-right';?>"></span><span class="text">My login info</span>
                           </a>
                        </li>
                        <li class="<?php echo (($this->params['action'] == 'admin_change_password') ) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;">
                            <a href="<?php echo $this->base;?>/admin/users/change_password" style="padding-left:0px;">
                               <span class="<?php echo (($this->params['action'] == 'admin_change_password') ) ? 'isw-folder' : 'icon-chevron-right';?>"></span><span class="text">Change Password</span>
                           </a>
                        </li>
                    </ul>
                </li>
                <li>
                     <a href="#" onclick="return false;">
                        <span class="icon-th"></span><span class="text">Shared</span>
                    </a>
                    <ul style="margin:0;">
                        <li class="<?php echo (($this->params['controller'] == 'pages') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;">
                            <a href="<?php echo $this->base;?>/admin/pages" style="padding-left:0px;">
                               <span class="<?php echo (($this->params['controller'] == 'pages') && ($this->params['action'] == 'admin_index' || $this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add')) ? 'isw-folder' : 'icon-chevron-right';?>"></span><span class="text">com control</span>
                           </a>
                        </li>
                        <li class="<?php echo (($this->params['controller'] == 'supports') && ($this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add' || $this->params['action'] == 'admin_index')) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;">
                            <a href="<?php echo $this->base;?>/admin/supports/edit/1" style="padding-left:0px;">
                               <span class="<?php echo (($this->params['controller'] == 'supports') && ($this->params['action'] == 'admin_edit' || $this->params['action'] == 'admin_add' || $this->params['action'] == 'admin_index')) ? 'isw-folder' : 'icon-chevron-right';?>"></span><span class="text">Support</span>
                           </a>
                        </li>
                        <li class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 1)) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;display:none;">
                            <a href="<?php echo $this->base;?>/admin/modules/edit/1" style="padding-left:0px;">
                               <span class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 1)) ? 'isw-folder' : 'icon-chevron-right';?>"></span><span class="text">Support</span>
                           </a>
                        </li>
                        <li class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 2)) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;">
                            <a href="<?php echo $this->base;?>/admin/modules/edit/2" style="padding-left:0px;">
                               <span class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 2)) ? 'isw-folder' : 'icon-chevron-right';?>"></span><span class="text">FAQs</span>
                           </a>
                        </li>
                        <li class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 3)) ? 'listactive' : '';?>" style="padding-left:10%;width:90%;">
                            <a href="<?php echo $this->base;?>/admin/modules/edit/3" style="padding-left:0px;">
                               <span class="<?php echo (($this->params['controller'] == 'modules') && ($this->params['action'] == 'admin_edit' && $this->params['pass'][0] == 3)) ? 'isw-folder' : 'icon-chevron-right';?>"></span><span class="text">App Updates</span>
                           </a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            
        </li>
        <li class="openable <?php echo (($this->params['controller'] == 'pages') || ($this->params['controller'] == 'users') || ($this->params['controller'] == 'restaurants') || ($this->params['controller'] == 'categories') || ($this->params['controller'] == 'promos') || ($this->params['controller'] == 'cars') || ($this->params['controller'] == 'drivers') || ($this->params['controller'] == 'trips') || ($this->params['controller'] == 'payments') || ($this->params['controller'] == 'brands') ) ? 'active' : '';?>" style="display:none;">
            <a href="#">
                <span class="isw-list"></span><span class="text">Control Panel</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo $this->base;?>/admin/brands">
                        <span class="isw-folder"></span><span class="text">Brand Manager</span>
                    </a>
                </li>
                <li style="display:none;">
                    <a href="<?php echo $this->base;?>/admin/restaurants">
                        <span class="icon-th"></span><span class="text">Restaurant Manager</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->base;?>/admin/drivers">
                        <span class="icon-th"></span><span class="text">Driver Manager</span>
                    </a>
                </li>
                <li style="display:none;">
                    <a href="<?php echo $this->base;?>/admin/users">
                        <span class="icon-th"></span><span class="text">Member Manager</span>
                    </a>
                </li>
            </ul>
            
        </li>
    </ul>
    <div class="dr"><span></span></div>
    <div class="widget-fluid">
        <div id="menuDatepicker"></div>
    </div>
    <div class="dr"><span></span></div>
</div>
<style type="text/css">

</style>