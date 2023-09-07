<?php
function Welcome_Mail_Template($username)
{
	$html='
	<!doctype html>
	<html>';
	$html .=Template_Header();
	$html .='<body style="text-align: center;padding: 5vw;background-color: #f5f5f5;">
	    <table cellpadding="0" cellspacing="0" style="margin: 0 auto;width: auto;height: auto;background-color: #ffffff;text-align: center; padding: 30px;border: 1px solid #ccc;">
	        <tr>
	            <td style="text-align: center;">
	                <img src="http://broombids.com/images/maillogo.png" alt="broombids Logo" class="logo" style="width: 350px;">
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <h1 style="text-align:center;color: #2cc1d6; margin: 0; margin-bottom: 24px; font-family: Helvetica,Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 32px; margin-top: 20px; padding: 0; word-wrap: normal;">Account
	                    Creation Succesfull </h1>
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <p style="font-size: 16px;text-align: center;color: #3c4043;">Hey <span style="color:#2cc1d6;">'.$username.'</span>,
	                    Your account has been successfully created. Now you can Connect, Share and Interact with Family,
	                    Friends and other Identities.</p>
	            </td>
	        </tr>
	      
	        <tr>
	            <td style="margin-top: 50px;">Thanks, Broombids</td>
	        </tr>
	        <tr>
	            <td>
	                <a href="http://broombids.com/" class="letsGoBtn">
	                    &nbsp; Let\'s go &nbsp;
	                </a>
	            </td>
	        </tr>
	    </table>';
	$html .=Template_Footer();	    
	$html .= '</body></html>';
	return $html;
}

function OTP_Mail_Template($username,$otp,$subject)
{
	$html='
	<!doctype html>
	<html>';
	$html .=Template_Header();
	$html .='<body style="text-align: center;padding: 5vw;background-color: #f5f5f5;">
	    <table cellpadding="0" cellspacing="0" style="margin: 0 auto;width: auto;height: auto;background-color: #ffffff;text-align: center; padding: 30px;border: 1px solid #ccc;">
	        <tr>
	            <td style="text-align: center;">
	                <img src="http://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo">
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <h1 style="text-align:center;color: #4083ff; margin: 0; margin-bottom: 24px; font-family: Helvetica,Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 32px; margin-top: 20px; padding: 0; word-wrap: normal;">'.$subject.'</h1>
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <p style="font-size: 16px;text-align: center;color: #3c4043;">Hey '.$username.',</p>
	            </td>
	        </tr>
	        <tr>
	            <td style="font-weight: bold;">Your Verification code is:</td>
	        </tr>
	        <tr>
	            <td>'.$otp.'</td>
	        </tr>
	        <tr>
	            <td>Verification code Expires in 1 hour</td>
	        </tr>
	        <tr>
	            <td style="margin-top: 50px;">Thanks, Broombids</td>
	        </tr>
	    </table>';
	$html .=Template_Footer();	    
	$html .= '</body></html>';
	return $html;
}

function LevelUp_Template($username,$level)
{
	$html='
	<!doctype html>
	<html>';
	$html .=Template_Header();
	$html .='<body style="text-align: center;padding: 5vw;background-color: #f5f5f5;">
	    <table cellpadding="0" cellspacing="0" style="margin: 0 auto;width: auto;height: auto;background-color: #ffffff;text-align: center; padding: 30px;border: 1px solid #ccc;">
	        <tr>
	            <td style="text-align: center;">
	                <img src="https://m.unidawn.com/images/login/logoMail.png" alt="" class="logo">
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <h1 style="text-align:center;color: #4083ff; margin: 0; margin-bottom: 24px; font-family: Helvetica,Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 32px; margin-top: 20px; padding: 0; word-wrap: normal;">Level '.$level.' Achieved</h1>
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <p style="font-size: 16px;text-align: center;color: #3c4043;">Hey '.$username.', you have successfully achieved Level '.$level.' on Unidawn. Now you can explore and use new functions that have been Unlocked.</p>	                
	            </td>
	        </tr>

	        <tr>
	            <td>	                
	                <p style="font-size: 16px;text-align: center;color: #3c4043;">To know more about your current Level and other Levels Visit LEVELS in Your Pride.</p>
	            </td>
	        </tr>
	       
	        <tr>
	            <td style="margin-top: 50px;">Thanks, Unidawn</td>
	        </tr>
	        <tr>
	            <td>
	                <a href="https://m.unidawn.com" class="letsGoBtn">
	                    &nbsp; Visit Levels &nbsp;
	                </a>
	            </td>
	        </tr>
	    </table>';
	$html .=Template_Footer();	    
	$html .= '</body></html>';
	return $html;
}

function Change_PWD_Mail_Template($username)
{
	$html='
	<!doctype html>
	<html>';
	$html .=Template_Header();
	$html .='<body style="text-align: center;padding: 5vw;background-color: #f5f5f5;">
	    <table cellpadding="0" cellspacing="0" style="margin: 0 auto;width: auto;height: auto;background-color: #ffffff;text-align: center; padding: 30px;border: 1px solid #ccc;">
	        <tr>
	            <td style="text-align: center;">
	                <img src="https://m.unidawn.com/images/login/logoMail.png" alt="" class="logo">
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <h1 style="text-align:center;color: #4083ff; margin: 0; margin-bottom: 24px; font-family: Helvetica,Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 32px; margin-top: 20px; padding: 0; word-wrap: normal;">You have Successfully Changed your Unidawn Password </h1>
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <p style="font-size: 16px;text-align: center;color: #3c4043;">Hey '.$username.',
	                    Your Password has been successfully created. Now you can Login into your Account using the current Password.</p>
	            </td>
	        </tr>
	        <tr>
	            <td style="margin-top: 50px;">Thanks, Unidawn</td>
	        </tr>
	    </table>';
	$html .=Template_Footer();	    
	$html .= '</body></html>';
	return $html;
}

function Password_Recovery_OTP_Mail_Template($username,$otp)
{
	$html='
	<!doctype html>
	<html>';
	$html .=Template_Header();
	$html .='<body style="text-align: center;padding: 5vw;background-color: #f5f5f5;">
	    <table cellpadding="0" cellspacing="0" style="margin: 0 auto;width: auto;height: auto;background-color: #ffffff;text-align: center; padding: 30px;border: 1px solid #ccc;">
	        <tr>
	            <td style="text-align: center;">
	                <img src="https://m.unidawn.com/images/login/logoMail.png" alt="" class="logo">
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <h1 style="text-align:center;color: #4083ff; margin: 0; margin-bottom: 24px; font-family: Helvetica,Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 32px; margin-top: 20px; padding: 0; word-wrap: normal;">Password Change Activity</h1>
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <p style="font-size: 16px;text-align: center;color: #3c4043;">Hey '.$username.',
	                    You have recently activated Password Recovery for your account.</p>
	            </td>
	        </tr>
	        <tr>
	            <td style="font-weight: bold;">Your Verification code is:</td>
	        </tr>
	        <tr>
	            <td>'.$otp.'</td>
	        </tr>
	        <tr>
	            <td>Verification code Expires in 1 hour</td>
	        </tr>
	        <tr>
	            <td style="color: #ff0100;">(Never share or disclose your password details with anyone else)</td>
	        </tr>
	        <tr>
	            <td style="margin-top: 50px;">Thanks, Unidawn</td>
	        </tr>
	    </table>';
	$html .=Template_Footer();	    
	$html .= '</body></html>';
	return $html;
}

function Contact_Mail_Template($contactName,$contactEmail,$contactMobile,$contactSubject,$contactMessage){
	$html='
	<!doctype html>
	<html>';
	$html .=Template_Header();
	$html .='<body style="text-align: center;padding: 5vw;background-color: #f5f5f5;">
	    <table cellpadding="0" cellspacing="0" style="margin: 0 auto;width: auto;height: auto;background-color: #ffffff;text-align: center; padding: 30px;border: 1px solid #ccc;">
	        <tr>
	            <td style="text-align: center;">
	                <img src="https://m.unidawn.com/images/login/logoMail.png" alt="" class="logo">
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <h1 style="text-align:center;color: #4083ff; margin: 0; margin-bottom: 24px; font-family: Helvetica,Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 32px; margin-top: 20px; padding: 0; word-wrap: normal;">Contact Form Details </h1>
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <p style="font-size: 16px;text-align: center;color: #3c4043;"></p>
	            </td>
	        </tr>
	        <tr>
	            <td style="font-weight: bold;">User Details</td>
	        </tr>
	        <tr>
	            <td>Name :- '.$contactName.'</td>
	        </tr>
	        <tr>
	            <td>Email :- '.$contactEmail.'</td>
	        </tr>
	        <tr>
	            <td>Mobile Number :- '.$contactMobile.'</td>
	        </tr>
	        <tr>
	            <td>Subject :- '.$contactSubject.'</td>
	        </tr>
	        <tr>
	            <td>Message :- '.$contactMessage.'</td>
	        </tr>
	    </table>';
	$html .=Template_Footer();	    
	$html .= '</body></html>';
	return $html;
}

function Template_Header(){
	$html = '<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <style>
	        /* latin */
	        @font-face {
	            font-family: \'Roboto\';
	            font-style: normal;
	            font-weight: 400;
	            src: local(\'Roboto\'), local(\'Roboto-Regular\'), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu4mxK.woff2) format(\'woff2\');
	            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
	        }

	        body {
	            font-family: Helvetica, Arial, sans-serif;
	        }

	        table tr {
	            display: block;
	        }

	        table tr td {
	            display: block;
	            text-align: left;
	            color: #3c4043;
	            padding: 10px 20px;
	        }

	        a {
	            color: #4083ff;
	            cursor: pointer;
	            text-decoration: none;
	            font-size: 12px;
	            font-family: Helvetica, Arial, sans-serif;
	            word-wrap: normal;
	        }

	        p {
	            margin: 0;
	            font-family: Helvetica, Arial, sans-serif;
	            word-wrap: normal;
	        }

	        .letsGoBtn {
	            font-family: \'Roboto\',Arial,Helvetica,sans-serif;
	            background-color: #2cc1d6;
	            border: 5px solid #2cc1d6;
	            font-size: 20px;
	            font-weight: 500;
	            border-radius: 5px;
	            color: #ffffff !important;
	            line-height: 32px;
	            text-align: center;
	            text-decoration: none;
	            word-wrap: normal;
	        }
	    </style>
	</head>';
	return $html;
}

function Template_Footer(){
	$html = '<table cellpadding="0" cellspacing="0" style="margin: 0 auto;width: auto;height: 95px;background-color: #f4f4f4;text-align: center; padding: 10px;">
	        <tr style="display: block;">
	            <td style="display: block;">
	                <p>Broombids&apos;s mission is to Unite identities, Unify Cultures and Empower the World.</p>
	            </td>
	        </tr>
	        <tr style="display: block;">
	            <td style="display: block;">
	                <p style="margin: 0;">
	                    <a href="#">About</a>
	                    <a href="#">Privacy</a>
	                    <a href="#">Cookies</a>
	                    <a href="#">Terms</a>
	                    <a href="#">Rules</a>
	                    <a href="#">Help</a>
	                </p>
	            </td>
	        </tr>
	        <tr style="display: block;">
	            <td style="display: block; font-size: 12px;">Copyrights @ Broombids Pvt Ltd</td>
	        </tr>
	    </table>';
	return $html;
}

function Support_Reply($message,$ticketno)
{
	$mess = '<!doctype html>
  <html>
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">    
  </head> 
  <body style="text-align: center;background-color: #f5f5f5;">
      <table cellpadding="0" cellspacing="0" style="margin: 30px auto; height: auto;background-color: #ffffff;text-align: center; width: 600px;">
        <tr>
            <td colspan="3" style="background: #FAFAFA;">
              <a href="https://broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">Broombids.com</a>
            </td>
          </tr>
          <tr>
              <td colspan="3" style="text-align: center;margin: 0; padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
                  <center><img src="https://broombids.com/images/maillogo.png" alt="broombids Logo" class="logo" width="183" height="59"></center>
              </td>
          </tr>
          <tr>
            <td colspan="3">
              <img src="https://broombids.com/images/support.png" style="width: 20%; margin-top: 20px; background-repeat: no-repeat;background-size: cover;">
            </td>
          </tr>          
          <tr>
              <td colspan="3">     
              <br>             
                  <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#666666;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">YOU HAVE RECIVED A RESPONCE.</p>
                 <P style="border: 1px solid #ebebeb; text-align: justify; padding: 10px; margin: 2px 50px; margin-top: 20px; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; line-height: 1.3; background: #2cc1d61a;">'.$message.'
                 </P>
                  <br>
                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:38px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center;"><strong>Ticket No : </strong>#'.$ticketno.'</p>                  
              </td>
          </tr> 
          <tr>
            <td colspan="3"><br><br>
              <center><a href="https://broombids.com/" style="font-family: arial, helvetica neue, helvetica, sans-serif;   font-size: 14px; border:2px solid #35cade; color: #35cade; background: #FFFFFF;    border-radius: 10px; font-weight: bold; font-style: normal; line-height: 17px; width: auto;text-decoration: none; padding: 10px 25px; text-align: center;">CLICK HERE TO REPLY</a>

              </center><br><br>
            </td>
          </tr>       
          <tr>
            <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
              <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#666666">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#666666" href="mailto:support@broombids.com">Email : support@broombids.com</p>
            </td>
          </tr>
          <tr>
            <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#666666">by broombids</p></td>
          </tr>
      </table>
  </body>
</html>';
	return $mess;
}