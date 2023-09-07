<?php
class Cronjob extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Common');
    }

    // har ek ghante ma chalana hai
    public function NewPostAddAction()
    {        
        $vendorsEmail = array();
        $vendors = $this->CommonModel->GetAllVendors('users');
        if($vendors)
        {
            foreach ($vendors as $vendor) 
            {
                $vendorsEmail[]=$vendor->email;
            }
        }
        $emails = array_unique($vendorsEmail);
        if(!empty($emails))
        {
            $posts = $this->CommonModel->CheckMailSendOrNot('post');
            if($posts)
            {
                foreach ($posts as $post) 
                {
                    $vtype = '';
                    $location = '';
                    $vt = $this->CommonModel->FindById('vehicle_type',$post->ctype);
                    $loc = $this->CommonModel->FindById('locationsadmin',$post->location);
                    if($vt)
                    {
                        $vtype = $vt->vt_name;
                    }
                    if($loc)
                    {
                        $location = $loc->lname;
                    }
                    $title = $post->title;
                    $budget = '€ '.$post->budget_min.' -€ '.$post->budget_max;
                    $date = 'From : '.$post->fromdate.'<br>To: '.$post->todate;
                    $message = NewPostAdd($title,$vtype,$location,$date,$budget);
                    MailSend_Cron($emails,'Info For New Request - Broombids',$message);

                    $fields=[
                        "mail_status"=>1
                    ];
                    $this->CommonModel->CP_Update('post',$post->id,$fields);
                }
            }
        }
        
    }

    // Din me ek bar chalana hai
    public function SendInvoiceAction()
    {
        $date = date('Y-m-d');
        $posts = $this->CommonModel->GetExpirePost($date);
        if($posts)
        {
            foreach ($posts as $post) 
            {
                $getvendor = $this->CommonModel->CheckAlreadyselectOrNot($post->id);
                if($getvendor)
                {
                   $Vendoremails = $this->CommonModel->FindById('users',$getvendor->uid);
                   if($Vendoremails)
                   {
                        $email = trim($Vendoremails->email);
                        $name = $Vendoremails->fname.' '.$Vendoremails->surname;
                        $message = NewInvoiceCreated($name);
                        MailSend($email,'Invoice For Payment - Broombids',$message);
                   }
                }
            }
        }
    }

    

}
