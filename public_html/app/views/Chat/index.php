<?php
if(!isset($_SESSION['master_id']))
{
  Router::Redirect('home');
}
else
{
    $newUser=new Users();
    $user = $newUser->FindCurrentUser('users',$_SESSION['master_id']);
    if(!$user)
    {
        Router::Redirect('home');
    }
    else
    {
        $myimage =PROOT.'images/support.png';
        if(!empty($user->img))
        {
            $myimage = PROOT.$user->img;
        }
    }
}
?>
<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>

<?php $this->start('body');?>
<style class="cp-pen-styles">
    #frame {
      width: 100%;
      min-width: 360px;
      max-width: 100%;
      height: 92vh;
      min-height: 300px;
      max-height: 720px;
      background: #E6EAEA;
    }
    @media screen and (max-width: 360px) {
      #frame {
        width: 100%;
        height: 100vh;
      }
    }
    #frame #sidepanel {
      float: left;
      min-width: 280px;
      max-width: 340px;
      width: 40%;
      height: 100%;
      background: #2ec1d6eb;
      color: #f5f5f5;
      overflow: hidden;
      position: relative;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel {
        width: 58px;
        min-width: 58px;
      }
    }
    #frame #sidepanel #profile {
      width: 90%;
      margin: 8px auto 0px auto;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile {
        width: 100%;
        margin: 0 auto;
        padding: 5px 0 0 0;
        background: #32465a;
      }
    }
    #frame #sidepanel #profile.expanded .wrap {
      height: 210px;
      line-height: initial;
    }
    #frame #sidepanel #profile.expanded .wrap p {
      margin-top: 20px;
    }
    #frame #sidepanel #profile.expanded .wrap i.expand-button {
      -moz-transform: scaleY(-1);
      -o-transform: scaleY(-1);
      -webkit-transform: scaleY(-1);
      transform: scaleY(-1);
      filter: FlipH;
      -ms-filter: "FlipH";
    }
    #frame #sidepanel #profile .wrap {
      height: 60px;
      line-height: 60px;
      overflow: hidden;
      -moz-transition: 0.3s height ease;
      -o-transition: 0.3s height ease;
      -webkit-transition: 0.3s height ease;
      transition: 0.3s height ease;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap {
        height: 55px;
      }
    }
    #frame #sidepanel #profile .wrap img {
      width: 50px;
      border-radius: 50%;
      padding: 3px;
      border: 2px solid #e74c3c;
      height: auto;
      float: left;
      cursor: pointer;
      -moz-transition: 0.3s border ease;
      -o-transition: 0.3s border ease;
      -webkit-transition: 0.3s border ease;
      transition: 0.3s border ease;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap img {
        width: 40px;
        margin-left: 4px;
      }
    }
    #frame #sidepanel #profile .wrap img.online {
      border: 2px solid #2ecc71;
    }
    #frame #sidepanel #profile .wrap img.away {
      border: 2px solid #f1c40f;
    }
    #frame #sidepanel #profile .wrap img.busy {
      border: 2px solid #e74c3c;
    }
    #frame #sidepanel #profile .wrap img.offline {
      border: 2px solid #95a5a6;
    }
    #frame #sidepanel #profile .wrap p {
      float: left;
      margin-left: 15px;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap p {
        display: none;
      }
    }
    #frame #sidepanel #profile .wrap i.expand-button {
      float: right;
      margin-top: 23px;
      font-size: 0.8em;
      cursor: pointer;
      color: #435f7a;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap i.expand-button {
        display: none;
      }
    }
    #frame #sidepanel #profile .wrap #status-options {
      position: absolute;
      opacity: 0;
      visibility: hidden;
      width: 150px;
      margin: 70px 0 0 0;
      border-radius: 6px;
      z-index: 99;
      line-height: initial;
      background: #435f7a;
      -moz-transition: 0.3s all ease;
      -o-transition: 0.3s all ease;
      -webkit-transition: 0.3s all ease;
      transition: 0.3s all ease;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options {
        width: 58px;
        margin-top: 57px;
      }
    }
    #frame #sidepanel #profile .wrap #status-options.active {
      opacity: 1;
      visibility: visible;
      margin: 75px 0 0 0;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options.active {
        margin-top: 62px;
      }
    }
    #frame #sidepanel #profile .wrap #status-options:before {
      content: '';
      position: absolute;
      width: 0;
      height: 0;
      border-left: 6px solid transparent;
      border-right: 6px solid transparent;
      border-bottom: 8px solid #435f7a;
      margin: -8px 0 0 24px;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options:before {
        margin-left: 23px;
      }
    }
    #frame #sidepanel #profile .wrap #status-options ul {
      overflow: hidden;
      border-radius: 6px;
    }
    #frame #sidepanel #profile .wrap #status-options ul li {
      padding: 15px 0 30px 18px;
      display: block;
      cursor: pointer;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li {
        padding: 15px 0 35px 22px;
      }
    }
    #frame #sidepanel #profile .wrap #status-options ul li:hover {
      background: #496886;
    }
    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
      position: absolute;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin: 5px 0 0 0;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
        width: 14px;
        height: 14px;
      }
    }
    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
      content: '';
      position: absolute;
      width: 14px;
      height: 14px;
      margin: -3px 0 0 -3px;
      background: transparent;
      border-radius: 50%;
      z-index: 0;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
        height: 18px;
        width: 18px;
      }
    }
    #frame #sidepanel #profile .wrap #status-options ul li p {
      padding-left: 12px;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li p {
        display: none;
      }
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
      background: #2ecc71;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
      border: 1px solid #2ecc71;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
      background: #f1c40f;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
      border: 1px solid #f1c40f;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
      background: #e74c3c;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
      border: 1px solid #e74c3c;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
      background: #95a5a6;
    }
    #frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
      border: 1px solid #95a5a6;
    }
    #frame #sidepanel #profile .wrap #expanded {
      padding: 100px 0 0 0;
      display: block;
      line-height: initial !important;
    }
    #frame #sidepanel #profile .wrap #expanded label {
      float: left;
      clear: both;
      margin: 0 8px 5px 0;
      padding: 5px 0;
    }
    #frame #sidepanel #profile .wrap #expanded input {
      border: none;
      margin-bottom: 6px;
      background: #32465a;
      border-radius: 3px;
      color: #f5f5f5;
      padding: 7px;
      width: calc(100% - 43px);
    }
    #frame #sidepanel #profile .wrap #expanded input:focus {
      outline: none;
      background: #435f7a;
    }
    #frame #sidepanel #search {
        border-top: 1px solid #cad3dd;
        border-bottom: 1px solid #cad3dd;
        font-weight: 300;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #search {
        display: none;
      }
    }
    #frame #sidepanel #search label {
      position: absolute;
      margin: 10px 0 0 20px;
    }
    #frame #sidepanel #search input {
      font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
      padding: 10px 0 10px 46px;
      width: calc(100% - 15px);
      border: none;
      background: #3cc4d7;
      color: #f5f5f5;
    }
    #frame #sidepanel #search input:focus {
      outline: none;
      background: #435f7a;
    }
    #frame #sidepanel #search input::-webkit-input-placeholder {
      color: #f5f5f5;
    }
    #frame #sidepanel #search input::-moz-placeholder {
      color: #f5f5f5;
    }
    #frame #sidepanel #search input:-ms-input-placeholder {
      color: #f5f5f5;
    }
    #frame #sidepanel #search input:-moz-placeholder {
      color: #f5f5f5;
    }
    #frame #sidepanel #contacts {
      height: calc(100% - 177px);
      overflow-y: scroll;
      overflow-x: hidden;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts {
        height: calc(100% - 149px);
        overflow-y: scroll;
        overflow-x: hidden;
      }
      #frame #sidepanel #contacts::-webkit-scrollbar {
        display: none;
      }
    }
    #frame #sidepanel #contacts.expanded {
      height: calc(100% - 334px);
    }
    #frame #sidepanel #contacts::-webkit-scrollbar {
      width: 8px;
      background: #2ec1d6eb;
    }
    #frame #sidepanel #contacts::-webkit-scrollbar-thumb {
      background-color: #243140;
    }
    #frame #sidepanel #contacts ul li.contact {
      position: relative;
      padding: 10px 0 15px 0;
      font-size: 0.9em;
      cursor: pointer;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact {
        padding: 6px 0 46px 8px;
      }
    }
    #frame #sidepanel #contacts ul li.contact:hover {
      background: #32465a;
    }
    #frame #sidepanel #contacts ul li.contact.active {
      background: #078799;
      border-right: 5px solid #63d9e9;
    }
    #frame #sidepanel #contacts ul li.contact.active span.contact-status {
      border: 2px solid #32465a !important;
    }
    #frame #sidepanel #contacts ul li.contact .wrap {
      width: 88%;
      margin: 0 auto;
      position: relative;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact .wrap {
        width: 100%;
      }
    }
    #frame #sidepanel #contacts ul li.contact .wrap span {
      position: absolute;
      left: 0;
      margin: -2px 0 0 -2px;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      border: 2px solid #2ec1d6eb;
      background: #95a5a6;
    }
    #frame #sidepanel #contacts ul li.contact .wrap span.online {
      background: #2ecc71;
    }
    #frame #sidepanel #contacts ul li.contact .wrap span.away {
      background: #f1c40f;
    }
    #frame #sidepanel #contacts ul li.contact .wrap span.busy {
      background: #e74c3c;
    }
    #frame #sidepanel #contacts ul li.contact .wrap img {
      width: 40px;
      border-radius: 50%;
      float: left;
      margin-right: 10px;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact .wrap img {
        margin-right: 0px;
      }
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta {
      padding: 5px 0 0 0;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact .wrap .meta {
        display: none;
      }
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta .name {
      font-weight: 600;
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
      margin: -20px 0 0 0;
      padding: 0 0 1px;
      font-weight: 400;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      -moz-transition: 1s all ease;
      -o-transition: 1s all ease;
      -webkit-transition: 1s all ease;
      transition: 1s all ease;
    }
    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
      position: initial;
      border-radius: initial;
      background: none;
      border: none;
      padding: 0 2px 0 0;
      margin: 0 0 0 1px;
      opacity: .5;
    }
    #frame #sidepanel #bottom-bar {
      position: absolute;
      width: 100%;
      bottom: 0;
    }
    #frame #sidepanel #bottom-bar button {
      float: left;
      border: none;
      width: 50%;
      padding: 10px 0;
      background: #32465a;
      color: #f5f5f5;
      cursor: pointer;
      font-size: 0.85em;
      font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button {
        float: none;
        width: 100%;
        padding: 15px 0;
      }
    }
    #frame #sidepanel #bottom-bar button:focus {
      outline: none;
    }
    #frame #sidepanel #bottom-bar button:nth-child(1) {
      border-right: 1px solid #2ec1d6eb;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button:nth-child(1) {
        border-right: none;
        border-bottom: 1px solid #2ec1d6eb;
      }
    }
    #frame #sidepanel #bottom-bar button:hover {
      background: #435f7a;
    }
    #frame #sidepanel #bottom-bar button i {
      margin-right: 3px;
      font-size: 1em;
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button i {
        font-size: 1.3em;
      }
    }
    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button span {
        display: none;
      }
    }
    #frame .content {
      float: right;
      width: 60%;
      height: 100%;
      overflow: hidden;
      position: relative;
    }
    @media screen and (max-width: 735px) {
      #frame .content {
        width: calc(100% - 58px);
        min-width: 300px !important;
      }
    }
    @media screen and (min-width: 900px) {
      #frame .content {
        width: calc(100% - 340px);
      }
    }
    #frame .content .contact-profile {
      width: 100%;
      height: 60px;
      line-height: 60px;
      background: #f5f5f5;
    }
    #frame .content .contact-profile img {
      width: 40px;
      border-radius: 50%;
      float: left;
      margin: 9px 12px 0 9px;
    }
    #frame .content .contact-profile p {
      float: left;
    }
    #frame .content .contact-profile .social-media {
      float: right;
    }
    #frame .content .contact-profile .social-media i {
      margin-left: 14px;
      cursor: pointer;
    }
    #frame .content .contact-profile .social-media i:nth-last-child(1) {
      margin-right: 20px;
    }
    #frame .content .contact-profile .social-media i:hover {
      color: #435f7a;
    }
    #frame .content .messages {
        width: 100%;
      height: auto;
      min-height: calc(100% - 130px);
      max-height: calc(100% - 130px);
      overflow-y: scroll;
      overflow-x: hidden;
    }
    @media screen and (max-width: 735px) {
      #frame .content .messages {
        max-height: calc(100% - 105px);
      }
    }
    #frame .content .messages::-webkit-scrollbar {
      width: 8px;
      background: transparent;
    }
    #frame .content .messages::-webkit-scrollbar-thumb {
      background-color: rgba(0, 0, 0, 0.3);
    }
    #frame .content .messages ul li {
      display: inline-block;
      clear: both;
      float: left;
      margin: 15px 15px 5px 15px;
      width: calc(100% - 25px);
      font-size: 0.9em;
    }
    #frame .content .messages ul li:nth-last-child(1) {
      margin-bottom: 20px;
    }
    #frame .content .messages ul li.sent img {
      margin: 6px 8px 0 0;
    }
    #frame .content .messages ul li.sent p {
      background: #3cc4d7;
      color: #f5f5f5;
    }
    #frame .content .messages ul li.replies img {
      float: right;
      margin: 6px 0 0 8px;
    }
    #frame .content .messages ul li.replies p {
      background: #f5f5f5;
      float: right;
    }
    #frame .content .messages ul li img {
      width: 22px;
      border-radius: 50%;
      float: left;
    }
    #frame .content .messages ul li p {
      display: inline-block;
      padding: 10px 15px;
      border-radius: 20px;
      max-width: 205px;
      line-height: 130%;
    }
    @media screen and (min-width: 735px) {
      #frame .content .messages ul li p {
        max-width: 300px;
      }
    }
    #frame .content .message-input {
      position: absolute;
      bottom: 0;
      width: 100%;
      z-index: 99;
    }
    #frame .content .message-input .wrap {
      position: relative;
    }
    #frame .content .message-input .wrap textarea {
      font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
      float: left;
      border: none;
      width: calc(100% - 50px);
      padding: 5px 32px 1px 8px;
      font-size: 0.8em;
      color: #32465a;
    }
    @media screen and (max-width: 735px) {
      #frame .content .message-input .wrap textarea {
        padding: 15px 32px 1px 8px;
      }
    }
    #frame .content .message-input .wrap textarea:focus {
      outline: none;
    }
    #frame .content .message-input .wrap .attachment {
      position: absolute;
      right: 60px;
      z-index: 4;
      margin-top: 10px;
      font-size: 1.1em;
      color: #435f7a;
      opacity: .5;
      cursor: pointer;
    }
    @media screen and (max-width: 735px) {
      #frame .content .message-input .wrap .attachment {
        margin-top: 17px;
        right: 65px;
      }
    }
    #frame .content .message-input .wrap .attachment:hover {
      opacity: 1;
    }
    #frame .content .message-input .wrap button {
      float: right;
      border: none;
      width: 50px;
      padding: 12px 0;
      cursor: pointer;
      background: #3cc4d7;
      color: #f5f5f5;
    }
    @media screen and (max-width: 735px) {
      #frame .content .message-input .wrap button {
        padding: 16px 0;
      }
    }
    #frame .content .message-input .wrap button:hover {
      background: #435f7a;
    }
    #frame .content .message-input .wrap button:focus {
      outline: none;
    }
</style>
<!-- Dashboard Content Section Start -->
        <div class="dashboard-content-section section bg_color--5">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-xl-2 col-lg-3">
                        <div class="dashboard-sidebar">
                            <div class="dashboard-menu">
                                <ul class="nav">
                                    <li>
                                       
                                        <ul>
                                            <li><a href="<?=PROOT?>dashboard"><i class="lnr lnr-home"></i> Dashboard </a></li>
                                            <?php

                                            $chats = $newUser->GetChatConnections('user_connection',$_SESSION['master_id']);
                                            $newChatDate = $newUser->FindByUIDSingle('chat_view_date',$_SESSION['master_id']);
                                            $total_count_new = 0;
                                            $lastmessageid = 0;
                                            if($newChatDate)
                                              $lastmessageid = $newChatDate->lastid;                   
                                            if($chats)
                                            {
                                                foreach ($chats as $chat) 
                                                {
                                                    $uicon=PROOT.'images/support.png';
                                                    if($chat->myid != $_SESSION['master_id'])
                                                    {
                                                      $unreadMessage = $newUser->GetUnreadMessage($chat->myid,$lastmessageid);
                                                        $chatuser = $newUser->FindCurrentUser('users',$chat->myid);
                                                        if($chatuser)
                                                        {
                                                            $fname = $chatuser->fname.' '.$chatuser->surname;
                                                            if(!empty($chatuser->img))
                                                            {
                                                                $uicon = PROOT.$chatuser->img;
                                                            }
                                                            
                                                        }
                                                    }
                                                    if($chat->uid != $_SESSION['master_id'])
                                                    {
                                                        $unreadMessage = $newUser->GetUnreadMessage($chat->uid,$lastmessageid);
                                                        $chatuser = $newUser->FindCurrentUser('users',$chat->uid);
                                                        if($chatuser)
                                                        {
                                                            $fname = $chatuser->fname.' '.$chatuser->surname;
                                                            if(!empty($chatuser->img))
                                                            {
                                                                $uicon = PROOT.$chatuser->img;
                                                            }
                                                        }
                                                    }
                                                    $total_count_new += count($unreadMessage);        
                                                }
                                            }

                                            if($user->utype == 'User')
                                            {
                                                ?>
                                                <li><a href="javascript:void(0);" controller="AddRequest" id="getcontroller"><i class="lnr lnr-file-add"></i> Add Request </a></li>

                                                <li><a href="javascript:void(0);" controller="myoffers_user" id="getcontroller"><i class="lnr lnr-car"></i> My Post </a></li>

                                                <li><a href="javascript:void(0);" controller="SelectedVender" id="getcontroller"><i class="lnr lnr-smile"></i>Selected Offers </a></li>
                                               
                                                <li><a href="javascript:void(0);" controller="Editprofile" id="getcontroller"><i class="lnr lnr-user"></i> My Account </a></li>

                                                <li><a href="<?=PROOT?>Chat"> <?php
                                                    if($total_count_new > 0) 
                                                    echo '<b id="totalNewMessages" style="    
                                                    margin-top: -5px;
                                                    border-radius: 50%;
                                                    position: absolute;
                                                    float: right;
                                                    width: 45px;
                                                    text-align: center;
                                                ">'.$total_count_new.' </b>'; 
                                                ?><i class="lnr lnr-envelope"></i> Messages</a></li>

                                                <li><a href="javascript:void(0);" controller="Faq" id="getcontroller"><i class="lnr lnr-tag"></i> FAQ </a></li>

                                                <li><a href="javascript:void(0);" controller="Support" id="getcontroller"><i class="lnr lnr-phone"></i> Support </a></li>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <li><a href="javascript:void(0);" controller="Allrequests" id="getcontroller"><i class="lnr lnr-rocket"></i> All requests </a></li>

                                                <li><a href="javascript:void(0);" controller="Mybids" id="getcontroller"><i class="lnr lnr-car"></i> My offers  </a></li>

                                                <li><a href="javascript:void(0);" controller="winoffers" id="getcontroller"><i class="lnr lnr-smile"></i> Won Requests </a></li>
                                                
                                                <li><a href="<?=PROOT?>Chat"> <?php
                                                    if($total_count_new > 0) 
                                                    echo '<b id="totalNewMessages" style="    
                                                    margin-top: -5px;
                                                    border-radius: 50%;
                                                    position: absolute;
                                                    float: right;
                                                    width: 45px;
                                                    text-align: center;
                                                ">'.$total_count_new.' </b>'; 
                                                ?><i class="lnr lnr-envelope"></i> Messages</a></li>

                                                <li><a href="javascript:void(0);" controller="Editprofile_vender" id="getcontroller"><i class="lnr lnr-user"></i> My Account </a></li>

                                                <li><a href="javascript:void(0);" controller="Payment" id="getcontroller"><i class="lnr lnr-dice"></i> Payment </a></li>

                                                <li><a href="javascript:void(0);" controller="FaqVendor" id="getcontroller"><i class="lnr lnr-question-circle"></i>FAQ </a></li>

                                                <li><a href="javascript:void(0);" controller="Support" id="getcontroller"><i class="lnr lnr-phone"></i>Support </a></li>

                                                <li><a href="javascript:void(0);" controller="Editprofile_vender" id="getcontroller"><i class="lnr lnr-chart-bars"></i>Statistics </a></li>
                                                <?php
                                            }
                                            ?>
                                            <li><a href="<?=PROOT?>logout"><i class="lnr lnr-power-switch"></i> Log Out </a></li>
                                        </ul>
                                    </li>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9" id="load_data">
                        <div class="dashboard-main-inner">
                            <div class="row">
                                <div class="col-12"> 
                                    <div class="page-breadcrumb-content mb-40">
                                        <h1>Chat</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="frame">
    <div id="sidepanel">
        <div id="profile">
            <div class="wrap">
                <img id="profile-img" src="<?php echo $myimage; ?>" class="online" alt="<?php echo $user->fname.' '.$user->surname; ?>" />
                <p><?php echo $user->fname.' '.$user->surname; ?></p>                
            </div>
        </div>
        <div id="search">
            <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
            <input type="text" placeholder="Search contacts..." id="myInput" onkeyup="myFunction();" />
        </div>
        <div id="contacts">
            <ul id="myUL"> 
                <?php
                $chats = $newUser->GetChatConnections('user_connection',$_SESSION['master_id']);
                $newChatDate = $newUser->FindByUIDSingle('chat_view_date',$_SESSION['master_id']);
                $lastmessageid = 0;
                if($newChatDate)
                  $lastmessageid = $newChatDate->lastid;                   
                if($chats)
                {
                    foreach ($chats as $chat) 
                    {
                        $uicon=PROOT.'images/support.png';
                        if($chat->myid != $_SESSION['master_id'])
                        {
                          $unreadMessage = $newUser->GetUnreadMessage($chat->myid,$lastmessageid);
                            $chatuser = $newUser->FindCurrentUser('users',$chat->myid);
                            if($chatuser)
                            {
                                $fname = $chatuser->fname.' '.$chatuser->surname;
                                if(!empty($chatuser->img))
                                {
                                    $uicon = PROOT.$chatuser->img;
                                }
                                
                            }
                        }
                        if($chat->uid != $_SESSION['master_id'])
                        {
                            $unreadMessage = $newUser->GetUnreadMessage($chat->uid,$lastmessageid);
                            $chatuser = $newUser->FindCurrentUser('users',$chat->uid);
                            if($chatuser)
                            {
                                $fname = $chatuser->fname.' '.$chatuser->surname;
                                if(!empty($chatuser->img))
                                {
                                    $uicon = PROOT.$chatuser->img;
                                }
                            }
                        }
                        ?>
                        <li class="contact" id="loadchat" fdi="<?php echo $chat->id; ?>">
                            <div class="wrap">
                              <?php 
                                    if(count($unreadMessage) > 0) 
                                        echo '<b id="newMessages'.$chat->id.'" style="    
                                        background-color: red;
                                        border-radius: 50%;
                                        position: absolute;
                                        float: right;
                                        margin: -5px;
                                        width: 25px;
                                        text-align: center;
                                    ">'.count($unreadMessage).' </b>'; 
                              ?>                  
                                <img src="<?php echo $uicon; ?>" alt="<?php echo $fname; ?>" />
                                <div class="meta">
                                    <p class="name"><?php 
                                      echo $fname;
                                    ?>  </p>    
                                                              
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
                
            </ul>
        </div>
    </div>
    
    <div class="content">
        <?php
            if(isset($_GET['chatwith']))
            {
                $chatid = base64_decode($_GET['chatwith']);
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
                    <input type="text" id="chat_message" placeholder="Write your message...">         
                    <button class="button" id="sendchatmessage"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </div>
                <?php
            }
            else
            {
                ?>
                <center><img src="<?=PROOT?>images/Chat-pana.svg" style="width: 55%;"></center>
                <?php
            }
            ?>
       
    </div>
</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Content Section End -->


<?php $this->end();?>

<script type="text/javascript">
    setInterval(function(){ 
        if($("#loadmessaged").is(":visible"))
        {
            var messageid = $("#chatid").val();
            $.ajax({
                type: 'POST',
                url: path + 'Master/GetNewMessage',
                data: {"messageid":messageid},
                beforeSend: function () {
                    
                },
                success: function (responce) {
                    if(responce != '')
                    {
                      
                        $("#loadmessaged").append(responce);
                        $(".messages").animate({ scrollTop: $(document).height() }, "fast");
                    }
                    
                }
            });
        } 

     }, 5000);
</script>

<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("p")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
        //alert(txtValue.toUpperCase().indexOf(filter));
      li[i].style.display = "";
    } else {
        li[i].style.display = "none";
    }
  }
}


</script>


