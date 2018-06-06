<?php
/**
 *	[简洁首页N格排行(wj_paihang.{modulename})] (C)2012-2099 Powered by wangjins.com.
 *	Version: 3
 *	Date: 2013-9-3 21:38:49
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_wj_paihang_forum {
	//TODO - Insert your code here
	function index_top(){
		global $_G;
		$time = time();
		/*
		调用DISCUZ_ROOT出错请替换 DISCUZ_ROOT.'./ 为 $bpath.'/'
		*/
		$bpath = dirname(dirname(dirname(dirname(__FILE__))));
		$boxbg = array('skyblue'=>'#698dff', 'applegreen'=>'#59c042', 'red'=>'#ff0000', 'pink'=>'#e289c4', 'green'=>'#28872d', 'offwhite'=>'#b7b7b7', 'grey'=>'#7e7e7e', 'black'=>'#444444', 'orange'=>'#ff6000', 'yellow'=>'#fed200', 'blue'=>'#bcd2fa', 'purple'=>'#6a54a9');
		$skin = empty($_G['cache']['plugin']['wj_paihang']['skin'])?'blue':$_G['cache']['plugin']['wj_paihang']['skin'];
		$wtext = explode('==', $_G['cache']['plugin']['wj_paihang']['wtext']);
		$bgcolor = $_G['cache']['plugin']['wj_paihang']['bgcolor'];
		if($_G['cache']['plugin']['wj_paihang']['rewrite']){
			$rewrite = 1;
		}
		if(!file_exists($bpath.'/data/sysdata/cache_wj_paihang_subject.php'))
		{
			$this->retie();
			$this->huifu();
			$this->bankuai();
			$this->userjifen();
			$this->userregdate();
		}
		require_once($bpath.'/data/sysdata/cache_wj_paihang_subject.php');
		require_once($bpath.'/data/sysdata/cache_wj_paihang_replies.php');
		require_once($bpath.'/data/sysdata/cache_wj_paihang_forum.php');
		require_once($bpath.'/data/sysdata/cache_wj_paihang_userfen.php');
		require_once($bpath.'/data/sysdata/cache_wj_paihang_regdate.php');
		
		if( ($time-$csubject['lasttime']) > $_G['cache']['plugin']['wj_paihang']['cachetime'] ){
				$this->retie();
				$this->huifu();
				$this->bankuai();
				$this->userjifen();
				$this->userregdate();
				require_once($bpath.'/data/sysdata/cache_wj_paihang_subject.php');
				require_once($bpath.'/data/sysdata/cache_wj_paihang_replies.php');
				require_once($bpath.'/data/sysdata/cache_wj_paihang_forum.php');
				require_once($bpath.'/data/sysdata/cache_wj_paihang_userfen.php');
				require_once($bpath.'/data/sysdata/cache_wj_paihang_regdate.php');
		}
		$hotsubject = $csubject['data'];
		$hotreplies = $creplies['data'];
		$hotforum = $cforum['data'];
		$userjifen = $cuserjifen['data'];
		$userregdate = $cuserregdate['data'];
		include template('wj_paihang:wj');
		return $return;
	}
	//获取热帖
	function retie()
	{
		global $_G;
		require_once libfile('function/cache');
		$arr = array();
		$add = null;
		if($_G['cache']['plugin']['wj_paihang']['fs']=='3'){
			$begintime=mktime(0,0,0,date('m'),date('d'),date('Y'));
			$endtime=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
			$add = "dateline > $begintime and dateline < $endtime and";
		}elseif($_G['cache']['plugin']['wj_paihang']['fs']=='2'){
			$begintime=mktime(0,0,0,date('m'),1,date('Y'));
			$endtime=mktime(23,59,59,date('m'),date('t'),date('Y'));
			$add = "dateline > $begintime and dateline < $endtime and";
		}
        // 热帖
		$db_sql = "select tid, subject, views, replies, dateline from ".DB::table('forum_thread')." where $add isgroup=0 and status<>3 and closed=0 order by tid desc limit 10;";
		// 精华
        //$db_sql = "select tid, subject, views, replies, dateline from ".DB::table('forum_thread')." where digest>0 AND isgroup=0 and status<>3 and closed=0 order by views desc limit 10;";
		
		$query = DB::query($db_sql);
		while($result = DB::fetch($query)) {
			//$result['subject'] = cutstr($result['subject'], 26);
			$arr[] = $result;
		}
		$carr = array('lasttime'=>time(),'data'=>$arr);
		$cachearr = "\$csubject=".arrayeval($carr).";\n\n";
		writetocache('wj_paihang_subject', $cachearr);
	}
	//获取热门回复
	function huifu()
	{
		global $_G;
		require_once libfile('function/cache');
		$arr = array();
		$add = null;
		if($_G['cache']['plugin']['wj_paihang']['fs']=='3'){
			$begintime=mktime(0,0,0,date('m'),date('d'),date('Y'));
			$endtime=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
			$add = "dateline > $begintime and dateline < $endtime and";
		}elseif($_G['cache']['plugin']['wj_paihang']['fs']=='2'){
			$begintime=mktime(0,0,0,date('m'),1,date('Y'));
			$endtime=mktime(23,59,59,date('m'),date('t'),date('Y'));
			$add = "dateline > $begintime and dateline < $endtime and";
		}
		$db_sql = "select tid, subject, views, replies,dateline from ".DB::table('forum_thread')." where $add isgroup=0 and status<>3 and closed=0 order by replies desc limit 10;";
		$query = DB::query($db_sql);
		while($result = DB::fetch($query)) {
			//$result['subject'] = cutstr($result['subject'], 26);
			$arr[] = $result;
		}
		$carr = array('lasttime'=>time(),'data'=>$arr);
		$cachearr .= "\$creplies=".arrayeval($carr).";\n\n";
		writetocache('wj_paihang_replies', $cachearr);
	}
	//热门板块
	function bankuai()
	{
		global $_G;
		$bk = dunserialize($_G['cache']['plugin']['wj_paihang']['bk']);
		$bkcount = count($bk);
		$sin = null;
		if( $bkcount )
		{
			for($i = 0; $i < $bkcount; $i++)
			{
				if($i == $bkcount-1){
					$sin .= $bk[$i];
				}else{
					$sin .= $bk[$i].',';
				}
			}
		}
		$i = 1;
		require_once libfile('function/cache');
		$arr = array();
		$forumorder = $_G['cache']['plugin']['wj_paihang']['forumorder'];
		if($forumorder=='1')
			$ostr = 'posts';
		else
			$ostr = 'todayposts';
		if($sin){
			$db_sql = "select `fid`,`name`,`posts`,`todayposts` from ".DB::table('forum_forum')." where fid not in(".$sin.") and `type`='forum' and status=1 order by ".$ostr." desc limit 10;";
		}else{
			$db_sql = "select `fid`,`name`,`posts`,`todayposts` from ".DB::table('forum_forum')." where `type`='forum' and status=1 order by ".$ostr." desc limit 10;";
		}
		$query = DB::query($db_sql);
		while($result = DB::fetch($query)) {
			$result['num'] = $i;
			$result['name'] = cutstr($result['name'], 10, '');
			$result['clicks'] = $result[$ostr];
			$arr[] = $result;
			$i++;
		}
		$carr = array('lasttime'=>time(),'data'=>$arr);
		$cachearr .= "\$cforum=".arrayeval($carr).";\n\n";
		writetocache('wj_paihang_forum', $cachearr);
	}
	//积分排行
	function userjifen()
	{
		global $_G;
		require_once libfile('function/cache');
		$arr = array();
		$db_sql = "select uid,username,credits from ".DB::table('common_member')." where adminid<>1 and status=0 order by credits desc limit 5";
		$query = DB::query($db_sql);
		while($result = DB::fetch($query)) {
			$arr[] = $result;
		}
		$carr = array('lasttime'=>time(),'data'=>$arr);
		$cachearr .= "\$cuserjifen=".arrayeval($carr).";\n\n";
		writetocache('wj_paihang_userfen', $cachearr);
	}
	//积分排行
	function userregdate()
	{
		global $_G;
		require_once libfile('function/cache');
		$arr = array();
		$db_sql = "select uid,username,regdate from ".DB::table('common_member')." where adminid<>1 and status=0 order by regdate desc limit 5";
		$query = DB::query($db_sql);
		while($result = DB::fetch($query)) {
			$result['regdate'] = date('Y-m-d', $result['regdate']);
			$arr[] = $result;
		}
		$carr = array('lasttime'=>time(),'data'=>$arr);
		$cachearr .= "\$cuserregdate=".arrayeval($carr).";\n\n";
		writetocache('wj_paihang_regdate', $cachearr);
	}
}

?>