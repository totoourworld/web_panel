<div class="head clearfix">
    <div class="isw-ok"></div>
    <h4 style="text-align: center;">Driver Car Registration</h4>
</div>
<br/>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Car.category_id', array('div' => false, 'type'=>'select',  'label' => false,  'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Select Category");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<?php echo $this->Form->hidden('Car.car_id',array('div'=>false,'label'=>false));?>
<?php if(isset($id)){  ?>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Car.car_id', array('div' => false, 'type'=>'select', 'label' => false,  'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Select Car");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<?php } ?>
<br>
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
        <?php echo $this->Form->input('Car.car_model', array('div' => false, 'label' => false, 'class' => 'form-control'));?>
        <label class="form-label"><?php __("Model");?></label>
    </div>
    
</div>