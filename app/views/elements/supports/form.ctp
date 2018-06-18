<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Support.title', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required','readonly' => 'readonly'));?>
        <label class="form-label"><?php __("Title");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Support.email', array('div' => false, 'label' => false,'class' => 'form-control email','placeholder'=>'Ex: example@example.com','required'=>'required'));?>
        <label class="form-label"><?php __("Email");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Support.phone', array('div' => false, 'label' => false,'class' => 'form-control mobile-phone-number','placeholder'=>'Ex: +00 (000) 000-00-00','required'=>'required'));?>
        <label class="form-label"><?php __("Contact Phone");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group">
    <?php echo $form->input('Support.active', array('div' => false, 'label' => false, 'id' => 'status'));?>
    <label for="status"><?php __("Status");?></label>
</div>
<button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>



