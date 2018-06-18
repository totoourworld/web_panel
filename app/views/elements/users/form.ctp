<!--
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.group_id',array('div'=>false,'label'=>false ,'options'=>$groups,'empty'=>'Select Group','class' => 'form-control show-tick','required'=>'required'));?>
        <label class="form-label"><?php __("Group");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
-->

<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.u_fname',array('div'=>false,'label'=>false,'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Name");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.username',array('div'=>false,'label'=>false,'class' => 'form-control email','placeholder'=>'Ex: example@example.com','required'=>'required'));?>
        <label class="form-label"><?php __("Username");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.text_password',array('div'=>false,'label'=>false,'class' => 'form-control','required'=>'required','type'=>'password'));?>
        <label class="form-label"><?php __("Password");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.u_street' , array('div'=>false, 'label'=>false,'class'=>'form-control'));?>
        <label class="form-label"><?php __("Street");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.u_address' , array('div'=>false, 'label'=>false,'class'=>'form-control' ));?>
        <label class="form-label"><?php __("Suite #");?></label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.u_city',array('div'=>false,'label'=>false,'class' => 'form-control'));?>
        <label class="form-label"><?php __("City");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php
            $states = array('Alabama'=>'Alabama','Alaska'=>'Alaska','Arizona'=> 'Arizona','Arkansas'=>'Arkansas','California'=>'California','Colorado'=>'Colorado','Connecticut'=>'Connecticut','Delaware'=>'Delaware', 'Florida'=>'Florida', 'Georgia'=>'Georgia', 'Hawaii'=>'Hawaii', 'Idaho'=>'Idaho', 'Illinois'=>'Illinois','Indiana'=>'Indiana','Iowa'=>'Iowa', 'Kansas'=>'Kansas', 'Kentucky'=>'Kentucky', 'Louisiana'=>'Louisiana', 'Maine'=>'Maine', 'Maryland'=>'Maryland', 'Massachusetts'=>'Massachusetts', 'Michigan'=>'Michigan','Minnesota'=>'Minnesota','Mississippi'=>'Mississippi', 'Missouri'=>'Missouri', 'Montana'=>'Montana','Nebraska'=>'Nebraska', 'Nevada'=>'Nevada','New Hampshire'=>'New Hampshire', 
'New Jersey'=>'New Jersey', 'New Mexico'=>'New Mexico', 'New York'=>'New York', 'North Carolina'=>'North Carolina',  'North Dakota'=>'North Dakota', 'Ohio'=>'Ohio', 'Oklahoma'=>'Oklahoma', 'Oregon'=>'Oregon', 'Pennsylvania'=>'Pennsylvania', 'Rhode Island'=>'Rhode Island', 'South Carolina'=>'South Carolina', 'South Dakota'=>'South Dakota', 'Tennessee'=>'Tennessee', 'Texas'=>'Texas', 'Utah'=>'Utah', 'Vermont'=>'Vermont', 'Virginia'=>'Virginia', 'Washington'=>'Washington', 'West Virginia'=>'West Virginia', 'Wisconsin'=>'Wisconsin',
'Wyoming'=>'Wyoming');
            echo $this->Form->input('User.u_state',array('div'=>false,'label'=>false,'empty'=>'Select State','options'=>$states,'class' => 'form-control show-tick'));
        ?>
        <label class="form-label"><?php __("State");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.u_country',array('div'=>false,'label'=>false,'class'=>'form-control'));?>
        <label class="form-label"><?php __("Country");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.u_zip',array('div'=>false,'label'=>false,'class'=>'form-control'));?>
        <label class="form-label"><?php __("Zip Code");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $form->input('User.u_phone' , array('div'=>false,'label'=>false,'class' => 'form-control mobile-phone-number','required'=>'required','id'=>'mask_phone'));?>
        <label class="form-label"><?php __("Contact Phone");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('User.u_email',array('div'=>false,'label'=>false,'class' => 'form-control email','required'=>'required'));?>
        <label class="form-label"><?php __("Email");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->textarea('User.notes', array('div' => false, 'label' => false, 'class' => 'form-control no-resize'));?>
        <label class="form-label"><?php __("Notes");?></label>
    </div>
</div>
<div class="form-group">
    <?php echo $form->input('User.active', array('div' => false, 'label' => false, 'id' => 'status'));?>
    <label for="status"><?php __("Status");?></label>
</div>
<button class="btn btn-primary waves-effect" type="submit">Submit</button>
<a href="<?php echo $this->base;?>/admin/users" class="btn">Cancel</a>