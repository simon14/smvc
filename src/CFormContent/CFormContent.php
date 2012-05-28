<?php
/**
* A form to manage content.
* 
* @package SmvcCore
*/
class CFormContent extends CForm {

  /**
   * Properties
   */
  private $content;

  /**
   * Constructor
   */
  public function __construct($content) {
    parent::__construct();
    $this->content = $content;
    $save = isset($content['id']) ? 'save' : 'create';
    $this->AddElement(new CFormElementText('title', array('value'=>$content['title'], 'class' => 'field')))
	     ->AddElement(new CFormElementText('subtitle', array('value'=>$content['subtitle'], 'class' => 'field')))
      //   ->AddElement(new CFormElementText('type', array('value'=>$content['type'])))
         ->AddElement(new CFormElementTextarea('content', array('label'=>'Content:', 'value'=>$content['content'])))
         ->AddElement(new CFormElementText('image', array('value'=>$content['image'], 'class' => 'field')))
         ->AddElement(new CFormElementText('video', array('value'=>$content['video'], 'class' => 'field')))
        // ->AddElement(new CFormElementText('filter', array('value'=>$content['filter'])))
         ->AddElement(new CFormElementDropdown('type', array('label'=>'Type:', 'values'=>array('blog', 'page'), 'selected'=>$content['type'], 'class' => 'drop')))
         ->AddElement(new CFormElementDropdown('filter', array('label'=>'Filter:', 'values'=>array('plain', 'html', 'bbcode', 'htmlpurify'), 'selected'=>$content['filter'], 'class' => 'drop')))
         ->AddElement(new CFormElementSubmit($save, array('callback'=>array($this, 'DoSave'), 'class' => 'button')));//, 'callback-args'=>array($this->content))));

    $this->SetValidation('title', array('not_empty'));
  }
  

  /**
   * Callback to save the form content to database.
   */
  public function DoSave($form, $content=null) {
    $content['id']    		= $form['id']['value'];
    $content['title'] 		= $form['title']['value'];
    $content['subtitle']   	= $form['subtitle']['value'];
    $content['type']  		= $form['type']['value'];
    $content['content']  	= $form['content']['value'];
    $content['image'] 		= $form['image']['value'];
    $content['video'] 		= $form['video']['value'];
    $content['filter']		= $form['filter']['value'];
    
    return $this->content->Save($content);
  }
  
  
}