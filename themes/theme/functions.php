<?php

$cs->data['footer']="Simon Hevosmaa, SMVC";

/**
* Print debuginformation from the framework.
*/
function makeHeader() {
	
	$cs->data['header']="<h1>HI!</h1>";
	
	return $cs->data['header'];
}

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

/**
* Get messages stored in flash-session.
*/
function get_messages_from_session() {
  $messages = CSmvc::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}

/**
* Render all views.
*/
function render_views() {
  return CSmvc::Instance()->views->Render();
}

?>