<?php
function Welecome_Mail_Vendor_Customer($name)
{
	$message = '<!doctype html>
				<html lang="el">
				<head>
				      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					  <meta charset="UTF-8">
				      <meta name="viewport" content="width=device-width, initial-scale=1.0">
				      <meta http-equiv="X-UA-Compatible" content="IE=edge">    
				  </head> 
				  <body style="text-align: center;background-color: #f5f5f5;">
				      <table cellpadding="0" cellspacing="0" style="margin: 30px auto; height: auto;background-color: #ffffff;text-align: center; width: 600px;">
				        <tr>
				            <td colspan="3" style="background: #FAFAFA;">
				              <a href="https://Broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">Broombids.com</a>
				            </td>
				          </tr>
				          <tr>
				              <td colspan="3" style="text-align: center;margin: 0; padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				                  <center><img src="https://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo" width="183" height="59"></center>
				              </td>
				          </tr>
				          <tr>
				              <td colspan="3">     
				              <br>             
				                  <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">Welcome To Our Platform</p><br>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Dear '.$name.'</p>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Thank you for your trust in <a href="https://broombids.com/" style="color: #3ec7da;">broombids.com</a></p>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Here you will have the opportunity to post your own competition and achieve very low prices and good conditions in renting the car you want for your vacation.</p>
				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Do not forget to read the Frequently Asked Questions <b>(FAQ)</b> and Terms of Use <b>(TOU)</b>.Our platform is <b>ABSOLUTELY FREE</b> to use, and all we ask is that you promote us to your friends on social networks.</p>

				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">We are at your disposal for any question or problem at <a style="color: #3ec7da;" href="mailto:customer@broombids.com">customer@broombids.com</a> </p><br><br>

				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> <b><a style="color:#2cc1d6; " href="https://broombids.com/">Broombids.com</a></b> </p>     
				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> The support team</p><br><br>            
				              </td>
				          </tr> 
				         <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:20px 50px;font-size:12px;font-family:helvetica,helvetica neue,arial,verdana,sans-serif;line-height:18px;color:#404040">by clicking this button, you accept to our <a href="https://broombids.com/TermsAndConditions" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank">Terms-Conditions</a> and <a href="https://broombids.com/PrivacyPolicy" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank" >Priacy-Policy</a>.</p></td>
				            </tr>          
				          <tr>
				            <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				              <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#404040">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#404040" href="mailto:customer@broombids.com">customer@broombids.com</a></p>
				            </td>
				          </tr>
				          <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#404040">By Broombids</p></td>
				          </tr>
				      </table>
				  </body>
				</html>';
	return $message;
}

function Welecome_Mail_Customer($name)
{
	$message = '<!doctype html>
				<html lang="el">
				<head>
				      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					  <meta charset="UTF-8">
				      <meta name="viewport" content="width=device-width, initial-scale=1.0">
				      <meta http-equiv="X-UA-Compatible" content="IE=edge">    
				  </head> 
				  <body style="text-align: center;background-color: #f5f5f5;">
				      <table cellpadding="0" cellspacing="0" style="margin: 30px auto; height: auto;background-color: #ffffff;text-align: center; width: 600px;">
				        <tr>
				            <td colspan="3" style="background: #FAFAFA;">
				              <a href="https://Broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">Broombids.com</a>
				            </td>
				          </tr>
				          <tr>
				              <td colspan="3" style="text-align: center;margin: 0; padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				                  <center><img src="https://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo" width="183" height="59"></center>
				              </td>
				          </tr>
				          <tr>
				              <td colspan="3">     
				              <br>             
				                  <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">Welcome To Our Platform</p><br>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Dear '.$name.'( name that broom gives automaticaly)</p>
								  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">We are proud to announce you your user name, that totally protect your anonymity and safety. </p>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Thank you for your trust in <a href="https://broombids.com/" style="color: #3ec7da;">broombids.com</a></p>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Here you will have the opportunity to post your own competition and achieve very low prices and good conditions in renting the car you want for your vacation.</p>
				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Do not forget to read the Frequently Asked Questions <b>(FAQ)</b> and Terms of Use <b>(TOU)</b>.Our platform is <b>ABSOLUTELY FREE</b> to use, and all we ask is that you promote us to your friends on social networks.</p>

				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">We are at your disposal for any question or problem at <a style="color: #3ec7da;" href="mailto:customer@broombids.com">customer@broombids.com</a> </p><br><br>

				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> <b><a style="color:#2cc1d6; " href="https://broombids.com/">Broombids.com</a></b> </p>     
				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> The support team</p><br><br>            
				              </td>
				          </tr> 
				         <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:20px 50px;font-size:12px;font-family:helvetica,helvetica neue,arial,verdana,sans-serif;line-height:18px;color:#404040">by clicking this button, you accept to our <a href="https://broombids.com/TermsAndConditions" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank">Terms-Conditions</a> and <a href="https://broombids.com/PrivacyPolicy" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank" >Priacy-Policy</a>.</p></td>
				            </tr>          
				          <tr>
				            <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				              <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#404040">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#404040" href="mailto:customer@broombids.com">customer@broombids.com</a></p>
				            </td>
				          </tr>
				          <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#404040">By Broombids</p></td>
				          </tr>
				      </table>
				  </body>
				</html>';
	return $message;
}

function Welecome_Mail_Vendor($name)
{
	$message = '<!doctype html>
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
				              <a href="https://Broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">Broombids.com</a>
				            </td>
				          </tr>
				          <tr>
				              <td colspan="3" style="text-align: center;margin: 0; padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				                  <center><img src="https://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo" width="183" height="59"></center>
				              </td>
				          </tr>
				          <tr>
				              <td colspan="3">     
				              <br>             
				                  <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">Welcome To Our Platform</p><br>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Αγαπητέ συνεργάτη</p>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Σας ευχαριστούμε για την εμπιστοσύνη στο Broombids και θα κάνουμε τα πάντα απο την πλευρά μας για να έχουμε μια αποδοτική και κερδοφόρα συνεργασία .
								  Παρακαλούμε διαβάστε προσεκτικά την ενότητα Συχνές Ερωτήσεις ( FAQ ) όπου θα βρείτε απαντήσεις σε όποιες ερωτήσεις και απορίες σας , καθώς επίσης και την ενότητα Όροι χρήσης για παρόχους  ( TERM OF USE for Vendors ) όπου υπάρχει όλο το πλαίσιο της νέας μας συνεργασίας.
								  Είμαστε στην διάθεσή σας για οποιαδήποτε περαιτέρω απορία έχετε την οποία μπορείτε να αποστείλετε στο vendors@broombids.com.</p>

								<p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Επίσης σας επισυνάπτουμε και το συμβόλαιο συνεργασίας μας το οποίο σας παρακαλούμε να διαβάσετε προσεκτικά και αφού το εγκρίνετε να το υπογράψετε και να μας το στείλετε στο customer@broombids.com .</p>

				                   <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Σας καλωσορίζουμε στην πλατφόρμα μας και ελπίζουμε να σας βλέπουμε καθημερινά </p>
				                  <br><br>
				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> <b>Για το <a href="https://broombids.com/" style="color: #3ec7da;">broombids.com</a></b> </p>     
				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> Η ομάδα υποστήριξης πελατών.</p><br><br>            
				              </td>
				          </tr> 
				         <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:20px 50px;font-size:12px;font-family:helvetica,helvetica neue,arial,verdana,sans-serif;line-height:18px;color:#404040">by clicking this button, you accept to our <a href="https://broombids.com/TermsAndConditions" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank">Terms-Conditions</a> and <a href="https://broombids.com/PrivacyPolicy" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank" >Priacy-Policy</a>.</p></td>
				            </tr>          
				          <tr>
				            <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				              <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#404040">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#404040" href="mailto:customer@broombids.com">customer@broombids.com</a></p>
				            </td>
				          </tr>
				          <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#404040">By Broombids</p></td>
				          </tr>
				      </table>
				  </body>
				</html>';
	return $message;
}

function Add_New_requirest($title,$date,$budget)
{
	$message = '<!doctype html>
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
				              <a href="https://Broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">Broombids.com</a>
				            </td>
				          </tr>
				          <tr>
				              <td colspan="3" style="text-align: center;margin: 0; padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				                  <center><img src="https://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo" width="183" height="59"></center>
				              </td>
				          </tr>          
				          
				          <tr>
				              <td colspan="3">     
				              <br>             
				                  <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">Contest has been posted successfully</p><br>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">We would like to inform you that your contest has been posted successfully.</p>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Please check the progress of the competition frequently until you are satisfied.</p>
				                  <br>           
				              </td>
				          </tr> 

				          <tr>
				            <td colspan="3">
				              <table  style="margin: 0px 5px; width: 98%; margin-top: 20px;">
				                <thead style="background: #f5f5f5;">
				                  <tr>
				                    <th>
				                      <h4 style="margin: 10px 0px; padding: 0px;">Title</h4>
				                    </th>
				                    <th>
				                      <h4 style="margin: 10px 0px; padding: 0px;">Date</h4>
				                    </th>
				                    <th>
				                      <h4 style="margin: 10px 0px; padding: 0px;">Budget</h4>
				                    </th>
				                  </tr>
				                </thead>
				                <tbody>                  
				                    <tr>                      
				                      <td>
				                        <p style="margin: 0px 5px;margin-top: 10px; padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#212F3C;text-align:center; font-weight: bold; ">'.$title.'</p>
				                      </td>
				                      <td>
				                        <p style="margin: 0px 5px;margin-top: 10px; padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#212F3C;text-align:center; font-weight: bold; ">'.$date.'</p>
				                      </td>
				                      <td>
				                        <p style="margin: 0px 5px; margin-top: 10px;padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#2cc1d6;text-align:center; font-weight: bold; ">'.$budget.'</p>
				                      </td>                    
				                  </tr>                  
				                 
				                </tbody>
				              </table>
				            </td>
				          </tr>  

				          <tr>
				            <td colspan="3"><br><br><br>
				              <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> <b><a style="color:#2cc1d6; " href="https://broombids.com/">Broombids.com</a></b> </p>     
				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> The support team</p><br><br>
				            </td>
				          </tr>               
				         

				         <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:20px 50px;font-size:12px;font-family:helvetica,helvetica neue,arial,verdana,sans-serif;line-height:18px;color:#404040">by clicking this button, you accept to our <a href="https://broombids.com/TermsAndConditions" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank">Terms-Conditions</a> and <a href="https://broombids.com/PrivacyPolicy" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank" >Priacy-Policy</a>.</p></td>
				            </tr>
				          
				          <tr>
				            <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				              <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#404040">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#404040" href="mailto:customer@broombids.com">customer@broombids.com</a></p>
				            </td>
				          </tr>
				          <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#404040">By Broombids</p></td>
				          </tr>
				      </table>
				  </body>
				</html>';
	return $message;
}

function Recive_New_Offer($title,$vtype,$car,$price)
{
	$message = '<!doctype html>
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
			              <a href="https://Broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">Broombids.com</a>
			            </td>
			          </tr>
			          <tr>
			              <td colspan="3" style="text-align: center;margin: 0; padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
			                  <center><img src="https://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo" width="183" height="59"></center>
			              </td>
			          </tr>          
			          
			          <tr>
			              <td colspan="3">     
			              <br>             
			                  <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">New Offer </p><br>

			                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">There is a new offer in the contest you have created. Please login your account at <a style="color:#2cc1d6; " href="https://broombids.com/">www.broombids.com</a> to stay up to date</p>                  
			                  <br>           
			              </td>
			          </tr>           

			          <tr>
			            <td colspan="3">
			              <table  style="margin: 0px 5px; width: 98%; margin-top: 20px;">
			                <thead style="background: #f5f5f5;">
			                  <tr>
			                    <th colspan="4" style="background: #2cc1d640; border: 1px solid #eee; padding: 10px 10px;">
			                     <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold; text-align: left;">'.$title.'</p>
			                    </th>
			                  </tr>
			                  <tr>
			                    <th>
			                      <h4 style="margin: 10px 0px; padding: 0px;">Vehicle Type</h4>
			                    </th> 
			                    <th>
			                      <h4 style="margin: 10px 0px; padding: 0px;">Vehicle Name</h4>
			                    </th>
			                    <th>
			                      <h4 style="margin: 10px 0px; padding: 0px;">Offer Price</h4>
			                    </th>
			                  </tr>
			                </thead>
			                <tbody>                  
			                    <tr>   
			                     <td>
			                        <p style="margin: 0px 5px;margin-top: 10px; padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#212F3C;text-align:center; font-weight: bold; ">'.$vtype.'</p>
			                      </td>
			                      <td>
			                        <p style="margin: 0px 5px;margin-top: 10px; padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#212F3C;text-align:center; font-weight: bold; ">'.$car.'</p>
			                      </td>
			                      <td>
			                        <p style="margin: 0px 5px; margin-top: 10px;padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#2cc1d6;text-align:center; font-weight: bold; ">'.$price.'</p>
			                      </td>                    
			                  </tr>                  
			                 
			                </tbody>
			              </table>
			            </td>
			          </tr>  

			          <tr>
			            <td colspan="3"><br><br><br>
			              <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> <b><a style="color:#2cc1d6; " href="https://broombids.com/">Broombids.com</a></b> </p>     
			                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">The partner support team</p><br><br>
			            </td>
			          </tr>               
			         

			         <tr>
			            <td colspan="3" style="background: #FAFAFA;"><p style="margin:20px 50px;font-size:12px;font-family:helvetica,helvetica neue,arial,verdana,sans-serif;line-height:18px;color:#404040">by clicking this button, you accept to our <a href="https://broombids.com/TermsAndConditions" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank">Terms-Conditions</a> and <a href="https://broombids.com/PrivacyPolicy" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank" >Priacy-Policy</a>.</p></td>
			            </tr>
			          
			          <tr>
			            <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
			              <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#404040">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#404040" href="mailto:customer@broombids.com">customer@broombids.com</a></p>
			            </td>
			          </tr>
			          <tr>
			            <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#404040">By Broombids</p></td>
			          </tr>
			      </table>
			  </body>
			</html>';
	return $message;
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

function Mail_Verification_Template($username,$link,$subject)
{
	$html='
	<!doctype html>
	<html>';
	$html .=Template_Header();
	$html .='<body style="text-align: center;padding: 5vw;background-color: #f5f5f5;">
	    <table cellpadding="0" cellspacing="0" style="margin: 0 auto;width: auto;height: auto;background-color: #ffffff;text-align: center; padding: 30px;border: 1px solid #ccc;">
	        <tr>
	            <td style="text-align: center;">
	                <img src="http://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo" style="width:50%;">
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <h1 style="text-align:center;color: #2cc1d6; margin: 0; margin-bottom: 24px; font-family: Helvetica,Arial,sans-serif; font-size: 24px; font-weight: bold; line-height: 32px; margin-top: 20px; padding: 0; word-wrap: normal;">'.$subject.'</h1>
	            </td>
	        </tr>
	        <tr>
	            <td>
	                <p style="font-size: 16px;text-align: left;color: #3c4043;">Dear '.$username.'.</p>
					<p style="font-size: 16px;text-align: left;color: #3c4043;">Thank you for your trust in <a href="https://broombids.com/" style="color: #3ec7da; font-size: 16px; text-decoration: underline;">broombids.com</a>.</p>
	                <p style="font-size: 16px;text-align: left;color: #3c4043;">Please confirm your e-mail adress by clicking the following link to activate your account.</p>
	                <br>
	                <center><a style="font-size: 16px; color:#2cc1d6;" href="'.$link.'"  class="letsGoBtn" target="_blank">Click to confirm your email</a></center>
	                <br>
	                <br>
	                <p style="font-size: 16px;text-align: left;color: #3c4043;">Can’t click the link? Copy and paste this link in your browser:</p>
	                <br>
	                <center><a style="font-size: 16px; color:#2cc1d6;" href="'.$link.'" target="_blank">'.$link.'</a></center>
	            </td>
	        </tr>	        
	        
	        <tr>
				<td style="margin-top: 30px;">
					<p style="font-size: 16px;text-align: left;color: #3c4043;">For any question or problem at <a href="#" style="color: #3ec7da;">mailto:customer@broombids.com</a></p>
					<p style="font-size: 16px;text-align: left;color: #3c4043;">Welcome to our platform.</p>
				</td>
	        </tr>
	        <tr>
	        	<td style="margin-top: 30px;">
					<p style="font-size: 16px;text-align: left;color: #3c4043;"><a href="https://broombids.com/" style="color: #3ec7da;">broombids.com</a></p>
					<p style="font-size: 16px;text-align: left;color: #3c4043;">The support team.</p>
	            </td>
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

function Vender_Offer_Select_Template($no)
{
	$message = '<!doctype html>
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
			              <a href="https://Broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">Broombids.com</a>
			            </td>
			          </tr>
			          <tr>
			              <td colspan="3" style="text-align: center;margin: 0; padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
			                  <center><img src="https://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo" width="183" height="59"></center>
			              </td>
			          </tr>          
			          
			          <tr>
			              <td colspan="3">     
			              <br>             
			                  <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">Your Offer Has Been Selected</p><br>

			                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">We are pleased to inform you that the number <b>'.$no.'</b> your offer was accepted by the customer</p>

			                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Please login your account at <a href="https://broombids.com" style="color: #3ec7da;">www.broombids.com</a> to complete the process.</p>
			                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">We also inform that the customer communication room has been activated.</p>
			                  
			                  <br><br>
			                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> <b><a style="color:#2cc1d6; " href="https://broombids.com/">Broombids.com</a></b> </p>     
			                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">The partner support team</p><br><br>            
			              </td>
			          </tr>                  
			         

			         <tr>
			            <td colspan="3" style="background: #FAFAFA;"><p style="margin:20px 50px;font-size:12px;font-family:helvetica,helvetica neue,arial,verdana,sans-serif;line-height:18px;color:#404040">by clicking this button, you accept to our <a href="https://broombids.com/TermsAndConditions" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank">Terms-Conditions</a> and <a href="https://broombids.com/PrivacyPolicy" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank" >Priacy-Policy</a>.</p></td>
			            </tr>
			          
			          <tr>
			            <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
			              <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#404040">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#404040" href="mailto:customer@broombids.com">customer@broombids.com</a></p>
			            </td>
			          </tr>
			          <tr>
			            <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#404040">By Broombids</p></td>
			          </tr>
			      </table>
			  </body>
			</html>';
	return $message;
}

function User_Offer_Select_Template()
{
	$message = '<!doctype html>
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
				              <a href="https://Broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">Broombids.com</a>
				            </td>
				          </tr>
				          <tr>
				              <td colspan="3" style="text-align: center;margin: 0; padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				                  <center><img src="https://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo" width="183" height="59"></center>
				              </td>
				          </tr>          
				          
				          <tr>
				              <td colspan="3">     
				              <br>             
				                  <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">Wining Offer Info</p><br>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">We would like to inform you that the vendor whose offer you have chosen for your competition has been informed and will contact you shortly.</p>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">We also inform you that the chat room with the vendor has already been activated.</p>
				                  
				                  
				                  <br><br>
				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> <b><a style="color:#2cc1d6; " href="https://broombids.com/">Broombids.com</a></b> </p>     
				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">The partner support team</p><br><br>            
				              </td>
				          </tr>                  
				         

				         <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:20px 50px;font-size:12px;font-family:helvetica,helvetica neue,arial,verdana,sans-serif;line-height:18px;color:#404040">by clicking this button, you accept to our <a href="https://broombids.com/TermsAndConditions" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank">Terms-Conditions</a> and <a href="https://broombids.com/PrivacyPolicy" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank" >Priacy-Policy</a>.</p></td>
				            </tr>
				          
				          <tr>
				            <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				              <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#404040">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#404040" href="mailto:customer@broombids.com">customer@broombids.com</a></p>
				            </td>
				          </tr>
				          <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#404040">By Broombids</p></td>
				          </tr>
				      </table>
				  </body>
				</html>';
	return $message;
}

function Support_User($ticketno,$inquiry)
{
	$message = '<!doctype html>
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
                    <a href="https://broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">broombids.com</a>
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
                        <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#666666;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">THANK YOU FOR CONTACTING US.</p><br>
                        
                        <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:left">A support ticket request hash been created and a representative will be getting back to you shortly if necessary.</p><br>
                        <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:38px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:center"><strong>Ticket No : </strong>#'.$ticketno.'</p>                  
                    </td>
                </tr> 
                <tr>
                  <td colspan="3">
                    <table style="width: 98%; margin-top: 10px; margin-bottom: 30px; margin-left: 5px; border: 1px solid #f5f5f5;">
                      <thead style="background: #ebebeb;">
                        <tr>
                          <th>
                            <h4 style="margin: 10px 0px; padding: 0px; text-align: center;">YOUR INQUIRY</h4>
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>                  
                          <tr>                      
                            <td >
                              <p style="margin: 0px 5px;margin-top: 10px; padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#212F3C;text-align:center;">'.$inquiry.'</p>
                            </td>
                                        
                        </tr>
                        
                      </tbody>
                    </table>
                  </td>
                </tr>
                

                <tr>
                  <td colspan="3">
                    <center><a href="https://broombids.com/" style="font-family: arial, helvetica neue, helvetica, sans-serif;   font-size: 14px; border:2px solid #2dc1d6; color: #2dc1d6; background: #FFFFFF;    border-radius: 10px; font-weight: bold; font-style: normal; line-height: 17px; width: auto;text-decoration: none; padding: 10px 25px; text-align: center;">VIEW TICKET</a></center><br><br>
                  </td>
                </tr> 
                
                  <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
                    <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#666666">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#666666" href="mailto:support@broombids.com"> Email : support@broombids.com</p>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#666666">by broombids</p></td>
                </tr>
            </table>
        </body>
      </html>';
	return $message;
}

function NewPostAdd($title,$vtype,$location,$date,$price)
{
	$message = '<!doctype html>
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
			              <a href="https://Broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">Broombids.com</a>
			            </td>
			          </tr>
			          <tr>
			              <td colspan="3" style="text-align: center;margin: 0; padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
			                  <center><img src="https://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo" width="183" height="59"></center>
			              </td>
			          </tr>          
			          
			          <tr>
			              <td colspan="3">     
			              <br>             
			                  <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">Info For New Request </p><br>

			                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">We inform you that there is a post of a new competition in an area and type of car that you have expressed interest. Please login  your account at <a style="color:#2cc1d6; " href="https://broombids.com/">www.broombids.com</a> to place your offer.</p>                  
			                  <br>           
			              </td>
			          </tr>           

			          <tr>
			            <td colspan="3">
			              <table  style="margin: 0px 5px; width: 98%; margin-top: 20px;">
			                <thead style="background: #f5f5f5;">
			                  <tr>
			                    <th colspan="4" style="background: #2cc1d640; border: 1px solid #eee; padding: 10px 10px;">
			                     <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold; text-align: left;">'.$title.'</p>
			                    </th>
			                  </tr>
			                  <tr>
			                    <th>
			                      <h4 style="margin: 10px 0px; padding: 0px;">Vehicle Type</h4>
			                    </th>                    
			                    <th>
			                      <h4 style="margin: 10px 0px; padding: 0px;">Date</h4>
			                    </th>
			                    <th>
			                      <h4 style="margin: 10px 0px; padding: 0px;">Location</h4>
			                    </th>
			                    <th>
			                      <h4 style="margin: 10px 0px; padding: 0px;">Budget</h4>
			                    </th>
			                  </tr>
			                </thead>
			                <tbody>                  
			                    <tr>   
			                     <td>
			                        <p style="margin: 0px 5px;margin-top: 10px; padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#212F3C;text-align:center; font-weight: bold; ">'.$vtype.'</p>
			                      </td>                   
			                      <td>
			                        <p style="margin: 0px 5px;margin-top: 10px; padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#212F3C;text-align:center; font-weight: bold; ">'.$date.'</p>
			                      </td>
			                      <td>
			                        <p style="margin: 0px 5px;margin-top: 10px; padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#212F3C;text-align:center; font-weight: bold; ">'.$location.'</p>
			                      </td>
			                      <td>
			                        <p style="margin: 0px 5px; margin-top: 10px;padding: 0px;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#2cc1d6;text-align:center; font-weight: bold; ">'.$price.'</p>
			                      </td>                    
			                  </tr>                  
			                 
			                </tbody>
			              </table>
			            </td>
			          </tr>  

			          <tr>
			            <td colspan="3"><br><br><br>
			              <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> <b><a style="color:#2cc1d6; " href="https://broombids.com/">Broombids.com</a></b> </p>     
			                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">The partner support team</p><br><br>
			            </td>
			          </tr>               
			         

			         <tr>
			            <td colspan="3" style="background: #FAFAFA;"><p style="margin:20px 50px;font-size:12px;font-family:helvetica,helvetica neue,arial,verdana,sans-serif;line-height:18px;color:#404040">by clicking this button, you accept to our <a href="https://broombids.com/TermsAndConditions" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank">Terms-Conditions</a> and <a href="https://broombids.com/PrivacyPolicy" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank" >Priacy-Policy</a>.</p></td>
			            </tr>
			          
			          <tr>
			            <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
			              <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#404040">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#404040" href="mailto:customer@broombids.com">customer@broombids.com</a></p>
			            </td>
			          </tr>
			          <tr>
			            <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#404040">By Broombids</p></td>
			          </tr>
			      </table>
			  </body>
			</html>';
	return $message;
}

function NewInvoiceCreated($name)
{
	$message = '<!doctype html>
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
				              <a href="https://Broombids.com/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC">Broombids.com</a>
				            </td>
				          </tr>
				          <tr>
				              <td colspan="3" style="text-align: center;margin: 0; padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				                  <center><img src="https://broombids.com/images/maillogo.png" alt="Broombids Logo" class="logo" width="183" height="59"></center>
				              </td>
				          </tr>
				          <tr>
				              <td colspan="3">     
				              <br>             
				                  <p style="margin-top:30px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:20px;line-height:24px;color:#404040;font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-weight: bold;">Invoice For Payment</p><br>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Dear '.$name.'</p>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">We inform you that a new service invoice has been issued.</p>

				                  <p style="padding:5px 20px; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left">Please go to your account at <a href="https://broombids.com" target="_blank">www.broombids.com</a> to complete the process.</p>
				                 <br><br>

				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> <b><a style="color:#2cc1d6; " href="https://broombids.com/">Broombids.com</a></b> </p>     
				                  <p style="padding:5px 20px; text-align: justify-all; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:24px;color:#404040;text-align:left"> The support team</p><br><br>            
				              </td>
				          </tr> 
				         <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:20px 50px;font-size:12px;font-family:helvetica,helvetica neue,arial,verdana,sans-serif;line-height:18px;color:#404040">by clicking this button, you accept to our <a href="https://broombids.com/TermsAndConditions" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank">Terms-Conditions</a> and <a href="https://broombids.com/PrivacyPolicy" style="color:#3ec7da;font-weight:normal;text-decoration:underline" target="_blank" >Priacy-Policy</a>.</p></td>
				            </tr>          
				          <tr>
				            <td colspan="3" style="text-align: center; margin:0; padding-top: 10px; padding-bottom: 10px; padding-left: 20px; padding-right: 20px; background-color: #ECF0F1;">
				              <p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#404040">Contact us: <a target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#404040" href="mailto:customer@broombids.com">customer@broombids.com</a></p>
				            </td>
				          </tr>
				          <tr>
				            <td colspan="3" style="background: #FAFAFA;"><p style="margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;margin-top:10px;line-height:18px;color:#404040">By Broombids</p></td>
				          </tr>
				      </table>
				  </body>
				</html>';
	return $message;
}