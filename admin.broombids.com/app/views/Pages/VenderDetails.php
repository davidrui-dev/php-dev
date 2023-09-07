<?php         
$id = $_SESSION['venderid']; 
$newUser=new Users();  
$user = $newUser->FindByIDSigle('users',$id); 
if(!$user)
{   
    ?>
    <script type="text/javascript">
        loadController('NotFound'); 
    </script>
    <?php
    exit;
}
else
{
    $buss = $newUser->FindByUIDSigle('bussnessdetails',$id);
}           	
               

?>
<div class="row">
	<div class="col-xxl-8 mb-30">
	 <a href="javascript:void(0);" class="btn btn-round btn-outline-info" id="getcontroller" controller="VenderUserList">Back To Vender List</a>
	</div>

    <div class="col-xl-6">
        <div class="card card-statistics widget-social-box2 px-2">
            <div class="card-body pb-4 pt-5">
                <div class="text-center">
                    <div class="pt-1 bg-img m-auto"><img class="img-fluid" src="assets/img/avtar/02.jpg" alt="socialwidget-img"></div>
                    <div class="mt-3 employees-contant-inner">
                        <h4 class="mb-1"><?php echo $user->fname.' '.$user->surname; ?></h4>
                        <p class="mb-0 text-muted"><a href="javascript:void(0)"><?php echo $user->email; ?></a></p>
                        <div class="ml-0 mt-3">
                            <a href="javascript:void(0)" class="badge badge-pill badge-light mb-2 mb-sm-0 mx-1 mx-sm-0 mb-sm-0 px-3 py-2"><?php echo $user->username; ?></a>                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card card-statistics widget-social-box10">
            <div class="card-body p-0">
                <div class="media align-items-center border-bottom p-3">                    
                    <div class="media-body">
                        <h4 class="mb-0">Bussness Details</h4>
                    </div>
                </div>

                <ul class="nav d-block">
                    <li class="nav-item">
                        <a class="media nav-link align-items-center justify-content-between" href="javascript:void(0)">
                            <h5 class="mb-0">Bussness Type</h5>
                            <span class="badge badge-pill badge-dark px-3 py-2"><?php echo $buss->btype; ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="media nav-link align-items-center justify-content-between" href="javascript:void(0)">
                            <h5 class="mb-0">Bussness Name</h5>
                            <span class="badge badge-pill badge-dark px-3 py-2"><?php echo $buss->bname; ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="media nav-link align-items-center justify-content-between" href="javascript:void(0)">
                            <h5 class="mb-0">Bussness Email</h5>
                            <span class="badge badge-pill badge-dark px-3 py-2"><?php echo $user->email; ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="media nav-link align-items-center justify-content-between" href="javascript:void(0)">
                            <h5 class="mb-0">Bussness Phone</h5>
                            <span class="badge badge-pill badge-dark px-3 py-2"><?php echo $user->phone; ?></span>
                        </a>
                    </li>                    
                    
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xxl-4 mb-30">
                                <div class="card card-statistics h-100 mb-0 car-dealer-contants">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <h4 class="card-title">Leads By Make Model</h4>
                                        </div>
                                    </div>
                                    <div class="card-body car-dealer-contants-text">
                                        <div class="pb-3 pt-0">
                                            <p class="text-muted">Honda <span class="float-right font-weight-bold">74%</span></p>
                                            <div class="progress progress-sm m-b-0" style="height: 4px;">
                                                <div role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;" class="progress-bar bg-primary"></div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <p class="text-muted">Toyota <span class="float-right font-weight-bold">69%</span></p>
                                            <div class="progress progress-sm m-b-0" style="height: 4px;">
                                                <div role="progressbar" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100" style="width: 69%;" class="progress-bar bg-info"></div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <p class="text-muted">Chevrolet <span class="float-right font-weight-bold">59%</span></p>
                                            <div class="progress progress-sm m-b-0" style="height: 4px;">
                                                <div role="progressbar" aria-valuenow="59" aria-valuemin="0" aria-valuemax="100" style="width: 59%;" class="progress-bar bg-success"></div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <p class="text-muted">Audi <span class="float-right font-weight-bold">52%</span></p>
                                            <div class="progress progress-sm m-b-0" style="height: 4px;">
                                                <div role="progressbar" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100" style="width: 52%;" class="progress-bar bg-orange"></div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <p class="text-muted">Mercedes <span class="float-right font-weight-bold">46%</span></p>
                                            <div class="progress progress-sm m-b-0" style="height: 4px;">
                                                <div role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width: 46%;" class="progress-bar bg-warning"></div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <p class="text-muted">BMW <span class="float-right font-weight-bold">56%</span></p>
                                            <div class="progress progress-sm m-b-0" style="height: 4px;">
                                                <div role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width: 56%;" class="progress-bar bg-pink"></div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <p class="text-muted">Chevrolet <span class="float-right font-weight-bold">59%</span></p>
                                            <div class="progress progress-sm m-b-0" style="height: 4px;">
                                                <div role="progressbar" aria-valuenow="59" aria-valuemin="0" aria-valuemax="100" style="width: 59%;" class="progress-bar bg-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
	
</div>