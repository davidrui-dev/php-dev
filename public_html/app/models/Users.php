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


	public function FindByUIDAll($table,$id)
	{
		return $this->_db->find($table,['conditions'=>'uid=?','bind'=>[$id]]);
	}

	public function FindByVendorIDAll($table,$id)
	{
		return $this->_db->find($table,['conditions'=>'v_id=?','bind'=>[$id]]);
	}

	public function FindByVendorUserID($table,$vid,$uid)
	{
		return $this->_db->findfirst($table,['conditions'=>'v_id=?  AND u_id=?','bind'=>[$vid,$uid]]);
	}

	public function FindByUIDAllWithStatus($table,$uid,$status)
	{
		return $this->_db->find($table,['conditions'=>'uid=? AND status=? ORDER BY id DESC','bind'=>[$uid,$status]]);
	}

	public function FindByStatusLimit($table,$status,$limit)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE `status`='$status' ORDER BY `id` DESC LIMIT $limit");
		return $row->results();
	}

	public function FindSelectedVender($table,$pid,$status)
	{
		return $this->_db->findfirst($table,['conditions'=>'pid=? AND win_uid=?','bind'=>[$pid,$status]]);
	}

	public function FindByUIDSingle($table,$id)
	{
		return $this->_db->findfirst($table,['conditions'=>'uid=?','bind'=>[$id]]);
	}

	public function FindWinOffer($table,$id)
	{
		return $this->_db->find($table,['conditions'=>'uid = ? AND win_uid=?','bind'=>[$id,1]]);
	}

	public function FindByLIDAll($table,$id)
	{
		return $this->_db->find($table,['conditions'=>'lid=? ORDER BY id DESC','bind'=>[$id]]);
	}

	public function CheckAlreadyBid($uid,$pid)
	{
		return $this->_db->findfirst('bid_post',['conditions'=>'uid=? AND pid=?','bind'=>[$uid,$pid]]);
	}

	public function GetMaximumBid($pid)
	{
		return $this->_db->findfirst('bid_post',['conditions'=>'pid=? ORDER BY bid_amount DESC','bind'=>[$pid]]);
	}

	public function GetAllBidsPID($pid)
	{
		return $this->_db->find('bid_post',['conditions'=>'pid=? ORDER BY bid_amount ASC','bind'=>[$pid]]);
	}

	public function GetAllBidsPIDAndDiscard($pid,$status)
	{
		return $this->_db->find('bid_post',['conditions'=>'pid=? AND discard=? ORDER BY bid_amount ASC','bind'=>[$pid,$status]]);
	}


	public function GetMinimumBid($pid)
	{
		return $this->_db->findfirst('bid_post',['conditions'=>'pid=? ORDER BY bid_amount ASC','bind'=>[$pid]]);
	}

	public function FindByHash($table,$id)
	{
		return $this->_db->findfirst($table,['conditions'=>'hash=?','bind'=>[$id]]);
	}

	public function FindCurrentUser($table,$id)
	{
		return $this->_db->findfirst($table,['conditions'=>'id=?','bind'=>[$id]]);
	}

	public function FindFuterImage($table,$id)
	{
		return $this->_db->findfirst($table,['conditions'=>'vname=?','bind'=>[$id]]);
	}

	public function Update_Query($table_name,$id,$fields)
	{
		$this->_db->update($table_name,$id,$fields);	    
	}

	public function FindCarType($table,$id)
	{
		return $this->_db->find($table,['conditions'=>'vtype=? ORDER BY time ASC','bind'=>[$id]]);
	}

	public function FindBybid($table,$bid)
	{
		return $this->_db->find($table,['conditions'=>'bid=?','bind'=>[$bid]]);
	}

	public function FindCidAll($table,$id)
	{
		return $this->_db->find($table,['conditions'=>'cid=?','bind'=>[$id]]);
	}

	public function LatestOffered($limit)
	{
		// $row=$this->_db->query("SELECT * FROM `bid_post` WHERE `win_uid`='1' ORDER BY `id` DESC LIMIT $limit");
		$row=$this->_db->query("SELECT * FROM (SELECT A.* FROM `bid_post` AS A INNER JOIN `post` AS B ON A.pid=B.id) AS T WHERE T.`win_uid`='1' ORDER BY T.`id` DESC LIMIT $limit");
		return $row->results();
	}

	public function FindByAll($table)
	{
		$row=$this->_db->query("SELECT * FROM $table ORDER BY `id` DESC");
		return $row->results();
	}

	public function FindByAvatar($table)
	{
		$row=$this->_db->query("SELECT * FROM $table ORDER BY `id` DESC");
		return $row->results();
	}

	public function Dynamic_Query($query)
	{
		$row=$this->_db->query($query);
		return $row->results();
	}

	public function GetPosts($table,$date,$limit)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE `fromdate` > '$date' AND `status`='1' ORDER BY id DESC LIMIT $limit");
		return $row->results();
	}

	public function AllPosts_count()
	{
		$date_raw = date('Y-m-d');
        $date = date('Y-m-d', strtotime('-1 day', strtotime($date_raw)));
		$row=$this->_db->query("SELECT * FROM `post` WHERE `fromdate` > '$date' AND `status`='1'");
		return $row->count();
	}

	public function FindByAllWithLimit($table,$limit)
	{
		$row=$this->_db->query("SELECT * FROM $table ORDER BY `id` DESC LIMIT $limit");
		return $row->results();
	}

	public function GetConnectionMessages($messageid,$limit)
	{
		$row=$this->_db->query("SELECT * FROM `chat` WHERE `messageid`='$messageid' ORDER BY `id` ASC LIMIT $limit");
		return $row->results();
	}

	public function SetChatUpdate($uid,$lastid)
	{
		$row=$this->_db->query("INSERT INTO chat_view_date (`uid`,`lastid`) VALUES ($uid,$lastid) ON DUPLICATE KEY UPDATE uid = $uid , `lastid`=$lastid ,date=CURRENT_TIMESTAMP()");
		return $row;
	}

	public function GetUnreadMessage($uid,$lastid)
	{
		$row=$this->_db->query("SELECT * FROM `chat` WHERE `sender`=$uid AND `id`>'$lastid'");
		return $row->results();
		//return $date;
	}

	public function GetChatConnections($table,$myid)
	{
		$row=$this->_db->query("SELECT * FROM $table WHERE `myid`='$myid' OR `uid`='$myid' ORDER BY `id` DESC");
		return $row->results();
	}

	public function FindAllOfferButNotBid($uid,$limit)
	{
		$row=$this->_db->query("SELECT post.* FROM post,bid_post WHERE bid_post.pid != post.id AND bid_post.uid != '$uid' ORDER BY post.id DESC LIMIT $limit");
		return $row->results();
	}

	public function FindAllOfferButBid($uid,$limit)
	{
		$row=$this->_db->query("SELECT post.*,bid_post.bid_amount,bid_post.win_uid,bid_post.car_type,bid_post.car_name,bid_post.id as bidid FROM post,bid_post WHERE bid_post.pid = post.id AND bid_post.uid = '$uid' ORDER BY post.id DESC LIMIT $limit");
		return $row->results();
	}

	public function WinOffersCount($id)
	{
		$row= $this->_db->query("SELECT * FROM `bid_post` WHERE `uid` = '$id' AND `win_uid` = '1'");
		return $row->count();
	}

	public function AllOffersCount($id)
	{
		$row= $this->_db->query("SELECT * FROM `bid_post` WHERE `uid` = '$id'");
		return $row->count();
	}

	public function AllOffersCount_Post_customer($id)
	{
		$row= $this->_db->query("SELECT * FROM `post` WHERE `uid` = '$id'");
		return $row->count();
	}

	public function AllOffersCount_Post_Selected_customer($id)
	{
		$row= $this->_db->query("SELECT * FROM `post` WHERE `uid` = '$id' AND `status`='2'");
		return $row->count();
	}

	public function CheckSelecedOrNot($table,$id)
	{
		return $this->_db->findfirst($table,['conditions'=>'pid=? AND win_uid=?','bind'=>[$id,1]]);
	}

	public function QueryIDIN($tbl,$ids)
	{
		$row=$this->_db->query("SELECT * FROM $tbl WHERE `id` IN ($ids)");
		return $row->results();
	}



	
	

	
    
}