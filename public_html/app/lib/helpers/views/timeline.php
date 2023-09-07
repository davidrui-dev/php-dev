<?php
    $data=array();
    $lastid=0;
    $timelines = $NewCommon->UD_FindByUIDAllHideTimeline('primes',$uid,1);
    if($timelines)
    {
        foreach ($timelines as $timeline) 
        {
            
            $lastid=$timeline->id;
            $user = $NewCommon->UD_FindByID('users',$timeline->uid);
            if($timeline->reprimeid != 0)
            {
                $likeID = $timeline->reprimeid;                
                $reprime_prime = $NewCommon->UD_FindByIDWithStatus('primes',$likeID,1);
                if($reprime_prime)
                {
                    $connectionForPrime = $NewCommon->UD_GetConnectionCount_visitor('follow',$reprime_prime->uid);
                    $data['Interactions']=$reprime_prime->postlike + $reprime_prime->comment + $reprime_prime->reprimecount;
                    $re_prime_user = $NewCommon->UD_FindByIDWithStatus('users',$reprime_prime->uid,1);
                    $data['usericon']=$re_prime_user->thumbnail;
                    $data['userType']=$user->type;
                    $data['UserID']=$re_prime_user->id;
                    $data['ReprimeIDUserID']=$timeline->uid;
                    $data['prime_type']=$reprime_prime->prime_type;
                    $data['fullname_reprime']=$user->fullname;
                    $data['fullname']=$re_prime_user->fullname;
                    $data['username']=$re_prime_user->username;
                    $data['userstick']=$re_prime_user->user_stick;
                    $data['gender']=$re_prime_user->gender;
                    $data['ptype']=$reprime_prime->prime_type;
                }                

            }
            else
            {
                $likeID = $timeline->id;
                $connectionForPrime = $NewCommon->UD_GetConnectionCount_visitor('follow',$timeline->uid);
                $data['Interactions']=$timeline->postlike + $timeline->comment + $timeline->reprimecount;
                $data['usericon']=$user->thumbnail;
                $data['userType']=$user->type;
                $data['UserID']=$user->id;
                $data['prime_type']=$timeline->prime_type;
                $data['fullname']=$user->fullname;
                $data['username']=$user->username;
                $data['userstick']=$user->user_stick;
                $data['gender']=$user->gender;
                $data['ptype']=$timeline->prime_type;
            }
            
            $primeImages=$NewCommon->UD_FindByPIDAll('primeimages',$likeID);
            $mycomment = $NewCommon->UD_GetUid_Pid('comment',$myid,$likeID);
            $mylike = $NewCommon->UD_GetUid_Pid('primeslike',$myid,$likeID);
            $reprime = $NewCommon->UD_GetUid_Reprime_id('primes',$myid,$likeID);
            $data['pid']=$likeID;
            
            
            $data['time']=$timeline->time;
            $data['location']=$timeline->location;
            $data['description']=$timeline->descriptiom;
            
            if($timeline->comment_status == 'Enable')
            {
                if($mycomment > 0)
                {
                    $data['comment']='<div id="OpenModelPrime" class="commentOption" fdi="'.Encode($likeID).'" popid="'.$likeID.'" popkey="'.md5($likeID).'">  
                        <img src="'.PROOT.'images/Timeline/comment_active.svg" class="options">
                    </div>';
                }
                else
                {
                    $data['comment']='<div id="OpenModelPrime" class="commentOption" fdi="'.Encode($likeID).'" popid="'.$likeID.'" popkey="'.md5($likeID).'">  
                        <img src="'.PROOT.'images/Timeline/comment.svg" alt="" class="options">
                    </div>';
                }
                
            }
            else
            {
               $data['comment']=''; 
            }

            if($mylike > 0)
            {
                $data['like']='<div class="likeOption"> 
                        <img src="'.PROOT.'images/Timeline/heart_active.svg" alt="" class="options">
                    </div>';
            }
            else
            {
                $data['like']=LikeAnimation($likeID);
            }
            if($timeline->reprime_status=='Enable')
            {
                if($reprime > 0)
                {
                    $data['reprime']='<div class="rePrimeOption" name="'.$data['fullname'].'" type="'.$data['prime_type'].'" fdi="'.Encode_simple($likeID).'">  
                            <img src="'.PROOT.'images/Timeline/retweet_active.svg" alt="" class="options">
                        </div>';
                }
                else
                {
                    $data['reprime']='<div class="rePrimeOption" name="'.$data['fullname'].'" type="'.$data['prime_type'].'" fdi="'.Encode_simple($likeID).'">  
                            <img src="'.PROOT.'images/Timeline/retweet.svg" alt="" class="options">
                        </div>';
                }
            }
            else
            {
                $data['reprime']='';
            }
            
             if($timeline->shield!='')
             {
                if($timeline->shield_status == 1)
                {
                    $data['shield']=$timeline->shield.'r';
                }
                else
                {
                   $data['shield']=$timeline->shield.'w'; 
                }  
             }
             else
             {
                $data['shield']='';
             }

            if($timeline->prime_type == 'Prime' || $timeline->prime_type == 'Share')
            {  
                if($timeline->prime_status =='Private')
                {
                    if($timeline->uid == $_SESSION['master_id'] || $connectionForPrime > 0)
                    {
                        echo PrimeHTML($data,$primeImages);
                    }
                }
                else
                {
                    echo PrimeHTML($data,$primeImages);
                }              
                                                
            }
            if($timeline->prime_type == 'Profile' || $timeline->prime_type == 'Cover')
            { 
                if($timeline->prime_status =='Private')
                {
                    if($timeline->uid == $_SESSION['master_id'] || $connectionForPrime > 0)
                    {
                        echo ProfileHTML($data,$primeImages); 
                    }
                }
                else
                {
                    echo ProfileHTML($data,$primeImages); 
                } 
                                                  
            }
            
            if($timeline->prime_type == 'Reprime')
            {
                if($reprime_prime)
                { 
                    if($reprime_prime->prime_type == 'ExternalPrime')
                    {
                        $exlink = $NewCommon->UD_FindByPID('external_prime',$likeID);
                        echo External_Link_prime_reprime($data,$exlink);
                    }  
                    else
                    {
                        echo RePrimeHTML($data,$primeImages);
                    }                 
                    
                }  
            } 
            if($timeline->prime_type == 'ExternalPrime') 
            {
                $exlink = $NewCommon->UD_FindByPID('external_prime',$likeID);
                echo External_Link_prime($data,$exlink);
            }
                                       
        } // end foreach
    }
?>
<div id="loadmoreTimeline" fdi="<?php echo Encode($lastid); ?>" idu="<?php echo Encode($uid); ?>"></div>