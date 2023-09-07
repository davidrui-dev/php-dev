// $(document).on('ready',function(){	
//     console.log("hi11");
//     var email = $("#sign_id").val();
//     var password = $("#sign_pass").val();
// 	if(email == '')
// 	{
// 		// $("#err").html('<p style="color: #EC7063;">Please Enter Your Username or Email Address.</p>');
// 		// $("#email").focus().css('border-color',"#EC7063");
// 		return false;
// 	}
// 	else if(password == '') 
// 	{
// 		$("#err").html('<p style="color: #EC7063;">Please Create Password.</p>');
// 		$("#password").focus().css('border-color',"#EC7063");
// 		return false;
// 	}
// 	else
// 	{
// 		$.ajax({
// 	        type: 'POST',
// 	        url: path + 'Master/LoginUser',
// 	        data: {"email":email,"password":password},
// 	        beforeSend: function () {
// 	        $("#err").html('<p style="color: #5DADE2;">Please Wait...</p>');	        
// 	        },
// 	        success: function (responce) {
// 	            if(responce == 'success')
// 	            {
// 	            	$("#err").html('<p style="color: #58D68D;">Login Success. Redirecting...</p>');
// 	            	$("#email").val('');
// 	            	$("#password").val('');
// 	            	window.location.href = path+"dashboard";
// 	            }
// 	            else if(responce == 'block')
// 	            {
// 	            	$("#err").html('<p style="color: #EC7063;">This account has been closed. Please contact support for further details.</p>');	            	
// 	            	$("#email").val('');
// 	            	$("#password").val('');
// 	            }
// 	            else
// 	            {
// 	            	$("#err").html('<p style="color: #EC7063;">These credentials do not match our records.</p>');
// 	            }
// 	        }
// 	    });
// 	}
// });

// $( window ).on( "load", function() {
// 	console.log( "window loaded" );
// 	var email = $("#sign_id").val();
//     var password = $("#sign_pass").val();
// 	console.log(email);
// 	console.log(password);
// 	if(email == '')
// 	{
// 		// $("#err").html('<p style="color: #EC7063;">Please Enter Your Username or Email Address.</p>');
// 		// $("#email").focus().css('border-color',"#EC7063");
// 		return false;
// 	}
// 	else if(password == '') 
// 	{
// 		$("#err").html('<p style="color: #EC7063;">Please Create Password.</p>');
// 		$("#password").focus().css('border-color',"#EC7063");
// 		return false;
// 	}
// 	else
// 	{
// 		$.ajax({
// 	        type: 'POST',
// 	        url: path + 'Master/LoginUser',
// 	        data: {"email":email,"password":password},
// 	        beforeSend: function () {
// 	        $("#err").html('<p style="color: #5DADE2;">Please Wait...</p>');	        
// 	        },
// 	        success: function (responce) {
// 	            if(responce == 'success')
// 	            {
// 	            	$("#err").html('<p style="color: #58D68D;">Login Success. Redirecting...</p>');
// 	            	$("#email").val('');
// 	            	$("#password").val('');
// 	            	window.location.href = path+"dashboard";
// 	            }
// 	            else if(responce == 'block')
// 	            {
// 	            	$("#err").html('<p style="color: #EC7063;">This account has been closed. Please contact support for further details.</p>');	            	
// 	            	$("#email").val('');
// 	            	$("#password").val('');
// 	            }
// 	            else
// 	            {
// 	            	$("#err").html('<p style="color: #EC7063;">These credentials do not match our records.</p>');
// 	            }
// 	        }
// 	    });
// 	}
// });

$(document).on('click','#newsletter-submit',function(e){
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var email = $("#newsletteremail").val();
    $(".form-result").show();
    if(email == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Your Email Id.</div>');
		$("#email").focus();
		return false;
	}
	else if(!email.match(mailformat))
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Valid Email Address.</div>');
		$("#email").focus();
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'master/newsletter',
	        data: {"email":email},
	        beforeSend: function () {
	        $("#err").html('<div class="alert alert-info" role="alert">Please Wait...</div>');	        
	        },
	        success: function (responce) {
	        	if(responce == 'success')
	        	{
	        		$("#err").html('<div class="alert alert-success" role="alert">Thank You for Subscribing</div>');
	        	}
	        	else
	        	{
	        		$("#err").html('<div class="alert alert-warning" role="alert">'+responce+'</div>');
	        	}
	            
	        }
	    });
	}
});

$(document).on('click','#getintouch',function(){
	var name = $("#name").val();
	var email = $("#email").val();
	var subject = $("#subject").val();
	var content = $("#content").val();
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	$("#name,#email,#subject,#content").css('border-color',"#efe7e7");
	if(name == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Your Name.</p>');
		$("#name").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(email == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Your Email Id.</p>');
		$("#email").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(!email.match(mailformat))
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Valid Email Address.</p>');
		$("#email").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(subject == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Your subject.</p>');
		$("#subject").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(content == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Your Message.</p>');
		$("#content").focus().css('border-color',"#EC7063");
		return false;
	}
	else
	{
		$("#err").html('<p style="color: #5DADE2;">Please Wait...</p>');
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/GetInTouch',
	        data: {"name":name,"email":email,"subject":subject,"content":content},
	        beforeSend: function () {
	        $("#err").html('<p style="color: #5DADE2;">Please Wait...</p>');
	        $("#spin").show();
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {
	            	$("#err").html('<p style="color: #58D68D;">We appreciate you contacting us. One of our colleagues will get back in touch with you soon!</p>');
	            	
	            	$("#name").val('');
					$("#email").val('');
					$("#subject").val('');
					$("#content").val('');
	            }
	            else
	            {
	            	$("#err").html('<p style="color: #EC7063;">'+responce+'</p>');
	            }
	        }
	    });
	}
});

$(document).on('click','#login_btn',function(){	
	var email = $("#email").val();
	var password = $("#password").val();
	$("#email,#password").css('border-color',"#efe7e7");
	if(email == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Your Username or Email Address.</p>');
		$("#email").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(password == '') 
	{
		$("#err").html('<p style="color: #EC7063;">Please Create Password.</p>');
		$("#password").focus().css('border-color',"#EC7063");
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/LoginUser',
	        data: {"email":email,"password":password},
	        beforeSend: function () {
	        $("#err").html('<p style="color: #5DADE2;">Please Wait...</p>');	        
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {
	            	$("#err").html('<p style="color: #58D68D;">Login Success. Redirecting...</p>');
	            	$("#email").val('');
	            	$("#password").val('');
	            	window.location.href = path+"dashboard";
	            }
	            else if(responce == 'block')
	            {
	            	$("#err").html('<p style="color: #EC7063;">This account has been closed. Please contact support for further details.</p>');	            	
	            	$("#email").val('');
	            	$("#password").val(''); 
					window.location.href = path+"verify";
	            }
	            else
	            {
	            	$("#err").html('<p style="color: #EC7063;">These credentials do not match our records.</p>');
	            }
	        }
	    });
	}
});

$(document).on('click','#userregister_second',function(){
	var fname = $("#fname").val();
	var sname = $("#sname").val();
	var country = $("#country").val();
	var phone = $("#phone").val();
	var email = $("#re_email").val();
	var password = $("#re_password").val();
	var repassword = $("#repassword").val();
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	$("#fname,#sname,#country,#phone,#re_email,#re_password,#repassword").css('border-color',"#efe7e7");
	if(fname == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Your First Name.</p>');
		$("#fname").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(sname == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Your Surname Name.</p>');
		$("#sname").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(country == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Country Name.</p>');
		$("#country").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(phone == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Your Phone Number.</p>');
		$("#phone").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(email == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Your Email Address.</p>');
		$("#re_email").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(!email.match(mailformat))
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Valid Email Address.</p>');
		$("#re_email").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(password == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Create Password.</p>');
		$("#re_password").focus().css('border-color',"#EC7063");
		return false;
	}
	else if(repassword == '')
	{
		$("#err").html('<p style="color: #EC7063;">Please Enter Confirn Password.</p>');
		$("#repassword").focus();
		return false;
	}
	else if(password != repassword)
	{
		$("#err").html('<p style="color: #EC7063;">Password And Confirn Password Not Match.</p>');
		$("#repassword").focus().css('border-color',"#EC7063");
		return false;
	}	
	else if($("input[name=terms_agree]").prop("checked") == false)
	{
		$("#err").html('<p style="color: #EC7063;">Please Agree Terms and Conditions.</p>');		
		return false;
	}
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/RegisterUser',
	        data: {"fname":fname,"phone":phone,"email":email,"password":password,"sname":sname,"country":country},
	        beforeSend: function () {
	        $("#err").html('<p style="color: #5DADE2;">Please Wait...</p>');
	        $("#spin").show();
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {
	            	$("#err").html('<p style="color: #58D68D;">User successfully Register</p>');
	            	$("#spin").hide();
	            	$("#fname").val('');
					$("#phone").val('');
					$("#re_email").val('');
					$("#re_password").val('');
					$("#repassword").val('');
					$("#sname").val('');
					$("#country").val('');
	            }
	            else
	            {
	            	$("#err").html('<p style="color: #EC7063;">'+responce+'</p>');
	            }
	        }
	    });
	}
});

$(document).on('click','#next_page',function()
{
	$("#next_page").text('Loading...');
	var lastid = $(this).attr('fdi');
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/NextPost',
	        data: {"lastid":lastid},
	        beforeSend: function () {
	        
	        },
	        success: function (responce) {
	            if(responce != '')
	            {
	            	$("#getloadmorepost").html(responce);
	            	var end_num = $("#end_num").text();	            	
	            	$("#start_num").text(end_num);
	            	setTimeout(function(){ 
	            		var lasttotal = $("#lasttotal").text();
	            		var total = parseInt(end_num) + parseInt(lasttotal);
	            	    $("#end_num").text(total);	            	    
	            	 }, 1000);
	            	
	            }
	            else
	            {
	            	$("#next_page").text('No More Record Found.');	            	
	            }
	        }
	    });
});	

$(document).on('click','#previous_page',function()
{
	$("#previous_page").text('Loading...');
	var lastid = $(this).attr('fdi');
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/PreviousPost',
	        data: {"lastid":lastid},
	        beforeSend: function () {
	        
	        },
	        success: function (responce) {
	            if(responce != '')
	            {
	            	$("#getloadmorepost").html(responce);
	            	//$("#getloadmorepost").html(responce);
	            	var start_num = $("#start_num").text();	            	
	            	$("#end_num").text(start_num);
	            	setTimeout(function(){ 
	            		var lasttotal = $("#lasttotal").text();
	            		var total = parseInt(start_num) - parseInt(lasttotal);
	            	    $("#start_num").text(total);	            	    
	            	 }, 1000);
	            }
	            else
	            {
	            	$("#previous_page").text('No More Record Found.');	            	
	            }
	        }
	    });
});	

$(document).on('click','#filterpost',function()
{
	var locations = [];
	var vtypes = [];
    $("input[name='location[]']:checked").each(function(){locations.push($(this).val());}); 
    $("input[name='vtype[]']:checked").each(function(){vtypes.push($(this).val());}); 
    var max_price = $("#max_price").val();
    var min_price = $("#min_price").val();
    if(locations.length == 0 && vtypes.length == 0 && max_price == '' && min_price == '')
    {
    	$("#error_filter").html('<p style="color: #EC7063;">You need to choose one of these</p>');
    	return false;
    }
    else
    {
    	$.ajax({
	        type: 'POST',
	        url: path + 'Master/FilterPost',
	        data: {"locations":locations,"vtypes":vtypes,"max_price":max_price,"min_price":min_price},
	        beforeSend: function () {
	        	$("#getloadmorepost").html('Please Wait...');
	        },
	        success: function (responce) {
	            $("#getloadmorepost").html(responce);
	        }
	    });
    }
});

$(document).on('change','#pcartype',function(){
	var id = $(this).val();
	$.ajax({
        type: 'POST',
        url: path + 'Master/GetCarName',
        data: {"id":id},
        beforeSend: function () {
        },
        success: function (responce) {
            $("#pcarname").html(responce);
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
		$("#security_table").show(500);
	}
	
});

$(document).on('click','#resetpassword',function(){
	var email = $("#fo_email").val();
	if(email == '')
	{
		$("#err").html('<div class="alert alert-danger" role="alert">Please Enter Your Email Address.</div>');
		$("#fo_email").focus().css('border-color','red');
		return false;
	}
	
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/CheckEmailAddress',
	        data: {"email":email},
	        beforeSend: function () {
	        $("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Wait...</div>');
	        $("#spin").show();
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {
	            	$("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>We have sent an OTP to your email address <br>Please Check Your Email And Verify Your Account.</div>');
	            	
	            	$("#email_box").hide();
	            	$("#otp_box").show();
	            }
	            else if(responce == 'block')
	            {
	            	$("#err").html('<div class="alert dark alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>This account has been closed. Please contact support for further details.</div>');
	            	$("#fo_email").val('');
	            }
	            else
	            {
	            	$("#err").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>These credentials do not match our records.</div>');
	            }
	        }
	    });
	}
});

$(document).on('click','#matchotp',function(){
	var otp = $("#otp").val();
	if(otp == '')
	{
		$("#err_otp").html('<div class="alert alert-danger" role="alert">Please Enter One Time Password.</div>');
		$("#otp").focus();
		return false;
	}
	
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/Checkotp',
	        data: {"otp":otp},
	        beforeSend: function () {
	        $("#err_otp").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Wait...</div>');
	        $("#spin").show();
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {
	            	$("#err_otp").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>We have sent an OTP to your email address <br>OTP Match. Please Create your New Password.</div>');
	            	$("#headingtext").text('Create New Password');
	            	$("#otp_box").hide();
	            	$("#password_box").show();
	            }	            
	            else
	            {
	            	$("#err_otp").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>OTP Not Match Please Check OTP.</div>');
	            }
	        }
	    });
	}
});

$(document).on('click','#Changepassword',function(){
	var password = $("#fo_password").val();
	var cpass = $("#cpass").val();
	if(password == '')
	{
		$("#err_pass").html('<div class="alert alert-danger" role="alert">Please Enter New Password.</div>');
		$("#fo_password").focus();
		return false;
	}
	else if(cpass == '')
	{
		$("#err_pass").html('<div class="alert alert-danger" role="alert">Please Enter Confirm Password.</div>');
		$("#cpass").focus();
		return false;
	}

	else if(password != cpass)
	{
		$("#err_pass").html('<div class="alert alert-danger" role="alert">Password And Confirm Password Not Match.</div>');
		$("#password").focus();
		return false;
	}
	
	else
	{
		$.ajax({
	        type: 'POST',
	        url: path + 'Master/ChangePassword',
	        data: {"password":password,"cpass":cpass},
	        beforeSend: function () {
	        $("#err_pass").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication</div>');
	        $("#spin").show();
	        },
	        success: function (responce) {
	            if(responce == 'success')
	            {
	            	$("#err_pass").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Your password has been changed, <a href="'+path+'Login">Click here</a> to login</div>');	            	
	            }	            
	            else
	            {
	            	$("#err_pass").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>It is not possible to change your password. Please try again.</div>');
	            }
	        }
	    });
	}
});

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
	// else if(businesstype == 'Car Rental Business' && bname == '')	
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

$(document).on('change',"input[name='locations[]']",function(){
	$("#address_div").html('');
	var items = [];
    $("input[name='locations[]']:checked").each(function(){items.push($(this).val());});    
    if (items.length > 0)
    { 
		for(var i = 0; i < items.length; i++)
		{
		   $("#address_div").append('<input type="text" placeholder="Address Of '+items[i]+'" id="'+items[i].replace(/ /g, "-")+'" name="'+items[i]+'">');
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
				$('#select-panel1').css('display', 'block');
				$('#select-panel1').css('float', 'right');      
				$('#select-all1').prop('checked', false);   
	        }
	    });
    }
	else
	{
		$('#select-panel1').css('display', 'none');
		$('#select-panel2').css('display', 'none');
	}
});

$(document).on('change',"#select-all",function(){
	$("#checkboxes_cname").html('');
	var vtype = [];
    $("input[name='vtype[]']:checked").each(function(){vtype.push($(this).val());});
	vtype.splice(0,1);
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
				$('#select-panel1').css('display', 'block');
				$('#select-panel1').css('float', 'right');      
				$('#select-all1').prop('checked', false);   
	        }
	    });
    }
	else
	{
		$('#select-panel1').css('display', 'none');
		$('#select-panel2').css('display', 'none');
	}
});

$(document).on('change',"#select-all1",function(){
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
				$('#select-panel2').css('display', 'block');
				$('#select-panel2').css('float', 'right');
				$('#select-all2').prop('checked', false);
	        	$("#checkboxes_vname").html(responce);		            
	        }
	    });
    }
	else
	{
		$('#select-panel2').css('display', 'none');
	}
});



$(document).ready(function() {
	// Event listener for the "Select All" checkbox
	$('#select-all').on('change', function() {
		if ($(this).is(':checked')) {
			// Check all checkboxes
			$('input[name="vtype[]"]').prop('checked', true);

		} else {
			// Uncheck all checkboxes
			$('input[name="vtype[]"]').prop('checked', false);
		}

	});
	
	// Event listener for individual checkboxes
	$('input[name="vtype[]"]').on('change', function() {
		// Check if all checkboxes are checked
		var allChecked = ($('input[name="vtype[]"]:checked').length === $('input[name="vtype[]"]').length);
		
		// Update "Select All" checkbox
		$('#select-all').prop('checked', allChecked);
	});
});

$(document).ready(function() {
	// Event listener for the "Select All" checkbox
	$('#select-all1').on('change', function() {
		if ($(this).is(':checked')) {
			// Check all checkboxes
			$('input[name="cnames[]"]').prop('checked', true);

		} else {
			// Uncheck all checkboxes
			$('input[name="cnames[]"]').prop('checked', false);
		}

	});
	
	// Event listener for individual checkboxes
	$('input[name="cnames[]"]').on('change', function() {
		// Check if all checkboxes are checked
		var allChecked = ($('input[name="cnames[]"]:checked').length === $('input[name="cnames[]"]').length);
		
		// Update "Select All" checkbox
		$('#select-all1').prop('checked', allChecked);
	});

});

$(document).ready(function() {
	// Event listener for the "Select All" checkbox
	$('#select-all2').on('change', function() {
		if ($(this).is(':checked')) {
			// Check all checkboxes
			$('input[name="cars[]"]').prop('checked', true);

		} else {
			// Uncheck all checkboxes
			$('input[name="cars[]"]').prop('checked', false);
		}

	});
	
	// Event listener for individual checkboxes
	$('input[name="cars[]"]').on('change', function() {
		// Check if all checkboxes are checked
		var allChecked = ($('input[name="cars[]"]:checked').length === $('input[name="cars[]"]').length);
		
		// Update "Select All" checkbox
		$('#select-all2').prop('checked', allChecked);
	});

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
				$('#select-panel2').css('display', 'block');
				$('#select-panel2').css('float', 'right');
				$('#select-all2').prop('checked', false);
	        	$("#checkboxes_vname").html(responce);		            
	        }
	    });
    }
	else
	{
		$('#select-panel2').css('display', 'none');
	}
});

$(document).on('keypress','#email,#password',function(e){
    if(e.which == 13){//Enter key pressed
        $("#login_btn").trigger('click');
    }
});

$(document).on('keypress','#re_email,#re_password,#repassword,#phone,#country,#sname,#fname',function(e){
    if(e.which == 13){//Enter key pressed
        $("#userregister_second").trigger('click');
    }
});

$(document).on('click','#post_bid_final',function(){	
	var obj = {
		"flag": '0'
	};
	if($('input[name=Complete_security]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname = $('input[name=Complete_security]:checked').val();
	    var fdi = $('input[name=Complete_security]:checked').attr('fdi');
	    obj[fdi] = sname;	    
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=Complete_security_with_exemption]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=Complete_security_with_exemption]:checked').val();
	    var fdi1 = $('input[name=Complete_security_with_exemption]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=Security_for_third_parties]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=Security_for_third_parties]:checked').val();
	    var fdi1 = $('input[name=Security_for_third_parties]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=Accident_insurance]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=Accident_insurance]:checked').val();
	    var fdi1 = $('input[name=Accident_insurance]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=Theft_security]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=Theft_security]:checked').val();
	    var fdi1 = $('input[name=Theft_security]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=Safety_of_passengers]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=Safety_of_passengers]:checked').val();
	    var fdi1 = $('input[name=Safety_of_passengers]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=Safety_of_glass_wear]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=Safety_of_glass_wear]:checked').val();
	    var fdi1 = $('input[name=Safety_of_glass_wear]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=Fire_safety]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=Fire_safety]:checked').val();
	    var fdi1 = $('input[name=Fire_safety]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=Road_safety]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=Road_safety]:checked').val();
	    var fdi1 = $('input[name=Road_safety]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=10_discount_if_prepaid]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=10_discount_if_prepaid]:checked').val();
	    var fdi1 = $('input[name=10_discount_if_prepaid]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=Free_kilometres]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=Free_kilometres]:checked').val();
	    var fdi1 = $('input[name=Free_kilometres]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=The_first_100_kilometres_free]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=The_first_100_kilometres_free]:checked').val();
	    var fdi1 = $('input[name=The_first_100_kilometres_free]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=10E_per_kilometres_after_the_first_100]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=10E_per_kilometres_after_the_first_100]:checked').val();
	    var fdi1 = $('input[name=10E_per_kilometres_after_the_first_100]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	if($('input[name=20E_per_kilometres_after_the_first_100]:checked').length > 0)
	{
		obj["flag"] = '1';
		var sname1 = $('input[name=20E_per_kilometres_after_the_first_100]:checked').val();
	    var fdi1 = $('input[name=20E_per_kilometres_after_the_first_100]:checked').attr('fdi');
	    obj[fdi1] = sname1;
	}
	else
	{
		//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
		//return false;
	}
	// if($('input[name=Other_options]:checked').length > 0)
	// {
	// 	obj["flag"] = '1';
	// 	var sname1 = $('input[name=Other_options]:checked').val();
	//     var fdi1 = $('input[name=Other_options]:checked').attr('fdi');
	//     obj[fdi1] = sname1;
	// }
	// else
	// {
	// 	//$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select All Option After Proccess.</div>');
	// 	//return false;
	// }

	var pid = $("#postid").val();
	var bid_amount = $("#bid_amount").val();
	var ctype = $("#pcartype").val();
	var car = $("#pcarname").val();

	var selectedvtype = $("#pcartype option:selected").html();
	var selectedcarname = $("#pcarname option:selected").html();
	var posttitle = $("#posttitle").val();
	$.ajax({
	        type: 'POST',
	        url: path + 'Master/BidPost',
	        data: {"pid":pid,"bid_amount":bid_amount,"ctype":ctype,"car":car,"obj":obj,"selectedvtype":selectedvtype,"selectedcarname":selectedcarname,"posttitle":posttitle},
	        beforeSend: function () {
	        	$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Submiting</div>');
		  
	        },
	        success: function (responce) {
	        	if(responce == 'success')
	        	{
	        		$("#error_security").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Your Offer Submited.</div>');
	        		$("#bid_error").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Your Offer Submited.</div>');
	        		$("#security_table").hide(700);
	        	}
	        	else if(responce == 'Login Required')
	        	{
	        		$("#error_security").html('<div class="alert dark alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>You need to login.</div>');
	        	}
	        	else
	        	{
	        	//	$("#error_security").html(responce);
	        		$("#error_security").html('<div class="alert dark alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ responce +'You are  already give Offer.</div>');
	        	}
	            
	        }
	    });
	
});

$(document).on('click','#showcountup',function(){
        $(".pricing").hide(300);
        $(".countup").show(700);
    });

    $(document).on('click','#showpricing',function(){
        $(".countup").hide(300);
        $(".pricing").show(700);
    });

$(document).on('click','#DeleteAllBidAccount',function()
{
	var tablename = $('#deletetablename').val();
	$.ajax({
		type: 'POST',
		url: path + 'Master/DeleteAllBidPrice',
		data: {"id":tablename},
		beforeSend: function () {
				  
		},
		success: function (responce) {
			console.log(responce);
		}
	});
});
	
