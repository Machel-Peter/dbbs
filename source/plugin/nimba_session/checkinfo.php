<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/*
 * �����޸ı�ҳ�κ����ݣ��������Ը���
 * ���� ���������� Dz���� ��Ʒ��Made By Nimba, Team From idzbox.com)
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