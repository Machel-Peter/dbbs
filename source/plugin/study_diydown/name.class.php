<?php

/**
 * Copyright 2001-2099 1314学习网.
 * This is NOT a freeware, use is subject to license terms
 * $Id: name.class.php 560 2018-03-23 14:34:49Z zhuge $
 * 应用售后问题：http://www.1314study.com/services.php?mod=issue
 * 应用售前咨询：QQ 15326940
 * 应用定制开发：QQ 643306797
 * 本插件为 1314学习网（www.1314study.com） 独立开发的原创插件, 依法拥有版权。
 * 未经允许不得公开出售、发布、使用、修改，如需购买请联系我们获得授权。
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



//Copyright 2001-2099 1314学习网.
//This is NOT a freeware, use is subject to license terms
//$Id: name.class.php 1005 2018-03-23 06:34:49Z zhuge $
//应用售后问题：http://www.1314study.com/services.php?mod=issue
//应用售前咨询：QQ 15326940
//应用定制开发：QQ 643306797
//本插件为 1314学习网（www.1314study.com） 独立开发的原创插件, 依法拥有版权。
//未经允许不得公开出售、发布、使用、修改，如需购买请联系我们获得授权。