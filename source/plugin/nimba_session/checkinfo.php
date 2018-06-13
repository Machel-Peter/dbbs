<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/*
 * 请勿修改本页任何内容，否则后果自负！
 * 作者 土著人宁巴 Dz盒子 出品（Made By Nimba, Team From idzbox.com)
 */
$info=array();
$info['name']='nimba_session';
$info['version']='v2.1.2';
require_once DISCUZ_ROOT.'./source/discuz_version.php';
$info['siteversion']=DISCUZ_VERSION;
$info['siterelease']=DISCUZ_RELEASE;
$info['timestamp']=TIMESTAMP;
$info['nowurl']=$_G['siteurl'];
$info['siteurl']='http://www.idzbox.com/';
$info['clienturl']='http://www.idzbox.com/';
$info['siteid']='7D5E744A-EA41-DC7B-4279-8B4F16E81852';
$info['sn']='2012071619gg3MpQadJ6';
$info['adminemail']=$_G['setting']['adminemail'];
$infobase=base64_encode(serialize($info));
?>