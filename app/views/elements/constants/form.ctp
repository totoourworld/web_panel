<div class="form-group form-float">
    <div class="form-line">
        <?php echo $this->Form->input('Constant.constant_display',array('div'=>false,'label'=>false,'class'=>'form-control','readonly' => 'readonly'));?>
        <label class="form-label"><?php __("Name");?></label>
    </div>
</div>
<?php
if(isset($onOffConstants[$this->data['Constant']['constant_id']]))
{
    ?>
    <div class="form-group form-float">
        <div class="form-line">
            <?php echo $this->Form->input('Constant.constant_value',array('type' =>'checkbox','div'=>false,'label'=>false,'class'=>"form-control value$id",'id'=>"value$id"));?>
            <label for="<?php echo 'value'.$id;?>"></label>
        </div>
    </div>
    <?php
}
else
{
    ?>
    <div class="form-group form-float">
        <div class="form-line">
             <?php echo $this->Form->input('Constant.constant_value',array('div'=>false,'label'=>false,'class'=>"form-control value$id",'required'=>'required'));?>
            <label class="form-label"><?php __("Value");?></label>
        </div>
        <div class="help-info">Required field</div>
    </div>
    <?php
}
?>
<button class="btn btn-primary waves-effect" type="submit">Submit</button>

