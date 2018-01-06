<?php 
ini_set("display_errors",0);
error_reporting(0);
require_once 'vendor/autoload.php';
include_once 'vendor/duzun/hquery.php';

use duzun\hQuery;

hQuery::$cache_path = "cache";


// GET the document
$doc = hQuery::fromUrl('http://www.vpnbook.com/freevpn', ['Accept' => 'text/html,application/xhtml+xml;q=0.9,*/*;q=0.8']);

$li = $doc->find(".disc > li");

$login_printed = false;
$password_printed = false;

echo "************************************" . PHP_EOL;
    foreach($li as $pos => $i) {
	if ( strpos(trim($i->text()), 'Username') !== false && $login_printed == false){
		echo "*     " . trim($i->text()) . "            *" . PHP_EOL;
		$login_printed = true;
	}

	if (  strpos(trim($i->text()), 'Password') !== false  && $password_printed == false){
		echo "*     " . trim($i->text()) . "            *" . PHP_EOL;
		$password_printed = true;
	}


    }
echo "************************************" . PHP_EOL;

