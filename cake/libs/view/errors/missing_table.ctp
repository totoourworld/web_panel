<div class="errorPage">        
    <p class="name">Error</p>
    <p class="description">
        <?php printf(__('Database table %1$s for model %2$s was not found.', true), '<em>' . $table . '</em>', '<em>' . $model . '</em>');?>
    </p>        
    <p><button class="btn btn-danger" onClick="history.back();">Back to main</button> <button class="btn btn-warning" onClick="history.back();">Previous page</button></p>        
</div>			
