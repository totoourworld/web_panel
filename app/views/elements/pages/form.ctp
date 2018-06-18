<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Page.page_id',array('div'=>false,'label'=>false ,'options'=>$parentPages,'empty'=>'ROOT','class' => 'form-control show-tick'));?>
        <label class="form-label"><?php __("Parent Page");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Page.page_name', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required'));?>
        <label class="form-label"><?php __("Name");?></label>
    </div>
    <div class="help-info">Required field</div>
</div>
<?php if (isset($this->data['Page']['id'])):?>
    <div class="form-group form-float">
        <div class="form-line">
            <?php echo $this->Form->input('Page.slug', array('div' => false, 'label' => false, 'class' => 'form-control','required'=>'required', 'readonly' => 'readonly'));?>
            <label class="form-label"><?php __("Slug");?></label>
        </div>
        <div class="help-info">Required field</div>
    </div>
<?php endif;?>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Page.meta_title', array('div' => false, 'label' => false, 'class' => 'form-control'));?>
        <label class="form-label"><?php __("Meta Title");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->textarea('Page.meta_keywords', array('div' => false, 'label' => false, 'class' => 'form-control no-resize'));?>
        <label class="form-label"><?php __("Meta Keyword");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->textarea('Page.meta_description', array('div' => false, 'label' => false, 'class' => 'form-control no-resize'));?>
        <label class="form-label"><?php __("Meta Description");?></label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <h4><?php __("Contents");?></h4>
        <br/>
        <?php echo $this->Form->textarea('Page.content', array('div' => false, 'label' => false, 'class' => 'form-control no-resize','id'=>'ckeditor'));?>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Page.display_order', array('div' => false, 'label' => false, 'class' => 'form-control'));?>
        <label class="form-label"><?php __("Display Order");?></label>
    </div>
</div>
<div class="form-group">
    <?php echo $form->input('Page.active', array('div' => false, 'label' => false, 'id' => 'status'));?>
    <label for="status"><?php __("Status");?></label>
</div>
<button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
<a href="<?php echo $this->base;?>/admin/pages" class="btn">Cancel</a>