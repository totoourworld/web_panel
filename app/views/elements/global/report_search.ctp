    <!-- Search Form -->
    <?php
		$url_info = isset($url_info)?$url_info:"";			
	?>
    <?php echo $form->create($singular, array('controller'=>strtolower($plural), 'action'=>'report'.$url_info, 'type'=>'GET')); ?>
    <table class="search_option_table table" style="margin-top:14px;">
        <tr>
            <th colspan="3">
                Search
            </th>
        </tr>
     <?php for($i=0;$i<count($fields);$i++): ?>
        <tr>
            <td width='220px' style="vertical-align:middle;">
                Search By <?php echo $fields[$i]['label']; ?> :
            </td>
            <td width='200px'>
                <?php
                    $val = isset($this->params['named'][$fields[$i]['name']]) ? $this->params['named'][$fields[$i]['name']] : null;
                    if($fields[$i]['type']=='text')
						echo $form->input($fields[$i]['name'], array('class'=>'nomargin','label'=>false,'value'=>$val));
					elseif($fields[$i]['type']=='select')
						echo $form->input($fields[$i]['name'], array('class'=>'nomargin','label'=>false,'selected'=>$val ,'type'=>'select' ,'options'=>$fields[$i]['options'] ,'empty'=>'<Select Option>'));
                ?>
            </td>
            <td>
                <?php 
					if($i==count($fields)-1)
						echo $form->submit('Search', array('class'=>'admin_button btn')); 
					else
						echo "&nbsp;";
				?>
            </td>
        </tr>
       <?php endfor; ?>
    </table>
    <?php echo $form->end(); ?>
    <!-- Search Form Ends -->
    <!-- Pagination Header Information -->
    <?php
    if(!isset($is_paginagor))
	{?>
    <p>
		<?php $paginator->options(array('url' => $this->passedArgs)); ?>
        <br/>
        <?php
        echo $paginator->counter(array(
        'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
        ));
        ?>
    </p>
    <?php
	}?>
    
<style type="text/css">
.nomargin {
	margin-bottom:0 !important;
}
</style>   