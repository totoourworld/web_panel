<?php echo $this->Form->hidden('User.username' , array('div'=>false, 'label'=>false ,'class'=>'notEmpty','value'=>$session->read('Auth.User.username'))); ?>

<div class="form-group form-float">
    <div class="form-line">
         <?php echo $this->Form->input('User.old_password',array('div'=>false,'label'=>false,'class' => 'form-control','required'=>'required','type'=>'password'));?>
        <label class="form-label"><?php __("Old Password");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.new_password',array('div'=>false,'label'=>false,'class' => 'form-control','required'=>'required','type'=>'password'));?>
        <label class="form-label"><?php __("New Password");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.confirm_password',array('div'=>false,'label'=>false,'class' => 'form-control','required'=>'required','type'=>'password'));?>
        <label class="form-label"><?php __("Confirm Password");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<button class="btn btn-primary waves-effect" type="submit">Submit</button>
<a href="<?php echo $this->base;?>/admin/users" class="btn">Cancel</a>