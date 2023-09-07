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

	public function CP_DeleteByCid($table,$id)
	{
		$this->_db->query("DELETE FROM $table WHERE `cid`='$id'");
	}

	public function FindByID($tbl,$id)
	{
		return $this->_db->findfirst($tbl,['conditions'=>'id=?','bind'=>[$id]]);
	}

	public function FindByCID($tbl,$id)
	{
		return $this->_db->find($tbl,['conditions'=>'cid=?','bind'=>[$id]]);
	}

	public function FindByAll($table)
	{
		$row=$this->_db->query("SELECT * FROM $table ORDER BY `id` DESC");
		return $row->results();
	}

	public function custome_query($table)
	{
		$row=$this->_db->query($table);
		return $row->results();
	}

	public function FindNotInID($table,$id)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE `id` NOT IN ($id) ORDER BY `id` DESC");
		return $row->results();
	}

	public function FindInID($table,$id)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE `id` IN ($id) ORDER BY `id` DESC");
		return $row->results();
	}

	public function LoginCheck($email,$password)
	{
		return $this->_db->findfirst('adminusers',['conditions'=>'email=? AND password=?','bind'=>[$email,$password]]);
	}

	public function FindByEmail($email)
	{
		return $this->_db->findfirst('users',['conditions'=>'email=?','bind'=>[$email]]);
	}	
	
}
