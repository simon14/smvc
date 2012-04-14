<?php

function base_url($url) {

	return CSmvc::Instance()->request->base_url . trim($url, '/');
}

function current_url() {

  return CSmvc::Instance()->request->current_url;
}

?>