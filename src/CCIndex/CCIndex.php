<?php

class CCIndex extends CObject implements IController {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function Index() {
		$this->data['title'] = "The Index Controller";
		$this->data['header'] = '<h1> CCIndex : SMVC </h1>';
		
		//=========================
		// Default main for developer stuffs, links across the site
		//=========================
		$currentLinks = array(
		'index'				=> array('url' => "{$this->request->CreateUrl('index')}", 'name' => "index"),
		'index/arg1'		=> array('url' => "{$this->request->CreateUrl('index/arg1')}", 'name' => "index/arg1"),
		'developer' 		=> array('url' => "{$this->request->CreateUrl('developer')}", 'name' => "developer"),
		'developer/links' 	=> array('url' => "{$this->request->CreateUrl('developer/links')}", 'name' => "developer/links"),
		'developer/' 	=> array('url' => "{$this->request->CreateUrl('developer/displayObjects')}", 'name' => "developer/displayObjects"),
		);
		
		$this->data['main'] = 'Current sites within this site: <br />';
		foreach($currentLinks as $key){
			$this->data['main'].="<a href='{$key['url']}'>{$key['name']}</a><br />";
		}
		//======= End of funny main stuff =======
	}
	
	public function arg1() {
		$this->data['title'] = "The ARG1";
		$this->data['header'] = '<h1> CCIndex::arg1 : SMVC </h1>';
		
		//=========================
		// Default main for developer stuffs, links across the site
		//=========================
		$currentLinks = array(
		'index'				=> array('url' => "{$this->request->CreateUrl('index')}", 'name' => "index"),
		'index/arg1'		=> array('url' => "{$this->request->CreateUrl('index/arg1')}", 'name' => "index/arg1"),
		'developer' 		=> array('url' => "{$this->request->CreateUrl('developer')}", 'name' => "developer"),
		'developer/links' 	=> array('url' => "{$this->request->CreateUrl('developer/links')}", 'name' => "developer/links"),
		'developer/' 	=> array('url' => "{$this->request->CreateUrl('developer/displayObjects')}", 'name' => "developer/displayObjects"),
		);
		
		$this->data['main'] = 'Current sites within this site: <br />';
		foreach($currentLinks as $key){
			$this->data['main'].="<a href='{$key['url']}'>{$key['name']}</a><br />";
		}
		//======= End of funny main stuff =======
	}

}

?>