<?php

class CCDeveloper extends CObject implements IController {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function Index() {
		$this->data['title'] = "The Index Controller";
		$this->data['header'] = '<h1> CCDeveloper : SMVC </h1>';
	
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
	
	public function links() {
	
		$this->data['title'] = "links";
		$this->data['header'] = '<h1> CCDeveloper::links : SMVC </h1>';
		
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
		
		$testLinks = array(
		'clean' => array('url' => "http://www.student.bth.se/~sihf11/phpmvc/smvc/developer/links", 'name' => "Clean: /developer"),
		'normal' => array('url' => "http://www.student.bth.se/~sihf11/phpmvc/smvc/index.php/developer/links", 'name' => "Normal: index.php/developer"),
		'query' => array('url' => "http://www.student.bth.se/~sihf11/phpmvc/smvc/index.php?q=developer/links", 'name' => "Query: index.php?q=developer"),
		);
		
		$this->data['main'] .= '<h3> Some different kind of links: </h3>';
		foreach($testLinks as $key){
			$this->data['main'].="<a href='{$key['url']}'>{$key['name']}</a><br />";
		}
		
		
	}
	
	
	/**
	* Display all items of the CObject.
	*/
	public function displayObjects() {	

		$this->data['title'] = "DisplayObject";
		$this->data['header'] = '<h1> CCDeveloper::DisplayObject() : SMVC </h1>';

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
		
		$this->data['main'] .= <<<EOD
		<h2>Dumping content of CDeveloper</h2>
		<p>Here is the content of the controller, including properties from CObject which holds access to common resources in Smvc.</p>
EOD;
		$this->data['main'] .= '<pre>' . htmlentities(print_r($this, true)) . '</pre>';
	}

}

?>