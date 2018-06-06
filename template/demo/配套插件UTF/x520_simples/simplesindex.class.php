<?php
/**
 *	小.草.根
 *	Version: 1.0.1
 *	Date: 2016-2-3 08:09:21
 */


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_x520_simples {

	function plugin_x520_simples() {
		global $_G;

		$qinqin = $_G['cache']['plugin']['x520_simples'];
		$this->fid = unserialize($qinqin['syb_fid']);
		$this->num = $qinqin['syb_num'];
		$this->message = $qinqin['syb_message'];
		$this->lianjie = $qinqin['syb_lianjie'];
	}

}

class plugin_x520_simples_forum extends plugin_x520_simples {

	function forumdisplay_thread_uulist_output() {
		global $_G, $threadids;

		if(!in_array($_G['fid'], $this->fid)) return;

		include_once libfile('function/post');
		$query = C::t('forum_post')->fetch_all_by_tid('tid:'.$threadtids, $threadids, true, '', 0, 0, 1);
		foreach($query as $qinv) {
			$message[$qinv['tid']] = messagecutstr($qinv['message'], $this->message);
		}

		foreach($_G['forum_threadlist'] as $qinv){
			$html = '<p class="gb-post-desc">'.$message[$qinv['tid']].'</p>';
			if($qinv['attachment']) {
				$aid = array();
				$html .= '<ul class="gb-gallery-list" style="padding-top: 0px;">';
				foreach(C::t('forum_attachment_n')->fetch_all_by_id('tid:'.$qinv['tid'], 'tid', $qinv['tid'], 'filesize DESC') as $attach) {
					if($i=1 > $this->num || !$attach['isimage']) continue;
					$attachurl = $attach['remote'] ? $_G['setting']['ftp']['attachurl'] : $_G['setting']['attachurl'];
					$zoomfile = $attachurl.'forum/'.$attach['attachment'];
					$thumb = getforumimg($attach['aid'], 0, 200, 200);
					if($a=1 > $this->lianjie) {
					   $html .= '<li style="padding-top: 10px;"><a class="gb-thumb-img" style="background-image:url('.$zoomfile.')"></a></li>';
					}else {
					   $html .= '<li style="padding-top: 10px;"><a href="forum.php?mod=viewthread&tid='.$qinv[tid].'" class="gb-thumb-img" style="background-image:url('.$zoomfile.')" title="'.$qinv[subject].'"></a></li>';
					}
					$aid[] = $attach['aid'];
					$i ++;
				}
				$html .= '</ul>';
			}
			$return[] = $html;
		}

		return $return;
	}
	
}

?>