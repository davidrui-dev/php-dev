<?php
$newUser=new Users();
$vender = $newUser->CountForntUser('users','Vender');
$users = $newUser->CountForntUser('users','User');
$adminusers = $newUser->CountAdminUser('adminusers');
$total = $vender+$users;

$usersper=0;
$venderper=0;
if($users > 0)
{
    $usersper = 100*$users/$total;
}
if($vender > 0)
{
    $venderper = 100*$vender/$total;
}



?>

<div class="row">
    <div class="col-lg-6 col-xxl-3 m-b-30">
        <div class="card card-statistics h-100 mb-0">
            <div class="card-header">
                <h4 class="card-title">Register User Graph</h4>
            </div>
            <div class="card-body pt-0">
                <div class="apexchart-wrapper">
                    <div id="chartContainer" style="height: 280px;"></div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xxl-3 m-b-30">
        <div class="card card-statistics h-100 mb-0 widget-income-list">
            <div class="card-body d-flex align-itemes-center">
                <div class="media align-items-center w-100">
                    <div class="text-left">
                        <h3 class="mb-0"><?php echo $vender+$users; ?></h3>
                        <span>Total Users</span>
                    </div>
                    <div class="img-icon bg-pink ml-auto">
                        <i class="ti ti-user text-white"></i>
                    </div>
                </div>
            </div>
            <div class="card-body d-flex align-itemes-center">
                <div class="media align-items-center w-100">
                    <div class="text-left">
                        <h3 class="mb-0"><?php echo $vender; ?></h3>
                        <span>Vender Users</span>
                    </div>
                    <div class="img-icon bg-primary ml-auto">
                        <i class="ti ti-user text-white"></i>
                    </div>
                </div>
            </div>
            <div class="card-body d-flex align-itemes-center">
                <div class="media align-items-center w-100">
                    <div class="text-left">
                        <h3 class="mb-0"><?php echo $users; ?> </h3>
                        <span>Customer Users</span>
                    </div>
                    <div class="img-icon bg-orange ml-auto">
                        <i class="ti ti-user text-white"></i>
                    </div>
                </div>
            </div>
            <div class="card-body d-flex align-itemes-center">
                <div class="media align-items-center w-100">
                    <div class="text-left">
                        <h3 class="mb-0"><?php echo $adminusers; ?> </h3>
                        <span>Admin Users</span>
                    </div>
                    <div class="img-icon bg-info ml-auto">
                        <i class="ti ti-user text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>

var venderuser = <?php echo $venderper; ?>;
var cususer = <?php echo $usersper; ?>;
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "",
		horizontalAlign: "left"
	},

	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,

		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",		
		dataPoints: [
			{ y: venderuser, label: "Vender", color:"#32c2d6"},
			{ y: cususer, label: "Customer", color:"#2c8fd6" }
		]
	}]
});


chart.render();


</script>