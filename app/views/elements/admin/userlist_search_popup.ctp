<ul class="buttons">
    <li>
        <a href="#" class="link_bcPopupList"><span class="icon-user"></span><span class="text">Users list</span></a>
        <div id="bcPopupList" class="popup">
            <div class="head clearfix">
                <div class="arrow"></div>
                <span class="isw-users"></span>
                <span class="name">List users</span>
            </div>
            <div class="body-fluid users">
                <div class="item clearfix">
                    <div class="image">
                        <img src="<?php echo $this->webroot;?>img/users/aqvatarius_s.jpg" width="32"/>
                    </div>
                    <div class="info">
                        <a href="#" class="name" onclick="return false;">Administrator</a>
                        <span>online</span>
                    </div>
                </div>
            </div>
            <div class="footer">
                <button class="btn btn-danger link_bcPopupList" type="button">Close</button>
            </div>
        </div>
    </li>
    <li>
        <a href="#" class="link_bcPopupSearch"><span class="icon-search"></span><span class="text">Search</span></a>
        <div id="bcPopupSearch" class="popup">
            <div class="head clearfix">
                <div class="arrow"></div>
                <span class="isw-zoom"></span>
                <span class="name">Search</span>
            </div>
            <div class="body search">
                <input type="text" placeholder="Some text for search..." name="search"/>
            </div>
            <div class="footer">
                <button class="btn" type="button">Search</button>
                <button class="btn btn-danger link_bcPopupSearch" type="button">Close</button>
            </div>
        </div>
    </li>
</ul>