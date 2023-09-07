
$(document).on('keypress','#chat_message',function(e){
    if(e.which == 13){//Enter key pressed
        $("#sendchatmessage").trigger('click');
    }
});

$("#FileInput").on('change',function (e) {
            var labelVal = $(".title").text();
            var oldfileName = $(this).val();
                fileName = e.target.value.split( '\\' ).pop();

                if (oldfileName == fileName) {return false;}
                var extension = fileName.split('.').pop();

            if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
                $(".filelabel i").removeClass().addClass('fa fa-file-image-o');
                $(".filelabel i, .filelabel .title").css({'color':'#208440'});
                $(".filelabel").css({'border':' 2px solid #208440'});
            }
            else if(extension == 'pdf'){
                $(".filelabel i").removeClass().addClass('fa fa-file-pdf-o');
                $(".filelabel i, .filelabel .title").css({'color':'red'});
                $(".filelabel").css({'border':' 2px solid red'});

            }
  else if(extension == 'doc' || extension == 'docx'){
            $(".filelabel i").removeClass().addClass('fa fa-file-word-o');
            $(".filelabel i, .filelabel .title").css({'color':'#2388df'});
            $(".filelabel").css({'border':' 2px solid #2388df'});
        }
            else{
                $(".filelabel i").removeClass().addClass('fa fa-file-o');
                $(".filelabel i, .filelabel .title").css({'color':'black'});
                $(".filelabel").css({'border':' 2px solid black'});
            }

            if(fileName ){
                if (fileName.length > 10){
                    $(".filelabel .title").text(fileName.slice(0,4)+'...'+extension);
                }
                else{
                    $(".filelabel .title").text(fileName);
                }
            }
            else{
                $(".filelabel .title").text(labelVal);
            }
        });

$(document).on('click','#sendchatmessage',function(){
    var messageid = $("#chatid").val();
    var chat_message = $("#chat_message").val();
    var chatuid = $("#chatuid").val();
    if(chat_message == '' && messageid == '' && chatuid == '')
    {
    	$("#chat_message").focus();
    	return false;
    }
    else
    {
    	$("#loadmessaged").append('<li class="replies"><p>'+chat_message+'</p></li>');
    	$("#chat_message").val('');
    	$("#chat_message").focus();
    	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
    	$.ajax({
	        type: 'POST',
	        url: path + 'Master/AddChat',
	        data: {"messageid":messageid,"chat_message":chat_message,"chatuid":chatuid},
	        beforeSend: function () {
	        	
	        },
	        success: function (responce) {
	            $("#chat_message").val('');
	            $(".messages").animate({ scrollTop: $(document).height() }, "fast");
	        }
	    });
    }
});

$(document).on('click','#loadchat',function(){
	$("#contacts ul li").removeClass('active');
	$(this).addClass('active');
	var messageid = $(this).attr('fdi');
	var total_count = $("#totalNewMessages").text();
	var current_count = $("#newMessages"+messageid).text();
	$.ajax({
	        type: 'POST',
	        url: path + 'Tools',
	        data: {"messageid":messageid},
	        beforeSend: function () {
	        	
	        },
	        success: function (responce) {
	            $(".content").html(responce);
	            $(".messages").animate({ scrollTop: $(document).height() }, "fast");
				$("#newMessages"+messageid).hide();
				if(total_count - current_count > 0)
					$("#totalNewMessages").html(total_count - current_count);
				else
					$("#totalNewMessages").hide();
	        }
	    });
});
$(document).on('click','#cp_chat',function(){

	var uid = $(this).attr('fdi');
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/CreateChat',
	        data: {"uid":uid},
	        beforeSend: function () {
	        	$("#chat_error").html('<div class="alert alert-danger" role="alert">Loading...</div>');
	        },
	        success: function (responce) {
	            if(responce  == 'Error')
	            {
	            	$("#chat_error").html('<div class="alert alert-danger" role="alert">Sorry, a technical error occurred! Please try again later.</div>');
	            	$("#cp_chat").html('Loading...');
	            	return false;
	            }
	            else if(responce  == 'Login Required')
	            {
	            	$("#chat_error").html('<div class="alert alert-danger" role="alert">your session has expired.</div>');
	            	return false;
	            }
	            else
	            {
	            	window.location.href = path + "chat?chatwith="+responce;
	            }
	        }
	    });
});

$(document).on('click','#userregister',function(){
	var fname = $("#fname").val();
	var phone = $("#phone").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var repassword = $("#repassword").val();
	if(fname == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Your Full Name.</div>');
		$("#fname").focus();
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
	else if($("input[name=terms_agree]").prop("checked") == false)
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Select Agree Terms and Conditions.</div>');
		$("#repassword").focus();
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/RegisterUser',
	        data: {"fname":fname,"phone":phone,"email":email,"password":password},
	        beforeSend: function () {
	        $("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication</div>');
	        $("#spin").show();
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {
	            	$("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>User successfully Register</div>');
	            	$("#spin").hide();
	            	$("#fname").val('');
					$("#phone").val('');
					$("#email").val('');
					$("#password").val('');
					$("#repassword").val('');
	            }
	            else
	            {
	            	$("#err").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Some Technical Issue please Try again.</div>');
	            }
	        }
	    });
	}
});

// $(document).on('click','#userregister_second',function(){
// 	var fname = $("#fname").val();
// 	var sname = $("#sname").val();
// 	var country = $("#country").val();
// 	var phone = $("#phone").val();
// 	var email = $("#re_email").val();
// 	var password = $("#re_password").val();
// 	var repassword = $("#repassword").val();
// 	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
// 	if(fname == '')
// 	{
// 		$("#err_reg").html('<div class="alert alert-danger" role="alert">Please Enter Your First Name.</div>');
// 		$("#fname").focus();
// 		return false;
// 	}
// 	else if(sname == '')
// 	{
// 		$("#err_reg").html('<div class="alert alert-danger" role="alert">Please Enter Your Surname Name.</div>');
// 		$("#sname").focus();
// 		return false;
// 	}
// 	else if(country == '')
// 	{
// 		$("#err_reg").html('<div class="alert alert-danger" role="alert">Please Enter Country Name.</div>');
// 		$("#country").focus();
// 		return false;
// 	}
// 	else if(phone == '')
// 	{
// 		$("#err_reg").html('<div class="alert alert-danger" role="alert">Please Enter Your Phone Number.</div>');
// 		$("#phone").focus();
// 		return false;
// 	}
// 	else if(email == '')
// 	{
// 		$("#err_reg").html('<div class="alert alert-danger" role="alert">Please Enter Your Email Address.</div>');
// 		$("#re_email").focus();
// 		return false;
// 	}
// 	else if(!email.match(mailformat))
// 	{
// 		$("#err_reg").html('<div class="alert alert-danger" role="alert">Please Enter Valid Email Address.</div>');
// 		$("#re_email").focus();
// 		return false;
// 	}
// 	else if(password == '')
// 	{
// 		$("#err_reg").html('<div class="alert alert-danger" role="alert">Please Create Password.</div>');
// 		$("#re_password").focus();
// 		return false;
// 	}
// 	else if(repassword == '')
// 	{
// 		$("#err_reg").html('<div class="alert alert-danger" role="alert">Please Enter Confirn Password.</div>');
// 		$("#repassword").focus();
// 		return false;
// 	}
// 	else if(password != repassword)
// 	{
// 		$("#err_reg").html('<div class="alert alert-danger" role="alert">Password And Confirn Password Not Match.</div>');
// 		$("#repassword").focus();
// 		return false;
// 	}	
// 	else if($("input[name=terms_agree]").prop("checked") == false)
// 	{
// 		$("#err_reg").html('<div class="alert alert-danger" role="alert">Please Agree Terms and Conditions.</div>');		
// 		return false;
// 	}
// 	else
// 	{
// 		$.ajax({
// 	        type: 'POST',
// 	        url: path + 'Master/RegisterUser',
// 	        data: {"fname":fname,"phone":phone,"email":email,"password":password,"sname":sname,"country":country},
// 	        beforeSend: function () {
// 	        $("#err_reg").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication</div>');
// 	        $("#spin").show();
// 	        },
// 	        success: function (responce) {
// 	            if(responce == 'success')
// 	            {
// 	            	$("#err_reg").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>User successfully Register</div>');
// 	            	$("#spin").hide();
// 	            	$("#fname").val('');
// 					$("#phone").val('');
// 					$("#re_email").val('');
// 					$("#re_password").val('');
// 					$("#repassword").val('');
// 					$("#sname").val('');
// 					$("#country").val('');
// 	            }
// 	            else
// 	            {
// 	            	$("#err_reg").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+responce+'</div>');
// 	            }
// 	        }
// 	    });
// 	}
// });


$(document).on('click','#goto_step2',function()
{
	var businesstype = $("#businesstype").val();
	if(businesstype == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Select Business Type.</div>');
		$("#businesstype").focus();
		return false;
	}
	else
	{
		if(businesstype == 'Travel Agent')
		{
			$(".title").text('Profile Pic');
			$("#bnamebox").hide();
		}
		else
		{
			$("#bnamebox").show();
		}
		$("#err").html('');
		$("#step1").fadeOut(500);
		$("#step2").fadeIn(1000);
		document.body.scrollTop = 0;
  		document.documentElement.scrollTop = 0;
	}
	
});

$(document).on('click','#goto_step3',function()
{
	var fname = $("#fname").val();
	var surname = $("#surname").val();
	var phone = $("#phone").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var repassword = $("#repassword").val();
	if(fname == '')
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
		$("#err").html('');
		$("#step2").fadeOut(500);
		$("#step3").fadeIn(1000);
		document.body.scrollTop = 0;
  		document.documentElement.scrollTop = 0;
	}
	
});

$(document).on('click','#goto_step4',function()
{
	var FileInput = $("#blogo").val();
	var bname = $("#bname").val();
	var vatid = $("#vatid").val();
	var businesstype = $("#businesstype").val();

	var locations = [];
    $("input[name='locations[]']:checked").each(function(){locations.push($(this).val());});    
   

	$("#err").html('');
	if(FileInput == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Upload Your Bussness Logo.</div>');
		$("#FileInput").focus();
		return false;
	}
	else if(businesstype == 'Car Rental Business' && bname == '')	
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Bussness Name.</div>');
		$("#bname").focus();
		return false;
	}	
	else if (locations.length == 0)	
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Location And Add Address.</div>');
		$("#locations").focus();
		return false;
	}
	
	else if(vatid == '')	
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter VAT ID.</div>');
		$("#vatid").focus();
		return false;
	}
	else
	{
		$("#err").html('');
		$("#step3").fadeOut(500);
		$("#step4").fadeIn(1000);
		document.body.scrollTop = 0;
  		document.documentElement.scrollTop = 0;
	}
	
});

$(document).on('click','#back1',function()
{
	$("#step2").fadeOut(500);
	$("#step1").fadeIn(1000);	
	document.body.scrollTop = 0;
  	document.documentElement.scrollTop = 0;
});

$(document).on('click','#back2',function()
{
	$("#step3").fadeOut(500);
	$("#step2").fadeIn(1000);	
	document.body.scrollTop = 0;
  	document.documentElement.scrollTop = 0;
});

$(document).on('click','#back3',function()
{
	$("#step4").fadeOut(500);
	$("#step3").fadeIn(1000);
	document.body.scrollTop = 0;
  	document.documentElement.scrollTop = 0;
});


$(document).ready(function (e) {
 $("#form_addlead").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: path+"Master/ClientRegister",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    $("#err").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='success')
    {
     // invalid file format.
     $("#err").html('<div class="alert dark alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Vender registered successfully.</div>').fadeIn();
     $("#form_addlead")[0].reset(); 
     $("#step4").fadeOut(500);
	 $("#step1").fadeIn(1000);
	 document.body.scrollTop = 0;
  	 document.documentElement.scrollTop = 0;
    }
    else
    {
     // view uploaded file.
     $("#err").html('<div style="margin-left: 0px; width: 100%;" class="alert alert-warning"><strong>Opps!</strong> '+data+'</div>').fadeIn();
     //$("#form")[0].reset(); 
     
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});

// $(document).on('click','#addlocation',function(){
// 	$("#locationbox").append(locationbox());
// });

// $(document).on('click','#removelocation',function(){
// 	$(this).parent().parent().remove();
// });

// function locationbox()
// {
// 	return '<div class="input-group" style="margin-bottom: 10px;"><input type="text" class="form-control" placeholder="Add More Locations" name="locations_m[]"><div class="input-group-btn"><button class="btn btn-default btndelete" type="button" id="removelocation"><i class="fa fa-trash"></i>				      </button></div></div>';
// }
$(document).on('click','#Loginfirst',function(){
	$(".loginchange").attr('id','login_btn');
});

$(document).on('click','#Loginsecond',function(){
	$(".loginchange").attr('id','secondlogin');
});

// $(document).on('click','#login_btn',function(){
// 	var email = $("#email").val();
// 	var password = $("#password").val();
// 	if(email == '')
// 	{
// 		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Your Email Address.</div>');
// 		$("#email").focus();
// 		return false;
// 	}
// 	else if(password == '')
// 	{
// 		$("#err").html('<div class="alert alert-danger" role="alert">Please Create Password.</div>');
// 		$("#password").focus();
// 		return false;
// 	}
// 	else
// 	{
// 		$.ajax({
// 	        type: 'POST',
// 	        url: path + 'Master/LoginUser',
// 	        data: {"email":email,"password":password},
// 	        beforeSend: function () {
// 	        $("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication</div>');
// 	        $("#spin").show();
// 	        },
// 	        success: function (responce) {
// 	            if(responce == 'success')
// 	            {
// 	            	$("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>User successfully Login</div>');
// 	            	$("#email").val('');
// 	            	$("#password").val('');
// 	            	window.location.href = path+"dashboard";
// 	            }
// 	            else if(responce == 'block')
// 	            {
// 	            	$("#err").html('<div class="alert dark alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>This account has been closed. Please contact support for further details.</div>');
// 	            	$("#email").val('');
// 	            	$("#password").val('');
// 	            }
// 	            else
// 	            {
// 	            	$("#err").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>These credentials do not match our records.</div>');
// 	            }
// 	        }
// 	    });
// 	}
// });

// $(document).on('click','#resetpassword',function(){
// 	var email = $("#email").val();
// 	if(email == '')
// 	{
// 		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Your Email Address.</div>');
// 		$("#email").focus();
// 		return false;
// 	}
	
// 	else
// 	{
// 		$.ajax({
// 	        type: 'POST',
// 	        url: path + 'Master/CheckEmailAddress',
// 	        data: {"email":email},
// 	        beforeSend: function () {
// 	        $("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication</div>');
// 	        $("#spin").show();
// 	        },
// 	        success: function (responce) {
// 	            if(responce == 'success')
// 	            {
// 	            	$("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>We have sent an OTP to your email address <br>Please Check Your Email And Verify Your Account.</div>');
// 	            	$("#headingtext").text('Account Verification');
// 	            	$("#email_box").hide();
// 	            	$("#otp_box").show();
// 	            }
// 	            else if(responce == 'block')
// 	            {
// 	            	$("#err").html('<div class="alert dark alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>This account has been closed. Please contact support for further details.</div>');
// 	            	$("#email").val('');
// 	            	$("#password").val('');
// 	            }
// 	            else
// 	            {
// 	            	$("#err").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>These credentials do not match our records.</div>');
// 	            }
// 	        }
// 	    });
// 	}
// });

// $(document).on('click','#matchotp',function(){
// 	var otp = $("#otp").val();
// 	if(otp == '')
// 	{
// 		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter One Time Password.</div>');
// 		$("#otp").focus();
// 		return false;
// 	}
	
// 	else
// 	{
// 		$.ajax({
// 	        type: 'POST',
// 	        url: path + 'Master/Checkotp',
// 	        data: {"otp":otp},
// 	        beforeSend: function () {
// 	        $("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication</div>');
// 	        $("#spin").show();
// 	        },
// 	        success: function (responce) {
// 	            if(responce == 'success')
// 	            {
// 	            	$("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>We have sent an OTP to your email address <br>OTP Match. Please Create your New Password.</div>');
// 	            	$("#headingtext").text('Create New Password');
// 	            	$("#otp_box").hide();
// 	            	$("#password_box").show();
// 	            }	            
// 	            else
// 	            {
// 	            	$("#err").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>OTP Not Match Please Check OTP.</div>');
// 	            }
// 	        }
// 	    });
// 	}
// });

// $(document).on('click','#Changepassword',function(){
// 	var password = $("#password").val();
// 	var cpass = $("#cpass").val();
// 	if(password == '')
// 	{
// 		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter New Password.</div>');
// 		$("#password").focus();
// 		return false;
// 	}

// 	else if(password != cpass)
// 	{
// 		$("#err").html('<div class="alert alert-danger" role="alert">Password And Confirm Password Not Match.</div>');
// 		$("#password").focus();
// 		return false;
// 	}
	
// 	else
// 	{
// 		$.ajax({
// 	        type: 'POST',
// 	        url: path + 'Master/ChangePassword',
// 	        data: {"password":password,"cpass":cpass},
// 	        beforeSend: function () {
// 	        $("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication</div>');
// 	        $("#spin").show();
// 	        },
// 	        success: function (responce) {
// 	            if(responce == 'success')
// 	            {
// 	            	$("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>We have sent an OTP to your email address <br>Your password has been changed, <a href="'+path+'Login.">Click here</a> to login</div>');	            	
// 	            }	            
// 	            else
// 	            {
// 	            	$("#err").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>It is not possible to change your password. Please try again.</div>');
// 	            }
// 	        }
// 	    });
// 	}
// });


// $(document).on('change','#pcartype',function(){
// 	var id = $(this).val();
// 	$.ajax({
//         type: 'POST',
//         url: path + 'Master/GetCarName',
//         data: {"id":id},
//         beforeSend: function () {
//         },
//         success: function (responce) {
//             $("#pcarname").html(responce);
//         }
//     });
// });

$(document).on('click','#postrequirement',function(){
	var ptitle = $("#ptitle").val();
	var pcartype = $('input[name="vcartype"]:checked').val();
	var plocation = $("#plocation").val();
	var fromdateInput = $("#fromdate").val();
    var todateInput = $("#todate").val();
	var rangrfrom = $("#rangrfrom").val();
	var rangrto = $("#rangrto").val();
	var remark = $("#remark").val();

	$("#err").html('');

	 var fromdate = new Date(fromdateInput);
    var todate = new Date(todateInput);
	if(ptitle == '')
	{
		$("#err").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Title is Required.</div>');
		$("#ptitle").focus();
		return false;
	}
	else if(pcartype == '')
	{
		$("#err").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select Car Type.</div>');
		
		return false;
	}	
	else if(plocation == '')
	{
		$("#err").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select Location.</div>');
		$("#plocation").focus();
		return false;
	}
	else
	{
	
		$.ajax({
            type: 'POST',
            url: path + 'Master/PostRequirement',
            data: {
                "ptitle": ptitle,
                "pcartype": pcartype,
                "plocation": plocation,
                "fromdate": fromdateInput,
                "todate": todateInput,
                "rangrfrom": rangrfrom,
                "rangrto": rangrto,
                "remark": remark
            },
            beforeSend: function () {
                // Show loading indicator or do something before the request is sent
            },
            success: function (responce) {
                if (responce == 'success') {
                    $("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Your car booking request has been submitted successfully. Our vendor will start offering prices.</div>');
                    $("#ptitle").val('');
                    $("#pcartype").val('');
                    $("#pcarname").val('');
                    $("#plocation").val('');
                    $("#fromdate").val('');
                    $("#todate").val('');
                    $("#remark").val('');
                    $("#rangrfrom").val('25');
                    $("#rangrto").val('200');
                } else if (responce == 'Login Required') {
                    $("#err").html('<div class="alert dark alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><a href="' + path + 'Login">Click here</a> To Login </div>');
                } else {
                    $("#err").html('<div class="alert dark alert-primary alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication...</div>');
                    $("#openloginmodel").click();
                }
            }
        });
    }
});

$(document).on('click','#secondlogin',function(){
	var email = $("#email").val();
	var password = $("#password").val();
	if(email == '')
	{
		$("#error").html('<div class="alert alert-danger" role="alert">Please Enter Your Email Address.</div>');
		$("#email").focus();
		return false;
	}
	else if(password == '')
	{
		$("#error").html('<div class="alert alert-danger" role="alert">Please Enter Password.</div>');
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
	        $("#error").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication</div>');	        
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {
	            	$("#error").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>User successfully Login</div>');
	            	$("#email").val('');
	            	$("#password").val('');
	            	setTimeout(function(){ 
	            		$("#closelogin").click();
	            		window.location.href = path+"PostRequirement";
	            	}, 1000);
	            	
	            }
	            else if(responce == 'block')
	            {
	            	$("#error").html('<div class="alert dark alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>This account has been closed. Please contact support for further details.</div>');
	            	$("#email").val('');
	            	$("#password").val('');
	            }
	            else
	            {
	            	$("#error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>These credentials do not match our records.</div>');
	            }
	        }
	    });
	}
});


$(document).on('click',"#getcontroller",function(){
	$('a').removeClass("active");
    $(this).addClass("active");

	var controller = $(this).attr('controller');
	var title = $(this).attr('title');
	$("#dash_head").text(title);
	$.ajax({
	        type: 'POST',
	        url: path + 'Pages/'+controller,
	        //data: {"email":email,"password":password},
	        beforeSend: function () {
	        	$("#load_data").html('<div class="lds-ripple"><div></div><div></div></div>');	        
	        },
	        success: function (responce) {
	            $("#load_data").html(responce);
	        }
	    });
});

$(document).on('click',"#getoffers",function(){
	var controller = 'GetOffers';
	var id = $(this).attr('fdi');
	
	$.ajax({
	        type: 'POST',
	        url: path + 'Pages/'+controller,
	        data: {"id":id},
	        beforeSend: function () {
	        	$("#load_data").html('<div class="lds-ripple"><div></div><div></div></div>');	        
	        },
	        success: function (responce) {
	            $("#load_data").html(responce);
	        }
	    });
});

$(document).on('click','#editprofile',function(){
	var ed_fname = $("#ed_fname").val();
	var ed_sname = $("#ed_sname").val();
	var ed_country = $("#ed_country").val();
	var ed_email = $("#ed_email").val();
	var ed_phone = $("#ed_phone").val();
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(ed_fname == '')
	{
		$("#ed_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Enter Your Name.</div>');	 
		$("#ed_fname").focus();
		return false;
	}
	else if(ed_sname == '')
	{
		$("#ed_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Enter surname.</div>');	 
		$("#ed_sname").focus();
		return false;
	}
	else if(ed_country == '')
	{
		$("#ed_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Enter Country Name.</div>');	 
		$("#ed_country").focus();
		return false;
	}
	else if(ed_email == '')
	{
		$("#ed_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Enter Your Email Address.</div>');	 
		$("#ed_email").focus();
		return false;
	}
	else if(!ed_email.match(mailformat))
	{
		$("#ed_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Enter Valid Email Address.</div>');	 
		$("#ed_email").focus();
		return false;
	}
	else if(ed_phone == '')
	{
		$("#ed_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Enter Your Phone Number.</div>');	 
		$("#ed_phone").focus();
		return false;
	}
	else
	{
		$("#ed_username").text(ed_fname);
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/EditProfile',
	        data: {"ed_fname":ed_fname,"ed_email":ed_email,"ed_phone":ed_phone,"ed_sname":ed_sname,"ed_country":ed_country},
	        beforeSend: function () {
	        	$("#ed_error").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication</div>');	        
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {
	            	$("#ed_error").html('<div class="alert dark alert-primary alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Your Profile successfully Update</div>');
	            }	
	        }
	    });
	}
	
});

$(document).on('click','#changepassword',function(){
	var old_password = $("#old_password").val();
	var new_password = $("#new_password").val();
	var cnf_password = $("#cnf_password").val();
	if(old_password == '')
	{
		$("#pa_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Enter Your Old Password.</div>');	 
		$("#old_password").focus();
		return false;
	}
	else if(new_password == '')
	{
		$("#pa_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Enter Your New Password.</div>');	 
		$("#new_password").focus();
		return false;
	}
	else if(cnf_password == '')
	{
		$("#pa_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Enter Confirm Password.</div>');	 
		$("#cnf_password").focus();
		return false;
	}
	else if(new_password != cnf_password)
	{
		$("#pa_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Password And Confirm Password Not Match.</div>');	 
		$("#cnf_password").focus();
		return false;
	}
	else
	{		
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/UpdatePassword',
	        data: {"old_password":old_password,"new_password":new_password,"cnf_password":cnf_password},
	        beforeSend: function () {
	        	$("#pa_error").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication</div>');	        
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {
	            	$("#pa_error").html('<div class="alert dark alert-primary alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Your Password successfully Update</div>');
	            }
	            else
	            {
	            	$("#pa_error").html('<div class="alert dark alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+responce+'</div>');
	            }	
	        }
	    });
	}
	
});

$(document).on('click',"#singlepost",function(){
	var id = $(this).attr('fdi');
	$.ajax({
	        type: 'POST',
	        url: path + 'Pages/BookingSingle',
	        data: {"id":id},
	        beforeSend: function () {
	        	$("#load_data").html('<div class="lds-ripple"><div></div><div></div></div>');	        
	        },
	        success: function (responce) {
	            $("#load_data").html(responce);
	        }
	    });
});

$(document).on('click',"#post_bid",function(){
	var pid = $("#postid").val();
	var bid_amount = $("#bid_amount").val();
	var ctype = $("#pcartype").val();
	var car = $("#pcarname").val();
	$("#pcartype,#pcarname,#bid_amount").css('border-color','#eee');
	if(ctype == '')
	{
		$("#pcartype").css('border-color','red');
		return false;
	}
	else if(car == '')
	{		
		$("#pcarname").css('border-color','red');
		return false;
	}
	else if(bid_amount == '')
	{
		$("#bid_amount").css('border-color','red');
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/BidPost',
	        data: {"pid":pid,"bid_amount":bid_amount,"ctype":ctype,"car":car},
	        beforeSend: function () {
	        	        
	        },
	        success: function (responce) {
	        	if(responce == 'success')
	        	{
	        		$("#bid_error").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Your Offer Submited.</div>');
	        	}
	        	else if(responce == 'Login Required')
	        	{
	        		$("#bid_error").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>You need to login.</div>');
	        	}
	        	else
	        	{
	        		$("#bid_error").html('<div class="alert dark alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>You are  already give Offer.</div>');
	        	}
	            
	        }
	    });
	}
	
});

$(document).on('click',"#selectoffer",function(){
	$("#selectbidid").val($(this).attr('fdi'));
});

$(document).on('click',"#accept-offer",function(){
	var bid = $("#selectbidid").val();
	$("#accept-offer").attr("disabled", true); 
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/AwardPost',
	        data: {"bid":bid},
	        beforeSend: function () {
	        	 $("#bid_offer_error").html('<div class="alert dark alert-primary alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Wait...</div>');
	        	       
	        },
	        success: function (responce) {
	        	if(responce == 'success')
	        	{
	        		$("#bid_offer_error").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Your Offer Selected successfully.</div>');
	        		setTimeout(function(){ $('#myModal').modal('hide'); }, 1500);
	        		$("#accept-offer").attr("disabled", false);
	        		
	        	}	        	
	        	else
	        	{
	        		$("#bid_offer_error").html('<div class="alert dark alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+responce+'</div>');
	        	}
	            
	        }
	    });
});

$(document).on('change',"input[name='locations[]']",function(){
	$("#address_div").html('');
	var items = [];
    $("input[name='locations[]']:checked").each(function(){items.push($(this).val());});    
    if (items.length > 0)
    { 
		for(var i = 0; i < items.length; i++)
		{
		   $("#address_div").append('<div class="col-md-12 col-12 mb-20"><label>Address Of '+items[i]+'*</label><input type="text" placeholder="Address Of '+items[i]+'" id="'+items[i]+'" name="'+items[i]+'"></div>');
		}
    }
});

$(document).on('change',"input[name='ed_locations[]']",function(){
	$("#address_div").html('');
	var items = [];
    $("input[name='ed_locations[]']:checked").each(function(){items.push($(this).val());});    
    if (items.length > 0)
    { 
		for(var i = 0; i < items.length; i++)
		{
			if ($('#ed_'+items[i]).length > 0) 
			{
				  // Exists.
			}
		   else
		   {
		   	$("#address_div").append('<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6"><div class="single-input mb-25"><label for="ed_vat">Address Of '+items[i]+' <span>*</span></label><input type="text" id="ed_'+items[i]+'" name="ed_'+items[i]+'" placeholder="Address Of '+items[i]+'" ></div></div>');
		   }
		}
    }
});

$(document).on('change',"input[name='vtype[]']",function(){
	$("#checkboxes_cname").html('');
	var vtype = [];
    $("input[name='vtype[]']:checked").each(function(){vtype.push($(this).val());});
    if(vtype.length > 0)
    {
    	$.ajax({
	        type: 'POST',
	        url: path + 'Master/GetCompanyName',
	        data: {"vtype":vtype},
	        beforeSend: function () {
	        	        
	        },
	        success: function (responce) {
	        	$("#checkboxes_cname").html(responce);		            
	        }
	    });
    }
    
    
});

$(document).on('change',"input[name='cnames[]']",function(){
	$("#checkboxes_vname").html('');
	var cnames = [];
    $("input[name='cnames[]']:checked").each(function(){cnames.push($(this).val());});
    if(cnames.length > 0)
    {
    	$.ajax({
	        type: 'POST',
	        url: path + 'Master/GetModelName',
	        data: {"cnames":cnames},
	        beforeSend: function () {
	        	        
	        },
	        success: function (responce) {
	        	$("#checkboxes_vname").html(responce);		            
	        }
	    });
    }    
});

$(document).on('click',"#deleteaccount",function(){
	$.ajax({
        type: 'POST',
        url: path + 'Master/DeleteAccount',
        //data: {"cnames":cnames},
        beforeSend: function () {
        	        
        },
        success: function (responce) {
        	if(responce == 'success')
        	{
        		$("#bid_offer_error").html('<p style="color:red;">Your Account has been Deleted.</p>');
        		window.location.href = path+'logout';
        	}
        	else
        	{
        		$("#bid_offer_error").html(responce);
        	}
        			            
        }
    });
});

$(document).on('click',"#send_support_tickets",function(){
	var subject = $("#support_subject").val();
	var message = $("#support_query").val();
	if(subject == '')
	{
		$("#error").html('<p style="color:red;">Please Enter Your Subject.</p>');
		$("#support_subject").focus();
		return false;
	}
	else if(message == '')
	{
		$("#error").html('<p style="color:red;">Please Enter Your Query.</p>');
		$("#support_subject").focus();
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/SupportTicket',
	        data: {"subject":subject,"message":message},
	        beforeSend: function () {
	        	 $("#error").html('<p style="color:blue;">Please Wait...</p>');       
	        },
	        success: function (responce) {
	        	 if(responce == 'success')
	        	 {
	        	 	$("#error").html('<p style="color:green;">A support ticket request hash been created and a representative will be getting back to you shortly if necessary.</p>');
	        	 }  
	        	 else
	        	 {
	        	 	 $("#error").html('<p style="color:red;">'+responce+'</p>'); 
	        	 } 
	        	$("#support_subject").val('');
				$("#support_query").val('');    			            
	        }
	    });
	}
	
});

$(document).on('click','#show_edit_box',function(){
	var id = $(this).attr('fdi');
	$("#show_box_"+id).hide();
	$("#edit_box_"+id).show(500);
});

$(document).on('click','#EditBidPrice',function(){

	var id = $(this).attr('fdi');
	$bidid = id;
	var am = $("#get_edit_price_"+id).val();
	alert(am);
	if(am == '')
	{
		$("#get_edit_price_"+id).focus();
		return false;
	}
	else
	{
		$("#current_price_"+id).html('<b>Offered Price : </b> € '+am);
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/EditBidPrice',
	        data: {"id":id,"am":am},
	        beforeSend: function () {
	        	      
	        },
	        success: function (responce) {
	        	$("#edit_box_"+$bidid).hide();
	        	$("#show_box_"+$bidid).show(500);				  			            
	        }
	    });
	}
});

$(document).on('click','#submit_vendor_form',function(){
	$("#vendor_ed_form").submit();
});

$(document).on('click','#discard-offer',function(){
	var id = $("#discardbidid").val();
	$("#OfferBtn_"+id).html('<a style="background: red; color:#fff; margin-right: 20px;" href="javascript:void(0);">This offer has been successfully Discard.</a>');
	$.ajax({
        type: 'POST',
        url: path + 'Master/DiscardOffer',
        data: {"id":id},
        beforeSend: function () {
        	      
        },
        success: function (responce) {
        	$('#myModalDiscard').modal('hide'); // Show modal				  			            
        }
    });
});

$(document).on('click','.cartype_radio li',function(){ 	   
    $(this).find('input[type=radio]').attr("checked", true);
    $(".cartype_radio li").removeClass('car_active');     
	$(this).addClass('car_active');  
    });
