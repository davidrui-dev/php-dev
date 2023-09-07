<?php
class Chat extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('white_header');
        //$this->load_model('Users');
    }

    public function indexAction()
    {        
        $this->view->render('Chat/index');        
    }

    

}
