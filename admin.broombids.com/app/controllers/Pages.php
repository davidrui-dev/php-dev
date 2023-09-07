<?php
class Pages extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('blank');
        //$this->load_model('Users');
    }

    public function AddadminuserAction()
    {        
        $this->view->render('Pages/addAdminUser');        
    }

    public function AdminUserListAction()
    {        
        $this->view->render('Pages/AdminUserList');        
    }

    public function VenderUserListAction()
    {        
        $this->view->render('Pages/VenderUserList');        
    }

    public function CustomerListAction()
    {        
        $this->view->render('Pages/CustomerList');        
    }

    public function DashboardAction()
    {        
        $this->view->render('Pages/Dashboard');        
    }

    public function LocationAction()
    {        
        $this->view->render('Pages/Location');        
    }

    
    public function SubscriptionAction()
    {        
        $this->view->render('Pages/Subscription');        
    }

    public function CreateCustomerAction()
    {        
        $this->view->render('Pages/CreateCustomer');        
    }

    public function CreateVenderAction()
    {        
        $this->view->render('Pages/CreateVender');        
    }



    public function AdminUserEditAction()
    { 
        $_SESSION['edit_id'] = $_POST['id'];       
        $this->view->render('Pages/AdminUserEdit');        
    }

    public function CustomerEditAction()
    { 
        $_SESSION['edit_id'] = $_POST['id'];       
        $this->view->render('Pages/CustomerEdit');        
    }

    public function VehicleTypeAction()
    {        
        $this->view->render('Pages/VehicleType');        
    }

    public function VehicleCompanyAction()
    {        
        $this->view->render('Pages/VehicleCompany');        
    }

    public function VehicleNameAction()
    {        
        $this->view->render('Pages/VehicleName');        
    }

    public function VehicleFuelTypeAction()
    {        
        $this->view->render('Pages/VehicleFuelType');        
    }

    public function ContestInformation()
    {        
        $this->view->render('Pages/ContestInformation');        
    }

    public function VehicleTransmissionAction()
    {        
        $this->view->render('Pages/VehicleTransmission');        
    }

    public function ManageVehicleAction()
    {        
        $this->view->render('Pages/ManageVehicle');        
    }

    public function VehicleListAction()
    {        
        $this->view->render('Pages/VehicleList');        
    }

    public function VehicleDetailsAction()
    {        
        $this->view->render('Pages/VehicleDetails');        
    }

    public function VenderDetailsAction()
    {        
        $this->view->render('Pages/VenderDetails');        
    }

    public function NotFoundAction()
    {        
        $this->view->render('Pages/404');        
    }

    public function PostAction()
    {        
        $this->view->render('Pages/Post');        
    }
    
    public function FaqAction()
    {        
        $this->view->render('Pages/Faq');        
    }
    public function supportAction()
    {        
        $this->view->render('Pages/support');        
    }

    public function ContestInformationAction()
    {        
        $this->view->render('Pages/ContestInformation');        
    }

    public function EditVehicleDetailsAction()
    {        
        $_SESSION['edit_vehicle_id'] = $_POST['id'];  
        $this->view->render('Pages/EditVehicleDetails');        
    }

    public function SingleTicketAction()
    {        
        $_SESSION['ticket_id'] = $_POST['id'];  
        $this->view->render('Pages/Singleticket');        
    }
}
                        
                        