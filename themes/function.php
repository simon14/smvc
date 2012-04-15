<?php

function base_url($url) {

	return CSmvc::Instance()->request->base_url . trim($url, '/');
}

function current_url() {

  return CSmvc::Instance()->request->current_url;
}

function create_url($url, $sub, $values=null) {
	
	$urlCreator=CSmvc::Instance()->request->controller."{$url}/{$sub}/{$values}";
	
	return CSmvc::Instance()->request->CreateUrl($urlCreator);
}

?>