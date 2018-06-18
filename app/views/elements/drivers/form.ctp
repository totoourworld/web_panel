<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Driver.d_email', array('div' => false, 'label' => false,'class' => 'form-control email','required'=>'required'));?>
        <label class="form-label"><?php __("Username");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Driver.text_password', array('type'=>'password','div' => false, 'label' => false, 'class' => 'form-control'));?>
        <label class="form-label"><?php __("Password");?></label>
    </div>
   
</div>
 
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Driver.d_fname', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("First Name");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Driver.d_lname', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Last Name");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->textarea('Driver.d_address', array('div' => false, 'label' => false, 'class' => 'form-control no-resize'));?>
        <label class="form-label"><?php __("Address");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Driver.d_phone', array('div' => false, 'label' => false,'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Contact Phone");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Driver.d_city', array('div' => false, 'label' => false, 'class' => 'form-control'));?>
        <label class="form-label"><?php __("City");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Driver.d_state', array('div' => false, 'label' => false, 'class' => 'form-control'));?>
        <label class="form-label"><?php __("State");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Driver.d_country', array('div' => false, 'label' => false, 'class' => 'form-control'));?>
        <label class="form-label"><?php __("Country");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Driver.d_zip', array('div' => false, 'label' => false, 'class' => 'form-control'));?>
        <label class="form-label"><?php __("Zip Code");?></label>
    </div>
</div>
<div class="form-group">
    <?php echo $form->input('Driver.d_active', array('div' => false, 'label' => false, 'id' => 'status'));?>
    <label for="status"><?php __("Status");?></label>
</div>
<button class="btn btn-primary waves-effect" type="submit">Submit</button>
<a href="<?php echo $this->base;?>/admin/drivers" class="btn">Cancel</a>