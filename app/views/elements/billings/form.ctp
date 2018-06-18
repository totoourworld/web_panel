<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Billing.driver_id',array('div'=>false,'label'=>false ,'options'=>$drivers,'empty'=>'Select Driver','class' => 'form-control show-tick','required'=>'required'));?>
        <label class="form-label"><?php __("Driver");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Billing.bill_number', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Bill Number");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Billing.paid_amt', array('div' => false, 'label' => false ,'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Amount");?></label>
    </div>
    <div class="help-info">Amount in dollar</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->textarea('Billing.remarks', array('div' => false, 'label' => false, 'class' => 'form-control no-resize'));?>
        <label class="form-label"><?php __("Remarks");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Billing.status',array('div'=>false,'label'=>false ,'options'=>array('Paid'=>'Paid','Unpaid'=>'Unpaid'),'empty'=>'Select Status','class' => 'form-control show-tick','required'=>'required'));?>
        <label class="form-label"><?php __("Status");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
<a href="<?php echo $this->base;?>/admin/billings" class="btn">Cancel</a>