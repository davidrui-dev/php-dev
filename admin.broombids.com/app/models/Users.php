<?php
class Users extends Model
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


	public function FindByIDSigle($table,$id)
	{
		return $this->_db->findfirst($table,['conditions'=>'id=?','bind'=>[$id]]);
	}

	public function FindByUIDSigle($table,$id)
	{
		return $this->_db->findfirst($table,['conditions'=>'uid=?','bind'=>[$id]]);
	}

	public function FindByLIDAll($table,$id)
	{
		return $this->_db->find($table,['conditions'=>'lid=? ORDER BY id DESC','bind'=>[$id]]);
	}

	public function FindAllReply($table,$id)
	{
		return $this->_db->find($table,['conditions'=>'support_id=? ORDER BY id ASC','bind'=>[$id]]);
	}

	public function FindByCID($table,$id)
	{
		return $this->_db->find($table,['conditions'=>'cid=?','bind'=>[$id]]);
	}

	public function FindFaqbyType($type)
	{
		return $this->_db->find('faq',['conditions'=>'vtype=?  ORDER BY time ASC','bind'=>[$type]]);
	}

	public function FindAllContest()
	{
		// $row=$this->_db->query("SELECT * FROM `bid_post` WHERE `win_uid`='1' ORDER BY `id` DESC LIMIT $limit");
		$row=$this->_db->query("SELECT * FROM (SELECT A.* FROM `bid_post` AS A INNER JOIN `post` AS B ON A.pid=B.id) AS T WHERE T.`win_uid`='1' ORDER BY T.`id` DESC");
		return $row->results();
	}

	public function FindByAll($table)
	{
		$row=$this->_db->query("SELECT * FROM $table ORDER BY `id` ASC");
		return $row->results();
	}

	public function FindByAllWithLimit($table,$utype,$limit)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE `utype` = '$utype' ORDER BY `id` DESC LIMIT $limit");
		return $row->results();
	}

	public function CountForntUser($table,$utype)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE `utype` = '$utype'");
		return $row->Count();
	}

	public function CountAdminUser($table)
	{
		$row=$this->_db->query("SELECT * FROM $table");
		return $row->Count();
	}




	
	

	
    
}