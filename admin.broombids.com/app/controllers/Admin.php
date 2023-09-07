<?php
class Admin extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);        
        //$this->load_model('Users');
    }

    public function indexAction()
    {        
        if(isset($_SESSION['master_id']))
        {
        	$this->view->render('Admin/index');
        }
        else
        {
               Router::Redirect('home'); 
    	}
    }

    

}
