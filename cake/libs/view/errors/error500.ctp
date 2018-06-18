
<div class="errorPage">        
    <p class="name"><?php __('Error 500');?></p>
    <p class="description">
        <?php printf(__('An Internal Error Has Occurred.', true), "<strong>'{$message}'</strong>");?>
    </p>        
    <p><button class="btn btn-danger" onClick="history.back();">Back to main</button> <button class="btn btn-warning" onClick="history.back();">Previous page</button></p>        
</div>			
