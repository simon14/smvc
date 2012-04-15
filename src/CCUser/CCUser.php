<?php

class CCUser extends CObject implements IController{
	
	private $userModel;
	
	public function __construct() {
		
		parent::__construct();
		$this->userModel = new CMUser();
	}
	
	public function Index() {
		
		$this->views->SetTitle('User Profile');
		$this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
			'is_authenticated' => $this->userModel->IsAuthenticated(),
			'user' => $this->userModel->GetUserProfile(),
		));
	}
	
	public function login($akronymOrEmail=null, $password=null) {
		$this->userModel->Login($akronymOrEmail, $password);
		$this->RedirectToController();
	}
	
	public function logout() {
		
		$this->userModel->LogOut();
		$this->RedirectToController();
	}
	
	
	
	public function RedirectToController() {
	
		header('Location: ' . $this->request->CreateUrl('user'));
	}

}

?>