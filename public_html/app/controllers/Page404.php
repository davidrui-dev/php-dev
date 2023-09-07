<?php
class Page404 extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('no_header');
        //$this->load_model('Users');
    }

    public function indexAction()
    {        
        $this->view->render('Page404/index');        
    }
}
