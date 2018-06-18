
<div class="errorPage">        
    <p class="name"><?php __('Error');?></p>
    <p class="description">
        <?php printf(__('%s could not be found.', true), '<em>' . $controller . '</em>');?>
        <br/>
        <?php printf(__('Create the class %s below in file: %s', true), '<em>' . $controller . '</em>',
                APP_DIR . DS . 'controllers' . DS . Inflector::underscore($controller) . '.php');?>
    </p>        
    <p><button class="btn btn-danger" onClick="history.back();">Back to main</button> <button class="btn btn-warning" onClick="history.back();">Previous page</button></p>        
</div>			