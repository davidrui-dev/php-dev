<?php

	class Logout extends Controller{
		public function __construct($controller,$action){
			parent::__construct($controller,$action);
				
		}

		public function indexAction()
		{			
			session_destroy();
			session_unset();
			Router::Redirect('home');
		}
		
		

	}