
<div class="errorPage">        
    <p class="name"><?php __('Error');?></p>
    <p class="description">
        <?php printf(__('The action %1$s is not defined in controller %2$s', true), '<em>' . $action . '</em>', '<em>' . $controller . '</em>');?>
    </p>        
    <p><button class="btn btn-danger" onClick="history.back();">Back to main</button> <button class="btn btn-warning" onClick="history.back();">Previous page</button></p>        
</div>			
