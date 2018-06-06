<?php
/**
 *	小.草.根
 *	Version: 1.0.2
 *	Date: 2015-12-28 19:55:32
 */


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_x520_loading {

	function global_cpnav_top() {
		global $_G;
		$return = '';
		$qinqin = $_G['cache']['plugin']['x520_loading'];	
		if($qinqin[x520_onoff]) {
			include template('x520_loading:loading');
		}
		return $return;
	}

}

class plugin_x520_loading_forum extends plugin_x520_loading {

}

?>