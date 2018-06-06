<?php
/**
 *	[¼ò½àN¸ñ(wj_paihang.{modulename})] (C)2012-2099 Powered by wangjins.com.
 *	Version: 3
 *	Date: 2013-9-3 19:28:08
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$bpath = dirname(dirname(dirname(dirname(__FILE__))));
@unlink($bpath.'/data/sysdata/cache_wj_paihang_subject.php');
@unlink($bpath.'/data/sysdata/cache_wj_paihang_replies.php');
@unlink($bpath.'/data/sysdata/cache_wj_paihang_forum.php');
@unlink($bpath.'/data/sysdata/cache_wj_paihang_userfen.php');
@unlink($bpath.'/data/sysdata/cache_wj_paihang_regdate.php');
$finish = TRUE;
?>