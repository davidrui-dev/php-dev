<?php
class Pages extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('blank');
        //$this->load_model('Users');
    }

    public function EditprofileAction()
    {        
        $this->view->render('Pages/Editprofile');        
    }

    public function MyBookingAction()
    {        
        $this->view->render('Pages/MyBooking');        
    }    
    public function winoffersAction()
    {        
        $this->view->render('Pages/winoffers');        
    }
    public function dashboardAction()
    {        
        $this->view->render('Pages/dashboard');        
    }

    public function myoffers_userAction()
    {        
        $this->view->render('Pages/myoffers_user');        
    }

    public function Editprofile_venderAction()
    {        
        $this->view->render('Pages/Editprofile_vender');        
    }

    public function AddRequestAction()
    {        
        $this->view->render('Pages/AddRequest');        
    }
    public function SelectedVenderAction()
    {        
        $this->view->render('Pages/SelectedVender');        
    }
    public function MessagesAction()
    {        
        echo '<h1 style="margin:20px;">Under Proccess</h1>'; 
    }
    public function FaqAction()
    {        
        $this->view->render('Pages/FAQ_User');        
    }
    public function FaqVendorAction()
    {        
        $this->view->render('Pages/FAQ_Vendor');        
    }
    
    public function BookingSingleAction()
    {      
        $_SESSION['tmp_bookingid']=$_POST['id'];  
        $this->view->render('Pages/BookingSingle');        
    }

    public function GetOffersAction()
    {      
        $_SESSION['postid']=$_POST['id'];  
        $this->view->render('Pages/GetOffers');        
    }

    public function AllrequestsAction()
    {
        $this->view->render('Pages/myoffers');
    }
    public function MybidsAction()
    {
        $this->view->render('Pages/mybids');
    }
    public function SupportAction()
    {
        $this->view->render('Pages/Support');
    }
    public function PaymentAction()
    {
        $this->view->render('Pages/Payment');
    }
    
    

}
                        
                        