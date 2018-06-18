
<div class="errorPage">        
    <p class="name"><?php __('Error');?></p>
    <p class="description">
        <?php printf(__('The helper file %s can not be found or does not exist.', true), APP_DIR . DS . 'views' . DS . 'helpers' . DS . $file);?>
    </p>        
    <p><button class="btn btn-danger" onClick="history.back();">Back to main</button> <button class="btn btn-warning" onClick="history.back();">Previous page</button></p>        
</div>			
