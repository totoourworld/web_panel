<div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable" style="display: none;" tabindex="-1" role="dialog" aria-describedby="b_popup_<?php echo $popupid;?>" aria-labelledby="ui-id-<?php echo $popupid;?>">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-<?php echo $popupid;?>" class="ui-dialog-title" style="color:#FFF;"><?php echo $popupname;?></span>
        <button class="ui-dialog-titlebar-close"></button>
    </div>
    <div style="width: auto; min-height: 86px; max-height: none; height: auto;" id="b_popup_<?php echo $popupid;?>" class="dialog ui-dialog-content ui-widget-content b_popup_3">
        <?php echo $popupcontent;?>      
    </div>
    <div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div>
    <div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div>
    <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
    <div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div>
    <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div>
    <div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div>
    <div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div>
    <div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div>
</div>