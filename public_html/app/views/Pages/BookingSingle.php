<?php
$newUser=new Users();
$bookid =  $_SESSION['tmp_bookingid'];
$booking = $newUser->FindCurrentUser('post',$bookid);
$imgid = $newUser->FindFuterImage('vehiclemanage',$booking->carname);
$imgs = $newUser->FindCidAll('car_gallary',$imgid->id);


$location = $newUser->FindCurrentUser('locationsadmin',$booking->location);
$ctype = $newUser->FindCurrentUser('vehicle_type',$booking->ctype);
$cname = $newUser->FindCurrentUser('vehicle_name',$booking->carname);
$fimage = $newUser->FindFuterImage('vehiclemanage',$booking->carname);
?>
<?php
if($imgs)
{
  echo '<section id="listing_img_slider">';
  foreach ($imgs as $img) 
  {
    echo '<div><img src="'.FUTUREIMAGE.$img->img.'" class="img-fluid" alt="image" style="height: 300px;"></div>';
  }
  echo '</section>';
}
?>
<section class="listing_other_info secondary-bg" style="width: 100%;">
  <div class="container">
    <div class="search_other" id="getcontroller" controller="MyBooking" title="My Booking" href="javascript:void(0);">Back </div>
    <div id="other_info"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
    <div id="info_toggle">
      <button type="button" data-toggle="modal" data-target="#schedule"> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $location->lname; ?> </button>
      <button type="button" data-toggle="modal" data-target="#make_offer"> <i class="fa fa-car" aria-hidden="true"></i> <?php echo $ctype->vt_name.' - '.$cname->vname; ?> </button>
      <button type="button" data-toggle="modal" data-target="#email_friend"> <i class="fa fa-clock-o" aria-hidden="true"></i> <b>From: </b><?php echo date("d-m-Y", strtotime($booking->fromdate)); ?> <b>To: </b><?php echo date("d-m-Y", strtotime($booking->todate)); ?> </button>
      
    </div>
  </div>
</section>

<section class="listing-detail" style="margin-left: 100px;">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2><?php echo $booking->title; ?></h2>
        
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p>€ <?php echo $booking->budget_min.' - €'.$booking->budget_max; ?></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
       
        <div class="listing_more_info" >
          <div class="listing_detail_wrap" > 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation"><a class="active" href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
              <li role="presentation"><a href="#specification" aria-controls="specification" role="tab" data-toggle="tab">Technical Specification</a></li>
              
              <li role="presentation"><a href="#Offers" aria-controls="Offers" role="tab" data-toggle="tab">Offers</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content" style="padding:10px 20px;"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <h4>Description</h4>
                <?php echo $imgid->descreiption; ?>
              </div>
              
              <!-- Technical-Specification -->
              <div role="tabpanel" class="tab-pane" id="specification">
                <div class="table-responsive"> 
                  <!--Basic-Info-Table-->
                  <table>
                    <thead>
                      <tr>
                        <th colspan="2">BASIC INFO</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Model Year</td>
                        <td>2010</td>
                      </tr>
                      <tr>
                        <td>No. of Owners</td>
                        <td>4</td>
                      </tr>
                      <tr>
                        <td>KMs Driven</td>
                        <td>30,000</td>
                      </tr>
                      <tr>
                        <td>Fuel Type</td>
                        <td>Diesel</td>
                      </tr>
                    </tbody>
                  </table>
                  
                  <!--Technical-Specification-Table-->
                  <table>
                    <thead>
                      <tr>
                        <th colspan="2">Technical Specification</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Engine Type</td>
                        <td>TDCI Diesel Engine</td>
                      </tr>
                      <tr>
                        <td>Engine Description</td>
                        <td>1.5KW</td>
                      </tr>
                      <tr>
                        <td>No. of Cylinders</td>
                        <td>4</td>
                      </tr>
                      <tr>
                        <td>Mileage-City</td>
                        <td>22.4kmpl</td>
                      </tr>
                      <tr>
                        <td>Mileage-Highway</td>
                        <td>25.83kmpl</td>
                      </tr>
                      <tr>
                        <td>Fuel Tank Capacity</td>
                        <td>40 (Liters)</td>
                      </tr>
                      <tr>
                        <td>Seating Capacity</td>
                        <td>5</td>
                      </tr>
                      <tr>
                        <td>Transmission Type</td>
                        <td>Manual</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="Offers"> 
                <div class="row">
                  <?php
                  $bids=$newUser->GetAllBidsPID($bookid);
                  if($bids)
                  {
                     foreach ($bids as $bid) 
                     {
                       $vendername='No Vender Found.';
                       $getvender = $newUser->FindCurrentUser('users',$bid->uid);
                       if($getvender)
                       {
                          $vendername = $getvender->username;
                       }
                        ?>
                        <div class="col-md-6">
                          <div class="sidebar_widget">                  
                            <div class="dealer_detail">
                              <p><b>Username:</b> <?php echo $vendername; ?></p>
                              <p><b>Offer Price:</b> <?php echo $bid->bid_amount; ?></p>
                              <a href="#myModal" id="selectoffer" data-toggle="modal" fdi="<?php echo $bid->id; ?>" class="btn btn-xs">Select</a> </div>
                              
                          </div>
                        </div>
                        <?php
                     }
                  }
                  ?>
                  
                  
                </div>
                
              </div>
            </div>
          </div>
         
          
        </div>
   
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3">
        
       <?php
       $csk = $newUser->CheckSelecedOrNot('bid_post',$bookid); 
       if($csk) 
       {
          $venderd = $newUser->FindCurrentUser('users',$csk->uid);
          if($venderd)
          {
            $logos = $newUser->FindByUIDSingle('bussnessdetails',$venderd->id);
            if($logos)
            {
              $logo = '<img src="'.FUTUREIMAGE.$logos->logo.'" alt="image">';
            }
            else
            {
              $logo = '<img src="assets/images/dealer_img.jpg" alt="image">';
            }
            ?>
            <div class="sidebar_widget">
              <div class="widget_heading">
                <h5><i class="fa fa-address-card-o" aria-hidden="true"></i> Dealer Contact </h5>
              </div>
              <div class="dealer_detail"> <?php echo $logo; ?>
                <p><span>Name:</span> <?php echo $venderd->fname.' '.$venderd->surname; ?></p>
                <p><span>Email:</span> <?php echo $venderd->email; ?></p>
                <p><span>Phone:</span> <?php echo $venderd->phone; ?></p>
                <a href="#" class="btn btn-xs">View Profile</a> </div>
            </div>
            <?php
          }
       }
       ?>      
        
        
      </aside>
      <!--/Side-Bar--> 
    </div>
    

    
  </div>
</section>
<style>

.modal-confirm {    
  color: #636363;
  width: 400px;
}
.modal-confirm .modal-content {
  padding: 20px;
  border-radius: 5px;
  border: none;
  text-align: center;
  font-size: 14px;
}
.modal-confirm .modal-header {
  border-bottom: none;   
  position: relative;
}
.modal-confirm h4 {
  text-align: center;
  font-size: 26px;
  margin: 30px 0 -10px;
}
.modal-confirm .close {
  position: absolute;
  top: -5px;
  right: -2px;
}
.modal-confirm .modal-body {
  color: #999;
}
.modal-confirm .modal-footer {
  border: none;
  text-align: center;   
  border-radius: 5px;
  font-size: 13px;
  padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
  color: #999;
}   
.modal-confirm .icon-box {
  width: 80px;
  height: 80px;
  margin: 0 auto;
  border-radius: 50%;
  z-index: 9;
  text-align: center;
  border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
  color: #f15e5e;
  font-size: 46px;
  display: inline-block;
  margin-top: 13px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
  color: #fff;
  border-radius: 4px;
  background: #60c7c1;
  text-decoration: none;
  transition: all 0.4s;
  line-height: normal;
  min-width: 120px;
  border: none;
  min-height: 40px;
  border-radius: 3px;
  margin: 0 5px;
}
.modal-confirm .btn-secondary {
  background: #c1c1c1;
}
.modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
  background: #a8a8a8;
}
.modal-confirm .btn-danger {
  background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
  background: #ee3535;
}
.trigger-btn {
  display: inline-block;
  margin: 100px auto;
}
</style>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header flex-column">
        <center><img src="<?=PROOT?>images/car.png" style="width: 30%;"></center>           
        <h4 class="modal-title w-100">Are you sure?</h4>  
        <input type="hidden" name="selectbidid" id="selectbidid">
      </div>
      <div class="modal-body">
        <p>Select This Offer</p>
        <div id="bid_offer_error"></div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" id="accept-offer">Select</button>
      </div>
    </div>
  </div>
</div>   
<script src="<?=PROOT?>assets/js/interface.js"></script> 
<!--Switcher-->



