<?php
	// if(! empty($_SERVER['HTTP_USER_AGENT'])){
	//     $useragent = $_SERVER['HTTP_USER_AGENT'];
	//     if(!preg_match('@(iPad|iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)@', $useragent) ){
	//         header('Location:https://unidawn.com');
	//     }
	// }

	define('DS',DIRECTORY_SEPARATOR);
	// echo DS;
	define('ROOT',dirname(__FILE__));
	// echo ROOT;
	// echo $_SERVER['PATH_INFO'];

	// Load Configuration and helper functions
	require_once(ROOT .DS. 'config' .DS. 'config.php');
	require_once(ROOT .DS. 'app' .DS. 'lib' .DS. 'helpers' .DS. 'functions.php');
	//require_once(ROOT .DS. 'PHPExcel-1.8' .DS. 'Classes' .DS. 'PHPExcel.php');
	
	//require_once 'PHPMailer/PHPMailerAutoload.php';

	// //Load Composer's autoloader
	// require 'vendor/autoload.php';
	
	/*$user_agent_details = json_decode(get_user_agent_details($_SERVER['HTTP_USER_AGENT']));
	if(!$user_agent_details->isMobile){
		header('Location: https://unidawn.com/');
	}*/
	
	// Autoload Classes
	        // require_once(ROOT.DS.'core'.DS.'Model'.'.php');
	        //  require_once(ROOT.DS.'app'.DS.'models'.DS.'Users.php');

	function autoload($className)
	{
	    if(file_exists(ROOT.DS.'core'.DS.$className.'.php'))
	    {
	        require_once(ROOT.DS.'core'.DS.$className.'.php');
	    }
	    else if(file_exists(ROOT.DS.'app'.DS.'controllers'.DS.$className.'.php'))
	    {
	        require_once(ROOT.DS.'app'.DS.'controllers'.DS.$className.'.php');
	    }
	    else if(file_exists(ROOT.DS.'app'.DS.'models'.DS.$className.'.php'))
	    {
	        require_once(ROOT.DS.'app'.DS.'models'.DS.$className.'.php');
	    }

	}
	spl_autoload_register('autoload');
	session_start();

	$url= isset($_SERVER['PATH_INFO'])?explode('/',ltrim($_SERVER['PATH_INFO'],'/')):[];
	// var_dump($url);
	// $db=DB::getInstance();
	// dnd($db);
	
	if(!Session::exists(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME))
	{
		Users::loginUserFromCookie();
	}
	// Route the Request
	Router::route($url);