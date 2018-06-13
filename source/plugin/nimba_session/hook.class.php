<?php
/*
 * Dz盒子www.idzbox.com
 * Dz盒子：Discuz!应用中心十大优秀开发者！
 * QQ群：idzbox.com
 * From www.idzbox.com
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class plugin_nimba_session {
	public $group=array();
	public $nav=0;
	public $name='';
	
	function  __construct() {
	    loadcache('plugin');
		global $_G;
		$this->vars = $_G['cache']['plugin']['nimba_session'];
		$this->group=unserialize($this->vars['group']);
		$this->nav=$this->vars['nav'];
		$this->name=$this->vars['name'];
	}	
	
	function global_cpnav_extra1() {
		loadcache('plugin');
		global $_G;
		if(in_array($_G['groupid'],$this->group)&&$this->nav==2) return '<a href="plugin.php?id=nimba_session:session" target="_blank">'.$this->name.'</a>';
	}

	function global_nav_extra(){
		loadcache('plugin');
		global $_G;
		if(in_array($_G['groupid'],$this->group)&&$this->nav==3) return '<ul><li><a href="plugin.php?id=nimba_session:session" target="_blank">'.$this->name.'</a></ul></li>';	
	}
	
	function global_footerlink(){
		loadcache('plugin');
		global $_G;
		if(in_array($_G['groupid'],$this->group)&&$this->nav==4) return '<span class="pipe">|</span><a href="plugin.php?id=nimba_session:session" target="_blank">'.$this->name.'</a>';	
	}
	
	function global_usernav_extra2(){
		loadcache('plugin');
		global $_G;
		if(in_array($_G['groupid'],$this->group)&&$this->nav==5) return '<span class="pipe">|</span><a href="plugin.php?id=nimba_session:session" target="_blank">'.$this->name.'</a>';		
	}
}
class plugin_nimba_session_forum extends plugin_nimba_session{
}
?>