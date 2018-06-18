<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Group.name', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Name");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group">
    <?php echo $form->input('Group.active', array('div' => false, 'label' => false, 'id' => 'status'));?>
    <label for="status"><?php __("Status");?></label>
</div>
<button class="btn btn-primary waves-effect" type="submit">Submit</button>
<a href="<?php echo $this->base;?>/admin/groups" class="btn">Cancel</a>

