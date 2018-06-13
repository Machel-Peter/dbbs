<?php
if(! defined('IN_DISCUZ') || ! defined('IN_ADMINCP')) {
	exit('Access Denied');
}
$version_desc = lang('plugin/dxcaptcha', 'version_desc');
$upgrade_item1 = lang('plugin/dxcaptcha', 'upgrade_item1');
$upgrade_item2 = lang('plugin/dxcaptcha', 'upgrade_item2');
$upgrade_item3 = lang('plugin/dxcaptcha', 'upgrade_item3');
$upgrade_item4 = lang('plugin/dxcaptcha', 'upgrade_item4');
$upgrade_item5 = lang('plugin/dxcaptcha', 'upgrade_item5');
$upgrade_item6 = lang('plugin/dxcaptcha', 'upgrade_item6');

$html = <<<HTML
	<style type="text/css">
				h2{
					padding-left:20px; 
				}
	</style>
	<h1>1.3.2&nbsp;&nbsp;$version_desc</h1>
	<h2>$upgrade_item1</h2>
	<h2>$upgrade_item2</h2></br></br>
	<h2>$upgrade_item3</h2>
	<h2>$upgrade_item4</h2>
	<h2>$upgrade_item5</h2>
	<h2>$upgrade_item6</h2>
	
HTML;
echo $html;
?>