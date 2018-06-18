<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Trip.trip_date', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required','type'=>'text'));?>
        <label class="form-label"><?php __("Trip Date");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->textarea('Trip.trip_from_loc', array('div' => false, 'label' => false, 'class' => 'form-control no-resize'));?>
        <label class="form-label"><?php __("Trip From Location");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Trip.trip_to_loc', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Trip To Location");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Trip.trip_distance', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Trip Distance");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Trip.validity', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Trip Validity");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Trip.status', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Trip Status");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Trip.trip_pay_amount', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Trip Total Amount");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Trip.trip_promo_code', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Trip Promo Code");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Trip.trip_promo_amt', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Trip Promo Amount");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<?php if(!empty($payamount)) {?>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Trip.pay', array('div' => false, 'label' => false, 'class' => 'form-control', 'value'=>$payamount,  'required'=>'required'));?>
        <label class="form-label"><?php __("Trip Amount After promo Applied");?></label>
    </div>
    <div class="help-info">Required field</div>
</div> 
<?php } ?>
<button class="btn btn-primary waves-effect" type="submit">Submit</button>
<a href="<?php echo $this->base;?>/admin/trips" class="btn">Cancel</a>



