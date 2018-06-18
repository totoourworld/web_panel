
<div class="errorPage">        
    <p class="name"><?php __('Error 404');?></p>
    <p class="description">
        <?php printf(__('The requested address %s was not found on this server.', true), "<strong>'{$message}'</strong>");?>
    </p>        
    <p><button class="btn btn-danger" onClick="history.back();">Back to main</button> <button class="btn btn-warning" onClick="history.back();">Previous page</button></p>        
</div>			
