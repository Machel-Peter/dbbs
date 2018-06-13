<?php
/*
 * Dz盒子www.idzbox.com
 * Dz盒子：Discuz!应用中心十大优秀开发者！
 * QQ群：idzbox.com
 * From www.idzbox.com
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
loadcache('plugin');
require_once libfile('function/misc');
$ips=array();
$langVar=lang('plugin/nimba_session');
$var = $_G['cache']['plugin']['nimba_session'];
$group=unserialize($var['group']);
$pagenum=empty($var['pagenum'])? 50:$var['pagenum'];
ipStrs($_G['clientip']);
$myadd=$ips[md5($_G['clientip'])];
$countnum=dailycount();
$tj=$langVar['tj_1'].$countnum[0].$langVar['tj_2'].$countnum[3].$langVar['tj_3'].$countnum[4].$langVar['tj_4'].$countnum[1].$langVar['tj_5'].$countnum[2];
$navtitle=$langVar['appname'];
$operation=trim($_GET['operation']);
if(!$operation||!in_array($operation,array('user','youke','act','newthread','newuser'))) $operation='';
if(!in_array($_G['groupid'],$group)){
	$nosee=$langVar['sorry'].'<br>';
}else{
	$page = max(1, intval($_GET['page']));
	$start_limit = ($page - 1) * $pagenum;	
	$action='action in (1,2,3,4,5,127)';
	$isSession=true;
    if($operation =='user'){
	    $num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('common_session')." where uid>0 and $action");
	    $query=DB::query("SELECT * FROM ".DB::table('common_session')." where uid>0 and $action order by lastactivity DESC LIMIT $start_limit, $pagenum");
	}elseif($operation =='youke'){
	    $num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('common_session')." where uid=0 and $action");
	    $query=DB::query("SELECT * FROM ".DB::table('common_session')." where uid=0 and $action order by lastactivity DESC LIMIT $start_limit, $pagenum");
	}elseif($operation ==''){
	    $num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('common_session')." where $action");
	    $query=DB::query("SELECT * FROM ".DB::table('common_session')." where $action order by lastactivity DESC LIMIT $start_limit, $pagenum");
	}elseif($operation =='act'){
		$isSession=false;
        $nowtime=strtotime(date('Y-m-d'));
        $actdata=array();
        $querys = DB::query("SELECT * FROM ".DB::table('forum_post')." where dateline>$nowtime and invisible=0");
        while($threadfid = DB::fetch($querys)){
            if($threadfid['first']==1){
        	    $actdata[$threadfid['authorid']]['thread']+=1;
	            $actdata[$threadfid['authorid']]['reply']+=0;
        	}else{
	        	$actdata[$threadfid['authorid']]['reply']+=1;
	        	$actdata[$threadfid['authorid']]['thread']+=0;
	        }
	        $actdata[$threadfid['authorid']]['author']=$threadfid['author'];
	        $actdata[$threadfid['authorid']]['useip']=$threadfid['useip'];
	        $actdata[$threadfid['authorid']]['dateline']=$threadfid['dateline'];
        }
        $adata=array();
        $i=0;
        foreach($actdata as $uid=>$data){
            $data['uid']=$uid;
			ipStrs($data['useip']);
			$data['useip']=$ips[md5($data['useip'])]? $ips[md5($data['useip'])]:$data['useip'];
			$data['dateline']=dgmdate($data['dateline'],'Y-m-d H:i:s');
        	$adata[$i]=$data;
        	$i++;
        }
    }elseif($operation =='newthread'){//今日新帖
		$isSession=false;
        $nowtime=strtotime(date('Y-m-d'));
	    $num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('forum_thread')." where dateline>$nowtime and displayorder>=0");
		$query = DB::query("SELECT a.tid,a.subject,a.fid,a.dateline,a.author,a.authorid,a.lastpost,a.lastposter,a.views,a.replies,b.name FROM ".DB::table('forum_thread')." a inner join ".DB::table('forum_forum')." b on a.fid=b.fid where a.dateline>$nowtime and a.displayorder>=0 ORDER BY a.tid DESC  LIMIT $start_limit, $pagenum");
	    $newthread=array();
	    $i=0;
        while($value=DB::fetch($query)){
	        $name='<a href="home.php?mod=space&uid='.$value['authorid'].'" target="_blank">'.$value['author'].'</a>';
			$value['name']=str_replace('【','',$value['name']);	
	        $value['name']=str_replace('】','',$value['name']);	
			$forum='<a href="forum.php?mod=forumdisplay&fid='.$value['fid'].'" target="_blank">'.$value['name'].'</a>';
		    $arr=array($name,dgmdate($value['dateline'],'Y-m-d H:i:s'),$value['views'],$value['replies'],$forum,'<a href="forum.php?mod=viewthread&tid='.$value['tid'].'" target="_blank">'.$value['subject'].'</a>');
		    $newthread[$i]=$arr;
		    $i++;
	    }
    }elseif($operation =='newuser'){//今日会员
		$isSession=false;
        $nowtime=strtotime(date('Y-m-d'));
	    $num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('common_member')." a inner join ".DB::table('common_member_profile')." b on a.uid=b.uid inner join ".DB::table('common_member_status')." c on c.uid=b.uid where a.regdate>$nowtime");
		$query = DB::query("SELECT a.uid,a.username,a.regdate,a.email,b.qq,c.regip,c.lastactivity FROM ".DB::table('common_member')." a inner join ".DB::table('common_member_profile')." b on a.uid=b.uid inner join ".DB::table('common_member_status')." c on c.uid=b.uid where a.regdate>$nowtime ORDER BY a.uid DESC  LIMIT $start_limit, $pagenum");		
	    $newthread=array();
	    $i=0;
        while($value=DB::fetch($query)){
	        $name='<a href="home.php?mod=space&uid='.$value['uid'].'" target="_blank">'.$value['username'].'</a>';
			$regdate=dgmdate($value['regdate'],'Y-m-d H:i:s');
			ipStrs($value['regip']);
			$add=$ips[md5($value['regip'])];
			$last=dgmdate($value['lastactivity'],'Y-m-d H:i:s');
		    $arr=array($name,$regdate,$add,$value['email'],$last);
		    $newthread[$i]=$arr;
		    $i++;
	    }
    }else{
		$operation='';
		$isSession=true;
	    $num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('common_session')." where $action");
		$page = max(1, intval($_GET['page']));
		$start_limit = ($page - 1) * $pagenum;	
	    $query=DB::query("SELECT * FROM ".DB::table('common_session')." where $action order by lastactivity DESC LIMIT $start_limit, $pagenum");
	}
	//统一分页
	$multipage = multi($num, $pagenum, $page, "plugin.php?id=nimba_session:session&operation=".$operation);
	if($isSession){
		$data=array();
		$i=0;
		while($value=DB::fetch($query)){
			$ip=$value['ip1'].'.'.$value['ip2'].'.'.$value['ip2'].'.'.$value['ip4'];
			ipStrs($ip);
			$add=$ips[md5($ip)];
			if($value['action']==2){
				if($value['fid']==0){
					$item=$langVar['appid_id'.$value['action']];
					$detail='';			
				}else{
					$item='<a href="forum.php?mod=forumdisplay&fid='.$value['fid'].'" target="_blank">'.viewfid($value['fid']).'</a>';
					$detail=viewtid($value['tid']);
				}
			}else{
				$item=$langVar['appid_id'.$value['action']];
				$detail='';
			}
			$name=empty($value['username'])&&$value['uid']==0? $langVar['youke']:'<a href="home.php?mod=space&uid='.$value['uid'].'" target="_blank">'.$value['username'].'</a>';
			$arr=array($name,$add,dgmdate($value['lastactivity'],'H:i:s'),$item,$detail);
			$data[$i]=$arr;
			$i++;
		}
	}
}

function ipStrs($ip){
	global $ips;
	if(!isset($ips[md5($ip)])){
		require_once libfile('function/misc');	
		$myadd=convertip($ip);
		$myadd=str_replace(' ','',str_replace('-','',$myadd));
		$ips[md5($ip)]=$myadd;
	}
}
	
function viewfid($fid){
	global $_G,$forumNames;
	loadcache('forums');
	if($_G['cache']['forums'][$fid]['name']){
		return $_G['cache']['forums'][$fid]['name'];
	}else{
		if(!isset($forumNames[$fid])){
			$name=DB::result_first("SELECT name FROM ".DB::table('forum_forum')." where fid=$fid");
			$forumNames[$fid]=$name;
		}
		return $forumNames[$fid];		
	}
}	

function viewtid($tid){
	$tid=intval($tid);
    if($tid){
		$subject=DB::result_first("SELECT subject FROM ".DB::table('forum_thread')." where tid=$tid");
		return '<a href="forum.php?mod=viewthread&tid='.$tid.'" target="_blank">'.$subject.'</a>';
	}else return '';	
}

function dailycount(){
    $nowtime=strtotime(date('Y-m-d'));
    $countnum=array();
	$countnum[0]=DB::result_first("SELECT count(*) as num FROM ".DB::table('common_member')." where regdate>$nowtime");
	//发帖会员
	$countnum[1]=DB::result_first("SELECT count(distinct authorid) FROM ".DB::table('forum_thread')." where dateline>$nowtime");
	//回帖会员
	$countnum[2]=DB::result_first("SELECT count(distinct authorid) FROM ".DB::table('forum_post')." where dateline>$nowtime and first=0");
	//主题数
	$countnum[3]=DB::result_first("SELECT count(*) as num FROM ".DB::table('forum_thread')." where dateline>$nowtime");
	//回帖数
	$countnum[4]=DB::result_first("SELECT count(*) as num FROM ".DB::table('forum_post')." where dateline>$nowtime and first=0");
	return $countnum;
}
include template('nimba_session:session');
?>