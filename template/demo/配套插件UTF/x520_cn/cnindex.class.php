<?php
/**
 *	小.草.根
 *	Version: 1.0.5   By  www_caogen8_co
 *	Date: 2016-3-20 09:32:06
 */


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_x520_cn {
	
	function forumdisplay_x520_top() {
		global $_G,$_GET;
		$var = $_G['cache']['plugin']['x520_cn'];
		return $var['chinaz_forumdisplaypic'];
		
	}

	function forumdisplay_x520_ptext() {
		global $_G,$_GET;
		$var = $_G['cache']['plugin']['x520_cn'];
		return $var['chinaz_ptext'];
		
	}

	function post_right() {
		global $_G,$_GET;
		$var = $_G['cache']['plugin']['x520_cn'];
		return $var['chinaz_forumdisplayaction'];
		
	}

}

class plugin_x520_cn_forum extends plugin_x520_cn {
	
}

?>