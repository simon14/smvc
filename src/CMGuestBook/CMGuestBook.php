<?php
/*============================
//	Guestbook model, talk to the database etc
//===========================*/
class CMGuestBook extends CObject implements IHasSQL {


  /*============================
  //	Constructor
  //===========================*/
  public function __construct() {
    parent::__construct();
  }

 //==================================
  //  SQL-handler from SQL Interface (IHasSQL)
  //==================================
  public static function SQL($key=null, $values=null) {
  
  	$queries = array(
  		'insert into guestbook' 	=> "INSERT INTO Guestbook (id, entry, date) VALUES (null, '{$values['entry']}', '{$values['time']}');",
  		'select * from guestbook' 	=> 'SELECT * FROM Guestbook ORDER BY id DESC;',
  		'delete from guestbook'		=> 'TRUNCATE TABLE Guestbook;',
  	);
  	
  	if(!isset($queries[$key])) {
  		throw new Exception("No such SQL query, key '$key' was not found.");
  	}
  	
  	return $queries[$key];
  
  }
  
  //==================================
  //  Add a entry to the guestbook.
  //==================================
  public function Add($entry=null){
  
  		$time = date('c');
  		$this->db->ExecuteQuery(self::SQL('insert into guestbook', array('entry' => "{$entry}", 'time' => "{$time}")));
  		$this->session->AddMessage('info', 'Message added!');
  }
  
  //==================================
  //  Clear all entries from database.
  //==================================
  public function Clear() {
  
  	  $this->db->ExecuteQuery(self::SQL('delete from guestbook'));
  	  $this->session->AddMessage('info', 'All messages removed!');
  }
  
  //==================================
  //  Read all entries from database.
  //==================================  
  public function ReadAll() {
    
    return  $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM Guestbook ORDER BY id DESC;');
  }
  
}

?>