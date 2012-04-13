<?php

$cs->data['footer']="Simon Hevosmaa, SMVC";

/**
* Print debuginformation from the framework.
*/
function get_debug() {
  $cs = CSmvc::Instance();
  
  $html = "";
  
  if($cs->config['debug']===true){
  	  $html .= "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($ly->config, true)) . "</pre>";
	  $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($ly->data, true)) . "</pre>";
	  $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($ly->request, true)) . "</pre>";
  }
  
  return $html;
}

?>