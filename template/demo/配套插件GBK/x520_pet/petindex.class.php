<?php
/**
 *	Ð¡.²Ý.¸ù
 *	Version: 1.0.2
 *	Date: 2015-12-28 19:55:32
 */


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_x520_pet {

	function global_footer() {
		global $_G;
		$return = '';
		$qinqin = $_G['cache']['plugin']['x520_pet'];	
		if($qinqin[x520_onoff]) {
			include template('x520_pet:pet');
		}
		return $return;
	}

}

class plugin_x520_pet_forum extends plugin_x520_pet {

}

?>
