
<div class="errorPage">        
    <p class="name"><?php __('Error');?></p>
    <p class="description">
        <?php printf(__('The layout file %s can not be found or does not exist.', true), '<em>' . $file . '</em>');?>
    </p>        
    <p><button class="btn btn-danger" onClick="history.back();">Back to main</button> <button class="btn btn-warning" onClick="history.back();">Previous page</button></p>        
</div>			
