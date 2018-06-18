<tr class='pagination_row'>
    <td colspan='<?php echo $cols-1; ?>'>
        <div class="paging">
            <?php
                echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));                
            ?>
            <?php echo $paginator->numbers(array('class' => 'numbers','separator' => NULL));?>
            <?php
                echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));                
            ?>
            <?php
                $cntrlr = $this->params['controller'];
            ?>
            <script type="text/javascript">
                function _setPaginationLimit(limit){
                    window.location.href = "/admin/<?php echo $cntrlr; ?>/pagination_limit/"+limit;
                }
            </script>
        </div>
    </td>
    <?php if(isset($email)):?>
    <td align="right" style="text-align:left;">
        <?php
        	echo $form->submit(__('Email',true), array('class'=>'admin_button btn', 'onclick'=>'return confirm("Are you sure want to send email to the selected records?")')); 
        ?>
    </td>
    <?php endif;?>
    <?php if(!isset($email) && !isset($delete)):?>
    <td align="right" style="text-align:left;">
        <?php
        	echo $form->submit(__('Delete',true), array('class'=>'admin_button btn', 'onclick'=>'return confirm("Are you sure want to delete the selected records?")')); 
        ?>
    </td>
    <?php endif;?>
</tr>