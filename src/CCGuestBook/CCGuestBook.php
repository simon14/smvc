<?php
/**
* A guestbook controller as an example to show off some basic controller and model-stuff.
* 
* @package LydiaCore
*/
class CCGuestbook extends CObject implements IController, IHasSQL {

  private $pageTitle = 'SMVC GUESTBOOK';

  //==================================
  //  Constructor, also creating DB connection.
  //==================================
  public function __construct() {
    parent::__construct();
    
  }
  
  //==================================
  //  IController interface used, Index() included.
  //==================================
  public function Index() {   
  
    $this->views->SetTitle($this->pageTitle);
    $this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
      'entries'=>$this->ReadAllEntries(), 
      'formAction'=>$this->request->CreateUrl('guestbook/handler')
    ));
    
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
  public function SaveEntryDB($entry=null){
  
  		$time = date('c');
  		$this->db->ExecuteQuery(self::SQL('insert into guestbook', array('entry' => "{$entry}", 'time' => "{$time}")));
  		$this->session->AddMessage('info', 'Message added!');
  }
  
  //==================================
  //  Clear all entries from database.
  //==================================
  public function ClearEntryDB() {
  
  	  $this->db->ExecuteQuery(self::SQL('delete from guestbook'));
  	  $this->session->AddMessage('info', 'All messages removed!');
  }
  
  //==================================
  //  Read all entries from database.
  //==================================  
  private function ReadAllEntries() {
    
    return  $this->db->ExecuteSelectQueryAndFetchAll('SELECT * FROM Guestbook ORDER BY id DESC;');
  }
  
  //==================================
  // Handle posts from the form and take appropriate action.
  //==================================
  public function handler() {
    if(isset($_POST['doAdd'])) {
      
      $this->SaveEntryDB(strip_tags($_POST['newEntry']));
    }
    elseif(isset($_POST['doClear'])) {
      
      $this->ClearEntryDB();
    }            
    elseif(isset($_POST['doCreate'])) {
      
      $this->CreateTableInDatabase();
    } 
    
    header('Location: ' . $this->request->CreateUrl('guestbook'));
  }



  
  
}

?>