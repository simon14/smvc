<?php
/**
* A guestbook controller as an example to show off some basic controller and model-stuff.
* 
* @package LydiaCore
*/
class CCGuestbook extends CObject implements IController, IHasSQL {

  private $pageTitle = 'SMVC GUESTBOOK';
  private $pageHeader = '<h1>Guestbook</h1>';
//  private $db = "";

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
    $formAction = $this->request->CreateUrl('guestbook/handler');
    $this->pageForm = "
      <form action='{$formAction}' method='post'>
        <p>
          <label>Message: <br/>
          <textarea name='newEntry'></textarea></label>
        </p>
        <p>
          <input type='submit' name='doAdd' value='Add message' />
          <input type='submit' name='doClear' value='Clear all messages' />
        </p>
      </form>
    ";
    $this->data['title'] = $this->pageTitle;
    $this->data['header'] = "Guestbook";
    $this->data['main']  = $this->pageHeader . $this->pageForm;// . $this->pageMessages;
    
    $oldEntries=$this->ReadAllEntries();
    
    foreach($oldEntries as $val){
    	$this->data['main'].="<p>".$val['entry']."<br />".$val['date']."</p>
    	";
    }
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
  }
  
  //==================================
  //  Clear all entries from database.
  //==================================
  public function ClearEntryDB() {
  
  	  $this->db->ExecuteQuery(self::SQL('delete from guestbook'));
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