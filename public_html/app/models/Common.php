<?php
class Common extends Model
{
	private $_isLoggedIn,$_sessionName, $_cookieName;
	public static $currentLoggedInUser = null;		
	public function __construct($user = '')
	{
		$table= 'users';
		parent::__construct($table);
		$this->_sessionName= CURRENT_USER_SESSION_NAME;
		$this->_cookieName = REMEMBER_ME_COOKIE_NAME;
		$this->_softDelete = true;
		if ($user != '')
		{
			if(is_int($user))
			{
				$u= $this->_db->findFirst($table,['conditions'=>'id=?','bind'=>[$user]]);
			}
			else{
				$u= $this->_db->findFirst($table,['conditions'=>'username=?','bind'=>[$user]]);
			}
			if($u)
			{
				foreach($u as $key => $val)
				{
					$this->key =$val;
				}
			}
		}
	}

	public function CP_Insert($table_name,$fields)
	{
		$this->_db->insert($table_name,$fields);
	    return $this->_db->lastID();
	}

	public function CP_Update($table_name,$id,$fields)
	{
		$this->_db->update($table_name,$id,$fields);	    
	}
	public function CP_Delete($table_name,$id)
	{
		$this->_db->delete($table_name,$id);	    
	}

	public function CP_Delete_All($table_name)
	{
		$row=$this->_db->query("DELETE FROM `$table_name`");
		return $row;    
	}
	public function LoginCheck($email,$password)
	{
		return $this->_db->findfirst('users',['conditions'=>'email=? AND password=?','bind'=>[$email,$password]]);
	}

	public function CheckAlreadyBid($uid,$pid)
	{
		return $this->_db->findfirst('bid_post',['conditions'=>'uid=? AND pid=?','bind'=>[$uid,$pid]]);
	}

	public function CheckAlreadyselectOrNot($pid)
	{
		return $this->_db->findfirst('bid_post',['conditions'=>'pid=? AND win_uid=?','bind'=>[$pid,1]]);
	}

	public function CheckOldPassword($id,$password)
	{
		return $this->_db->findfirst('users',['conditions'=>'id=? AND password=?','bind'=>[$id,$password]]);
	}

	public function FindByEmail($email)
	{
		return $this->_db->findfirst('users',['conditions'=>'email=?','bind'=>[$email]]);
	}
	public function FindByPhone($phone)
	{
		return $this->_db->findfirst('users',['conditions'=>'phone=?','bind'=>[$phone]]);
	}

	public function FindById($table,$id)
	{
		return $this->_db->findfirst($table,['conditions'=>'id=?','bind'=>[$id]]);
	}

	public function CheckMailSendOrNot($table)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE `mail_status` = '0' ORDER BY `id` ASC LIMIT 10");
		return $row->results();
	}

	public function GetAllVendors($table)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE `utype`='Vender' AND `status`='1'");
		return $row->results();
	}
	public function CustomeQuery($query)
	{
		$row=$this->_db->query($query);
		return $row->results();
	}

	public function GetExpirePost($date)
	{
		$row=$this->_db->query("SELECT * FROM `post` WHERE `todate`='$date' AND `status`='2'");
		return $row->results();
	}

	public function CheckAlreadyWin($table,$id)
	{
		return $this->_db->findfirst($table,['conditions'=>'id=? AND win_uid=?','bind'=>[$id,1]]);
	}

	public function GetCarIds($table,$id)
	{
		return $this->_db->find($table,['conditions'=>'vtype=?','bind'=>[$id]]);
	}	

	public function GetRecordInID($table,$ids)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE id IN ($ids)");
		return $row->results();
	}

	public function GetRecordInCID($table,$ids)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE cid IN ($ids)");
		return $row->results();
	}

	public function DeleteByUid($table,$uid)
	{
		$this->_db->query("DELETE FROM $table WHERE `uid` = '$uid'");
	}

	public function GetPosts_Next($table,$lastid,$limit)
	{
		$date_raw = date('Y-m-d');
        $date = date('Y-m-d', strtotime('-1 day', strtotime($date_raw)));
		$row=$this->_db->query("SELECT * FROM $table WHERE `id` < '$lastid' AND `fromdate` > '$date' AND `status`='1' ORDER BY id DESC LIMIT $limit");
		return $row->results();
	}

	public function GetPosts_Previous($table,$lastid,$limit)
	{
		$date_raw = date('Y-m-d');
        $date = date('Y-m-d', strtotime('-1 day', strtotime($date_raw)));
        $sql="SELECT * FROM (SELECT * FROM $table WHERE `id` > '$lastid' AND `fromdate` > '$date' AND `status`='1' ORDER BY id ASC LIMIT $limit) id ORDER BY id DESC";
		$row=$this->_db->query($sql);
		return $row->results();
	}

	public function Dynamic_Query_a($query)
	{
		$row=$this->_db->query($query);
		return $row->results();
	}

	public function CheckChet($table,$myid,$uid)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE `myid`='$myid' AND `uid`='$uid' OR `myid`='$uid' AND `uid`='$myid'");
		return $row->results();
	}
	public function GetNewMessage($messageid,$lastid)
	{
		$row=$this->_db->query("SELECT * FROM `chat` WHERE `id` > '$lastid' AND `messageid`='$messageid' ORDER BY id ASC");
		return $row->results();
	}
	
}
