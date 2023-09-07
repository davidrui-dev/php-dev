<?php
if(!isset($_SESSION['master_id']))
{
  Router::Redirect('home');
}
else
{
    $newUser=new Users();
    $user = $newUser->FindCurrentUser('users',$_SESSION['master_id']);
    if(!$user)
    {
        Router::Redirect('home');
    }
}

if($user->utype == 'User')
{    
    $offers = $newUser->AllOffersCount_Post_customer($_SESSION['master_id']);
    $winoffers = $newUser->AllOffersCount_Post_Selected_customer($_SESSION['master_id']);
    $Selectedoffer_per = 0;
    if($offers)
    {
        if($winoffers)
        {
            $Selectedoffer_per = 100*$winoffers/$offers;
        }
    }
    
    
    $dataPoints = array( 
    array("label"=>"Posted Offer", "symbol" => "Posted Offer","y"=>round(100-$Selectedoffer_per,2)),
    array("label"=>"Selected Offer", "symbol" => "Selected Offer","y"=>round($Selectedoffer_per,2)), 
    );
    $dataPoints_payment = array();

}
else
{
    $offers = $newUser->AllOffersCount($_SESSION['master_id']);
    $winoffers = $newUser->WinOffersCount($_SESSION['master_id']);
    if($winoffers)
    {
        $Selectedoffer_per = 100*$winoffers/$offers;
    }
    else
    {
        $Selectedoffer_per = 0;
    }
    

    $dataPoints = array( 
    array("label"=>"All Offers", "symbol" => "All Offers","y"=>round(100-$Selectedoffer_per,2)),
    array("label"=>"Win Offer", "symbol" => "Win Offer","y"=>round($Selectedoffer_per,2)), 
    );

    $bids = $newUser->FindWinOffer('bid_post',$_SESSION['master_id']);
    $pending = 0;
    $proccess = 0;
    $done = 0;
    if($bids)
    {
      foreach ($bids as $bid) 
      {
        $post = $newUser->FindCurrentUser('post',$bid->pid);
        $earlier_a = new DateTime($post->fromdate);
        $later_a = new DateTime($post->todate);
        $diff_a = $later_a->diff($earlier_a)->format("%a");
        $b_total = $bid->bid_amount*$diff_a;
        $broom_am = $b_total*BROOMS_PERCENTAGE/100;

            if($bid->settlement == 0)
            {
                $pending+=$broom_am;
            }
            if($bid->settlement == 1)
            {
                $done+=$broom_am;
            }
            if($bid->settlement == 2)
            {
                $proccess+=$broom_am;
            }
      }
    }

    $per_p = $pending*3/100;
    $per_d = $done*3/100;
    $per_po = $proccess*3/100;

    $t_pending = $pending+$per_p;
    
    $t_proccess = $proccess+$per_po;
   
    $t_done = $done+$per_d;
    

    $total_payment = $t_pending+$t_proccess+$t_done;

    // 19.8275  = 100
    // 6.9525   = ?
    if($total_payment > 0)
    {
        $pending_per = $t_pending*100/$total_payment;
        $done_per = $t_done*100/$total_payment;
        $proccess_per = $t_proccess*100/$total_payment;
    }
    else
    {
        $pending_per = 0;
        $done_per = 0;
        $proccess_per = 0;
    }
    

    $dataPoints_payment = array( 
    array("label"=>"Done", "symbol" => "Done","y"=>round($done_per,2)),
    array("label"=>"Pending", "symbol" => "Pending","y"=>round($pending_per,2)), 
    array("label"=>"Proccess", "symbol" => "Proccess","y"=>round($proccess_per,2)), 
    );
}


?>
<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>

<?php $this->start('body');?>
<style type="text/css">
    .canvasjs-chart-credit
    {
        display: none;
    }
</style>
<!-- Dashboard Content Section Start -->
        <div class="dashboard-content-section section bg_color--5">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-xl-2 col-lg-3">
                        <div class="dashboard-sidebar">
                            <div class="dashboard-menu">
                                <ul class="nav">
                                    <li>
                                       
                                        <ul>
                                            <li><a href="<?=PROOT?>dashboard" class="active" ><i class="lnr lnr-home"></i> Dashboard </a></li>
                                            <?php

                                            $chats = $newUser->GetChatConnections('user_connection',$_SESSION['master_id']);
                                            $newChatDate = $newUser->FindByUIDSingle('chat_view_date',$_SESSION['master_id']);
                                            $total_count_new = 0;
                                            $lastmessageid = 0;
                                            if($newChatDate)
                                              $lastmessageid = $newChatDate->lastid;                   
                                            if($chats)
                                            {
                                                foreach ($chats as $chat) 
                                                {
                                                    $uicon=PROOT.'images/support.png';
                                                    if($chat->myid != $_SESSION['master_id'])
                                                    {
                                                      $unreadMessage = $newUser->GetUnreadMessage($chat->myid,$lastmessageid);
                                                        $chatuser = $newUser->FindCurrentUser('users',$chat->myid);
                                                        if($chatuser)
                                                        {
                                                            $fname = $chatuser->fname.' '.$chatuser->surname;
                                                            if(!empty($chatuser->img))
                                                            {
                                                                $uicon = PROOT.$chatuser->img;
                                                            }
                                                            
                                                        }
                                                    }
                                                    if($chat->uid != $_SESSION['master_id'])
                                                    {
                                                        $unreadMessage = $newUser->GetUnreadMessage($chat->uid,$lastmessageid);
                                                        $chatuser = $newUser->FindCurrentUser('users',$chat->uid);
                                                        if($chatuser)
                                                        {
                                                            $fname = $chatuser->fname.' '.$chatuser->surname;
                                                            if(!empty($chatuser->img))
                                                            {
                                                                $uicon = PROOT.$chatuser->img;
                                                            }
                                                        }
                                                    }
                                                    $total_count_new += count($unreadMessage);        
                                                }
                                            }


                                            if($user->utype == 'User')
                                            {
                                                ?>
                                                <li><a href="javascript:void(0);" controller="AddRequest" id="getcontroller"><i class="lnr lnr-file-add"></i> Add Request </a></li>

                                                <li><a href="javascript:void(0);" controller="myoffers_user" id="getcontroller"><i class="lnr lnr-car"></i> My Post </a></li>

                                                <li><a href="javascript:void(0);" controller="SelectedVender" id="getcontroller"><i class="lnr lnr-smile"></i>Selected Offers </a></li>
                                               
                                                <li><a href="javascript:void(0);" controller="Editprofile" id="getcontroller"><i class="lnr lnr-user"></i> My Account </a></li>

                                                <li><a href="<?=PROOT?>Chat" <?php if($total_count_new > 0) echo 'style="color: red"';?>> <?php
                                                    if($total_count_new > 0) 
                                                    echo '<b id="totalNewMessages" style="    
                                                    margin-top: -5px;
                                                    border-radius: 50%;
                                                    position: absolute;
                                                    float: right;
                                                    width: 45px;
                                                    text-align: center;
                                                ">'.$total_count_new.' </b>'; 
                                                ?><i class="lnr lnr-envelope" <?php if($total_count_new > 0) echo 'style="color: red"';?>></i> Messages</a></li>

                                                <li><a href="javascript:void(0);" controller="Faq" id="getcontroller"><i class="lnr lnr-tag"></i> FAQ </a></li>

                                                <li><a href="javascript:void(0);" controller="Support" id="getcontroller"><i class="lnr lnr-phone"></i> Support </a></li>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <li><a href="javascript:void(0);" controller="Allrequests" id="getcontroller"><i class="lnr lnr-rocket"></i> All requests </a></li>

                                                <li><a href="javascript:void(0);" controller="Mybids" id="getcontroller"><i class="lnr lnr-car"></i> My offers  </a></li>

                                                <li><a href="javascript:void(0);" controller="winoffers" id="getcontroller"><i class="lnr lnr-smile"></i> Won Requests </a></li>

                                                <li><a href="<?=PROOT?>Chat" <?php if($total_count_new > 0) echo 'style="color: red"'?>> <?php
                                                    if($total_count_new > 0) 
                                                    echo '<b id="totalNewMessages" style="    
                                                    border-radius: 50%;
                                                    margin-top: -5px;
                                                    position: absolute;
                                                    float: right;
                                                    width: 45px;
                                                    text-align: center;
                                                ">'.$total_count_new.' </b>'; 
                                                ?><i class="lnr lnr-envelope" <?php if($total_count_new > 0) echo 'style="color: red"';?>></i> Messages</a></li>

                                                <li><a href="javascript:void(0);" controller="Editprofile_vender" id="getcontroller"><i class="lnr lnr-user"></i> My Account </a></li>

                                                <li><a href="javascript:void(0);" controller="Payment" id="getcontroller"><i class="lnr lnr-dice"></i> Payment </a></li>

                                                <li><a href="javascript:void(0);" controller="FaqVendor" id="getcontroller"><i class="lnr lnr-question-circle"></i>FAQ </a></li>

                                                <li><a href="javascript:void(0);" controller="Support" id="getcontroller"><i class="lnr lnr-phone"></i>Support </a></li>

                                                <li><a href="javascript:void(0);" controller="Editprofile_vender" id="getcontroller"><i class="lnr lnr-chart-bars"></i>Statistics </a></li>
                                                <?php
                                            }
                                            ?>
                                            <li><a href="<?=PROOT?>logout"><i class="lnr lnr-power-switch"></i> Log Out </a></li>
                                        </ul>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9" id="load_data">
                        <div class="dashboard-main-inner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-breadcrumb-content mb-40">
                                        <h1>Dashboard</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-overview">
                                <?php if($user->utype == 'User') { ?>
                                <div class="row no-gutters">

                                    <div class="col-lg-7">                                        
                                        <div id="chartContainer" style="height: 415px; width: 100%;"></div>
                                    </div>

                                    <div class="col-lg-5">
                                        <!-- Single Funfact Start -->
                                        <div class="single-funfact">
                                            <div class="icon-img">
                                                <span class="lnr lnr-car" style="font-size: 55px; color: #2cc1d6;"></span>
                                            </div>
                                            <div class="funfact-content">
                                                <span class="counter"><?php echo $offers; ?></span>
                                                <span class="text theme-color">Total Offers</span>
                                            </div>
                                        </div>

                                        <div class="single-funfact">
                                            <div class="icon-img">
                                                <span class="lnr lnr-license" style="font-size: 55px; color: #2cc1d6;"></span>
                                            </div>
                                            <div class="funfact-content">
                                                <span class="counter"><?php echo $winoffers; ?></span>
                                                <span class="text theme-color">Selected Offers</span>
                                            </div>
                                        </div>

                                        <div class="single-funfact">
                                            <div class="icon-img">
                                                <span class="lnr lnr-history" style="font-size: 55px; color: #2cc1d6;"></span>
                                            </div>
                                            <div class="funfact-content">
                                                <span class="counter"><?php echo '0'; ?></span>
                                                <span class="text theme-color">Register Cars</span>
                                            </div>
                                        </div>

                                        <div class="single-funfact">
                                            <div class="icon-img">
                                                <span class="lnr lnr-history" style="font-size: 55px; color: #2cc1d6;"></span>
                                            </div>
                                            <div class="funfact-content">
                                                <span class="counter"><?php echo '0'; ?></span>
                                                <span class="text theme-color">Message</span>
                                            </div>
                                        </div> 
                                        <!-- Single Funfact End -->
                                    </div>

                                    
                                </div>
                               <?php } else { ?>

                                <div class="row no-gutters" style="margin-bottom: 50px;">
                                    <div class="col-lg-3">
                                        <!-- Single Funfact Start -->
                                        <div class="single-funfact">
                                            <div class="icon-img">
                                                <span class="lnr lnr-car" style="font-size: 55px; color: #2cc1d6;"></span>
                                            </div>
                                            <div class="funfact-content">
                                                <span class="counter"><?php echo $offers; ?></span>
                                                <span class="text theme-color">Total Offers</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">  

                                        <div class="single-funfact">
                                            <div class="icon-img">
                                                <span class="lnr lnr-license" style="font-size: 55px; color: #2cc1d6;"></span>
                                            </div>
                                            <div class="funfact-content">
                                                <span class="counter"><?php echo $winoffers; ?></span>
                                                <span class="text theme-color">Win Offers</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">

                                        <div class="single-funfact">
                                            <div class="icon-img">
                                                <span class="fa fa-credit-card" style="font-size: 55px; color: #2cc1d6;"></span>
                                            </div>
                                            <div class="funfact-content">
                                                <span class="counter"><?php echo round($pending+$per_p,2); ?></span>
                                                <span class="text theme-color">Payment</span>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-lg-3">

                                        <div class="single-funfact">
                                            <div class="icon-img">
                                                <span class="fa fa-envelope" style="font-size: 55px; color: #2cc1d6;"></span>
                                            </div>
                                            <div class="funfact-content">
                                                <span class="counter"><?php echo '0'; ?></span>
                                                <span class="text theme-color">Message</span>
                                            </div>
                                        </div> 
                                        <!-- Single Funfact End -->
                                    </div>
                                </div>
                                <div class="row no-gutters" style="background: #fff; ">

                                    <div class="col-lg-6" style="margin-top: 20px;">                                        
                                        <div id="chartContainer" style="margin-top: 10px; height: 415px; width: 100%;"></div>
                                    </div>

                                    <div class="col-lg-6" style="margin-top: 20px;">
                                        <div id="chartContainer_payment" style="margin-top: 10px; height: 415px; width: 100%;"></div>
                                    </div>

                                    
                                </div>
                               <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Content Section End -->


<?php $this->end();?>

<script>
window.onload = function() { 
 var utype =  '<?php echo $user->utype; ?>';  
var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light2",
    animationEnabled: true,
    title: {
        text: "Average Offers Graph"
    },
    data: [{
        type: "doughnut",
        indexLabel: "{symbol} - {y}",
        yValueFormatString: "#,##0.0\"%\"",
        showInLegend: true,
        legendText: "{label} : {y}",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
 
 chart.render();
if(utype != 'User') {
var chart2 = new CanvasJS.Chart("chartContainer_payment", {
    theme: "light2",
    animationEnabled: true,
    title: {
        text: "Broom Payments Status"
    },
    data: [{
        type: "doughnut",
        indexLabel: "{symbol} - {y}",
        yValueFormatString: "#,##0.0\"%\"",
        showInLegend: true,
        legendText: "{label} : {y}",
        dataPoints: <?php echo json_encode($dataPoints_payment, JSON_NUMERIC_CHECK); ?>
    }]
});
chart2.render();
}


 
}
</script>



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


