<?php
class RedirectComponent extends Object {
    
    var $controller = null;
  
    function initialize(&$controller, $config)
    {
        $this->controller = $controller;
    }   
    function urlToNamed() {
        $urlArray = $this->controller->params['url'];
		unset($urlArray['url']);
        unset($urlArray['ext']);
		$passed=isset($this->controller->params['pass'][0])?$this->controller->params['pass'][0]:"";
        if(!empty($urlArray)){
            $this->controller->redirect(array_merge($urlArray,array($passed)), null, true);
        }
    }
    
}
?>