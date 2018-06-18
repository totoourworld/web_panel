<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Category.cat_name', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Name");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->textarea('Category.cat_desc', array('div' => false, 'label' => false, 'class' => 'form-control no-resize'));?>
        <label class="form-label"><?php __("Description");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Category.cat_base_price', array('div' => false, 'label' => false, 'class' => 'form-control money-dollar','required'=>'required'));?>
        <label class="form-label"><?php __("Base Price");?></label>
    </div>
    <div class="help-info">Price in dollar</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Category.cat_fare_per_km', array('div' => false, 'label' => false, 'class' => 'form-control money-dollar','required'=>'required'));?>
        <label class="form-label"><?php __("Fare Per KM");?></label>
    </div>
    <div class="help-info">Fare in dollar</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Category.cat_fare_per_min', array('div' => false, 'label' => false, 'class' => 'form-control money-dollar','required'=>'required'));?>
        <label class="form-label"><?php __("Fare Per Mint");?></label>
    </div>
    <div class="help-info">Fare in dollar</div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Category.cat_max_size', array('div' => false, 'label' => false, 'class' => 'form-control','type'=>'number','required'=>'required'));?>
        <label class="form-label"><?php __("Max Size");?></label>
    </div>
    <div class="help-info">Numbers only</div>
</div>

<!--
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Category.cat_prime_time_percentage', array('div' => false, 'label' => false, 'class' => 'form-control','type'=>'number','required'=>'required'));?>
        <label class="form-label"><?php __("Prime Time %");?></label>
    </div>
    <div class="help-info">Numbers only</div>
</div>
-->

<div class="form-group">
    <?php echo $form->input('Category.cat_is_fixed_price', array('type'=>'checkbox','div' => false, 'label' => false, 'id' => 'catfixedprice'));?>
    <label for="catfixedprice"><?php __("Is Fixed Price");?></label>
</div>
<div class="form-group">
    <?php echo $form->input('Category.cat_status', array('div' => false, 'label' => false, 'id' => 'status'));?>
    <label for="status"><?php __("Status");?></label>
</div>
<button class="btn btn-primary waves-effect" type="submit">Submit</button>
<a href="<?php echo $this->base;?>/admin/categories" class="btn">Cancel</a>