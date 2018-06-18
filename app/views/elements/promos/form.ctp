<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Promo.promo_code', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Promo Code");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Promo.promo_type',array('div'=>false,'label'=>false ,'options'=>array('Fixed Amt'=>'Fixed Amt','Percentage'=>'Percentage'),'empty'=>'Select Promo Type','class' => 'form-control show-tick'));?>
        <label class="form-label"><?php __("Promo Type");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Promo.promo_value', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Promo Value");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group">
    <?php echo $form->input('Promo.promo_status', array('div' => false, 'label' => false, 'id' => 'status'));?>
    <label for="status"><?php __("Status");?></label>
</div>
<button class="btn btn-primary waves-effect" type="submit">Submit</button>
<a href="<?php echo $this->base;?>/admin/promos" class="btn">Cancel</a>