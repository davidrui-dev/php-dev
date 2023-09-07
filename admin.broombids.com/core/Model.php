<?php

class Model
{
  protected $_db, $_table, $_modelName, $_softDelete= false, $_columnNames=[];
  public $id;

  public function __construct($table)
  {
  	 $this->_db = DB::getInstance();
  	 $this->_table = $table;
  	 $this->_setTableColumns();
  	 $this->_modelName = str_replace(' ', '' ,ucwords(str_replace('_', ' ', $this->_table))); 
  } 

  protected function _setTableColumns(){
  	 $columns = $this->get_columns();
  	 foreach($columns as $column){
  	 	$columnName= $column->Field;
  	 	$this->_columnNames[] = $column->Field;
  	 	$this->{$columnName}= null;
  	 }
  }

  public function get_columns(){
  	return $this->_db->get_columns($this->_table);
  }

  public function find($params = [])
  {
  	$results = [];
  	$resultsQuery = $this->_db->find($this->_table,$params);
  	foreach ($resultsQuery as $result)
  	{ 
  		$obj = new $this->_modelName($this->_table);
  		$obj->populateObjData($result);
  		$results[] =$obj;

  	}
  	return $results;
  }

  public function findById($table,$id)
  {
    return $this->_db->findFirst($table,['conditions'=>"id = ? AND status =?",'bind'=>[$id,1]]);
  }

  public function findByuIds($table,$id,$status)
  {
    return $this->_db->findFirst($table,['conditions'=>"uid = ? AND status=?",'bind'=>[$id,$status]]);
  }

  public function findFirst($params = []){
  	$resultQuery= $this->_db->findFirst($this->_table,$params);
  	$result= new $this->_modelName($this->_table);
  	if($resultQuery)
  	{
  	$result->populateObjData($resultQuery);
  }
  	return $result;
  }

  public function save(){
  	 $fields = [];
  	 foreach($this->_columnNames as $column)
  	 {
  	 	$fields[$column] = $this ->$column;
  	 }
  	 // determines whether to update or insert

  	 if(property_exists($this, 'id') && $this->id != ''){
  	 		return $this->update($this->id,$fields);
  	  	 }
  	  	 else
  	  	 {
  	  	 	 return $this->insert($fields);
  	  	 }
  }

  public function insert($fields)
  {
  	if(empty($fields))
  		return false;
  	return $this->_db->insert($this->_table,$fields);
  }

 public function update ($uid,$fields){
    if(empty($fields) || $id == '') return false;
    return $this->_db->update($this->_table,$id,$fields);
  }
 
  public function delete($id = '')
  {
  	if($id == '' && $this->id == '' ) return false;
  	$id = ($id == '' ) ? $this->id : $id;
  	if($this->_softDelete)
  	{
  	 return	$this->update($id, ['deleted' => 1]);
  	}
  	return $this->_db->delete($this->_table,$id);
  }

  public function query($sql, $bind = [])
  {
  	return $this->_db->query($sql, $bind);
  }

  public function data()
  { 
  	$data = new stdClass();
  	foreach($this->columnNames as $column)
  	{
  		$data->column= $this->column;
  	}
  	return $data;
  }

  public function assign($params)
  {
  	if(!empty($params))
  	{
  		foreach($params as $key => $val)
  		{
  			if(in_array($key,$this->_columnNames))
  			{
  				$this->$key = sanitize($val);
  			}
  		}
  		return true;
  	}
  	return false;
  }

  protected function populateObjData($result)
  {
  	foreach ($result as $key => $val)
  	{
  		$this->$key = $val;
  	}
  }
  public function findBycookiename($tbl,$cookiename)
  {
    return $this->_db->findFirst($tbl,['conditions'=>"cookie = ?",'bind'=>[$cookiename]]);
  }

  public function findByuser_name($tbl,$username)
  {
    $row = $this->_db->query("SELECT `username` FROM $tbl WHERE `username` = '$username'");
    return $row->count();
  }


  // ------------------------------ --------------------------- ----------------
  //                               SEND SMS SEND SETTIND
  //----------------------------------------------------------------------------

  public function SendSMS($mobile,$message)
  {         
        $num = "91$mobile";    // MULTIPLE NUMBER VARIABLE PUT HERE...! 
        $ms = rawurlencode($message);   //This for encode your message content 
      $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=PFIZQeiHu0iNCT8l2808bw&senderid=UNIDWN&channel=2&DCS=0&flashsms=0&number='.$num.'&text='.$ms.'&route=1';
                             
        //echo $url;
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
        $data = curl_exec($ch);
  }

   public function findByCondition($table,$uid,$sessionID)
    {
      return $this->_db->find($table,['conditions'=>"uid = ?",'bind'=>[$uid],'conditions'=>"sessionid = ?",'bind'=>[$sessionID]]);
    }

    public function findCollaboration($category)
    {
      return $this->_db->find('collaboration',['conditions'=>"categoty = ? AND status=?",'bind'=>[$category,1]]);
    }

  // ------------------------------ --------------------------- ----------------
  //                               SEND MAIL SMTP SERVER SETTIND
  //----------------------------------------------------------------------------

  public function mail($email, $subject, $message,$contact=false)
  { 
  
      send_smtp_email($email, $subject,$message,$contact);
        // $mail = new PHPMailer();  
        // $mail->IsSMTP();
        // $mail->SMTPDebug = 2;
        // $mail->SMTPSecure = "ssl";
        // $mail->IsHTML(true);
        // $mail->SMTPAuth = true;
        // $mail->Host = "smtp.gmail.com";
        // $mail->Port = 465;
        // $mail->Username = "anjal01931@gmail.com";  // info@unidawn.com
        // $mail->Password = "Chand@1931";  // Un1d@wn@123
        // $mail->SetFrom("anjal01931@gmail.com", $subject);
        // $mail->AddReplyTo("anjal01931@gmail.com", $subject);
        // $mail->AddAddress($email);
        // $mail->Subject = $subject;
        // $mail->WordWrap   = 80;
        // $content = $message; 
        // $mail->MsgHTML($content);
        // $mail->IsHTML(true);
    /*$mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@unidawn.com';
    $mail->Password = 'Un1d@wn@123';
    $mail->FromName = "Unidawn";

    // Email Sending Details
    if($contact){
      $mail->addAddress('info@unidawn.com');
    }else{
      $mail->addAddress($email);      
    }
    $mail->Subject = $subject;
    $mail->msgHTML($message);
    $mail->IsHTML(true);
    $mail->Send();*/
  }

// ------------------------------ --------------------------- ----------------
//                               GET BROWSER AND OS
//----------------------------------------------------------------------------

  public function getLoginDetail()
  {  
    function getOS(){ 
      $user_agent = $_SERVER['HTTP_USER_AGENT'];
      $os_platform  = "Unknown OS Platform";
      $os_array     = array(
                            '/windows nt 10/i'      =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                      );
      foreach ($os_array as $regex => $value)
          if (preg_match($regex, $user_agent))
              $os_platform = $value;

      return $os_platform;
    }

    function getBrowser() {
      $user_agent = $_SERVER['HTTP_USER_AGENT'];
      $browser        = "Unknown Browser";

      $browser_array = array(
                              '/Trident/i'      => 'Internet Explorer',
                              '/msie/i'      => 'Internet Explorer',
                              '/firefox/i'   => 'Firefox',
                              '/safari/i'    => 'Safari',
                              '/chrome/i'    => 'Chrome',
                              '/edge/i'      => 'Edge',
                              '/OPR/i'     => 'Opera',
                              '/netscape/i'  => 'Netscape',
                              '/maxthon/i'   => 'Maxthon',
                              '/konqueror/i' => 'Konqueror',
                              '/mobile/i'    => 'Handheld Browser'
                       );
        foreach ($browser_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $browser = $value;
        return $browser;
    }

    $user_os = getOS();
    $user_browser= getBrowser();

    return $user_os.','.$user_browser;
  }

  public function getFriendSuggestions($uid,$limit=40)
  {
    $myfrieds = array();
    $friedsoffriens = array();
    $finaluserlist = array();
    $blockid= array();
    $requset = array();   
    
    $reqdata = $this->_db->query("SELECT * FROM `followrequest` WHERE `uid`='$uid'");
    $reqdatas = $reqdata->results();
    if($reqdatas)
    {
      foreach ($reqdatas as $req) 
      {
         $requset[]=$req->destination;
      }
      $requset = array_unique($requset);
      $requset = array_diff($requset, array($uid));  
    }  

    $blocksdata = $this->_db->query("SELECT * FROM `blockeduser` WHERE `uid`='$uid' OR `blockid`='$uid'");
    $blockdata = $blocksdata->results();
    if($blockdata)
    {
      foreach ($blockdata as $block) 
      {
         $blockid[]=$block->uid;
         $blockid[]=$block->blockid;
      }
      $blockid = array_unique($blockid);
      $blockid = array_diff($blockid, array($uid));  
    }  

    $row= $this->_db->query("SELECT * FROM `follow` WHERE `uid`='$uid' OR `destination`='$uid' AND `status`='1' ORDER BY `id` DESC");
    $myfollows = $row->results();
    if($myfollows)
    {
      foreach ($myfollows as $myfollow) 
      {
        $myfrieds[] = $myfollow->uid;
        $myfrieds[] = $myfollow->destination;
      }

      $myfrieds = array_unique($myfrieds);
      $mys = array_diff($myfrieds, array($uid));  
          
      if(!empty($mys))
      {
        foreach ($mys as $my) 
        {
          $rows = $this->_db->query("SELECT * FROM `follow` WHERE `uid`='$my' OR `destination`='$my' AND `status`='1' ORDER BY `id` LIMIT 20");
          $fof = $rows->results();
          if($fof)
          {
            foreach ($fof as $fofs) 
            {
              $friedsoffriens[] = $fofs->uid;
              $friedsoffriens[] = $fofs->destination;
            }
          }
        }       
      }

    

      $friedsoffriens=array_unique($friedsoffriens);
      $friedsoffriens=array_diff($friedsoffriens, array($uid));
      $finaluser = array_diff(array_unique($friedsoffriens),$mys);
      $finaluser = array_diff($finaluser,$blockid);
      $finaluser = array_diff($finaluser,$requset);


           
      if($finaluser)
      {
        foreach ($finaluser as $suggesid) 
        {         
          $user = $this->_db->findFirst('users',['conditions'=>'id=? AND status=?','column'=>'id,fullname,username,type,profilepic','bind'=>[$suggesid,1]]);          
          if($user)
          {
              $finaluserlist[]=$this->Suggetion_html($user);
          }         

        }
      }
       
    }
    else
    {
      $rows = $this->_db->query("SELECT id,fullname,username,type,profilepic FROM `users` WHERE `status`='1' ORDER BY RAND() LIMIT 25");
      $data = $rows->results();
      if($data)
      {
        foreach ($data as $user) 
        {
          $finaluserlist[]=$this->Suggetion_html($user);
        }
      }
    }

    return $finaluserlist;

  }

  public function Suggetion_html($user)
  {
    $img = Get_Profile_profilepicture($user->id,$user->profilepic,$user->type);
    ?>
    <div class="ii_card">
            <div class="ii_card_block">
                <img src="<?php echo $img; ?>" alt="" class="ii_profile_pic"  id="visitor_url"  lastid="<?=Encode($user->id)?>">
                <div class="ii_user" id="visitor_url"  lastid="<?=Encode($user->id)?>"><?php echo custom_echo($user->fullname,10); ?></div>
                <div class="ii_username" id="visitor_url"  lastid="<?=Encode($user->id)?>"><?php echo $user->username; ?></div>
                <a href="javascript:void(0)" id="follow_suggetion_btn" class="btn_follow" fdi="<?php echo EnCode($user->id); ?>">Follow</a>
            </div>
        </div>
    <?php
  }



} 

