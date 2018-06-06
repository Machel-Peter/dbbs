<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if (empty($_GET['action'])) {
	$_GET['action'] = 'index';
}

if ($_GET['action'] == 'index') {
	$page = intval($_GET['page']);
	if ($page < 1) $page = 1;
	$tool_list = C::t('tool_info')->get_tool_list($page);
	$tool_count = C::t('tool_info')->count_tool_info();
	$page_html = multi($tool_count,3,$page,'tool.php?mod=index&action=index');
	include template('tool/tool_index');
}elseif ($_GET['action'] == 'upload') {
	if ($_G['uid'] == 0) {
		showmessage('请先登录','member.php?mod=logging&action=login',array(),array('alert'=>'error','msgtype'=>2));
	}
	include template('tool/tool_upload');
}elseif($_GET['action'] == 'save_upload_tool') {
	$add_tool = array();
	$add_tool['tool_user'] = $_G['username'];
	$add_tool['tool_uid'] = $_G['uid'];
	$add_tool['tool_tag'] = $_POST['tool_tag'];
	$add_tool['tool_cat'] = $_POST['tool_cat'];
	$add_tool['tool_cost'] = $_POST['tool_cost'];
	$add_tool['tool_desc'] = $_POST['tool_desc'];
	$add_tool['tool_type'] = 1;
	$add_tool['tool_state'] = 20;
	$add_tool['tool_time'] = time();
	$add_tool['tool_name'] = $_POST['tool_name'];
	$up = new FileUpload();
	$up->set('path',DISCUZ_ROOT.'./data/attachment/tool/tool_pic/');
	$up->set('maxsize',10485760);
	$up->set('allowtype', array('gif', 'png', 'jpg','jpeg'));
	$up->set('israndname', true);
	$up->upload('tool_pic');
	$add_tool['tool_pic'] = $up->getFileName();
	$up->set('path',DISCUZ_ROOT.'./data/attachment/tool/tool_file/');
	$up->set('maxsize',10485760);
	$up->set('allowtype', array('zip', 'rar'));
	$up->set('israndname', true);
	$up->upload('tool_filename');
	$add_tool['tool_filename'] = $up->getFileName();
	$result = C::t('tool_info')->add_tool($add_tool);
	if ($result) {
		showmessage('上传成功，请等待审核','tool.php?mod=index&action=index',array(),array('alert'=>'right','msgtype'=>2));
	}else{
		showmessage('上传失败','tool.php?mod=index&action=index',array(),array('alert'=>'error','msgtype'=>2));
	}
}