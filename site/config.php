<?php
/**
* Site configuration, this file is changed by user per site.
*
*/

/*
* Set level of error reporting
*/
error_reporting(-1);
ini_set('display_errors', 1);

/*
* Define session name
*/
$cs->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);

/*
* Define server timezone
*/
$cs->config['timezone'] = 'Europe/Stockholm';

/*
* Define internal character encoding
*/
$cs->config['character_encoding'] = 'iso-8859-1';

/*
* Define language
*/
$cs->config['language'] = 'sv';

/*
*	Define base_url to another than defualt
*/
$cs->config['base_url'] = null;

/*
*	Define if debug should be shown below the footer
*/
$cs->config['debug'] = false;

/**
* Define the controllers, their classname and enable/disable them.
*
* The array-key is matched against the url, for example: 
* the url 'developer/dump' would instantiate the controller with the key "developer", that is 
* CCDeveloper and call the method "dump" in that class. This process is managed in:
* $ly->FrontControllerRoute();
* which is called in the frontcontroller phase from index.php.
*/
$cs->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'test1'	  => array('enabled' => true,'class' => 'CCTest1'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestBook'),
);

/*
 *	Define which theme that should be used from the themes-folder (default: theme)
 */
$cs->config['theme']=array(
	'name'	=> 'theme'
);
 
/**
* What type of urls should be used?
* 
* default      = 0      => index.php/controller/method/arg1/arg2/arg3
* clean        = 1      => controller/method/arg1/arg2/arg3
* querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
*/
$cs->config['url_type'] = 1; 

/**
* Set database(s).
*
*	type = database type
*	url = url to database
*	user = username
*	pass = password
*	db = db_zapp

$cs->config['database'] = array(
	'type'	=> 'mysql',
	'url' 	=> 'x3e.org',
	'user' 	=> 'zapp',
	'pass'	=> 'brannigan',
	'db' 	=> 'db_zapp',
);
*/

/**
* Set database(s).
*/
$cs->config['database'][0]['dsn'] = "mysql:dbname=db_zapp;host=x3e.org";
$cs->config['database'][0]['usr'] = "zapp";
$cs->config['database'][0]['pass'] = "brannigan";

?>