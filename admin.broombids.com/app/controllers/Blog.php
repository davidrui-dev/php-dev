<?php
class Blog extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        //$this->view->setLayout('common');
        //$this->load_model('Users');
    }

    public function indexAction()
    {        
        $this->view->render('Pages/blog');        
    }

    public function editAction()
    {        
        $this->view->render('Pages/blog_edit');        
    }

    

}
