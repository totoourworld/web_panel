
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Module.name', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required','readonly'=>true,'disabled'=>'disabled'));?>
        <label class="form-label"><?php __("Name");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <h4><?php __("Contents");?></h4>
        <br/>
        <?php echo $this->Form->textarea('Module.content', array('div' => false, 'label' => false, 'class' => 'form-control no-resize','id'=>'ckeditor'));?>
    </div>
</div>
<button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
