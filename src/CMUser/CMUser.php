<?php
/*============================
//	User-model, manages login requests etc
//===========================*/
class CMUser extends CObject implements IHasSQL {

	public function __construct() {
		parent::__construct();
	}
	
	/*============================
	//	SQL, predefined sql-queries
	//===========================*/
	public static function SQL($key=null, $values=null) {
		
		$queries = array ( 
			'insert into user' => "INSERT INTO User (akronym, name, email, password) VALUES ('{$values['akronym']}', '{$values['name']}', '{$values['email']}', '{$values['password']}');",
			'check user password' => "SELECT * FROM User WHERE password='{$values['password']}' AND (akronym='{$values['akronym']}' OR email='{$values['email']}');",
		);
		
		if(!isset($queries[$key])) {
			throw new Exception("No such SQL query, key '$key' was not found.");
		}
		
		return $queries[$key];
	}
	
	/*============================
	//	Init, create tables in DB needed for user-managment
	//===========================*/
	public function Init() {
	
	}

	/*============================
	//	Login, check DB for user/pass
	//===========================*/
	public function Login($akronymOrEmail, $pass) {
		
		$values = array(
			'akronym' => $akronymOrEmail,
			'name'	  => null,
			'email'	  => $akronymOrEmail,
			'password'=> $pass
		);
		
		$user = $this->db->ExecuteSelectQueryAndFetchAll(self::SQL('check user password', $values));
		
		$user = (isset($user[0])) ? $user[0] : null;
		unset($user['password']);
		
		if($user) {
			$this->session->SetAuthenticatedUser($user);
			$this->session->AddMessage('success', "Welcome '{$user['name']}'");
		} else {
			$this->session->AddMessage('warning', "Could not login, user does not exists or password did not match.");
		}
		
		return ($user != null);
	}
	
	/*============================
	//	IsAuthenticated, check session if current user is authenticated
	//===========================*/
	public function IsAuthenticated() {
		return ($this->session->GetAuthenticatedUser() != false);
	}
	
	/*============================
	//	GetUserProfile, get all info about the user
	//===========================*/
	public function GetUserProfile() {
		return $this->session->GetAuthenticatedUser();
	}
	
	/*============================
	//	Logout, allow user to log out
	//===========================*/
	public function LogOut() {
		$this->session->UnsetAuthenticatedUser();
		$this->session->AddMessage('success', "You have been successfully logged out.");
	}

}

?>