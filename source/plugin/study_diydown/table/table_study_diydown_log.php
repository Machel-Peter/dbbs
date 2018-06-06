<?php

/**
 * Copyright 2001-2099 1314学习网.
 * This is NOT a freeware, use is subject to license terms
 * $Id: table_study_diydown_log.php 628 2018-03-23 14:34:49Z zhuge $
 * 应用售后问题：http://www.1314study.com/services.php?mod=issue
 * 应用售前咨询：QQ 15326940
 * 应用定制开发：QQ 643306797
 * 本插件为 1314学习网（www.1314study.com） 独立开发的原创插件, 依法拥有版权。
 * 未经允许不得公开出售、发布、使用、修改，如需购买请联系我们获得授权。
 */
if(!defined('IN_DISCUZ')) {
exit('Access Denied');
}
class table_study_diydown_log extends discuz_table {

	public function __construct() {
		$this->_table = 'study_diydown_log';
		$this->_pk = 'id';

		parent::__construct();
	}

	public function fetch_first_by_aid_uid($aid, $uid) {
		return DB::fetch_first('SELECT * FROM %t where aid=%d and uid=%d ORDER BY dateline DESC', array($this->_table, $aid, $uid));
	}
	
	public function fetch_first_by_aid_ip($aid, $ip) {
		return DB::fetch_first('SELECT * FROM %t where aid=%d and ip=%s ORDER BY dateline DESC', array($this->_table, $aid, $ip));
	}	
}


//Copyright 2001-2099 1314学习网.
//This is NOT a freeware, use is subject to license terms
//$Id: table_study_diydown_log.php 1086 2018-03-23 06:34:49Z zhuge $
//应用售后问题：http://www.1314study.com/services.php?mod=issue
//应用售前咨询：QQ 15326940
//应用定制开发：QQ 643306797
//本插件为 1314学习网（www.1314study.com） 独立开发的原创插件, 依法拥有版权。
//未经允许不得公开出售、发布、使用、修改，如需购买请联系我们获得授权。