<?php

/**
 * Copyright 2001-2099 1314ѧϰ��.
 * This is NOT a freeware, use is subject to license terms
 * $Id: name.class.php 560 2018-03-23 14:34:49Z zhuge $
 * Ӧ���ۺ����⣺http://www.1314study.com/services.php?mod=issue
 * Ӧ����ǰ��ѯ��QQ 15326940
 * Ӧ�ö��ƿ�����QQ 643306797
 * �����Ϊ 1314ѧϰ����www.1314study.com�� ����������ԭ�����, ����ӵ�а�Ȩ��
 * δ�������ù������ۡ�������ʹ�á��޸ģ����蹺������ϵ���ǻ����Ȩ��
 */

if(!defined('IN_DISCUZ')) {
exit('Access Denied');
}
class plugin_study_diydown {
	function common(){
		if(CURSCRIPT == 'forum' && CURMODULE == 'attachment'){
			global $_G;
			$splugin_setting = $_G['cache']['plugin']['study_diydown'];
			$study_gids = (array)unserialize($splugin_setting['study_gids']);
			if(in_array($_G['groupid'],$study_gids)){
				$study_fids = (array)unserialize($splugin_setting['study_fids']);
				@include_once DISCUZ_ROOT.'/source/plugin/study_diydown/forum_attachment.php';
				exit();
			}
		}
	}
}



//Copyright 2001-2099 1314ѧϰ��.
//This is NOT a freeware, use is subject to license terms
//$Id: name.class.php 1005 2018-03-23 06:34:49Z zhuge $
//Ӧ���ۺ����⣺http://www.1314study.com/services.php?mod=issue
//Ӧ����ǰ��ѯ��QQ 15326940
//Ӧ�ö��ƿ�����QQ 643306797
//�����Ϊ 1314ѧϰ����www.1314study.com�� ����������ԭ�����, ����ӵ�а�Ȩ��
//δ�������ù������ۡ�������ʹ�á��޸ģ����蹺������ϵ���ǻ����Ȩ��