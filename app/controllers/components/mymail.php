<?php
class MymailComponent extends Object {
    
    var $controller = null;
  	var $components = array("Email");
    
  	function initialize(&$controller, $config)
    {
        $this->controller = $controller;
    }
    
	/*
	 * $options['to] : A string value where to send mail
	 * $options['from] : A string value from where to send mail
	 * $options['subject] : A string value defining the title of 
	 * $options['content] : A array used to set the data of the template
	 * $options['contentTemplate]: the template to be used for sending mail
	 * $options['bcc']: array or usernames
	 */
    function sendEmail($options = array())
	{
    	$this->Email->reset();
		$this->Email->to = $options['to'];
		$this->Email->from = $options['from'];
		$this->Email->subject = $options['subject'];
		//$this->Email->cc = array(ADMIN_EMAIL);
		
		if(isset($options['contentTemplate']))
		{
		   $this->Email->template = $options['contentTemplate'];
		}
		else
		{
		  $this->Email->template = "default";
		}
		if(isset($options['bcc']))
		{
			$this->Email->bcc = $options['bcc'];
		}
		
		$this->Email->sendAs = "both";
		$this->controller->set("data", $options['content']);
		if($this->Email->send())
		{
		   return true;
		}
		else
		{
		  return false;
		}
	}    
}
?>