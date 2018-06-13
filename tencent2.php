<?php

define('APPTYPEID', 4);
define('CURSCRIPT', 'tencent');

require './source/class/class_core.php';
$discuz = C::app();

$cachelist = array('portalcategory', 'diytemplatenameportal');
$discuz->cachelist = $cachelist;
$discuz->init();

require DISCUZ_ROOT.'./source/function/function_home.php';
require DISCUZ_ROOT.'./source/function/function_portal.php';

if(empty($_GET['mod']) || !in_array($_GET['mod'], array('list', 'view', 'comment', 'portalcp', 'topic', 'attachment', 'rss', 'block'))) $_GET['mod'] = 'list';


define('CURMODULE', $_GET['mod']);
runhooks();

$navtitle = str_replace('{bbname}', $_G['setting']['bbname'], $_G['setting']['seotitle']['tencent']);
$_G['disabledwidthauto'] = 1;

require_once libfile('tencent/'.$_GET['mod'], 'module'); 
