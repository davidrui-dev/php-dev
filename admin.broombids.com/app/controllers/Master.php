<?php
	class Master extends Controller{
		public function __construct($controller,$action){
			parent::__construct($controller,$action);
			
			$this->load_model('Common');
		}

		public function GetFaqDetailsAction()
		{
			$id= $_POST['id'];
			$faq = $this->CommonModel->FindByID('faq',$id);
			if($faq)
			{
				?>
				 <input type="hidden" id="faq_ed_id" value="<?php echo $faq->id; ?>">
				<div class="form-group">
                    <label for="modelemail">For Which user</label>
                   <select class="form-control" id="faq_ed_type">
                   	<option value="<?php echo $faq->vtype; ?>"><?php echo $faq->vtype; ?></option>
                   	<option value="Vendor">Vendor</option>
                   	<option value="User">User</option>
                   </select>
                </div>
                <div class="form-group">
                    <label for="modelemail">Question</label>
                    <input type="text" class="form-control" id="faq_ed_question" value="<?php echo $faq->question; ?>">
                </div>
                <div class="form-group">
                    <label for="modelemail">Answer</label>
                    <textarea class="form-control" id="faq_ed_answer" rows="5">
                    	<?php echo $faq->answer; ?>
                    </textarea>
                </div>
                <div class="form-group" id="error_ed_faq"></div>
                <button type="button" class="btn btn-primary" id="faq_edit_save">Save Changes</button>
				<?php
			}
		}

		public function EditFaqDetailsAction()
		{
			$id = $_POST['id'];		

			$fields=[
				"vtype"=>$_POST['type'],
				"question"=>$_POST['question'],
				"answer"=>trim($_POST['answer'])
				];
				$this->CommonModel->CP_Update('faq',$id,$fields);
				echo 'success';
		}

		public function AddAdminUserAction()
		{					
			$fields=[
				"fname"=>$_POST['fname'],
				"email"=>$_POST['email'],
				"phone"=>$_POST['phone'],
				"password"=>md5($_POST['Password']),
				"address"=>$_POST['address'],
				"utype"=>$_POST['utype'],
				"time"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('adminusers',$fields);
			if(!empty($lastid))
			{
				echo 'success';				
			}
			else
			{
				echo 'fail';
			}
		}

		public function SupportReplyAction()
		{
			$fields=[
				"support_id"=>$_POST['replyid'],
				"message"=>$_POST['message'],
				"sendby"=>$_SESSION['adminid'],
				"time"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('support_reply',$fields);
			if($lastid)
			{
				$message = Support_Reply($_POST['message'],$_POST['replyid']);
				echo MailSend(trim($_POST['useremail']),'Broombids-Support Responce',$message);
			}
		}
		public function EditBidPriceAction()
		{
			$id = $_POST['id'];
			$fields = [
						"bid_amount"=>$_POST['am'],
						"updatetime"=>date('Y-m-d H:i:s')
					];
			$this->CommonModel->CP_Update('bid_post',$id,$fields);
		}

		public function EditDateAction()
		{
			$id = $_POST['id'];
			$fields = [
				"fromdate"=>$_POST['fromdate'],
				"todate"=>$_POST['todate'],
				"update_time"=>date('Y-m-d H:i:s')
			];
			$this->CommonModel->CP_Update('post',$id,$fields);
		}

		public function FaqAddAction()
		{
			$fields=[
				"vtype"=>$_POST['whichuser'],
				"question"=>$_POST['qua'],
				"answer"=>$_POST['ans'],
				"time"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('faq',$fields);
			if(!empty($lastid))
			{
				echo 'success';				
			}
			else
			{
				echo 'fail';
			}
		}

		public function UpdateVehicleAction()
		{
			if(isset($_SESSION['edit_vehicle_id']))
			{
				$id = $_SESSION['edit_vehicle_id'];
				$fields=[
				"vtype"=>$_POST['vtype'],
				"cnompany"=>$_POST['vcompany'],
				"vname"=>$_POST['vname'],
				"vfule"=>$_POST['ftype'],
				"vtra"=>$_POST['ftran'],
				"gate"=>$_POST['gates'],
				"passenger_seat"=>$_POST['passenger'],
				"descreiption"=>$_POST['desc']
				];
				$this->CommonModel->CP_Update('vehiclemanage',$id,$fields);
				echo 'success';
			}
			else
			{
				echo 'error';
			}
			
		}

		public function AddCustomerAction()
		{
			$email = $_POST['email'];
			$check = $this->CommonModel->custome_query("SELECT * FROM `users` WHERE `email` = '$email'");
			if($check)
			{
				echo 'Email Address all ready register';
			}
			else
			{
				$username = 'broom.c.'.substr($_POST['fname'],0,3).substr($_POST['phone'],-3);
				$fields=[
					"fname"=>$_POST['fname'],
					"email"=>$_POST['email'],
					"username"=>$username,
					"phone"=>$_POST['phone'],
					"password"=>md5($_POST['Password']),
					"utype"=>'User',
					"time"=>date('Y-m-d H:i:s')
				];
				$lastid = $this->CommonModel->CP_Insert('users',$fields);
				if(!empty($lastid))
				{
					echo 'success';
					$message = Welcome_Mail_Template($username);
					MailSend(trim($_POST['email']),'Welcome to Broombids',$message);				
				}
				else
				{
					echo 'Some Technical issue please try again';
				}
			}
			
		}

		public function check_emailAction()
		{
			$email = $_POST['email'];
			$check = $this->CommonModel->custome_query("SELECT * FROM `users` WHERE `email` = '$email'");
			if($check)
			{
				echo 'Email Address all ready register';
			}
			else
			{
				echo 'success';
			}
			
		}

		public function GetVtypeCompanyAction()
		{
			$id=$_POST['vtypeid'];
			echo '<option value="">Select Vehicle Company</option>';
			$companyids = $this->CommonModel->FindByID('vehicle_type',$id);
			if($companyids)
			{
				if($companyids->company != '')
				{
					$cnames = $this->CommonModel->FindInID('vehicle_company',$companyids->company);
					if($cnames)
					{
						foreach ($cnames as $cname) 
						{
							echo '<option value="'.$cname->id.'">'.$cname->v_company.'</option>';
						}
					}
				}
			}
		}

		public function GetCarNameAction()
		{
			$id = $_POST['vcompanyid'];
			echo '<option value="">Select Vehicle Name</option>';
			$carnames = $this->CommonModel->FindByCID('vehicle_name',$id);
			if($carnames)
			{
				foreach ($carnames as $carname) 
				{
					echo '<option value="'.$carname->id.'">'.$carname->vname.'</option>';
				}
			}
		}

		public function EditAdminUserAction()
		{	
			$id = $_SESSION['edit_id'];				
			$fields=[
				"fname"=>$_POST['fname'],
				"email"=>$_POST['email'],
				"phone"=>$_POST['phone'],
				"address"=>$_POST['address'],
				"utype"=>$_POST['utype']
			];
			$this->CommonModel->CP_Update('adminusers',$id,$fields);
			echo 'success';	
		}

		public function AddLocationAction()
		{
			$fields=[
				"lname"=>$_POST['lname'],
				"time"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('locationsadmin',$fields);
			if(!empty($lastid))
			{
				?>
				<tr id="row_<?php echo $lastid; ?>">
                    <th scope="row"><?php echo $lastid; ?></th>
                    <td><?php echo $_POST['lname']; ?></td>
                    <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Active</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletelocation" fdi="<?php echo $lastid; ?>"><i class="fa fa-trash"></i></a>
                        

                    </td>
                </tr>
				<?php				
			}
			else
			{
				echo 'fail';
			}
		}

		public function AddVehicleTypeAction()
		{
			$fields=[
				"vt_name"=>$_POST['vtype'],
				"time"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('vehicle_type',$fields);
			if(!empty($lastid))
			{
				?>
				<tr id="row_<?php echo $lastid; ?>">
                    <th scope="row"><?php echo $lastid; ?></th>
                    <td><?php echo $_POST['vtype']; ?></td>
                    <td><a href="javascript:void(0);" id="assigncompany" fdi="<?php echo $lastid; ?>" class="btn btn-block btn-round btn-dark" data-toggle="modal" data-target="#Vehiclecompany">View & Edit Company</a></td>
                    <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Active</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="vehicle_type" fdi="<?php echo $lastid; ?>"><i class="fa fa-trash"></i></a>
                        

                    </td>
                </tr>
				<?php				
			}
			else
			{
				echo 'fail';
			}
		}

		public function addVehicleCompanyAction()
		{
			$fields=[
				"v_company"=>$_POST['vc_name'],
				"time"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('vehicle_company',$fields);
			if(!empty($lastid))
			{
				?>
				<tr id="row_<?php echo $lastid; ?>">
                    <th scope="row"><?php echo $lastid; ?></th>
                    <td><?php echo $_POST['vc_name']; ?></td>
                    <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Active</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="vehicle_company" fdi="<?php echo $lastid; ?>"><i class="fa fa-trash"></i></a>
                        

                    </td>
                </tr>
				<?php				
			}
			else
			{
				echo 'fail';
			}
		}

		public function addVehicleNameAction()
		{
			$fields=[
				"cid"=>$_POST['vcom'],
				"vname"=>$_POST['vname'],
				"time"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('vehicle_name',$fields);
			if(!empty($lastid))
			{
				$comname='';
                $cname = $this->CommonModel->FindByID('vehicle_company',$_POST['vcom']);
                if($cname)
                {
                    $comname = $cname->v_company;
                }
				?>
				<tr id="row_<?php echo $lastid; ?>">
                    <th scope="row"><?php echo $lastid; ?></th>
                    <td><?php echo $comname; ?></td>
                    <td><?php echo $_POST['vname']; ?></td>
                    <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Active</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="vehicle_name" fdi="<?php echo $lastid; ?>"><i class="fa fa-trash"></i></a>
                        

                    </td>
                </tr>
				<?php				
			}
			else
			{
				echo 'fail';
			}
		}

		public function addVehicleFuelAction()
		{
			$fields=[
				"fueltype"=>$_POST['vf_type'],
				"time"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('vehicle_fuel_type',$fields);
			if(!empty($lastid))
			{
				?>
				<tr id="row_<?php echo $lastid; ?>">
                    <th scope="row"><?php echo $lastid; ?></th>
                    <td><?php echo $_POST['vf_type']; ?></td>
                    <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Active</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="vehicle_fuel_type" fdi="<?php echo $lastid; ?>"><i class="fa fa-trash"></i></a>
                        

                    </td>
                </tr>
				<?php				
			}
			else
			{
				echo 'fail';
			}
		}

		public function addVehicleTransmissionAction()
		{
			$fields=[
				"v_transmission"=>$_POST['v_transmission'],
				"time"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('vehicle_transmission',$fields);
			if(!empty($lastid))
			{
				?>
				<tr id="row_<?php echo $lastid; ?>">
                    <th scope="row"><?php echo $lastid; ?></th>
                    <td><?php echo $_POST['v_transmission']; ?></td>
                    <td><span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Active</span>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="vehicle_transmission" fdi="<?php echo $lastid; ?>"><i class="fa fa-trash"></i></a>
                        

                    </td>
                </tr>
				<?php				
			}
			else
			{
				echo 'fail';
			}
		}

		public function GetCompayAction()
		{
			$id = $_POST['id'];
			$allcompany = array();
			$assigncompany = array();
			echo '<div id="error"></div>';
			echo '<input type="hidden" value="'.$id.'" id="vehicle_typeid" />';
			echo '<div class="card-body">';		
			
			$vtype = $this->CommonModel->FindByID('vehicle_type',$id);
			if($vtype)
			{
				if($vtype->company == '')
				{
					$companys = $this->CommonModel->FindByAll('vehicle_company');
					if($companys)
					{
						foreach ($companys as $companys) 
						{
							?>
							
							<div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="vcompany[]" id="inlineCheckbox<?php echo $companys->id; ?>" value="<?php echo $companys->id; ?>">
                                <label class="form-check-label" for="inlineCheckbox<?php echo $companys->id; ?>"><?php echo $companys->v_company; ?></label>
                            </div>
                            
							<?php
						}
					}
				}
				else
				{
					$listeds = $this->CommonModel->FindInID('vehicle_company',$vtype->company);
					$notlisteds = $this->CommonModel->FindNotInID('vehicle_company',$vtype->company);
					if($listeds)
					{
						foreach ($listeds as $listed) 
						{
							?>
							<div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="vcompany[]" id="inlineCheckbox<?php echo $listed->id; ?>" value="<?php echo $listed->id; ?>" checked>
                                <label class="form-check-label" for="inlineCheckbox<?php echo $listed->id; ?>"><?php echo $listed->v_company; ?></label>
                            </div>
							<?php
						}
					}

					if($notlisteds)
					{
						foreach ($notlisteds as $notlisted) 
						{
							?>
							<div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="vcompany[]" id="inlineCheckbox<?php echo $notlisted->id; ?>" value="<?php echo $notlisted->id; ?>">
                                <label class="form-check-label" for="inlineCheckbox<?php echo $notlisted->id; ?>"><?php echo $notlisted->v_company; ?></label>
                            </div>
							<?php
						}
					}


				}
			}
			echo '</div>';
		}

		

		public function AddCompanyToTypeAction()
		{
			$id=$_POST['id'];
			$company = implode(",",$_POST['company']);
			$fields=[
				"company"=>$company
			];
			$this->CommonModel->CP_Update('vehicle_type',$id,$fields);
			echo 'success';	

		}



		public function EditCustomerAction()
		{	
			$id = $_SESSION['edit_id'];				
			$fields=[
				"fname"=>$_POST['fname'],
				"email"=>$_POST['email'],
				"phone"=>$_POST['phone']
			];
			$this->CommonModel->CP_Update('users',$id,$fields);
			echo 'success';	
		}
		

		public function VenderRegisterAction()
		{
			//echo '<pre>';
			//print_r($_POST);
			$username = 'broom.v.'.substr($_POST['fname'],0,3).substr($_POST['phone'],-3);
			$fields=[
				"fname"=>$_POST['fname'],
				"surname"=>$_POST['surname'],
				"phone"=>$_POST['phone'],
				"email"=>$_POST['email'],
				"username"=>$username,
				"password"=>md5($_POST['password']),
				"utype"=>'Vender',
				"status"=>2,
				"time"=>date('Y-m-d H:i:s'),
				"updatetime"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('users',$fields);
			//$lastid =2;
			
			if(!empty($lastid))
			{
				$path = 'bussnesslogo/'; // upload directory
				$blogo = $path.'logo'.rand(001,100).$_FILES['blogo']['name'];
				$tmp_new_costsheet = $_FILES['blogo']['tmp_name'];
				move_uploaded_file($tmp_new_costsheet,$blogo);

				$fields_bussness=[
				"uid"=>$lastid,
				"btype"=>$_POST['businesstype'],
				"logo"=>$blogo,
				"bname"=>$_POST['bname'],
				"vatid"=>$_POST['vatid'],
				"vehicletype"=>$_POST['vehicletype'],
				"vehiclecompany"=>$_POST['vehiclecompany'],
				"vehiclename"=>$_POST['vehiclename']
				];
				$this->CommonModel->CP_Insert('bussnessdetails',$fields_bussness);				
				if(isset($_POST['locations']))
				{
					$location_list = explode(",",$_POST['locations']);					
					$location_counts = count($location_list);
					for ($i=0; $i < $location_counts; $i++) 
					{ 						
						$fields_locations=[
							"uid"=>$lastid,
							"location"=>$location_list[$i],
							"address"=>$_POST[$location_list[$i]]
							];
						$this->CommonModel->CP_Insert('locations',$fields_locations);
					}
				}
				echo 'success';
				$message = Welcome_Mail_Template($username);
				MailSend(trim($_POST['email']),'Welcome to Broombids',$message);
			}
			else
			{
				echo 'fail';
			}
		}

		public function UnBlockUserAction()
		{	
			$id = $_POST['id'];				
			$fields=[
				"status"=>1
			];
			$this->CommonModel->CP_Update('users',$id,$fields);
			echo 'success';	
		}

		public function BlockUserAction()
		{	
			$id = $_POST['id'];				
			$fields=[
				"status"=>0
			];
			$this->CommonModel->CP_Update('users',$id,$fields);
			echo 'success';	
		}

		public function DeleteAdminUserAction()
		{
			$id = $_POST['id'];
			$this->CommonModel->CP_Delete('adminusers',$id);
		}

		public function DeleteblogAction()
		{
			$id = $_POST['id'];
			$this->CommonModel->CP_Delete('blog',$id);
		}

		public function DeleteCarAction()
		{
			$id = $_POST['id'];
			$this->CommonModel->CP_Delete('vehiclemanage',$id);
			$this->CommonModel->CP_DeleteByCid('car_gallary',$id);
		}

		public function DeleteRecordAction()
		{
			$id = $_POST['id'];
			$tbl = $_POST['tbl'];
			$this->CommonModel->CP_Delete($tbl,$id);
		}

		public function DeleteBidAction()
		{
			$b_id = $_POST['b_id'];
			$p_id = $_POST['p_id'];
			$this->CommonModel->CP_Delete('post',$p_id);
			$this->CommonModel->CP_Delete('bid_post',$b_id);
		}


		public function DeleteLocationAction()
		{
			$id = $_POST['id'];
			$this->CommonModel->CP_Delete('locationsadmin',$id);
		}

		public function DeleteCustomerAction()
		{
			$id = $_POST['id'];
			$this->CommonModel->CP_Delete('users',$id);
		}

		public function LoginUserAction()
		{
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$row = $this->CommonModel->LoginCheck($email,$password);

			if($row)
			{
				if($row->status == 1)
				{
					$_SESSION['adminid']=$row->id;
					echo 'success';
				}
				else
				{
					$_SESSION['hashid']=$row->hash;
					echo 'block';
				}
			}
			else
			{
				echo 'fail';
			}
		}

		public function CheckEmailAddressAction()
		{
			$email = $_POST['email'];
			$row = $this->CommonModel->FindByEmail($email);
			if($row)
			{
				if($row->status == 1)
				{
					$otp = rand(100000,999999);
					$_SESSION['forgot_otp']=$otp;
					$_SESSION['forgot_email']=$email;
					$message = OTP_Mail_Template($row->username,$otp,'Password Reset');
					echo MailSend(trim($_POST['email']),'Password Reset',$message);
				}
				else
				{
					echo 'block';
				}
			}
			else
			{
				echo 'fail';
			}
		}

		public function CheckotpAction()
		{
			$otp = $_POST['otp'];
			if(isset($_SESSION['forgot_otp']))
			{
				if($_SESSION['forgot_otp'] == $otp)
				{
					echo 'success';
				}
			}
			else
			{
				echo 'Do not try Hacking...';
			}
		}

		public function ChangePasswordAction()
		{
			$password = $_POST['password'];
			if(isset($_SESSION['forgot_email']))
			{
				$email = $_SESSION['forgot_email'];
				$row = $this->CommonModel->FindByEmail($email);
				if($row)
				{
					$fields = [
						"password"=>md5($password)
					];
					$this->CommonModel->CP_Update('users',$row->id,$fields);
					echo 'success';
				}
				else
				{
					echo 'Account Not Found';
				}
			}
			else
			{
				echo 'Fail';
			}
		}

		public function ClientRegisterAction()
		{
			//echo '<pre>';
			//print_r($_POST);
			$username = 'broom.v.'.substr($_POST['fname'],0,3).substr($_POST['phone'],-3);
			$fields=[
				"fname"=>$_POST['fname'],
				"surname"=>$_POST['surname'],
				"phone"=>$_POST['phone'],
				"email"=>$_POST['email'],
				"username"=>$username,
				"password"=>md5($_POST['password']),
				"utype"=>'Vender',
				"time"=>date('Y-m-d H:i:s'),
				"updatetime"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('users',$fields);
			//$lastid =2;
			
			if(!empty($lastid))
			{
				$path = 'uploads/'; // upload directory
				$blogo = $path.'logo'.rand(001,100).$_FILES['blogo']['name'];
				$tmp_new_costsheet = $_FILES['blogo']['tmp_name'];
				move_uploaded_file($tmp_new_costsheet,$blogo);

				$fields_bussness=[
				"uid"=>$lastid,
				"btype"=>$_POST['businesstype'],
				"logo"=>$blogo,
				"bname"=>$_POST['bname'],
				"vatid"=>$_POST['vatid'],
				"vehicletype"=>$_POST['vehicletype'],
				"vehiclecompany"=>$_POST['vehiclecompany'],
				"vehiclename"=>$_POST['vehiclename']
				];
				$this->CommonModel->CP_Insert('bussnessdetails',$fields_bussness);

				if(isset($_POST['locations']))
				{
					$location_list = explode(",",$_POST['locations']);
					$location_counts = count($location_list);
					for ($i=0; $i < $location_counts; $i++) 
					{ 
						$fields_locations=[
							"uid"=>$lastid,
							"location"=>$location_list[$i],
							"address"=>$_POST[$location_list[$i]]
							];
						$this->CommonModel->CP_Insert('locations',$fields_locations);
					}
				}
				echo 'success';
				$message = Welcome_Mail_Template($username);
				MailSend(trim($_POST['email']),'Welcome to Broombids',$message);
			}
			else
			{
				echo 'fail';
			}
		}

		public function AddCarDetailsAction()
		{
			$path = 'CarGallary/'; // upload directory
			$featured = $path.'featured_'.rand(001,100).$_FILES['fimage']['name'];
			$tmp_new_costsheet = $_FILES['fimage']['tmp_name'];
			move_uploaded_file($tmp_new_costsheet,$featured);

			$fields_bussness=[
				"vtype"=>$_POST['vtype'],
				"cnompany"=>$_POST['vcompany'],
				"vname"=>$_POST['vname'],
				"vfule"=>$_POST['ftype'],
				"vtra"=>$_POST['ftran'],
				"gate"=>$_POST['gates'],
				"passenger_seat"=>$_POST['passenger'],
				"img"=>$featured,
				"descreiption"=>$_POST['desc'],
				"time"=>date('Y-m-d H:i:s')
				];
				$lastid = $this->CommonModel->CP_Insert('vehiclemanage',$fields_bussness);
				if(!empty(array_filter($_FILES['pictures']['name']))) 
				{
					foreach ($_FILES['pictures']['tmp_name'] as $key => $value) 
					{
						//$file_tmpname = $_FILES['pictures']['tmp_name'][$key]; 
            			//$file_name = $_FILES['pictures']['name'][$key];

            			$img = $path.'Gallary_'.time().$_FILES['pictures']['name'][$key];
						$tmp_new_gallary = $_FILES['pictures']['tmp_name'][$key];
						move_uploaded_file($tmp_new_gallary,$img);

						$fields_cars=[
							"cid"=>$lastid,
							"img"=>$img
							];
						$this->CommonModel->CP_Insert('car_gallary',$fields_cars);
					}
				}
			echo 'success';
		}

		public function StoreCarIdAction()
		{
			$_SESSION['carid'] = $_POST['id'];
		}

		public function StoreVenderIdAction()
		{
			$_SESSION['venderid'] = $_POST['id'];
		}

		public function UpdateFutureImageAction()
		{
			
			if(isset($_SESSION['edit_vehicle_id']))
			{
				$path = 'CarGallary/'; // upload directory
				$featured = $path.'featured_'.rand(001,100).$_FILES['file']['name'];
				$tmp_new_costsheet = $_FILES['file']['tmp_name'];
				move_uploaded_file($tmp_new_costsheet,$featured);

				$id = $_SESSION['edit_vehicle_id'];
				$fields=[
				"img"=>$featured
				];
				$this->CommonModel->CP_Update('vehiclemanage',$id,$fields);
				echo 'success';
			}
			else
			{
				echo 'error';
			}
		}

		public function UpdateGalleryImageAction()
		{
			$path = 'CarGallary/';
			$id = $_SESSION['edit_vehicle_id'];
			foreach($_FILES['files']['name'] as $key=>$val)
			{
				$featured = $path.'featured_'.rand(001,100).$_FILES['files']['name'][$key];
				$tmp_new_costsheet = $_FILES['files']['tmp_name'][$key];
				move_uploaded_file($tmp_new_costsheet,$featured);

				$fields_cars=[
					"cid"=>$id,
					"img"=>$featured
					];
				$this->CommonModel->CP_Insert('car_gallary',$fields_cars);
			}
			echo 'success';
		}

		public function update_v_typeAction()
		{
			$vt_name = $_POST['vname'];			
			if(isset($_FILES['file']))
			{
				$path = 'images/icons/'; // upload directory
				$blogo = $path.time().'_'.$_FILES['file']['name'];
				$tmp_new_costsheet = $_FILES['file']['tmp_name'];
				move_uploaded_file($tmp_new_costsheet,$blogo);

				$fields=[
					"vt_name"=>$vt_name,
					"img"=>$blogo
					];
				$this->CommonModel->CP_Update('vehicle_type',$_POST['id'],$fields);
			}
			else
			{
				$fields=[
					"vt_name"=>$vt_name
					];
				$this->CommonModel->CP_Update('vehicle_type',$_POST['id'],$fields);
			}
		}

		public function update_v_nameAction()
		{
			$fields=[
				"cid"=>$_POST['cid'],
				"vname"=>$_POST['ed_vname']
				];
			$this->CommonModel->CP_Update('vehicle_name',$_POST['id'],$fields);
		}
		public function update_v_company_nameAction()
		{
			$fields=[
				"v_company"=>$_POST['ed_vname']
				];
			$this->CommonModel->CP_Update('vehicle_company',$_POST['id'],$fields);
		}

		public function update_v_fuil_typeAction()
		{
			$fields=[
				"fueltype"=>$_POST['ed_vname']
				];
			$this->CommonModel->CP_Update('vehicle_fuel_type',$_POST['id'],$fields);
		}

		public function update_v_transmissionAction()
		{
			$fields=[
				"v_transmission"=>$_POST['ed_vname']
				];
			$this->CommonModel->CP_Update('vehicle_transmission',$_POST['id'],$fields);
		}

		public function add_blogAction()
		{
			$path = 'images/blog/'; // upload directory
			$blogo = $path.time().'_'.$_FILES['blog_img']['name'];
			$tmp_new_costsheet = $_FILES['blog_img']['tmp_name'];
			move_uploaded_file($tmp_new_costsheet,$blogo);

			$title = trim($_POST['title']);
			$blog_desc = $_POST['blog_desc'];

			$fields=[
				"title"=>$title,
				"title_url"=>strtolower(str_replace(" ","_",$title)),
				"desci"=>$blog_desc,
				"img"=>$blogo,
				"time"=>date('Y-m-d H:i:s')
				];
				
			$this->CommonModel->CP_Insert('blog',$fields);
			echo 'success';
		}

		public function update_blogAction()
		{
			// print_r($_POST);
			// print_r($_FILES);
			// exit;
			$id = $_POST['id'];
			$title = trim($_POST['title']);
			$blog_desc = $_POST['blog_desc'];
			if($_FILES)
			{
				$path = 'images/blog/'; // upload directory
				$blogo = $path.time().'_'.$_FILES['blog_img']['name'];
				$tmp_new_costsheet = $_FILES['blog_img']['tmp_name'];
				move_uploaded_file($tmp_new_costsheet,$blogo);
				$fields=[
					"title"=>$title,
					"title_url"=>strtolower(str_replace(" ","_",$title)),
					"desci"=>$blog_desc,
					"img"=>$blogo,
					"time"=>date('Y-m-d H:i:s')
					];
					
				$this->CommonModel->CP_Update('blog',$id,$fields);
			}
			else
			{
				$fields=[
				"title"=>$title,
				"title_url"=>strtolower(str_replace(" ","_",$title)),
				"desci"=>$blog_desc,
				"time"=>date('Y-m-d H:i:s')
				];
				
				$this->CommonModel->CP_Update('blog',$id,$fields);
			}			
			echo 'success';
		}
		
		
}
