<?php

class Model1
{
  protected $_db1, $_table, $_modelName, $_softDelete= false, $_columnNames=[];
  public $id;

  public function __construct($table)
  {
  	 $this->_db1 = DB1::getInstance();
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
  	return $this->_db1->get_columns($this->_table);
  }

  public function find($params = [])
  {
  	$results = [];
  	$resultsQuery = $this->_db1->find($this->_table,$params);
  	foreach ($resultsQuery as $result)
  	{ 
  		$obj = new $this->_modelName($this->_table);
  		$obj->populateObjData($result);
  		$results[] =$obj;

  	}
  	return $results;
  }

  public function findById($id)
  {
    return $this->findFirst(['conditions'=>"id = ?",'bind'=>[$id]]);
  }

  public function findFirst($params = []){
  	$resultQuery= $this->_db1->findFirst($this->_table,$params);
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
  	return $this->_db1->insert($this->_table,$fields);
  }

 public function update ($uid,$fields){
    if(empty($fields) || $id == '') return false;
    return $this->_db1->update($this->_table,$id,$fields);
  }
 
  public function delete($id = '')
  {
  	if($id == '' && $this->id == '' ) return false;
  	$id = ($id == '' ) ? $this->id : $id;
  	if($this->_softDelete)
  	{
  	 return	$this->update($id, ['deleted' => 1]);
  	}
  	return $this->_db1->delete($this->_table,$id);
  }

  public function query($sql, $bind = [])
  {
  	return $this->_db1->query($sql, $bind);
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
    return $this->_db1->findFirst($tbl,['conditions'=>"cookie = ?",'bind'=>[$cookiename]]);
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
      return $this->_db1->find($table,['conditions'=>"uid = ?",'bind'=>[$uid],'conditions'=>"sessionid = ?",'bind'=>[$sessionID]]);
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



} 

