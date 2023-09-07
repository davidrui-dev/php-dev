<?php

	class Tools extends Controller{
		public function __construct($controller,$action){
			parent::__construct($controller,$action);
			//$this->view->setLayout('common');
			//$this->load_model('Common');	
		}

		public function indexAction()
		{			
			if(isset($_SESSION['master_id']))
            {
            	$newUser=new Users();
                $chatid = $_POST['messageid'];
                echo '<input type="hidden" name="chatid" id="chatid" value="'.$chatid.'">';
                $contactuser = $newUser->FindCurrentUser('user_connection',$chatid);
                if($contactuser)
                {
                    $uicon_contact=PROOT.'images/support.png';
                    $fname_contact='No USer Found';
                    if($contactuser->myid != $_SESSION['master_id'])
                    {
                        $chatuser_contact = $newUser->FindCurrentUser('users',$contactuser->myid);
                        if($chatuser_contact)
                        {
                            echo '<input type="hidden" name="chatuid" id="chatuid" value="'.$chatuser_contact->id.'">';
                            $fname_contact = $chatuser_contact->fname.' '.$chatuser_contact->surname;
                            if(!empty($chatuser_contact->img))
                            {
                                $uicon_contact = PROOT.$chatuser_contact->img;
                            }
                            
                        }
                    }
                    if($contactuser->uid != $_SESSION['master_id'])
                    {
                        $chatuser_contact = $newUser->FindCurrentUser('users',$contactuser->uid);
                        if($chatuser_contact)
                        {
                            echo '<input type="hidden" name="chatuid" id="chatuid" value="'.$chatuser_contact->id.'">';
                            $fname_contact = $chatuser_contact->fname.' '.$chatuser_contact->surname;
                            if(!empty($chatuser_contact->img))
                            {
                                $uicon_contact = PROOT.$chatuser_contact->img;
                            }
                            
                        }
                    }
                    ?>
                    
                    <?php
                }
                ?>
                <div class="contact-profile">
                    <img src="<?php echo $uicon_contact; ?>" alt="" />
                    <p><?php echo $fname_contact; ?></p>            
                </div>
                <div class="messages">            
                    <ul id="loadmessaged">
                        <?php
                        $newChatDate = $newUser->FindByUIDSingle('chat_view_date',$_SESSION['master_id']);
                        $lastmessageid = 0;
                        if($newChatDate)
                            $lastmessageid = $newChatDate->lastid;
                        $messages = $newUser->GetConnectionMessages($chatid,200);
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
                                        <?php if($message->id == $lastmessageid) echo '<hr/>'?>      
                                    </li>
                                    <?php
                                }
                            }
                            $_SESSION['last_message_id']=$lastid;
                            $chattime = $newUser->SetChatUpdate($_SESSION['master_id'],$lastid);
                        }
                        ?>                        
                    </ul>
                </div>
                <div class="message-input">
                    <div class="wrap">
                    <textarea id="chat_message" placeholder="Write your message..."></textarea>          
                    <button class="button" id="sendchatmessage"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </div>
                <?php
            }
		}
		

		

	}