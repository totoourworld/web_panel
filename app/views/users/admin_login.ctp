<?php $this->set("title_for_layout", "Login - XENIA Taxi");?>
 <?php echo $form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'), 'class' => 'form-horizontal', 'id' => 'sign_in'));?>
    <div class="msg">Sign in to start your session</div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">person</i>
        </span>
        <div class="form-line">
            <?php echo $form->input('User.username', array('label' => false, 'div' => false, 'class' => 'form-control', 'id' => 'inputEmail', 'placeholder' => 'Username','required'=>'required','autofocus'=>'autofocus'));?>
        </div>
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">lock</i>
        </span>
        <div class="form-line">
            <?php echo $form->input('User.password', array('label' => false, 'div' => false, 'class' => 'form-control', 'id' => 'inputPassword', 'placeholder' => 'Password','required'=>'required'));?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8 p-t-5">
            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
            <label for="rememberme">Remember Me</label>
        </div>
        <div class="col-xs-4">
            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
        </div>
    </div>
    <div class="row m-t-15 m-b--20">
        
        <div class="col-xs-12 align-right">
            <a href="<?php echo $this->base;?>/forgot-password.html">Forgot Password?</a>
        </div>
    </div>
<?php echo $form->end();?>    
