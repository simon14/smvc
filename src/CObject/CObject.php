<?php
/**
* Holding a instance of SMVC
*/

class CObject {

   public $config;
   public $request;
   public $data;
   public $db;

   /**
    * Constructor
    */
    
   protected function __construct() {
    $cs = CSmvc::Instance();
    $this->config   = &$cs->config;
    $this->request  = &$cs->request;
    $this->data     = &$cs->data;
    $this->db		= &$cs->db;
  }

}

?>