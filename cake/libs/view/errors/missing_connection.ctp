
<div class="errorPage">        
    <p class="name"><?php __('Error');?></p>
    <p class="description">
        <?php printf(__('%s requires a database connection', true), $model);?>
        <br/>
        <?php printf(__('Confirm you have created the file : %s.', true), APP_DIR . DS . 'config' . DS . 'database.php');?>
    </p>        
    <p><button class="btn btn-danger" onClick="history.back();">Back to main</button> <button class="btn btn-warning" onClick="history.back();">Previous page</button></p>        
</div>			