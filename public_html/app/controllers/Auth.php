<?php
class Auth extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('mainpage');
        //$this->load_model('Users');
    }

    public function facebook_callbackAction()
    {
        $this->view->render('auth/facebook_callback');
    }

    public function google_callbackAction()
    {
        $this->view->render('auth/google_callback');
    }



}
