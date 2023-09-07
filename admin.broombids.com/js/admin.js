$(document).on('click','#getcontroller',function(){
	var controller = $(this).attr('controller');
	$("#pagecontain").html(Loaderpage());
	$.ajax({
	        type: 'POST',
	        url: path + 'Pages/'+controller,
	        //data: {},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	            $("#pagecontain").html(responce);
	        }
	    });
});

function loadController(controller)
{
	$("#pagecontain").html(Loaderpage());
	$.ajax({
	        type: 'POST',
	        url: path + 'Pages/'+controller,
	        //data: {},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	            $("#pagecontain").html(responce);
	        }
	    });
}

$(document).on('click','#getcontroller_edit',function(){
	var controller = $(this).attr('controller');
	var id = $(this).attr('fdi');
	$("#pagecontain").html(Loaderpage());
	$.ajax({
	        type: 'POST',
	        url: path + 'Pages/'+controller,
	        data: {"id":id},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	            $("#pagecontain").html(responce);
	        }
	    });
});

$(document).on('click','#addlocation',function(){	
	var lname = $("#lname").val();
	if(lname == '')
	{
		$("#lname").focus();
		return false;
	}	
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/AddLocation',
	        data: {"lname":lname},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	            $("tbody").append(responce);
	            $("#closelocationmedel").trigger("click");
	        }
	    });
	}
	
});

$(document).on('click','#addVehicleType',function(){	
	var vtype = $("#vtype").val();
	if(vtype == '')
	{
		$("#vtype").focus();
		return false;
	}	
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/AddVehicleType',
	        data: {"vtype":vtype},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	            $("tbody").prepend(responce);
	            $("#closelocationmedel").trigger("click");
	            $("#vtype").val('');
	        }
	    });
	}
	
});

$(document).on('click','#addVehicleCompany',function(){	
	var vc_name = $("#vc_name").val();
	if(vc_name == '')
	{
		$("#vc_name").focus();
		return false;
	}	
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/addVehicleCompany',
	        data: {"vc_name":vc_name},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	            $("tbody").prepend(responce);
	            $("#closelocationmedel").trigger("click");
	            $("#vc_name").val('');
	        }
	    });
	}
	
});

$(document).on('click','#addVehicleName',function(){	
	var vname = $("#vname").val();
	var vcom = $("#vcom").val();
	if(vname == '')
	{
		$("#vname").focus();
		return false;
	}	
	else if(vcom == '')
	{
		$("#vcom").focus();
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/addVehicleName',
	        data: {"vname":vname,"vcom":vcom},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	            $("tbody").prepend(responce);
	            $("#closelocationmedel").trigger("click");
	            $("#vname").val('');
	        }
	    });
	}
	
});

$(document).on('click','#addVehicleFuel',function(){	
	var vf_type = $("#vf_type").val();
	if(vf_type == '')
	{
		$("#vf_type").focus();
		return false;
	}	
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/addVehicleFuel',
	        data: {"vf_type":vf_type},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	            $("tbody").append(responce);
	            $("#closelocationmedel").trigger("click");
	            $("#vf_type").val('');
	        }
	    });
	}
	
});

$(document).on('click','#addVehicleTransmission',function(){	
	var v_transmission = $("#v_transmission").val();
	if(v_transmission == '')
	{
		$("#v_transmission").focus();
		return false;
	}	
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/addVehicleTransmission',
	        data: {"v_transmission":v_transmission},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	            $("tbody").append(responce);
	            $("#closelocationmedel").trigger("click");
	            $("#v_transmission").val('');
	        }
	    });
	}
	
});


$(document).on('click','#assigncompany',function(){	

	var id = $(this).attr('fdi');
	
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/GetCompay',
	        data: {"id":id},
	        beforeSend: function () {      
	        	$("#vehiclecompanylist").html(Loaderpage());
	        },
	        success: function (responce) {
	            $("#vehiclecompanylist").html(responce);
	        }
	    });
	
});



$(document).on('click','#assigncompanytotype',function(){
	var id = $("#vehicle_typeid").val();	
	var company = [];
    $("input[name='vcompany[]']:checked").each(function(){company.push($(this).val());});
    
    if (company.length === 0)
    {
        $("#error").html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select At least one Company Name.</div>');
    }	
    else
    {
    	$("#error").html('');
    	$.ajax({
	        type: 'POST',
	        url: path + 'Master/AddCompanyToType',
	        data: {"id":id,"company":company},
	        beforeSend: function () {      
	        	//$("#vehiclecompanylist").html(Loaderpage());
	        },
	        success: function (responce) {
	            $("#error").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Company Name successfully Assign to Vehicle Type.</div>');
	        }
	    });
    }		
	
});




$(document).on('click','#addadminuser',function(){
	var fname = $("#fname").val();
	var phone = $("#phone").val();
	var address = $("#address").val();
	var email = $("#email").val();
	var Password = $("#Password").val();	
	var utype = $("#utype").val();	

	$("#err").html('');
	if(fname == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Fullname.'));
		$("#fname").focus();
		return false;
	}

	else if(phone == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Phone Number.'));
		$("#phone").focus();
		return false;
	}

	else if(address == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Address.'));
		$("#address").focus();
		return false;
	}

	else if(email == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Email Address.'));
		$("#email").focus();
		return false;
	}

	else if(Password == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Password.'));
		$("#Password").focus();
		return false;
	}
	else if(utype == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Select User Type.'));
		$("#utype").focus();
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/AddAdminUser',
	        data: {"fname":fname,"phone":phone,"address":address,"email":email,"Password":Password,"utype":utype},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	        	if(responce == 'success')
	        	{
	        		$("#err").html(Error('success','Success! ',' User Successfully Created.'));

	        		$("#fname").val('');
					$("#phone").val('');
					$("#address").val('');
					$("#email").val('');
					$("#Password").val('');	
					$("#utype").val('');	

	        	}
	        	else
	        	{
	        		$("#err").html(Error('warning','Fail! ',' Please Try Again.'));
	        	}
	            
	        }
	    });
	}
	
});

$(document).on('click','#addcustomer',function(){
	var fname = $("#fname").val();
	var phone = $("#phone").val();
	var email = $("#email").val();
	var Password = $("#Password").val();

	$("#err").html('');
	if(fname == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Fullname.'));
		$("#fname").focus();
		return false;
	}

	else if(phone == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Phone Number.'));
		$("#phone").focus();
		return false;
	}

	else if(email == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Email Address.'));
		$("#email").focus();
		return false;
	}

	else if(Password == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Password.'));
		$("#Password").focus();
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/AddCustomer',
	        data: {"fname":fname,"phone":phone,"email":email,"Password":Password},
	        beforeSend: function () {      
	        	$("#err").html(Error('info','Authentication... ',''));
	        },
	        success: function (responce) {
	        	if(responce == 'success')
	        	{
	        		$("#err").html(Error('success','Success! ',' User Successfully Created.'));

	        		$("#fname").val('');
					$("#phone").val('');
					$("#email").val('');
					$("#Password").val('');

	        	}
	        	else
	        	{
	        		$("#err").html(Error('warning','Fail! ',responce));
	        	}
	            
	        }
	    });
	}
	
});

$(document).on('click','#editadminuser',function(){
	var fname = $("#fname").val();
	var phone = $("#phone").val();
	var address = $("#address").val();
	var email = $("#email").val();	
	var utype = $("#utype").val();	

	$("#err").html('');
	if(fname == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Fullname.'));
		$("#fname").focus();
		return false;
	}

	else if(phone == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Phone Number.'));
		$("#phone").focus();
		return false;
	}

	else if(address == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Address.'));
		$("#address").focus();
		return false;
	}

	else if(email == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Email Address.'));
		$("#email").focus();
		return false;
	}
	
	else if(utype == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Select User Type.'));
		$("#utype").focus();
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/EditAdminUser',
	        data: {"fname":fname,"phone":phone,"address":address,"email":email,"utype":utype},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	        	if(responce == 'success')
	        	{
	        		$("#err").html(Error('success','Success! ',' User Successfully Update.'));	

	        	}
	        	else
	        	{
	        		$("#err").html(Error('warning','Fail! ',' Please Try Again.'));
	        	}
	            
	        }
	    });
	}
	
});

$(document).on('click','#editcustomer',function(){
	var fname = $("#fname").val();
	var phone = $("#phone").val();
	var email = $("#email").val();	

	$("#err").html('');
	if(fname == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Fullname.'));
		$("#fname").focus();
		return false;
	}

	else if(phone == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Phone Number.'));
		$("#phone").focus();
		return false;
	}	

	else if(email == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter User Email Address.'));
		$("#email").focus();
		return false;
	}
	
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/EditCustomer',
	        data: {"fname":fname,"phone":phone,"email":email},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	        	if(responce == 'success')
	        	{
	        		$("#err").html(Error('success','Success! ',' User Successfully Update.'));	

	        	}
	        	else
	        	{
	        		$("#err").html(Error('warning','Fail! ',' Please Try Again.'));
	        	}
	            
	        }
	    });
	}
	
});

$(document).on('click','#deleteaduser',function(){
	var id = $(this).attr('fdi');
	$("#row_"+id).fadeOut(1000);
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/DeleteAdminUser',
	        data: {"id":id},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {	        	
	            
	        }
	    });
});

$(document).on('click','#delete_blog',function(){
	var id = $(this).attr('fdi');
	$("#row_"+id).fadeOut(1000);
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/Deleteblog',
	        data: {"id":id},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {	        	
	            
	        }
	    });
});

$(document).on('click','#deleteVehicle',function(){
	var id = $(this).attr('fdi');
	$("#row_"+id).fadeOut(1000);
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/DeleteCar',
	        data: {"id":id},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {	        	
	            
	        }
	    });
});

$(document).on('click','#deletequery',function(){
	var id = $(this).attr('fdi');
	var tbl = $(this).attr('tbl');
	$("#row_"+id).fadeOut(1000);
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/DeleteRecord',
	        data: {"id":id,"tbl":tbl},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {	        	
	            
	        }
	    });
});

$(document).on('click','#deletebid',function(){
	var b_id = $(this).attr('tbl');
	var p_id = $(this).attr('fbi');
	console.log(b_id);
	console.log(p_id);
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/DeleteBid',
	        data: {"b_id":b_id,"p_id":p_id},
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
});

$(document).on('click','#deletelocation',function(){
	var id = $(this).attr('fdi');
	$("#row_"+id).fadeOut(1000);
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/DeleteLocation',
	        data: {"id":id},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {	        	
	            
	        }
	    });
});

$(document).on('click','#unblockuser',function(){
	var id = $(this).attr('fdi');
	$("#status_"+id).html('<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Active</span>');
	$(this).removeClass('btn-success').addClass('btn-dark').html('<i class="fa fa-lock"></i>').attr('id','blockuser');
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/UnBlockUser',
	        data: {"id":id},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {	        	
	            
	        }
	    });
});

$(document).on('click','#blockuser',function(){
	var id = $(this).attr('fdi');
	$("#status_"+id).html('<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-warning">Close</span>');
	$(this).removeClass('btn-dark').addClass('btn-success').html('<i class="fa fa-unlock"></i>').attr('id','unblockuser');
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/BlockUser',
	        data: {"id":id},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {	        	
	            
	        }
	    });
});

$(document).on('click','#deleteadusercustomer',function(){
	var id = $(this).attr('fdi');
	$("#row_"+id).fadeOut(1000);
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/DeleteCustomer',
	        data: {"id":id},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {	        	
	            
	        }
	    });
});

$(document).on('click','#admin_login',function(){
	var email = $("#email").val();
	var password = $("#password").val();
	if(email == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter Email Address.'));
		$("#email").focus();
		return false;
	}
	else if(password == '')
	{
		$("#err").html(Error('danger','Opps! ',' Please Enter Password.'));
		$("#password").focus();
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/LoginUser',
	        data: {"email":email,"password":password},
	        beforeSend: function () {	       
	        $("#err").html(Error('info','Wait ',' Authentication...'));
	        
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {	            	
	            	$("#err").html(Error('success','Login Success ',' redirecting...'));
	            	$("#email").val('');
	            	$("#password").val('');
	            	window.location.href = path+"Dashboard";
	            }
	            else if(responce == 'block')
	            {	            	
	            	$("#err").html(Error('warning','Opps ',' This account has been closed. Please contact support for further details.'));
	            	$("#email").val('');
	            	$("#password").val('');
	            }
	            else
	            {	            	
	            	$("#err").html(Error('danger','Opps ',' These credentials do not match our records.'));
	            }
	        }
	    });
	}
});


$(document).on('click','#goto_step2',function()
{
	var businesstype = $("#businesstype").val();
	var fname = $("#fname").val();
	var surname = $("#surname").val();
	var phone = $("#phone").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var repassword = $("#repassword").val();
	if(businesstype == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Select Business Type.</div>');
		$("#businesstype").focus();
		return false;
	}
	else if(fname == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Your Full Name.</div>');
		$("#fname").focus();
		return false;
	}
	else if(surname == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Your Surname.</div>');
		$("#surname").focus();
		return false;
	}
	else if(phone == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Your Phone Number.</div>');
		$("#phone").focus();
		return false;
	}
	else if(email == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Your Email Address.</div>');
		$("#email").focus();
		return false;
	}
	else if(password == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Create Password.</div>');
		$("#password").focus();
		return false;
	}
	else if(repassword == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Confirn Password.</div>');
		$("#repassword").focus();
		return false;
	}
	else if(password != repassword)
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Password And Confirn Password Not Match.</div>');
		$("#repassword").focus();
		return false;
	}	
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/check_email',
	        data: {"email":email},
	        beforeSend: function () {	       
	        $("#err").html(Error('info','Wait ',' Authentication...'));
	        
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {	   
	            	var businesstype = $("#businesstype").val();        	
	            	if(businesstype == 'Travel Agent')
					{
						$("#title").text('Profile Pic');
						$("#inputGroupFileAddon01").text('Profile Pic');
						$("#bnamebox").hide();
					}
					else
					{
						$("#bnamebox").show();
					}
					$("#err").html('');
					$("#stepbtn1").removeClass('active_btn');
					$("#stepbtn2").addClass('active_btn');
					$("#step1").fadeOut(500);
					$("#step2").fadeIn(1000);
					document.body.scrollTop = 0;
			  		document.documentElement.scrollTop = 0;
	            }
	            else
	            {	            	
	            	$("#err").html(Error('danger','Opps!',responce));
	            }
	        }
	    });
		
	}
	
});


$(document).on('click',"#back_step1",function(){
	$("#err").html('');
	$("#stepbtn2").removeClass('active_btn');
	$("#stepbtn1").addClass('active_btn');
	$("#step2").fadeOut(500);
	$("#step1").fadeIn(1000);
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
});

$(document).on('click',"#back_step2",function(){
	$("#err").html('');
	$("#stepbtn3").removeClass('active_btn');
	$("#stepbtn2").addClass('active_btn');
	$("#step3").fadeOut(500);
	$("#step2").fadeIn(1000);
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
});

$(document).on('click','#goto_step3',function()
{
	var FileInput = $("#inputGroupFile01").val();
	var bname = $("#bname").val();
	var locations = $("#locations").val();
	var vatid = $("#vatid").val();
	$("#err").html('');
	if(FileInput == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Select Picture.</div>');
		$("#FileInput").focus();
		return false;
	}
	else if(businesstype == 'Car Rental Business' && bname == '')	
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Bussness Name.</div>');
		$("#bname").focus();
		return false;
	}	
	else if(vatid == '')	
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter VAT ID.</div>');
		$("#vatid").focus();
		return false;
	}

	else if(locations == '')	
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Location Name.</div>');
		$("#locations").focus();
		return false;
	}
	else
	{
		$("#err").html('');
		$("#stepbtn2").removeClass('active_btn');
		$("#stepbtn3").addClass('active_btn');
		$("#step2").fadeOut(500);
		$("#step3").fadeIn(1000);
		document.body.scrollTop = 0;
  		document.documentElement.scrollTop = 0;
	}
	
});


$(document).on('change','#vtype',function(){	
	var vtypeid = $(this).val();
	
	$.ajax({
        type: 'POST',
        url: path + 'Master/GetVtypeCompany',
        data: {"vtypeid":vtypeid},
        beforeSend: function () {      
        
        },
        success: function (responce) {
            $("#vcompany").html(responce);	            
        }
    });
	
});

$(document).on('change','#vcompany',function(){	
	var vcompanyid = $(this).val();
	
	$.ajax({
        type: 'POST',
        url: path + 'Master/GetCarName',
        data: {"vcompanyid":vcompanyid},
        beforeSend: function () {      
        
        },
        success: function (responce) {
            $("#vname").html(responce);	            
        }
    });	

});

$(document).on('click','#getcardetails',function(){	
	var id = $(this).attr('fdi');
	
	$.ajax({
        type: 'POST',
        url: path + 'Master/StoreCarId',
        data: {"id":id},
        beforeSend: function () {      
        
        },
        success: function (responce) {
            loadController('VehicleDetails') ;           
        }
    });	

});

$(document).on('click','#venderdetails',function(){	
	var id = $(this).attr('fdi');
	
	$.ajax({
        type: 'POST',
        url: path + 'Master/StoreVenderId',
        data: {"id":id},
        beforeSend: function () {      
        
        },
        success: function (responce) {
            loadController('VenderDetails') ;           
        }
    });	

});

$(document).on('click','#showfaq',function(){
	$("#faqbody").toggle(700);
});

$(document).on('click','#showimagegaller',function(){
	$("#imagegaller").toggle(700);
});

$(document).on('click','#addfaq',function(){
	var qua = $("#question").val();
	var ans = $("#answer").val();
	var whichuser = $("#whichuser").val();
	$("#err").html('');
	if(whichuser == '')
	{
		$("#err").html(Error('danger','','Select User Type'));
		$("#whichuser").focus();
		return false;
	}
	else if(qua == '')
	{
		$("#err").html(Error('danger','','Enter Your Question'));
		$("#question").focus();
		return false;
	}

	else if(ans == '')
	{
		$("#err").html(Error('danger','','Enter Your Question\'s Answer'));
		$("#answer").focus();
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/FaqAdd',
	        data: {"qua":qua,"ans":ans,"whichuser":whichuser},
	        beforeSend: function () {      
	        
	        },
	        success: function (responce) {
	        	if(responce == 'success')
	        	{
	        		$("#err").html(Error('success','Success','Your Frequently Asked Questions Added.'));  
		            $("#answer").val('');      
		            $("#question").val('');
	        	}
	        	else
	        	{
	        		$("#err").html(Error('warning','Fail','Please Try Again.'));
	        	}
	            
	        }
	    });	
	}
});

$(document).on('click','#editvehicledetails',function(){
	var vtype = $("#vtype").val();
	var vcompany = $("#vcompany").val();
	var vname = $("#vname").val();
	var ftype = $("#ftype").val();
	var ftran = $("#ftran").val();
	var gates = $("#gates").val();
	var passenger = $("#passenger").val();
	var desc = $("#desc").val();
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/UpdateVehicle',
	        data: {"vtype":vtype,"vcompany":vcompany,"vname":vname,"ftype":ftype,"ftran":ftran,"gates":gates,"passenger":passenger,"desc":desc},
	        beforeSend: function () {      
	        	$("#err").html(Error('info','Please Wait...',''));
	        },
	        success: function (responce) {
	        	if(responce == 'success')
	        	{
	        		$("#err").html(Error('success','Success','Your Vehicle Details Successfully Update.'));
	        	}
	        	else
	        	{
	        		$("#err").html(Error('warning','Fail','Please Try Again.'));
	        	}
	            
	        }
	    });
});

$(document).on('click','#changefutureimage', function() {
	$("#err_fimage").html(Error('info','Please Wait...',''));
        var file_data = $('#futureimage').prop('files')[0];
        var form_data = new FormData();  // Create a FormData object
        form_data.append('file', file_data);  // Append all element in FormData  object

        $.ajax({
                url         : path + 'Master/UpdateFutureImage',     // point to server-side PHP script 
                dataType    : 'text',           // what to expect back from the PHP script, if anything
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
                success     : function(output){
                    if(output == 'success')
                    {
                    	$("#err_fimage").html(Error('success','Success','Your Future Image Successfully Update.'));
                    }
                    else
                    {
                    	$("#err_fimage").html(Error('warning','Fail','Please Try Again.'));
                    }
                }
         });
         /* Clear the input type file */
    });

$(document).on('click','#changegallerimages', function() {
	$("#err_gimage").html(Error('info','Please Wait...',''));
        var form_data = new FormData();

	   // Read selected files
	   var totalfiles = document.getElementById('files').files.length;
	   for (var index = 0; index < totalfiles; index++) {
	      form_data.append("files[]", document.getElementById('files').files[index]);
	   }

        $.ajax({
                url         : path + 'Master/UpdateGalleryImage',     // point to server-side PHP script 
                //dataType    : 'text',           // what to expect back from the PHP script, if anything
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
                success     : function(output){                	
                    if(output == 'success')
                    {
                    	$("#err_gimage").html(Error('success','Success','Your Image Gallery Successfully Update.'));
                    }
                    else
                    {
                    	$("#err_gimage").html(Error('warning','Fail','Please Try Again.'));
                    }
                }
         });
         /* Clear the input type file */
    });


$(document).on('click','#send_reply',function(){
	var replyid = $("#replyid").val();
	var message = $("#reply_message").val();	
	var useremail = $("#useremail").val();
	var $reply =message;
	if(message == '')
	{		
		$("#reply_message").focus();
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/SupportReply',
	        data: {"replyid":replyid,"message":message,"useremail":useremail},
	        beforeSend: function () {      
	        	$("#send_reply").html('Loading..');
	        },
	        success: function (responce) {	        	
	            if(responce == 'success')
	            {
	            	$("#messages_chat").append('<div class="chat chat-left justify-content-end"><div class="chat-msg"><div class="chat-msg-content"><p>'+$reply+'</p></div></div></div>');
	            	$("#send_reply").html('<i class="fa fa-check-circle-o" aria-hidden="true"></i>');
	            	setTimeout(function(){$("#send_reply").html('<i class="fa fa-paper-plane"></i>'); }, 3000);
	            }
	        }
	    });	
	}
});

$(document).on('click','#Editfaq',function(){
	var id = $(this).attr('fdi');	
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/GetFaqDetails',
	        data: {"id":id},
	        beforeSend: function () {      
	        	$("#faq_form").html(Loaderpage());
	        },
	        success: function (responce) {	        	
	            $("#faq_form").html(responce);
	        }
	    });
});

$(document).on('click','#faq_edit_save',function(){
	var id = $("#faq_ed_id").val();	
	var type = $("#faq_ed_type").val();	
	var question = $("#faq_ed_question").val();	
	var answer = $("#faq_ed_answer").val();	
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/EditFaqDetails',
	        data: {"id":id,"type":type,"question":question,"answer":answer},
	        beforeSend: function () {      
	        	
	        },
	        success: function (responce) {	        	
	            if(responce == 'success')
	            {
	            	$("#error_ed_faq").html(Error('success','Success','Your FAQ Successfully Update.'));
	            	setTimeout(function(){ $("#close_ed_faq").trigger('click'); }, 2000);
	            	setTimeout(function(){ loadController('Faq'); }, 3000);
	            	
	            }
	        }
	    });
});

$(document).on('click','#edit_vehicle',function(){
	var vname = $(this).attr('vname');
	var id = $(this).attr('fdi');
	$("#ed_vtype").val(vname);
	$("#ed_vehicle_submit").attr('fdi',id);
	$("#edit_vehicle_modal").modal('show');
});

$(document).on('click','#ed_vehicle_submit', function() {
		var id = $(this).attr('fdi');
		var vname = $("#ed_vtype").val();	
        var file_data = $('#ed_img').prop('files')[0];
        var form_data = new FormData();  // Create a FormData object
        form_data.append('vname', vname);
        form_data.append('id', id);
        form_data.append('file', file_data);

        $.ajax({
                url         : path + 'Master/update_v_type',     // point to server-side PHP script 
                dataType    : 'text',           // what to expect back from the PHP script, if anything
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
                success     : function(output){
                    $("#edit_vehicle_modal").modal('hide');
                }
         });
         /* Clear the input type file */
    });

$(document).on('click','#vehicle_name_edit',function(){
	var vname = $(this).attr('vname');
	var id = $(this).attr('fdi');
	var cid = $(this).attr('cid');
	$('#ed_vcom').val(cid).trigger('change');
	$("#ed_vname").val(vname);
	$("#edit_vehicle_name_submit").attr('fdi',id);
	$("#edit_vname_modal").modal('show');
});

$(document).on('click','#edit_vehicle_name_submit', function() {
		var id = $(this).attr('fdi');
		var cid = $("#ed_vcom").val();	
		var ed_vname = $("#ed_vname").val();
        var form_data = new FormData();  // Create a FormData object
        form_data.append('cid', cid);
        form_data.append('id', id);
        form_data.append('ed_vname', ed_vname);

        $.ajax({
                url         : path + 'Master/update_v_name',     // point to server-side PHP script 
                dataType    : 'text',           // what to expect back from the PHP script, if anything
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
                success     : function(output){
                    $("#edit_vname_modal").modal('hide');
                }
         });
         /* Clear the input type file */
    });

function Loaderpage()
{
	return '<div class="h-100 d-flex justify-content-center"><div class="align-self-center"><img src="'+path+'assets/img/loader/loader.svg" alt="loader"></div></div>';
}
function Error(classname,title,message)
{
	return '<div class="alert alert-'+classname+' alert-dismissible fade show" role="alert"><strong>'+title+'</strong>'+message+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ti ti-close"></i></button></div>';
}

$(document).on('click','#edit_company_name',function(){
	var name = $(this).attr('name');
	var id = $(this).attr('fdi');
	$("#ed_vc_name").val(name);
	$("#edit_submit_vehicle_company").attr('fdi',id);
	$("#edit_modal_company_name").modal('show');
});

$(document).on('click','#edit_submit_vehicle_company', function() {
		var id = $(this).attr('fdi');	
		var ed_vname = $("#ed_vc_name").val();
        var form_data = new FormData();
        form_data.append('id', id);
        form_data.append('ed_vname', ed_vname);

        $.ajax({
                url         : path + 'Master/update_v_company_name',     // point to server-side PHP script 
                dataType    : 'text',           // what to expect back from the PHP script, if anything
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
                success     : function(output){
                    $("#edit_modal_company_name").modal('hide');
                }
         });
         /* Clear the input type file */
    });

$(document).on('click','#edit_fual_type',function(){
	var name = $(this).attr('name');
	var id = $(this).attr('fdi');
	$("#ed_fual_type").val(name);
	$("#submit_edit_fuil_type").attr('fdi',id);
	$("#edit_modal_fula_type").modal('show');
});

$(document).on('click','#submit_edit_fuil_type', function() {
		var id = $(this).attr('fdi');	
		var ed_vname = $("#ed_fual_type").val();
        var form_data = new FormData();
        form_data.append('id', id);
        form_data.append('ed_vname', ed_vname);

        $.ajax({
                url         : path + 'Master/update_v_fuil_type',     // point to server-side PHP script 
                dataType    : 'text',           // what to expect back from the PHP script, if anything
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
                success     : function(output){
                    $("#edit_modal_fula_type").modal('hide');
                }
         });
         /* Clear the input type file */
    });

$(document).on('click','#edit_v_transmission',function(){
	var name = $(this).attr('name');
	var id = $(this).attr('fdi');
	$("#ed_v_transmission").val(name);
	$("#edit_submit_vehicle_transmission").attr('fdi',id);
	$("#modal_edit_v_transmission").modal('show');
});

$(document).on('click','#edit_submit_vehicle_transmission', function() {
	var id = $(this).attr('fdi');	
	var ed_vname = $("#ed_v_transmission").val();
    var form_data = new FormData();
    form_data.append('id', id);
    form_data.append('ed_vname', ed_vname);

    $.ajax({
            url         : path + 'Master/update_v_transmission',     // point to server-side PHP script 
            dataType    : 'text',           // what to expect back from the PHP script, if anything
            cache       : false,
            contentType : false,
            processData : false,
            data        : form_data,                         
            type        : 'post',
            success     : function(output){
                $("#modal_edit_v_transmission").modal('hide');
            }
     });
     /* Clear the input type file */
});

$(document).on('click',"#submit_blog",function(){
	var title = $("#blog_title").val();
	var blog_desc = tinyMCE.get('blog_desc').getContent();
	var blog_img = $('#blog_img').prop('files')[0];
	var blog_img2 = $('#blog_img').val();
	if(title == '')
	{
		$("#blog_title").focus();
		$("#err").html(Error('warning','Opps!','Please enter blog title.'));
		return false;
	}
	else if(blog_desc == '')
	{
		$("#blog_desc").focus();
		$("#err").html(Error('warning','Opps!','Please enter blog Description.'));
		return false;
	}
	else if(blog_img2 == '')
	{
		$("#blog_img2").focus();
		$("#err").html(Error('warning','Opps!','Please select blog image.'));
		return false;
	}
	else
	{
		$(this).html('Loading...');
		var form_data = new FormData();
	    form_data.append('title', title); 
	    form_data.append('blog_desc', blog_desc); 
	    form_data.append('blog_img', blog_img); 

	    $.ajax({
	        url         : path + 'Master/add_blog',     // point to server-side PHP script 
	        dataType    : 'text',           // what to expect back from the PHP script, if anything
	        cache       : false,
	        contentType : false,
	        processData : false,
	        data        : form_data,                         
	        type        : 'post',
	        success     : function(output){
	        	$("#submit_blog").html('Submit');
	            if(output == 'success')
	            {
	            	$("#err").html(Error('success','Success',' Blog successfully create.'));
	            	$("#blog_title").val('');
					$('#blog_img').val('');
	            }
	            else
	            {
	            	$("#err").html(Error('warning','Fail',' Please Try Again.'));
	            }
	        }
	    });
	}
    
});

$(document).on('click',"#update_submit_blog",function(){
	var id = $(this).attr('fdi');
	var title = $("#blog_title").val();
	var blog_desc = tinyMCE.get('blog_desc').getContent();
	var blog_img = $('#blog_img').prop('files')[0];
	var blog_img2 = $('#blog_img').val();
	if(title == '')
	{
		$("#blog_title").focus();
		$("#err").html(Error('warning','Opps!','Please enter blog title.'));
		return false;
	}
	else if(blog_desc == '')
	{
		$("#blog_desc").focus();
		$("#err").html(Error('warning','Opps!','Please enter blog Description.'));
		return false;
	}
	else
	{
		$(this).html('Loading...');
		var form_data = new FormData();
	    form_data.append('id', id); 
	    form_data.append('title', title); 
	    form_data.append('blog_desc', blog_desc); 
	    form_data.append('blog_img', blog_img); 

	    $.ajax({
	        url         : path + 'Master/update_blog',     // point to server-side PHP script 
	        dataType    : 'text',           // what to expect back from the PHP script, if anything
	        cache       : false,
	        contentType : false,
	        processData : false,
	        data        : form_data,                         
	        type        : 'post',
	        success     : function(output){
	        	$("#update_submit_blog").html('Submit');
	            if(output == 'success')
	            {
	            	$("#err").html(Error('success','Success',' Blog successfully Update.'));
	            }
	            else
	            {
	            	$("#err").html(Error('warning','Fail',' Please Try Again.'));
	            }
	        }
	    });
	}
    
});

$(document).on('click',"#open_blog_form",function(){
	$("#bog_form").toggle();
});



