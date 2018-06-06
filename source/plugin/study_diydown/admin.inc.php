<?php

/**
 * Copyright 2001-2099 1314学习网.
 * This is NOT a freeware, use is subject to license terms
 * $Id: admin.inc.php 3353 2018-03-23 14:34:49Z zhuge $
 * 应用售后问题：http://www.1314study.com/services.php?mod=issue
 * 应用售前咨询：QQ 15326940
 * 应用定制开发：QQ 643306797
 * 本插件为 1314学习网（www.1314study.com） 独立开发的原创插件, 依法拥有版权。
 * 未经允许不得公开出售、发布、使用、修改，如需购买请联系我们获得授权。
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
exit('Access Denied');
}
loadcache('plugin');
$splugin_setting = $_G['cache']['plugin']['study_diydown'];/*1.3.1.4.学.习.网*/
$splugin_lang = lang('plugin/study_diydown');#本插件为 1314学习网（www.1314study.com） 独立开发的原创插件, 依法拥有版权
showformheader('plugins&operation=config&do='.$pluginid.'&identifier=study_diydown&pmod=admin');
//showtips('123');
$uid = intval($_GET['uid']);
$aid = intval($_GET['aid']);//1.3.1.4.学.习.网
$ip = daddslashes($_GET['ip']);/*From www.1314study.com*/
if($uid){
$where = " AND uid = '$uid'";
$member = C::t('common_member')->fetch_all_username_by_uid((array)$uid);
$title = '&#x6B63;&#x5728;&#x67E5;&#x770B;&#x7528;&#x6237; '.dhtmlspecialchars($member[$uid]).' &#x7684;&#x4E0B;&#x8F7D;&#x8BB0;&#x5F55;';/*From www.1314study.com*/
}elseif($aid){
$where = " AND aid = '$aid'";/*版权：www.1314study.com*/
$tableid = 'aid:'.$aid;
$attach[$aid] = C::t('forum_attachment_n')->fetch($tableid, $aid);
$title = '&#x6B63;&#x5728;&#x67E5;&#x770B;&#x9644;&#x4EF6; '.dhtmlspecialchars($attach[$aid]['filename']).' &#x7684;&#x4E0B;&#x8F7D;&#x8BB0;&#x5F55;';
}elseif($ip){
$where = " AND ip = '$ip'";//499
$title = '&#x6B63;&#x5728;&#x67E5;&#x770B;IP&#x4E3A; '.$ip.' &#x7684;&#x4E0B;&#x8F7D;&#x8BB0;&#x5F55;';
}else{
$title = '&#x6240;&#x6709;&#x9644;&#x4EF6;&#x4E0B;&#x8F7D;&#x8BB0;&#x5F55;';
}
showtableheader($title);//1314学习网
showsubtitle(array('&#x9644;&#x4EF6;&#x540D;&#x79F0;', '&#x4E0B;&#x8F7D;&#x8005;', 'IP &#x5730;&#x5740;', '&#x4E0B;&#x8F7D;&#x65F6;&#x95F4;'));
$num = DB::result_first("SELECT COUNT(*) FROM ".DB::table('study_diydown_log')."  WHERE 1 $where ORDER BY id DESC");/*15467*/
$page = intval($_G['page']);
$limit = 20;
$max = 1000;
$page = ($page-1 > $num/$limit || $page > $max) ? 1 : $page;
$start_limit = ($page - 1) * $limit;/*版权：www.1314study.com*/
$multipage = multi($num, $limit, $page, ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=study_diydown&pmod=admin&aid='.$aid.'&uid='.$uid.'&ip='.$ip, $max);
$query = DB::query("SELECT * FROM ".DB::table('study_diydown_log')."  WHERE 1 $where ORDER BY id DESC limit $start_limit,$limit");
while($log = DB::fetch($query)) {
$uid = intval($log['uid']);
if(empty($member[$uid])){
$member = C::t('common_member')->fetch_all_username_by_uid((array)$uid);
}
$aid = intval($log['aid']);//1.3.1.4.学.习.网
if(empty($attach[$aid])){
$tableid = 'aid:'.$aid;
$attach[$aid] = C::t('forum_attachment_n')->fetch($tableid, $aid);
}/*15671*/
showtablerow('', array(), array(
			'<a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=study_diydown&pmod=admin&aid='.$aid.'">'.dhtmlspecialchars($attach[$aid]['filename']).'</a>',
$member[$uid] ? '<a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=study_diydown&pmod=admin&uid='.$uid.'">'.dhtmlspecialchars($member[$uid]).'</a>' : '&#x6E38;&#x5BA2;',
			'<a href="'.ADMINSCRIPT.'?action=plugins&operation=config&do='.$pluginid.'&identifier=study_diydown&pmod=admin&ip='.$log['ip'].'">'.dhtmlspecialchars($log['ip']).'</a>',
gmdate('Y-m-d H:i:s', $log['dateline'] + $_G['setting']['timeoffset'] * 3600 ),
		));
}
showsubmit('', '', '', '', $multipage);
showtablefooter();#7215
showformfooter();#19531


//Copyright 2001-2099 1314学习网.
//This is NOT a freeware, use is subject to license terms
//$Id: admin.inc.php 3798 2018-03-23 06:34:49Z zhuge $
//应用售后问题：http://www.1314study.com/services.php?mod=issue
//应用售前咨询：QQ 15326940
//应用定制开发：QQ 643306797
//本插件为 1314学习网（www.1314study.com） 独立开发的原创插件, 依法拥有版权。
//未经允许不得公开出售、发布、使用、修改，如需购买请联系我们获得授权。