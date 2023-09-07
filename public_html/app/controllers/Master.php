<?php
	class Master extends Controller{
		public function __construct($controller,$action){
			parent::__construct($controller,$action);
			
			$this->load_model('Common');
		}

		public function DiscardOfferAction()
		{
			$id = $_POST['id'];
			$fields=[
				"updatetime"=>date('Y-m-d H:i:s'),
				"discard"=>1,
				"status"=>2
			];
			$this->CommonModel->CP_Update('bid_post',$id,$fields);
		}

		public function CheckTestAction()
		{
			echo '<pre>';
			print_r($_POST);
		}

		public function PaymentSettlementAction()
		{
			$bid = $_POST['bid'];
			$payid = $_POST['payid'];
			$payment_mode = $_POST['payment_mode'];
			$fields=[
				"updatetime"=>date('Y-m-d H:i:s'),
				"settlement"=>2,
				"payment_mode"=>$payment_mode,
				"transaction_id"=>$payid,
				"status"=>3
			];
			$this->CommonModel->CP_Update('bid_post',$bid,$fields);
		}

		public function Edit_VendorAction()
		{
			
			$fields=[
				"fname"=>$_POST['ed_fname'],
				"surname"=>$_POST['ed_surname'],
				"country"=>$_POST['ed_country'],
				"phone"=>$_POST['ed_phone'],
				"email"=>$_POST['ed_email'],
				"updatetime"=>date('Y-m-d H:i:s')
			];
			$this->CommonModel->CP_Update('users',$_SESSION['master_id'],$fields);
			$fields_bus=[
				"btype"=>$_POST['ed_btype'],
				"bname"=>$_POST['ed_bname'],
				"vatid"=>$_POST['ed_vat'],
				"vehicletype"=>implode(",",$_POST['vtype']),
				"vehiclecompany"=>implode(",",$_POST['cnames']),
				"vehiclename"=>implode(",",$_POST['cars'])
			];
			if(!empty($_POST['bussness_id']))
			{
				$this->CommonModel->CP_Update('bussnessdetails',$_POST['bussness_id'],$fields_bus);
			}
			if(isset($_POST['ed_locations']))
			{
				$this->CommonModel->DeleteByUid('locations',$_SESSION['master_id']);				
					$location_list = $_POST['ed_locations'];
					$location_counts = count($location_list);
					for ($i=0; $i < $location_counts; $i++) 
					{ 
						$fields_locations=[
							"uid"=>$_SESSION['master_id'],
							"location"=>$location_list[$i],
							"address"=>$_POST['ed_'.$location_list[$i]]
							];
						$this->CommonModel->CP_Insert('locations',$fields_locations);
					}
			}
			Router::Redirect('dashboard?success');
			
			
			
		}

		public function ChengeBussnessLogoAction()
		{
			//echo $_POST['bid'];
			$path = 'uploads/'; // upload directory
			 $blogo = $path.$_POST['blogo'];
			// $tmp_new_costsheet = $_FILES['blogo']['tmp_name'];
			// move_uploaded_file($tmp_new_costsheet,$blogo);
			$fields=[
				"logo"=>$blogo
			];
			$this->CommonModel->CP_Update('bussnessdetails',$_POST['bid'],$fields);
			echo $blogo;
		}

		public function RegisterUserAction()
		{
			//$row = $this->CommonModel->UD_FindByID('users',$_SESSION['master_id']);
			$emailcheck = $this->CommonModel->FindByEmail(trim($_POST['email']));
			$phonecheck = $this->CommonModel->FindByPhone(trim($_POST['phone']));
			if($emailcheck)
			{
				echo 'Email Address is Already Registered.';
				return false;
			}
			if($phonecheck)
			{
				echo 'Phone Number is Already Registered.';
				return false;
			}
			$username = 'broom'.substr($_POST['phone'],-3);
			$hash = md5($_POST['email'].$_POST['phone']);
			$link = 'http://broombids.com/Verify?key='.$hash;
			$fields=[
				"fname"=>$_POST['fname'],
				"surname"=>$_POST['sname'],
				"country"=>$_POST['country'],
				"phone"=>$_POST['phone'],
				"email"=>$_POST['email'],
				"username"=>$username,
				"password"=>md5($_POST['password']),
				"utype"=>'User',
				"status"=>2,
				"hash"=>$hash,
				"time"=>date('Y-m-d H:i:s'),
				"updatetime"=>date('Y-m-d H:i:s')
			];
			$lastid = $this->CommonModel->CP_Insert('users',$fields);
			if(!empty($lastid))
			{
				echo 'success';
				if(MAIL_SEND_STATUS)
				{
					$mailname = $_POST['fname'].' '.$_POST['sname'];
					$message = Welecome_Mail_Vendor_Customer($mailname);
					//$message = Mail_Verification_Template($mailname,$link, 'Welcome To Broombids');
					//MailSend(trim($_POST['email']),'Welcome To Broombids',$message);
					MailSend(trim($_POST['email']),'Welcome To Broombids',$message);
				}				
				
			}
			else
			{
				echo 'fail';
			}
		}

		public function SupportTicketAction()
		{
			$subject = $_POST['subject'];
			$query = $_POST['message'];
			if(isset($_SESSION['master_id']))
			{
				$user = $this->CommonModel->FindById('users',$_SESSION['master_id']);
				if($user)
				{
					$email = $user->email;
					$uid=$user->id;
					$fields=[
						"uid"=>$uid,
						"email"=>$email,
						"subject"=>$subject,
						"message"=>$query,
						"time"=>date('Y-m-d H:i:s')
					];
					$supportid = $this->CommonModel->CP_Insert('support',$fields);
					if($supportid)
					{						
						$message = Support_User($supportid,$query);
						echo MailSend(trim($email),'Broombids - Support Tickets',$message);
					}
					else
					{
						echo '<b>Fail! </b>Please Try Again.';
					}
				}
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
		
		public function DeleteAllBidPriceAction()
		{
			// $id = $_POST['id'];
			$id = $_POST['id'];
			// if($_POST['ctype'])
			// 	$fields = [
			// 				"bid_amount"=>$_POST['am'],
			// 				"car_type"=>$_POST['ctype'],
			// 				"car_name"=>$_POST['cname'],
			// 				"updatetime"=>date('Y-m-d H:i:s')
			// 			];
			// else
			// {
			// 	$fields = [
			// 		"bid_amount"=>$_POST['am'],
			// 		"updatetime"=>date('Y-m-d H:i:s')
			// 	];
			// }
			$this->CommonModel->CP_Delete_All($id);
			// $carimage = $this->CommonModel->FindFuterImage('vehiclemanage', $_POST['cname']);
			// if($carimage)
			// 	echo FUTUREIMAGE.$carimage->img;
			
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
					$_SESSION['master_id']=$row->id;
					echo 'success';
				}
				else
				{
					$_SESSION['hash_id']=$row->hash;
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
			$email = trim($_POST['email']);
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
			//exit;
			$username = 'broom.v.'.substr($_POST['fname'],0,3).substr($_POST['phone'],-3);
			$fields=[
				"fname"=>$_POST['fname'],
				"surname"=>$_POST['Surname'],
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
				$path = 'uploads/'; // upload directory
				$blogo = $path.$_POST['blogo'];
				// $tmp_new_costsheet = $_FILES['blogo']['tmp_name'];
				// move_uploaded_file($tmp_new_costsheet,$blogo);

				$fields_bussness=[
				"uid"=>$lastid,
				"btype"=>$_POST['businesstype'],
				"logo"=>$blogo,
				"bname"=>$_POST['bname'],
				"vatid"=>$_POST['vatid'],
				"vehicletype"=>implode(',', $_POST['vtype']),
				"vehiclecompany"=>implode(',', $_POST['cnames']),
				"vehiclename"=>implode(',', $_POST['cars'])
				];
				$this->CommonModel->CP_Insert('bussnessdetails',$fields_bussness);

				if(isset($_POST['locations']))
				{
					$location_list = $_POST['locations'];
					$location_counts = count($location_list);
					for ($i=0; $i < $location_counts; $i++) 
					{ 
						$fields_locations=[
							"uid"=>$lastid,
							"location"=>str_replace('-', ' ', $location_list[$i]),
							"address"=>$_POST[$location_list[$i]]
							];
						$this->CommonModel->CP_Insert('locations',$fields_locations);
					}
				}
				$mailname = $_POST['fname'].' '.$_POST['Surname'];
				$message = Welecome_Mail_Vendor($mailname);


				// $to = trim($_POST['email']);
				// $subject = "Welcome to Broombids";
				// $message = "This is a sample email with a file attachment.";
				
				// $mailSend = new MailSend();
				// $mailSend->setTo($to);
				// $mailSend->setSubject($subject);
				// $mailSend->setBody($message);
				// $mailSend->addAttachment($file_path);


				// if ($mailSend->send()) {
				// 	echo "Email sent successfully.";
				// } else {
				// 	echo "Failed to send email.";
				// }
				MailSend_file(trim($_POST['email']),'Welcome to Broombids',$message);
				Router::Redirect('register?success');
			}
			else
			{
				Router::Redirect('register?Fail');
			}
		}

		public function GetCarNameAction()
		{
			echo '<option value="">Select Car Name </option>';
			$id = $_POST['id'];
			$carids = $this->CommonModel->GetCarIds('vehiclemanage',$id);
			if($carids)
			{
				foreach ($carids as $carid) 
				{
					$car = $this->CommonModel->FindById('vehicle_name',$carid->vname);
					if($car)
					{
						echo '<option value="'.$car->id.'">'.$car->vname.'</option>';
					}
				}
			}
		}

		public function PostRequirementAction()
		{			
			if(isset($_SESSION['master_id']))
			{
				$fields=[
					"uid"=>$_SESSION['master_id'],
					"title"=>$_POST['ptitle'],
					"ctype"=>$_POST['pcartype'],
					"location"=>$_POST['plocation'],
					"fromdate"=>date("Y-m-d", strtotime($_POST['fromdate'])),
					"todate"=>date("Y-m-d", strtotime($_POST['todate'])),
					"budget_min"=>$_POST['rangrfrom'],
					"budget_max"=>$_POST['rangrto'],
					"remark"=>$_POST['remark'],
					"time"=>date('Y-m-d H:i:s'),
					"update_time"=>date('Y-m-d H:i:s')
				];
				$lastid = $this->CommonModel->CP_Insert('post',$fields);
				if($lastid)
				{
					$users = $this->CommonModel->FindById('users',$_SESSION['master_id']);
					if($users)
					{
						if(MAIL_SEND_STATUS)
						{
							$title = trim($_POST['ptitle']);
							$jdate = date("d-m-Y", strtotime($_POST['fromdate'])).'-'.date("d-m-Y", strtotime($_POST['todate']));
							$budget = '€ '.$_POST['rangrfrom'].' - € '.$_POST['rangrto'];
							
							$message = Add_New_requirest($title,$jdate,$budget);
							MailSend(trim($users->email),'Contest has been posted successfully',$message);
						}
					}
				}
				echo 'success' . $fields['fromdate'] . ' - ' . $fields['todate'];
			}
			else
			{
				//$_SESSION['tmp_post']=$_POST;
				echo 'Login Required';
			}
		}

		public function EditProfileAction()
		{
			if(isset($_SESSION['master_id']))
			{
				$fields=[
					"fname"=>$_POST['ed_fname'],
					"email"=>$_POST['ed_email'],
					"phone"=>$_POST['ed_phone'],
					"updatetime"=>date('Y-m-d H:i:s')
				];
				$this->CommonModel->CP_Update('users',$_SESSION['master_id'],$fields);
				echo 'success';
			}
		}

		public function UpdatePasswordAction()
		{
			if(isset($_SESSION['master_id']))
			{
				$checkpass = $this->CommonModel->CheckOldPassword($_SESSION['master_id'],$_POST['old_password']);
				if($checkpass)
				{
					$fields=[
					"password"=>md5($_POST['new_password']),
					"updatetime"=>date('Y-m-d H:i:s')
					];
					$this->CommonModel->CP_Update('users',$_SESSION['master_id'],$fields);
					echo 'success';
				}
				else
				{
					echo 'Your Old Password Not Match.';
				}
				
			}
		}

		public function BidPostAction()
		{	
				
			if(isset($_SESSION['master_id']))
			{
				$cskbid = $this->CommonModel->CheckAlreadyBid($_SESSION['master_id'],$_POST['pid']);
				if(!$cskbid)
				{
					$fields=[
					"uid"=>$_SESSION['master_id'],
					"pid"=>$_POST['pid'],
					"car_type"=>$_POST['ctype'],
					"car_name"=>$_POST['car'],
					"bid_amount"=>$_POST['bid_amount'],
					"time"=>date('Y-m-d H:i:s')
					];
					$bidid = $this->CommonModel->CP_Insert('bid_post',$fields);
					foreach ($_POST['obj'] as $key => $value) {
						if($value != '1' && $value !='0')
						{
						$fields_security=[
							"bid"=>$bidid,
							"uid"=>$_SESSION['master_id'],
							"security"=>$key,
							"status"=>$value,
							"time"=>date('Y-m-d H:i:s')
							];
							$this->CommonModel->CP_Insert('customer_security',$fields_security);
						}
					}

					$postget = $this->CommonModel->FindById('post',$_POST['pid']);
					if($postget)
					{
							$users = $this->CommonModel->FindById('users',$postget->uid);
							if($users)
							{
								if(MAIL_SEND_STATUS)
								{
									$title = trim($_POST['posttitle']);
									$vtype = trim($_POST['selectedvtype']);
									$car = trim($_POST['selectedcarname']);
									$price = '€ '.trim($_POST['bid_amount']);
									
									$message = Recive_New_Offer($title,$vtype,$car,$price);
									MailSend(trim($users->email),'New Offer - Broombids',$message);
								}
							}
					}
					
					echo 'success';
				}
				else
				{
					echo 'You are  already give offer';
				}
				
			}
			else
			{
				//$_SESSION['tmp_post']=$_POST;
				echo 'Login Required';
			}
		}

		public function AwardPostAction()
		{
			if(isset($_SESSION['master_id']))
			{
				$bid = $_POST['bid'];
				$uid = $_SESSION['master_id'];
				$user = $this->CommonModel->FindById('users',$uid);				
				$cskwin = $this->CommonModel->FindById('bid_post',$bid);
				if($cskwin)
				{
					$cskselect = $this->CommonModel->CheckAlreadyselectOrNot($cskwin->pid);
					if(!$cskselect)
					{
						$fields=[
						"win_uid"=>1,
						"updatetime"=>date('Y-m-d H:i:s'),
						"status"=>4
						];
						$this->CommonModel->CP_Update('bid_post',$bid,$fields);

						$update_post=[
						"status"=>2,
						"update_time"=>date('Y-m-d H:i:s')
						];
						$this->CommonModel->CP_Update('post',$cskwin->pid,$update_post);
						

						$post = $this->CommonModel->FindById('post',$cskwin->pid);
						$cartypes = $this->CommonModel->FindById('vehicle_type',$post->ctype);
						//$carnames = $this->CommonModel->FindById('vehicle_name',$post->carname);
						$locations = $this->CommonModel->FindById('locationsadmin',$post->location);
						$venders = $this->CommonModel->FindById('users',$cskwin->uid);
						$cartype='';
						$carname='';
						$location='';
						$fdate='';
						$todate='';
						if($post)
						{
							$fdate=date("d-m-Y", strtotime($post->fromdate));
							$todate=date("d-m-Y", strtotime($post->todate));
							$cartype=$cartypes->vt_name;
							//$carname=$carnames->vname;
							$location=$locations->lname;
						}

						
						if($venders)
						{
							$message_vender = Vender_Offer_Select_Template($cskwin->pid);
							MailSend(trim($venders->email),'Broombids - Offer Selected',$message_vender);
						}
						if($user)
						{
							$message_user = User_Offer_Select_Template();
							MailSend(trim($user->email),'Broombids - Offer Selected',$message_user);
						}
						
						
						$myid = $cskwin->uid;
						$chat = $this->CommonModel->CheckChet('user_connection',$myid,$uid);
						if($chat)
						{
							echo 'Offer ';;
						}
						else
						{
							$fields=[
								"myid"=>$myid,
								"uid"=>$uid,
								"time"=>date('Y-m-d H:i:s'),
								"updatetime"=>date('Y-m-d H:i:s')
							];
							$lastid = $this->CommonModel->CP_Insert('user_connection',$fields);
							if($lastid)
							{
								// echo base64_encode($lastid);
								echo 'Offer ';
							}
							else
							{
								echo 'Offer Not Found.';
							}
						}

						
						echo 'success';
						
					}
					else
					{
						echo 'You are already give Offer.';
					}
					
				}
				else
				{
					echo 'Offer Not Found.';
				}
				
			}
			else
			{
				echo 'Login Required';
			}
		}

		public function GetCompanyNameAction()
		{
			$vehicleids = implode(',', $_POST['vtype']);
			$companysids = $this->CommonModel->GetRecordInID('vehicle_type',$vehicleids);
			$companyid_final='';
			if($companysids)
			{
				foreach ($companysids as $companysid) 
				{
					if($companysid->company)
					{
						$companyid_final.=','.$companysid->company;
					}
					
				}
			}
			$companyid_final = ltrim($companyid_final,',');
			$array_com = array_unique(explode(',', $companyid_final));
			$final_cids = implode(',', $array_com);
			if(!empty($companyid_final))
			{
				$companynames = $this->CommonModel->GetRecordInID('vehicle_company',$final_cids);
				if($companynames)
				{
					foreach ($companynames as $companynames) 
					{
						?>
						
                        <div class="col-md-2"> 
	                        <div class="condition"><input name="cnames[]" class="styled-checkbox" id="<?php echo $companynames->v_company; ?>" type="checkbox" value="<?php echo $companynames->id; ?>"> <label for="<?php echo $companynames->v_company; ?>"></label> <span><?php echo $companynames->v_company; ?></span></div>
	                    </div>
						<?php
					}
				}
			}


		}

		public function GetModelNameAction()
		{
			if($_POST['cnames'])
			{
				$carids = implode(',', $_POST['cnames']);
				$vehiclenames = $this->CommonModel->GetRecordInCID('vehicle_name',$carids);
				if($vehiclenames)
				{
					foreach ($vehiclenames as $vehiclename) 
					{
						?>
						
	                    <div class="col-md-2"> 
	                        <div class="condition"><input name="cars[]" class="styled-checkbox" id="<?php echo $vehiclename->vname; ?>" type="checkbox" value="<?php echo $vehiclename->id; ?>"> <label for="<?php echo $vehiclename->vname; ?>"></label> <span><?php echo $vehiclename->vname; ?></span></div>
	                    </div>
						<?php
					}
				}
			}
			
		}

		public function DeleteAccountAction()
		{
			if(isset($_SESSION['master_id']))
			{
				$user = $this->CommonModel->FindById('users',$_SESSION['master_id']);
				if($user)
				{
					$fields=[
						"uid"=>$user->id,
						"fname"=>$user->fname,
						"surname"=>$user->surname,
						"email"=>$user->email,
						"username"=>$user->username,
						"phone"=>$user->phone,
						"password"=>$user->password,
						"utype"=>$user->utype,
						"status"=>$user->status,
						"hash"=>$user->hash,
						"time"=>date('Y-m-d H:i:s')
					];
					$this->CommonModel->CP_Insert('deleted_users',$fields);
					$this->CommonModel->CP_Delete('users',$user->id);
					echo 'success';
				}
				else
				{
					echo '<p style="color:red;">User Not Found.</p>';
				}	
			}
			else
			{
				echo '<p style="color:red;">Acoount Not Found.</p>';
			}
		}

		public function NextPostAction()
		{
			$lastid = $_POST['lastid'];
			$posts = $this->CommonModel->GetPosts_Next('post',$lastid,10);
			if($posts)
			{
				$n=0;
				foreach ($posts as $post) 
				{					
					$n++;
                    $lastid = $post->id;
                    
                    $img=PROOT.'images/dummycar.png';
                    $car = $this->CommonModel->FindById('vehicle_type',$post->ctype);
                    $lname = $this->CommonModel->FindById('locationsadmin',$post->location);
                    if($car)
                    {
                        $img=PROOT.'car icons/'.$car->img;
                    }
                   
                    $start = $post->fromdate;
                    $end = $post->todate;
                    $diff = (strtotime($end)- strtotime($start))/24/3600;
                    ?>
                    <div class="job__list">
                        <div class="job-info">
                            <div class="company-logo">
                                <a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>"><img src="<?php echo $img; ?>" alt="<?php echo $car->vt_name; ?>" />
                                </a>
                            </div>
                            <div class="info">
                                <h4 class="job-title"><a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>"><?php echo $post->title; ?></a></h4>
                                <p class="designation"><?php echo $lname->lname; ?> - <?php echo $car->vt_name; ?></p>
                            </div>
                        </div>
                        <div class="job-time"><span><?php echo $diff.' Days'; ?></span></div>
                        <div class="job-location"><span>€ <?php echo $post->budget_min.' - € '.$post->budget_max; ?></span></div>
                    </div>
                    <?php
                     
				}
				$lastid_p = $posts[0]->id;
				?>
				<div class="tagcloud" style="margin-top: 50px;">
                    <a href="javascript:void(0)" id="previous_page" fdi="<?php echo $lastid_p; ?>">Previous</a> 
                    <a href="javascript:void(0)" id="next_page" fdi="<?php echo $lastid; ?>" style="float: right;">Next</a>
                    <p id="lasttotal" style="display: none;"><?php echo count($posts); ?></p>
                </div>
				<?php
			}
		}

		public function PreviousPostAction()
		{
			$lastid = $_POST['lastid'];
			$posts = $this->CommonModel->GetPosts_Previous('post',$lastid,10);
			if($posts)
			{
				$n=0;
				foreach ($posts as $post) 
				{
					$n++;
                    $lastid = $post->id;
                    
                    $img=PROOT.'images/dummycar.png';
                    $car = $this->CommonModel->FindById('vehicle_type',$post->ctype);
                    $lname = $this->CommonModel->FindById('locationsadmin',$post->location);
                    if($car)
                    {
                        $img=PROOT.'car icons/'.$car->img;
                    }
                   
                    $start = $post->fromdate;
                    $end = $post->todate;
                    $diff = (strtotime($end)- strtotime($start))/24/3600;
                    ?>
                    <div class="job__list">
                        <div class="job-info">
                            <div class="company-logo">
                                <a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>"><img src="<?php echo $img; ?>" alt="<?php echo $car->vt_name; ?>" />
                                </a>
                            </div>
                            <div class="info">
                                <h4 class="job-title"><a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>"><?php echo $post->title; ?></a></h4>
                                <p class="designation"><?php echo $lname->lname; ?> - <?php echo $car->vt_name; ?></p>
                            </div>
                        </div>
                        <div class="job-time"><span><?php echo $diff.' Days'; ?></span></div>
                        <div class="job-location"><span>€ <?php echo $post->budget_min.' - € '.$post->budget_max; ?></span></div>
                    </div>
                    <?php
				}
				$lastid_p = $posts[0]->id;
				?>
				<div class="tagcloud" style="margin-top: 50px;">
                    <a href="javascript:void(0)" id="previous_page" fdi="<?php echo $lastid_p; ?>">Previous</a> 
                    <a href="javascript:void(0)" id="next_page" fdi="<?php echo $lastid; ?>" style="float: right;">Next</a>
                    <p id="lasttotal" style="display: none;"><?php echo count($posts); ?></p>
                </div>
				<?php
			}
		}

		public function FilterPostAction()
		{
			$location ='';
			$vtype='';
			if(isset($_POST['locations']))
			{
				$location = implode(',', $_POST['locations']);
			}
			if(isset($_POST['vtypes']))
			{
				$vtype = implode(',', $_POST['vtypes']);
			}
			$max_price = $_POST['max_price'];
			$min_price = $_POST['min_price'];
			$data=array();
			if(!empty($location))
			{
				$data[] = '`location` IN ('.$location.')';
			}
			if(!empty($vtype))
			{
				$data[] = '`ctype` IN ('.$vtype.')';
			}
			if(!empty($min_price) && empty($max_price))
			{
				$data[] = '`budget_max` >= '.$min_price.'';
			}
			if(empty($min_price) && !empty($max_price))
			{
				$data[] = '`budget_max` <= '.$max_price.'';
			}
			if(!empty($min_price) && !empty($max_price))
			{
				$data[] = '`budget_max` >= '.$min_price.' AND `budget_max` <= '.$max_price.'';
			}

			$date_raw = date('Y-m-d');
            $date = date('Y-m-d', strtotime('-1 day', strtotime($date_raw)));

			$data[]="`fromdate` > '".$date."' AND `status`='1'";
			$query = 'SELECT * FROM `post` WHERE '.implode(' AND ', $data);
			$rows = $this->CommonModel->Dynamic_Query_a($query);
			if($rows)
			{
				foreach ($rows as $post) 
				{
					$img=PROOT.'images/dummycar.png';
                    $car = $this->CommonModel->FindById('vehicle_type',$post->ctype);
                    $lname = $this->CommonModel->FindById('locationsadmin',$post->location);
                    if($car)
                    {
                        $img=PROOT.'car icons/'.$car->img;
                    }
                   
                    $start = $post->fromdate;
                    $end = $post->todate;
                    $diff = (strtotime($end)- strtotime($start))/24/3600;
                    ?>
                    <div class="job__list">
                        <div class="job-info">
                            <div class="company-logo">
                                <a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>"><img src="<?php echo $img; ?>" alt="<?php echo $car->vt_name; ?>" />
                                </a>
                            </div>
                            <div class="info">
                                <h4 class="job-title"><a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>"><?php echo $post->title; ?></a></h4>
                                <p class="designation"><?php echo $lname->lname; ?> - <?php echo $car->vt_name; ?></p>
                            </div>
                        </div>
                        <div class="job-time"><span><?php echo $diff.' Days'; ?></span></div>
                        <div class="job-location"><span>€ <?php echo $post->budget_min.' - € '.$post->budget_max; ?></span></div>
                    </div>

					<?php
				}
			}
			

		}

		public function CreateChatAction()
		{
			if(isset($_SESSION['master_id']))
			{
				$uid = $_POST['uid'];
				$myid = $_SESSION['master_id'];
				$chat = $this->CommonModel->CheckChet('user_connection',$myid,$uid);
				if($chat)
				{
					echo base64_encode($chat[0]->id);
				}
				else
				{
					$fields=[
						"myid"=>$myid,
						"uid"=>$uid,
						"time"=>date('Y-m-d H:i:s'),
						"updatetime"=>date('Y-m-d H:i:s')
					];
					$lastid = $this->CommonModel->CP_Insert('user_connection',$fields);
					if($lastid)
					{
						echo base64_encode($lastid);
					}
					else
					{
						echo 'Error';
					}
				}
			}
			else
			{
				echo 'Login Required';
			}
		}

		public function AddChatAction()
		{
			if(isset($_SESSION['master_id']))
			{
				$fields=[
					"messageid"=>$_POST['messageid'],
					"sender"=>$_SESSION['master_id'],
					"receiver"=>$_POST['chatuid'],
					"message"=>$_POST['chat_message'],
					"time"=>date('Y-m-d H:i:s')
				];
				$lastid_message = $this->CommonModel->CP_Insert('chat',$fields);
				if($lastid_message)
				{
					$_SESSION['last_message_id'] = $lastid_message;
				}
			}
			
		}

		public function GetNewMessageAction()
		{
			if(isset($_SESSION['master_id']) && isset($_SESSION['last_message_id']))
			{
				$messageid = $_POST['messageid'];
				$lastmessageid = $_SESSION['last_message_id'];
				$messages = $this->CommonModel->GetNewMessage($messageid,$lastmessageid);
				if($messages)
				{
					foreach ($messages as $message) 
                    {
                    	$lastid = $message->id;
                        if($message->sender == $_SESSION['master_id'])
                        {
                            ?>
                            <li class="replies">                            
                                <p><?php echo $message->message; ?></p>
                            </li>
                            <?php
                        }
                        else
                        {
                            ?>
                            <li class="sent">                            
                                <p><?php echo $message->message; ?></p>
                            </li>
                            <?php
                        }
                    }
                    $_SESSION['last_message_id']=$lastid;
				}
			}
			
		}

		public function GetInTouchAction()
		{
			$to = 'cadelineweb@gmail.com';
			$message = "
			<html>
			<head>
			<title>HTML email</title>
			</head>
			<body>
			<p>Contact Us | Form</p>
			<table width='100%' style='width100%;' border='1'>
			<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Subject</th>
			<th>Message</th>
			</tr>
			<tr>
			<td>".$_POST['name']."</td>
			<td>".$_POST['email']."</td>
			<td>".$_POST['subject']."</td>
			<td>".$_POST['content']."</td>
			</tr>
			</table>
			</body>
			</html>
			";
			if(MAIL_SEND_STATUS)
			{				
				echo MailSend(trim($to),'Broombids - Contact Us',$message);
			}
		}

		public function newsletterAction()
		{
			$email = $_POST['email'];
			$row = $this->CommonModel->CustomeQuery("SELECT * FROM `subscribers` WHERE `email` = '$email'");
			if($row)
			{
				echo 'You are already subscribed.';
			}
			else
			{
				$fields = [
					"email"=>$email,
					"time"=>date('Y-m-d H:i:s')
				];
				$this->CommonModel->CP_Insert('subscribers',$fields);
				echo 'success';
			}
		}

		
		
}