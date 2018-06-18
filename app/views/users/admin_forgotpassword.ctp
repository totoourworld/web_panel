<?php $this->set("title_for_layout", "Forgot Password - Xenia Taxi");?>
<?php echo $form->create('User', array('url' => array('controller' => 'users', 'action' => 'forgotpassword'), 'class' => 'form-horizontal','id'=>'forgot_password'));?>
    <div class="msg">
        This form help you return your password. Please, enter your password, and send request
    </div>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">email</i>
        </span>
        <div class="form-line">
            <?php echo $form->input('User.username', array('label' => false, 'div' => false, 'placeholder' => 'Your email','class'=>'form-control','required'=>'required','autofocus'=>'autofocus'));?>
        </div>
    </div>

    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RESET MY PASSWORD</button>

    <div class="row m-t-20 m-b--5 align-center">
        <a href="<?php echo $this->base;?>/admin">Sign In!</a>
    </div>
<?php echo $form->end();?>