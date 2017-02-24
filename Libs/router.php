<?php
function url($url = "/"){
	trim('/'. $url);
	//$arg = ['/',':'];
	//$val = ['?','&'];
	//$url = str_replace($arg,$val,$url);
	
	if ($url == '/') {
		return WEBROOT;
	} else {
		return WEBROOT . $url . '.html';
	}
}

function Webroot($url, $path = 'Public'){
	trim('/'. $url);
	//$arg = ['/',':'];
	//$val = ['?','&'];
	//$url = str_replace($arg,$val,$url);
	return WEBROOT . $path .'/' .  $url;
}

function render($vars = []){
	global $url;
	global $controller;
	global $action;
	global $Session;
	global $post;
	extract($vars);
	require ROOT . 'View/'. $controller .'/'.$action.'.php';
}