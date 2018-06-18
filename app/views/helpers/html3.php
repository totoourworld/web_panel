<?php

class Html3Helper extends AppHelper {

	var $helpers = array('Form','Html');

	function image($record,$field,$path,$imageFlag=true){

		if(!empty($record[$this->model()][$field])){

			echo "&nbsp;&nbsp;&nbsp";

			if($imageFlag)

			

				echo $this->Html->image('magnifire.jpeg',array('class'=>'magnifier','path'=>$this->base.'/'.$path."/".$record[$this->model()][$field]));

			else

				echo $this->Html->image('admin/ic_download.png',array('class'=>'magnifier', 'imageFlag'=>"false", 'path'=>$this->base.'/'.$path."/".$record[$this->model()][$field]));

		}

	}

	function lightbox(){

		echo "<div id=\"lightbox-panel\">";

		echo "<p class=\"closeSection\">";

		echo $this->Html->image('close.png', array('class'=>'close')); 

		echo "</p>";

		echo $this->Html->image('noimage.jpg',array('class'=>'preview'));

		echo "</div><div id=\"lightbox\"> </div>";

	}

}

?>