<?php
/**
 *	Ð¡.²Ý.¸ù
 *	Version: 1.7.2
 *	Date: 2015-12-28 19:55:32
 */


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_x520_top {

	function global_footer() {
		global $_G;
		$return = '';
		$qinqin = $_G['cache']['plugin']['x520_top'];	
		if($qinqin[x520_onoff]) {
			include template('x520_top:top');
		}
		return $return;
	}

}

class plugin_x520_top_forum extends plugin_x520_top {

}

?>
