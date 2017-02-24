<?php
	/**
		* WEBROOT chemin absolue dossier web
		*
	*/
    session_start();
	date_default_timezone_set("Europe/Paris");
	define("WEBROOT", str_replace('index.php', '',$_SERVER['SCRIPT_NAME'] ));
	define("ROOT", str_replace('index.php', '',$_SERVER['SCRIPT_FILENAME'] ));
	define("NOM_BASE_SITE","FuXing");

	$theme = true;
	$page = (isset($_GET['page']) && $_GET['page'] != "") ? $_GET['page'] : "forum";
	$url = explode('/',$page);
	$controller = array_shift($url);
	
	if (isset($url[0]) && $url[0] == "admin") {
		$url[1] = isset($url[1]) ? $url[1] : "index";
		$action = $url[0] . '_' . $url[1];
	} else {
		$action = array_shift($url) ?: 'index';
    }

    $params = $url;
	require ROOT. "Config/conf.php";
	require ROOT. "Class/Autoloader.php";
	require ROOT. "Libs/loader.php";
	require ROOT. "Libs/JBBCode/Parser.php";

	Autoloader::register();

	$parser 	= new JBBCode\Parser();
	$Session 	= new Session();
	$Form 		= new Form();
	
	Loader(['Libs']);

	$db = connect();


	if (!empty($_POST)) {
		$post = new stdClass();
		foreach ($_POST as $k => $v) {
			$post->$k = $v;
		}
	}

	ob_start();

	$file = ROOT. "Controller/{$controller}.php";
		
	if(file_exists($file)){
		require $file;
	        if (function_exists($action)) {
            	call_user_func_array($action,$params);
			} else {
            	echo "Cette page n'existe pas";
            }
	} else {
		echo "Ce controller n'existe pas ";
	}

	$content = ob_get_clean();

    if (isset($theme) && $theme == true) {
    	if (isset($url[0]) && $url[0] == 'admin') {
	        $file = ROOT . "Theme/{$url[0]}.php";
	        if (file_exists($file)){
	            include $file;
			} else {
	            include ROOT. "Theme/theme.php";
	        }
		} else {
			include ROOT. "Theme/theme.php";
		}
    } else {
    	echo $content;    	
    }
?>