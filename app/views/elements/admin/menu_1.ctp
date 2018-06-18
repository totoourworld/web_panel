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
        <li class="openable <?php echo (($this->params['controller'] == 'pages') || ($this->params['controller'] == 'users') || ($this->params['controller'] == 'restaurants') || ($this->params['controller'] == 'categories') || ($this->params['controller'] == 'promos') || ($this->params['controller'] == 'cars') || ($this->params['controller'] == 'drivers') || ($this->params['controller'] == 'trips') || ($this->params['controller'] == 'payments') || ($this->params['controller'] == 'brands') ) ? 'active' : '';?>">
            <a href="#">
                <span class="isw-list"></span><span class="text">Control Panel</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo $this->base;?>/admin/brands">
                        <span class="icon-th"></span><span class="text">Brand Manager</span>
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