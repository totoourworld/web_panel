
<div class="errorPage">        
    <p class="name"><?php __('Error');?></p>
    <p class="description">
        <?php printf(__('Component class %1$s in %2$s was not found.', true), '<em>' . $component . 'Component</em>', '<em>' . $controller . 'Controller</em>');?>
    </p>        
    <p><button class="btn btn-danger" onClick="history.back();">Back to main</button> <button class="btn btn-warning" onClick="history.back();">Previous page</button></p>        
</div>			