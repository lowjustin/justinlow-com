<?php
/**
* Paragraph Language Attribute Plugin
*
* @author Justin Low <justin@justinlow.com>
* @version 1.0.0
*/

kirbytext::$post[] = function($kirbytext, $value) {
  return preg_replace("/<p>\(lang: (.*?)\) /", "<p lang=\"$1\">", $value);
};