<?php
$ticketid = $_SESSION['ticket_id'];
$newUser=new Users();
$support = $newUser->FindByIDSigle('support',$_SESSION['ticket_id']);
$user = $newUser->FindByIDSigle('users',$support->uid);
$uname='User Not Found';
if($user)
{
    $uname =$user->fname.' '.$user->surname;
}
?>

<div class="row">
    <div class="col-md-12 m-b-30">
        <!-- begin page title -->
        <div class="d-block d-sm-flex flex-nowrap align-items-center">
            <div class="page-title mb-2 mb-sm-0">
                <h1>Support Ticket Reply</h1>
            </div>
        </div>
        <!-- end page title -->
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-statistics">
            <div class="card-body p-0">
                <div class="row no-gutters">                    
                    <div class="col-xl-12 col-xxl-12 border-md-t">
                        <div class="app-chat-msg">
                            <div class="d-flex align-items-center justify-content-between p-3 px-4 border-bottom">
                                <div class="app-chat-msg-title">
                                    <h4 class="mb-0"><?php echo $support->subject; ?></h4>
                                    <p class="text-success">
                                        <?php echo $uname; ?>
                                    </p>
                                </div>                                              
                            </div>
                            <div class="scrollbar scroll_dark app-chat-msg-chat p-4" id="messages_chat">
                                <div class="chat">                                    
                                    <div class="chat-msg">
                                        <div class="chat-msg-content">
                                            <p><?php echo $support->message; ?>.</p>
                                        </div>                                        
                                    </div>
                                </div>
                                <?php
                                $replys = $newUser->FindAllReply('support_reply',$ticketid);
                                if($replys)
                                {
                                	foreach ($replys as $reply) 
                                	{
                                		if($reply->sendby == 0)
                                		{
                                			?>
                                			<div class="chat">                                    
			                                    <div class="chat-msg">
			                                        <div class="chat-msg-content">
			                                            <p><?php echo $reply->message; ?>.</p>
			                                        </div>                                        
			                                    </div>
			                                </div>
                                			<?php
                                		}
                                		else
                                		{
                                			?>
                                			<div class="chat chat-left justify-content-end">
			                                    <div class="chat-msg">
			                                        <div class="chat-msg-content">
			                                            <p><?php echo $reply->message; ?></p>
			                                        </div>                                        
			                                    </div>
			                                </div>
                                			<?php
                                		}
                                	}
                                }
                                ?>                                
                             
                            </div>
                        </div>
                        <div class="app-chat-type">
                            <div class="input-group mb-0 ">     
                                <input value="<?php echo $support->id; ?>" type="hidden" id="replyid">
                                <input value="<?php echo $support->email; ?>" type="hidden" id="useremail">
                                <input class="form-control" placeholder="Type here..." type="text" id="reply_message">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="send_reply">
                                        <i class="fa fa-paper-plane"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>