<?php
/**
* Helpers for the template file.
*/
$urltopic=$ly->request->CreateUrl("index/arg1");
$ly->data['header'] = '<h1>Header: SMVC</h1>';
$ly->data['main']   = "<p>Main: Now with a theme engine, Not much more to report for now. <br />
Testlink, change conf-file: <a href={$urltopic}>{$urltopic}</a></p>";
$ly->data['footer'] = '<p>Footer: &copy; SMVC by Simon Hevosmaa</h1>';


/**
* Print debuginformation from the framework.
*/
function get_debug() {
  global $ly;
  $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($ly->config, true)) . "</pre>";
  $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($ly->data, true)) . "</pre>";
  $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($ly->request, true)) . "</pre>";
  return $html;
}

?>