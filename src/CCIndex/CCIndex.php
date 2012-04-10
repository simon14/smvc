<?php

class CCIndex implements IController {
	
	public function Index() {
		global $ly;
		$ly->data['title'] = "The Index Controller";
	}
	
	public function arg1() {
		$ly=CSmvc::Instance();
		$ly->data['title'] = "The ARG1";
		
	}

}

?>