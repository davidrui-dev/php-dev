<?php
class Router{
	public static function route($url){
		//echo $url;
		 //dnd($url);
		//  controllers
		$controller=(isset($url[0]) && $url[0] !='')? ucwords($url[0]): DEFUALT_CONTROLLER;
		$controller_name=$controller;
		array_shift($url);


	
		// action/msg
		$action=(isset($url[0]) && $url[0] !='')? $url[0].'Action':'indexAction';
		$action_name=$controller;
		array_shift($url);		
		// dnd($url);

		if (!class_exists($controller)) {
            self::redirect('Page404');
        }
		if (!method_exists($controller, $action)) {
            self::redirect('Page404');
        }

		$queryParams=$url;
		$dispatch = new $controller($controller_name,$action);
		$controller_name = strtolower($controller);
		call_user_func_array([$dispatch,$action],$queryParams);

		// PARAMS
		//echo $controller_name;
		
		

	}

	public static function redirect($location)
	{
		if(!headers_sent())
		{
			header('Location:'.PROOT.$location);
			exit();
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'window.location.href="'.PROOT.$location.'";';
			echo '</script>';
			echo '<noscript>';
			echo '<meta http-equiv="refresh" content="0;url'.PROOT.$location.'" />';
			echo '</noscript>';
			exit;
		}
	}
}