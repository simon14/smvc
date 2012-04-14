<?php

/*============================
//	Footer
//===========================*/
$cs->data['footer']="Simon Hevosmaa, SMVC";

/*============================
//	Create a header with nav-bar
//===========================*/
function makeHeader() {
	
	$cs = CSmvc::Instance();
	$selected="";
	$header=<<<EOD
	
<div class='banner'>
<h1>smvc</h1>
</div>

EOD;

	$header.="<nav id='navbar'>";
	
	$menu = array(
	  'index'         => array('text'=>'index',  'className' => 'CCIndex', 'url'=>$cs->request->CreateUrl('index')),
	  'developer'	  => array('text'=>'developer', 'className' => 'CCDeveloper', 'url'=>$cs->request->CreateUrl('developer')),
	  'guestbook'	  => array('text'=>'guestbook', 'className' => 'CCGuestBook', 'url'=>$cs->request->CreateUrl('guestbook')),
	);

	foreach($menu as $key => $item){
		$header.="<a href='{$item['url']}'";
		if($item['className']===$cs->data['selected'])
			$header.=" class='selected'";		
		$header.=">{$item['text']}</a>\n";
	}

	$header.="</nav>";
	
	return $header;
}


/*============================
//	Print debug into the footer
//===========================*/
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

/*============================
//	 Get messages stored in "flash" session
//===========================*/
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

/*============================
//	Render all views
//===========================*/
function render_views() {
  
  return CSmvc::Instance()->views->Render();
}

?>