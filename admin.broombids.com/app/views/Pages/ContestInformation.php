
<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">All Contest Information</h4>
            </div>
        </div>
        <?php
            $total_price = 0;
            $total_days = 0;
            $total_count = 0;
            $newUser=new Users();
            $Posts = $newUser->FindAllContest();
            $total_count = count($Posts);
            if($Posts)
            {
                $n=0;
                foreach ($Posts as $Post) 
                {
                    $n++;
                    $vname='User Not Available';
                    $vemail='User Not Available';
                    $cname='User Not Available';
                    $cemail='User Not Available';
                    $ctype='';
                    $carname='';
                    $lname='';
                    $user = $newUser->FindByIDSigle('users',$Post->uid);
                    $requirement = $newUser->FindByIDSigle('post',$Post->pid);
                    $client = $newUser->FindByIDSigle('users',$requirement->uid);
                    $startDate = new DateTime($requirement->fromdate);
                    $endDate = new DateTime($requirement->todate);
                    
                    $interval = $startDate->diff($endDate);
                    
                    $days = $interval->days;
                    $days = $days + 1;
                    $total_days = $total_days + $days;
                    $total_price = $total_price + $days * $Post->bid_amount;
                }
            } 
        ?>
        <div class="col-lg-12" style="width: 100%">
            <img src="<?=PROOT?>CarGallary/featured_99LAND ROVER  Range Rover.jpeg" style="max-width: 500px; min-width:200px;">
            <!-- <img src="<?=PROOT?>CarGallary/featured_62Land_Rover_Discovery SPORT.jpg" style="width: 300px;"> -->
            <div class="card card-statistics h-100 mb-0 widget-income-list" style="float: right;">
                <div class="card-body d-flex align-itemes-center">
                    <div class="media align-items-center w-100">
                        <div class="text-left">
                            <h3 class="mb-0"><?php echo $total_count; ?></h3>
                            <span>Total Contests</span>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex align-itemes-center">
                    <div class="media align-items-center w-100">
                        <div class="text-left">
                            <h3 class="mb-0"><?php echo '€ '.round($total_price/$total_days,2)." / ".round($total_days/$total_count,1)." days"; ?></h3>
                            <span>Average Daily price / Average Days</span>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex align-itemes-center">
                    <div class="media align-items-center w-100">
                        <div class="text-left">
                            <h3 class="mb-0"><?php echo '€ '.$total_price." / € ".$total_price/10; ?> </h3>
                            <span>Total Price / Total 10% of payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <table class="table table-bordered mb-0">
                    
                    <thead>
                        
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vendors Details</th>
                            <th scope="col">Customers Details</th>
                            <th scope="col">From</th>
                            
                            <th scope="col">Daily Price</th>
                            <th scope="col">Total Days</th>
                            <th scope="col">Total Price / 10% of Payment</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        if($Posts)
                        {
                            $n=0;
                            foreach ($Posts as $Post) 
                            {
                                $n++;
                                $vname='User Not Available';
                                $vemail='User Not Available';
                                $cname='User Not Available';
                                $cemail='User Not Available';
                                $ctype='';
                                $carname='';
                                $lname='';
                                $user = $newUser->FindByIDSigle('users',$Post->uid);
                                $requirement = $newUser->FindByIDSigle('post',$Post->pid);
                                $client = $newUser->FindByIDSigle('users',$requirement->uid);
                                if($user)
                                {
                                    $vname = $user->fname;
                                    $vemail = $user->email;
                                }
                                if($client)
                                {
                                    $cname = $client->fname;
                                    $cemail = $client->email;
                                }
                                // $vehicle_type = $newUser->FindByIDSigle('vehicle_type',$Post->ctype);
                                // if($vehicle_type)
                                // {
                                //     $ctype = $vehicle_type->vt_name;
                                // }
                                // // $vehicle_name = $newUser->FindByIDSigle('vehicle_name',$Post->carname);
                                // if($vehicle_name)
                                // {
                                //     $carname = $vehicle_name->vname;
                                // }
                                // // $locationsadmin = $newUser->FindByIDSigle('locationsadmin',$Post->location);
                                // if($locationsadmin)
                                // {
                                //     $lname = $locationsadmin->lname;
                                // }
                                ?>
                                <tr id="row_<?php echo $Post->id; ?>">
                                    <th scope="row">#<?php echo $requirement->id; ?></th>
                                    <td><b>Name : </b><?php echo $vname; ?><br><b>Email : </b><?php echo $vemail; ?></td>
                                    <td><b>Name : </b><?php echo $cname; ?><br><b>Email : </b><?php echo $cemail; ?></td>
                                    <!-- <td><?php echo $ctype.' - ( '.$carname.' )'; ?></td> -->
                                    
                                    <td><?php 
                                        // echo date("d-m-Y", strtotime($requirement->fromdate)); 
                                        echo '<input type="text" value="'.date("d-m-Y", strtotime($requirement->fromdate)).'" style="width:100px;" disabled><input type="date" class="bid_from" id="from_'.$requirement->id.'" value="'.date("Y-m-d", strtotime($requirement->fromdate)).'"  onchange="handleDateChange(1 , '.$requirement->id.')" style="width:25px;">'; 
                                    ?></td>
                                
                                   
                                        <td>
    <?php 
        //echo $Post->bid_amount; 
        echo '<input type="text" class="bid_amount" id="bid_'.$Post->id.'" value="'.$Post->bid_amount.'" onkeydown="handleKeyDown(event, '.$Post->id.')" style="width: 50px; text-align: right;" oninput="validateNumberInput(this)" readonly>';
    ?> €
</td>

                                    <td><?php 
                                        $startDate = new DateTime($requirement->fromdate);
                                        $endDate = new DateTime($requirement->todate);
                                        
                                        $interval = $startDate->diff($endDate);
                                        
                                        $days = $interval->days;
                                        $days = $days + 1;

                                        echo $days;
                                    ?> days.</td>
                                    <td>
                                        <?php
                                        $TotalCost = $Post->bid_amount * $days;
                                        $price = $TotalCost / 10;
                                        echo '€ '.$TotalCost.' / € '.$price;
                                        // if($Post->status == 1)
                                        // {
                                        //     echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-dark">New Post</span>';
                                        // }
                                        // else
                                        // {
                                        //     echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-warning">De-Active</span>';
                                        // }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletebid" tbl="<?php echo $Post->id; ?>" fdi="<?php echo $requirement->id; ?>"><i class="fa fa-trash"></i></a>
                                        

                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>                      
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
  function handleKeyDown(event, inputId) {
    console.log('Key pressed:', event.key);
    console.log('Input ID:', inputId);
    var item = document.getElementById('bid_'+ inputId);
    console.log(item.value);
    // Perform actions based on the input and key event
    // For example, you can check the key code and perform specific actions
    if (event.keyCode === 13) {
     $.ajax({
	        type: 'POST',
	        url: path + 'Master/EditBidPrice',
	        data: {"id":inputId,"am":item.value},
	        beforeSend: function () {
	        	      
	        },
	        success: function (responce) {
	        	var controller = 'ContestInformation';
                $("#pagecontain").html(Loaderpage());
                $.ajax({
                        type: 'POST',
                        url: path + 'Pages/'+controller,
                        beforeSend: function () {      
                        
                        },
                        success: function (responce) {
                            $("#pagecontain").html(responce);
                        }
                    });		            
	        }
	    });
    }
  }

  function validateNumberInput(input) {
    input.value = input.value.replace(/\D/g, '');
    }

  function handleDateChange(flag ,inputId) {
    var item,fromdate,todate;
    
    fromdate = document.getElementById('from_'+ inputId);
    todate = document.getElementById('to_'+ inputId);
    if (todate.value < fromdate.value)
    {
        if(flag == 1)
            todate.value = fromdate.value;
        else
            fromdate.value = todate.value;
    }
    console.log(fromdate.value);
    console.log(todate.value);

    // if (todate.value > fromdate.value) {
     $.ajax({
	        type: 'POST',
	        url: path + 'Master/EditDate',
	        data: {"id":inputId,"fromdate":fromdate.value , "todate":todate.value},
	        beforeSend: function () {
	        	      
	        },
	        success: function (responce) {
	        	var controller = 'ContestInformation';
                $("#pagecontain").html(Loaderpage());
                $.ajax({
                        type: 'POST',
                        url: path + 'Pages/'+controller,
                        beforeSend: function () {      
                        
                        },
                        success: function (responce) {
                            $("#pagecontain").html(responce);
                        }
                    });		            
	        }
	    });
    //    }
    //    else
    //    {

    //    }
 }
</script>

