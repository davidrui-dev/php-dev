<?php

class Controller extends Application
{
	protected $_controller,$_action;
	public $view; 
	public function __construct($controller,$action){
		parent::__construct();
		$this->_controller=$controller;
		$this->_action=$action;
		$this->view=new View();
		date_default_timezone_set('Asia/Kolkata');
	}

	protected function load_model($model)
	{
		 if(class_exists($model))
		 {
		 	$this->{$model.'Model'}= new $model(strtolower($model));
		 }
	}
}