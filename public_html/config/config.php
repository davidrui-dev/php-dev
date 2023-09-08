<?php
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		define('DEBUG', true);
//	if($_SERVER['HTTP_HOST'] == '127.0.0.1:8000')
	if($_SERVER['HTTP_HOST'] == 'localhost:8000')
	{
		define('DB_NAME','broombi_cp_broombids'); //database name
//		define('DB_NAME','broombids'); //database name
		define('DB_USER','root'); //database user
		define('DB_PASSWORD','root'); //database Password
		define('DB_HOST','127.0.0.1'); //database host,use IP address to avoid DNS lookup
		define('FUTUREIMAGE', '../admin.broombids/'); 
		define('PROOT','/public_html/'); // set this to '/' for a live server
//		define('PROOT','/broombids_new/'); // set this to '/' for a live server
		define('MAIL_SEND_STATUS', 'true');
	}
	else 
	{
		define('DB_NAME','broombi_cp_broombids'); //database name
		define('DB_USER','broombi_cp_broombids'); //database user
		define('DB_PASSWORD','chand@1931'); //database Password
		define('DB_HOST','127.0.0.1'); //database host,use IP address to avoid DNS lookup
		define('FUTUREIMAGE', 'https://admin.broombids.com/'); 
		define('PROOT','/'); // set this to '/' for a live server	
		define('MAIL_SEND_STATUS', 'true');
	}	
	

	// define('DB_NAME','id13488078_safalhospitality'); //database name for Contact Us
	// define('DB_USER','id13488078_cp_safalhospitality'); //database user for Contact Us
	// define('DB_PASSWORD','0#-6wEC1wE/5QVag'); //database Password for Contact Us
	// define('DB_HOST','localhost'); //database host,use IP address to avoid DNS lookup for Contact Us


	define('DEFUALT_CONTROLLER','Home');
	

	define('DEFAULT_LAYOUT','default'); // if no layout is set in the controller use this layout

	

	define('VERSION_NO','1.0');

	// define('IMAGEROOT','https://test.unidawn.com/');

	define('SITE_TITLE','Welcome | Broombids'); //This will be used if no site title is set 

	define('CURRENT_USER_SESSION_NAME', 'kxXeusqldkiIKjeshLQZJFKJ');

	define('REMEMBER_ME_COOKIE_NAME', 'JAJEI68382LSJVlkdjfh3801jvD');

	define('REMEMBER_ME_COOKIE_EXPIRY',2592000);
	define('SERVER_API_KEY', 'AIzaSyA4DK8RV4-jAl1mA164INc9ku9njWoMrXY');  // Legacy Key

	

	// $currenttime = date('Y-m-d');
	// $timestamp = time()-86400;
	// $previousdate = strtotime("-7 day", $timestamp);
	// $pdate=date('Y-m-d', $previousdate);
	// define('CURRTIME',$currenttime);
	// define('PREVTIME',$pdate);

	 
	define('SMTP_HOST', 'mail.broombids.com'); 
	define('SMTP_PORT', '587'); 
	define('SENDER_EMAIL', 'noreply@broombids.com'); 
	define('MAIL_PASSWORD', 'Chand@1931'); 

	define('SUPPORT_EMAIL', 'cadelineweb@gmail.com'); 
	define('BROOMS_PERCENTAGE', '5');


    # client id and client secret
    define('CLIENT_ID','281805047666-5j8osug98k5hprj66c21svaman0fklb7.apps.googleusercontent.com');
    define('CLIENT_SECRET','dNfQ5Glq94YJlscpaYWEEuuu');
    define('REDIRECT_URI','http://localhost:8000/auth/callback/google');//example:http://localhost/social/login.php?google,http://example/login.php?google
    define('APPROVAL_PROMPT','auto');
    define('ACCESS_TYPE','offline');

    #For facebook login
    define('APP_ID','833619740663548');
    define('APP_SECRET','d2da8d9b7eb03a5bf1fa784ebd8f5bab');
