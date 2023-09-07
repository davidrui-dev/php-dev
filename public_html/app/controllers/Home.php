<?php
class Home extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('mainpage');
        //$this->load_model('Users');
    }

    public function indexAction()
    {        
        $this->view->render('home/index_2');        
    }

    

}
