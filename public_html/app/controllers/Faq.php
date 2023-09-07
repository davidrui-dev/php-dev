<?php
class Faq extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('mainpage');
        //$this->load_model('Users');
    }

    public function indexAction()
    {        
        //$this->view->render('faq/index');        
         $this->view->render('faq/customer');        
    }


    public function vendorAction()
    {        
        $this->view->render('faq/vendor');        
    }

    public function customerAction()
    {        
        $this->view->render('faq/customer');        
    }

    

}
