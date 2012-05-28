<?php
/**
* A page controller to display a page, for example an about-page, displays content labelled as "page".
* 
* @package SmvcCore
*/
class CCPage extends CObject implements IController {


  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }


  /**
   * Display an empty page.
   */
  public function Index() {
    $content = new CMContent();
    
    $this->views->SetTitle('Page');
    $this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
                  'content' => null,
                ));
  }


  /**
   * Display a page.
   *
   * @param $id integer the id of the page.
   */
  public function View($id=null) {
    $content = new CMContent($id);
    $content->FilterContent();
    $this->views->SetTitle('Page: '.$content['title']);
	$this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
                  'content' => $content,
                ));
  }
  
  public function Delete($id=null, $where=null) {
  		$content = new CMContent();
	  	$content->Delete($id);
	  	self::RedirectToController($where);
	  	
  }
	
  public function RedirectToController($where) {
  		header('Location: ' . $this->request->CreateUrl($where));
  }

}