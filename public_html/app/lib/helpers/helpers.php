<?php
function dnd($data)
{
	 echo "<pre>";
	 var_dump($data);
	 echo "</pre>";
	 die();
}


function MailSend($email,$subject,$message)
{
    if(MAIL_SEND_STATUS === 'true')
    {
       //header('Cache-Control: no-cache, must-revalidate');
        require_once 'mailer/class.phpmailer.php';
        $mail = new PHPMailer();  
        $mail->CharSet = 'UTF-8';
        $mail->ContentType = 'text/html; charset=UTF-8';
        $mail->IsSMTP();
        //$mail->Mailer = "mail";
        $mail->IsHTML(true);
        $mail->SMTPAuth = true;
        $mail->Host = SMTP_HOST;
        $mail->Port = SMTP_PORT;
        $mail->SMTPSecure = 'tls'; 
        $mail->Username = SENDER_EMAIL;
        $mail->Password = MAIL_PASSWORD;
        $mail->SetFrom(SENDER_EMAIL, $subject);
        $mail->AddReplyTo(SENDER_EMAIL, $subject);
        $mail->AddAddress($email);
        $mail->Subject = $subject;
        $mail->WordWrap   = 80;
        $content = $message; 
        $mail->MsgHTML($content);
        $mail->IsHTML(true);
       // $mail->AddAttachment('pdf_files/', 'reservation.pdf');
        //$mail->AddAttachment(ROOT.'/document/LG about.docx', $name = 'reservation',  $encoding = 'base64', $type = 'application/pdf');
        if($mail->Send())
        {
            return 'success';
        }
        else
        {
            $a= 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
            return $a;
        }
    }
    else
    {
        return 'Mail function is disbled';
    }
}

function MailSend_file($email,$subject,$message)
{
    if(MAIL_SEND_STATUS === 'true')
    {
       //header('Cache-Control: no-cache, must-revalidate');
        require_once 'mailer/class.phpmailer.php';
        $mail = new PHPMailer();  
        $mail->CharSet = 'UTF-8';
        $mail->ContentType = 'text/html; charset=UTF-8';
        $mail->IsSMTP();
        //$mail->Mailer = "mail";
        $mail->IsHTML(true);
        $mail->SMTPAuth = true;
        $mail->Host = SMTP_HOST;
        $mail->Port = SMTP_PORT;
        $mail->SMTPSecure = 'tls'; 
        $mail->Username = SENDER_EMAIL;
        $mail->Password = MAIL_PASSWORD;
        $mail->SetFrom(SENDER_EMAIL, $subject);
        $mail->AddReplyTo(SENDER_EMAIL, $subject);
        $mail->AddAddress($email);
        $mail->Subject = $subject;
        $mail->WordWrap   = 80;
        $content = $message; 
        $mail->MsgHTML($content);
        $mail->IsHTML(true);

        $file_path = getcwd().'/uploads/Vendor.docx'; // Replace with the actual file path on your server
        echo $file_path;
        if (file_exists($file_path)) {
            $mail->AddAttachment($file_path, 'Συμβολαιο με vendor ( GREEK).docx');
        } else {
            return 'File not found.';
        }


       // $mail->AddAttachment('pdf_files/', 'reservation.pdf');
        //$mail->AddAttachment(ROOT.'/document/LG about.docx', $name = 'reservation',  $encoding = 'base64', $type = 'application/pdf');
        if($mail->Send())
        {
            return 'success';
        }
        else
        {
            $a= 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
            return $a;
        }
    }
    else
    {
        return 'Mail function is disbled';
    }
}


function MailSend_Cron($emails,$subject,$message)
{
   
      //header('Cache-Control: no-cache, must-revalidate');
      require_once 'mailer/class.phpmailer.php';
      $mail = new PHPMailer();  
              $mail->CharSet = 'UTF-8';
        $mail->ContentType = 'text/html; charset=UTF-8';
      $mail->IsSMTP();
      //$mail->Mailer = "mail";
      $mail->IsHTML(true);
      $mail->SMTPAuth = true;
      $mail->Host = SMTP_HOST;
      $mail->Port = SMTP_PORT;
      $mail->SMTPSecure = 'tls'; 
      $mail->Username = SENDER_EMAIL;
      $mail->Password = MAIL_PASSWORD;
      $mail->SetFrom(SENDER_EMAIL, $subject);
      $mail->AddReplyTo(SENDER_EMAIL, $subject);
      foreach ($emails as $email) 
      {
        $mail->AddAddress($email);
      }      
      $mail->Subject = $subject;
      $mail->WordWrap   = 80;
      $content = $message; 
      $mail->MsgHTML($content);
      $mail->IsHTML(true);
     // $mail->AddAttachment('pdf_files/', 'reservation.pdf');
      //$mail->AddAttachment(ROOT.'/document/LG about.docx', $name = 'reservation',  $encoding = 'base64', $type = 'application/pdf');
      if($mail->Send())
      {
          return 'success';
      }
      else
      {
          $a= 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
          return $a;
      }
    
}

function GetLeadData($n,$id)
{
    $newUser=new Users();
    $lead = $newUser->FindById('leads',$id);
    $agentname ='';
    $assign = $newUser->FindById('adminusers',$lead->assignto);
    $leadstatus = $newUser->FindById('leadstatus',$lead->status);
    $bg_status='';
    if($leadstatus)
    {
      $bg_status = $leadstatus->bgcolor;
    }
    if($assign)
    {
        $agentname = $assign->fname;
    }
    ?>
        <tr id="row_lead_<?php echo $lead->id; ?>" style="background: <?php echo $bg_status; ?>;">
          <td>
            <span class="checkbox-custom checkbox-primary">
                <input class="selectable-item" type="checkbox" name="leadid[]" value="<?php echo $lead->id; ?>">
                <label><?php echo $n; ?></label>
            </span>
            </td>          
          <td id="GetHistory" fdi="<?php echo $lead->id; ?>"><?php echo $lead->company_name; ?></td>
          <td id="GetHistory" fdi="<?php echo $lead->id; ?>"><?php echo $lead->clientname; ?></td>
          <td id="GetHistory" fdi="<?php echo $lead->id; ?>"><?php echo $lead->budget; ?></td>
          <td id="GetHistory" fdi="<?php echo $lead->id; ?>"><?php echo $lead->manpower; ?></td>
          <td id="GetHistory" fdi="<?php echo $lead->id; ?>"><?php echo $lead->city; ?></td>
          <td id="GetHistory" fdi="<?php echo $lead->id; ?>"><?php echo $agentname; ?></td>
          <td id="row_fdate_<?php echo $lead->id; ?>"><?php 
          if(!empty($lead->followuptime) && $lead->followuptime != '0000-00-00 00:00:00')
          {
            echo date("d-m-Y h:i A", strtotime($lead->followuptime));
          }
          else
          {
            echo 'No Followup';
          }
          ?>
           
         </td>
          <td id="status_<?php echo $lead->id; ?>">
            <?php                        
            
            if($leadstatus)
            {
                echo '<span class="badge badge-primary" id="getstatuswise" fdi="'.$leadstatus->id.'">'.$leadstatus->sname.'</span>';
            }
            else
            {
              echo '<span class="badge badge-default">New Lead</span>';
            }
            ?>
          </td>
          <td>                        
            
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-classic" id="exampleIconDropdown1" data-toggle="dropdown" aria-expanded="false">
                <i class="icon wb-edit" aria-hidden="true"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="exampleIconDropdown1" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px;">
             <!--    <a style="text-decoration: none;" fdi="<?php echo $lead->id; ?>" id="editStatus" data-target="#LeadstatusData" data-toggle="modal" class="dropdown-item" href="javascript:void(0)" role="menuitem">Call Status</a> -->

                <a style="text-decoration: none;" id="editLead" fdi="<?php echo $lead->id; ?>" class="dropdown-item" href="javascript:void(0)" role="menuitem">Edit Lead</a>

                <?php
                if($lead->award == 0)
                {
                  ?>
                  <a style="text-decoration: none;" id="workawarded" fdi="<?php echo $lead->id; ?>" class="dropdown-item" href="javascript:void(0)" role="menuitem" data-target="#workawardedmodel" data-toggle="modal">Work Awarded</a>
                  <?php
                }
                ?>
                

                <a style="text-decoration: none;" id="editfollowdate" fdi="<?php echo $lead->id; ?>" class="dropdown-item" href="javascript:void(0)" role="menuitem" data-target="#Changefollowupdatemodel" data-toggle="modal">Change Followup Date</a>
              

              <a style="text-decoration: none;" id="delete_lead" fdi="<?php echo $lead->id; ?>" class="dropdown-item" href="javascript:void(0)" role="menuitem">Delete</a>
              </div>
            </div> 

                                  
            
          </td>
        </tr>
    <?php
}