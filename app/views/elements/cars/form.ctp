<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Car.category_id',array('div'=>false,'label'=>false ,'options'=>$categories,'empty'=>'Select Category','class' => 'form-control show-tick','required'=>'required'));?>
        <label class="form-label"><?php __("Category");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Car.car_name', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Name");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->textarea('Car.car_desc', array('div' => false, 'label' => false, 'class' => 'form-control no-resize'));?>
        <label class="form-label"><?php __("Description");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Car.car_reg_no', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Registration No");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Car.car_model', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Model");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Car.car_currency', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Currency");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Car.car_fare_per_km', array('div' => false, 'label' => false, 'class' => 'form-control money-dollar','required'=>'required'));?>
        <label class="form-label"><?php __("Fare Per KM");?></label>
    </div>
    <div class="help-info">Fare in dollar</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Car.car_fare_per_min', array('div' => false, 'label' => false, 'class' => 'form-control money-dollar','required'=>'required'));?>
        <label class="form-label"><?php __("Fare Per Minute");?></label>
    </div>
    <div class="help-info">Fare in dollar</div>
</div>
<div class="form-group">
    <?php echo $form->input('Car.active', array('div' => false, 'label' => false, 'id' => 'status'));?>
    <label for="status"><?php __("Status");?></label>
</div>
<button class="btn btn-primary waves-effect" type="submit">Submit</button>
<a href="<?php echo $this->base;?>/admin/cars" class="btn">Cancel</a>