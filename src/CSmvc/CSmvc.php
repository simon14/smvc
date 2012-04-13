<?php

/**
* Main class for SMVC, holds everything.
*
*/
class CSmvc implements ISingleton {

   private static $instance = null;

  //==================================
  //  Constructor, with DB-connector
  //==================================
   protected function __construct() {
      // include the site specific config.php and create a ref to $ly to be used by config.php
      $cs = &$this;
      require(SMVC_SITE_PATH.'/config.php');
    
    
      //==================================
	  //  Check if config['database'] exists and contain info
	  //  In that case, connect to that database
	  //==================================
      if(isset($this->config['database'][0]['dsn'])){
      	$this->db = new CMDatabase($this->config['database'][0]['dsn'], $this->config['database'][0]['usr'], $this->config['database'][0]['pass']);
      }
      
   }
	
   /**
    * Singleton pattern. Get the instance of the latest created object or create a new one. 
    * @return CLydia The instance of this class.
    */
   public static function Instance() {
      if(self::$instance == null) {
         self::$instance = new CSmvc();
      }
      
      return self::$instance;
    }
      
   /**
	* Frontcontroller, check url and route to controllers.
    */
  public function FrontControllerRoute() {
  
  	// Hämta url
  	$this->request = new CRequest($this->config['url_type']);
  	$this->request->Init($this->config['base_url']);
  	$controller = $this->request->controller;
  	$method		= $this->request->method;
  	$arguments	= $this->request->arguments;
	
  	
  	// Kolla ifall contorller finns i config.php
  	$controllerExists	=isset($this->config['controllers'][$controller]);
  	$controllerEnabled	=false;
  	$className			=false;
  	$classExists		=false;
  	
  	if($controllerExists){
  		$controllerEnabled	=($this->config['controllers'][$controller]['enabled']==true);
  		$className			=$this->config['controllers'][$controller]['class'];
  		$classExists		=class_exists($className);
  	}
  	
  	// Kontrollera ifall kontrollern har en metod att kalla, i så fall kalla på den
  	if($controllerExists && $controllerEnabled && $classExists) {
      $rc = new ReflectionClass($className);
      if($rc->implementsInterface('IController')) {
        if($rc->hasMethod($method)) {
          $controllerObj = $rc->newInstance();
          $methodObj = $rc->getMethod($method);
          $methodObj->invokeArgs($controllerObj, $arguments);
        } else {
          die("404. " . get_class() . ' error: Controller does not contain method.');
        }
      } else {
        die('404. ' . get_class() . ' error: Controller does not implement interface IController.');
      }
    } 
    else { 
//      die('404. Page is not found.');
	die("{$this->request->script_name}, Controller: {$controller}, Method: {$method}, Classnamn: {$className}");
    }
    
  	// ====== Utskrift av controller, method, arguments ==========
  	/*echo "Controller: ".$controller."<br />";
  	echo "Method: ".$method."<br />";
  	foreach($arguments as $val){
  		echo $val."<br />";
  	}
  	echo "Classname: ".$className."<br />";
  	*/
  	
  	// Kör metoder
    $this->data['debug']  = "REQUEST_URI - {$_SERVER['REQUEST_URI']}\n";
    $this->data['debug'] .= "SCRIPT_NAME - {$_SERVER['SCRIPT_NAME']}\n";
    
   }
   
   public function ThemeEngineRender(){

	global $cs;
	
   	// Hämta sökväg till settings för theme
   	$themeName	=$this->config['theme']['name'];
   	$themePath	= SMVC_INSTALL_PATH."/themes/{$themeName}";
   	$themeUrl	= $cs->request->base_url."themes/{$themeName}";
   	
   	// Lägg till stylesheet sökväg
   	$this->data['stylesheet'] = "{$themeUrl}/style.css";
   	
   	// Inkludera globala functions.php och functions.php för temat
   	$cs =&$this;
   	$functionsPath = "{$themePath}/functions.php";
   	if(is_file($functionsPath)){
   		include SMVC_INSTALL_PATH."/themes/function.php";
   		include $functionsPath;
   	}
   	
   	extract($this->data);
   	extract($this->config);
	include("{$themePath}/default.tpl.php");
   	
   }
}
   
?>