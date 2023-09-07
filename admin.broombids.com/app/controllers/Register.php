<?php
class Register extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        //$this->view->setLayout('blank');
        //$this->load_model('Users');
    }

    public function VenderAction()
    {        
        $this->view->render('Register/vender');        
    }

    public function UserAction()
    {        
        $this->view->render('Register/user');        
    }

    

}
