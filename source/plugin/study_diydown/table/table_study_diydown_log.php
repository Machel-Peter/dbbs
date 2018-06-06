<?php

/**
 * Copyright 2001-2099 1314ѧϰ��.
 * This is NOT a freeware, use is subject to license terms
 * $Id: table_study_diydown_log.php 628 2018-03-23 14:34:49Z zhuge $
 * Ӧ���ۺ����⣺http://www.1314study.com/services.php?mod=issue
 * Ӧ����ǰ��ѯ��QQ 15326940
 * Ӧ�ö��ƿ�����QQ 643306797
 * �����Ϊ 1314ѧϰ����www.1314study.com�� ����������ԭ�����, ����ӵ�а�Ȩ��
 * δ�������ù������ۡ�������ʹ�á��޸ģ����蹺������ϵ���ǻ����Ȩ��
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


//Copyright 2001-2099 1314ѧϰ��.
//This is NOT a freeware, use is subject to license terms
//$Id: table_study_diydown_log.php 1086 2018-03-23 06:34:49Z zhuge $
//Ӧ���ۺ����⣺http://www.1314study.com/services.php?mod=issue
//Ӧ����ǰ��ѯ��QQ 15326940
//Ӧ�ö��ƿ�����QQ 643306797
//�����Ϊ 1314ѧϰ����www.1314study.com�� ����������ԭ�����, ����ӵ�а�Ȩ��
//δ�������ù������ۡ�������ʹ�á��޸ģ����蹺������ϵ���ǻ����Ȩ��