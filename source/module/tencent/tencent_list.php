<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: tencent_list.php  $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if (empty($_GET['action'])) {
	$_GET['action'] = 'list';
}

function get_wheresql($cat){
	$wheresql = '';
	if(is_array($cat)) {
		$catid = $cat['catid'];
		
		if(!empty($cat['subs'])) {
			include_once libfile('function/portalcp');
			$subcatids = category_get_childids('portal', $catid);
			$subcatids[] = $catid;

			$wheresql = "at.catid IN (".dimplode($subcatids).")";
		} else {
			$wheresql = "at.catid='$catid'";
		}
	}
	$wheresql .= " AND at.status='0'";
	return $wheresql;
}

function get_list($cat, $wheresql, $page = 1, $perpage = 0){
	global $_G;
	$cat['perpage'] = empty($cat['perpage']) ? 15 : $cat['perpage'];
	$cat['maxpages'] = empty($cat['maxpages']) ? 1000 : $cat['maxpages'];
	$perpage = intval($perpage);
	$page = intval($page);
	$perpage = empty($perpage) ? $cat['perpage'] : $perpage;
	$page = empty($page) ? 1 : min($page, $cat['maxpages']);
	$start = ($page-1)*$perpage;
	if($start<0) $start = 0;
	$list = array();
	$count = C::t('portal_tx_ssc')->fetch_all_by_sql($wheresql, '', 0, 0, 1, 'at');
}
if ($_GET['action'] == 'list') {
	include template('tencent/tencent_list');
}
