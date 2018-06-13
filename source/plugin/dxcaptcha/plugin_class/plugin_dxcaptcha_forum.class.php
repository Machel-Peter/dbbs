<?php
if(! defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/**
* 帖子模块
*/
class plugin_dxcaptcha_forum extends plugin_dxcaptcha
{
	//修正验证条的位置
    function _fix_fastpost_btn_extra_pos($dx_captcha_id) {
        $output = <<<JS
    <script type="text/javascript">
        function move_dxcaptha_before_submit() {
            var gt_submitBtn = document.getElementById('fastpostsubmit');
            var prependData = gt_submitBtn.parentNode.childNodes[0];
            var dxcaptha = document.getElementById('$dx_captcha_id');
            gt_submitBtn.parentNode.insertBefore(dxcaptha, prependData);
        }

        _attachEvent(window, 'load', move_dxcaptha_before_submit);


        function get_button(){
            var b = [];
            var buttons = document.getElementsByTagName("button")
            for(var i=0; i<buttons.length; i++){
                var button = buttons[i];
                if(button.type == "submit"){
                    b.push(button)
                }
            }   
            return b;           
        }
        

        window.gt_custom_ajax = function (status, $) {
            function refresh(){
                setTimeout(function(){
                    $(".gt_refresh_button").click();
                },3000);
            }
            if(status) {
              var buttons = get_button();
              for(var i in buttons){
                _attachEvent(buttons[i], 'click', refresh);
              }
              
            }
         }
     </script>
JS;
        return $output;
    }
    
    //修复快速回复，包含到form表单中
    function _fix_fast_reply_pos($dx_captcha_id) {
        $output = <<<JS
    <script type="text/javascript">
        function move_fast_dxcaptha_before_submit() {
            var vfastposttb = document.getElementById('vfastposttb');
            var dxcaptha = document.getElementById('$dx_captcha_id');
            vfastposttb.parentNode.insertBefore(dxcaptha, vfastposttb);

            dxcaptha.style.backgroundColor="white";
            dxcaptha.style.marginTop="-20px";
            dxcaptha.style.marginLeft="-3px";
            dxcaptha.style.marginRight="-3px";
            dxcaptha.style.marginBottom="3px";
                
            $('vfastpost').style.marginTop = "60px";    
        }
        _attachEvent(window, 'load', move_fast_dxcaptha_before_submit);

    </script>
JS;
        return $output;
    }
    
    
    //修复直播贴
    function _fix_zhibo_reply($dx_captcha_id) {
        $output = <<<JS
    <script type="text/javascript">
        function move_fast_dxcaptha_before_submit() {
            if($('livereplysubmit')){
                var livereplysubmit = document.getElementById('livereplysubmit');
                var dxcaptha = document.getElementById('$dx_captcha_id');

                var parentNode = livereplysubmit.parentNode;
                parentNode.insertBefore(dxcaptha, livereplysubmit);
            }else{
                $('dx_forumdisplay_postbutton_top').style.display = "none";
            }
        }
        _attachEvent(window, 'load', move_fast_dxcaptha_before_submit);

    </script>
JS;
        return $output;
    }

	//直播贴回复
    function forumdisplay_postbutton_top() {
        if ($this->_cur_mod_is_valid()) {
            $cur_mod = 'popup_livereplay';
            $page_type = "livereplysubmit";
            $dx_captcha_id = 'dx_forumdisplay_postbutton_top';
            return $this->_code_output($cur_mod, $dx_captcha_id, $page_type) . $this->_fix_zhibo_reply($dx_captcha_id);
        }
    }
    
    //页面底部发帖
    function forumdisplay_fastpost_btn_extra() {
        if ($this->_cur_mod_is_valid()) {
            $cur_mod = 'newthread';
            $page_type = 'newthread';
            $dx_captcha_id = 'dx_forumdisplay_fastpost_btn_extra';
            return $this->_code_output($cur_mod, $dx_captcha_id, $page_type, 'dx_verify_token_forum_forumdisplay') . $this->_fix_fastpost_btn_extra_pos($dx_captcha_id);
        }
    }
    
    //弹窗发帖回复
    function post_infloat_middle() {
        if ($this->_cur_mod_is_valid()) {
            $cur_mod = 'newthread';
            $page_type = 'newthread_reply_float';
            $dx_captcha_id = 'dx_post_infloat_middle';
            return $this->_code_output($cur_mod, $dx_captcha_id, $page_type, 'dx_verify_token_forum_reply_float');
        }
    }
    
    //页面底部回复
    function viewthread_fastpost_content() {
        if ($this->_cur_mod_is_valid()) {
            $cur_mod = 'reply';
            $page_type = 'reply';
            $dx_captcha_id = 'dx_viewthread_fastpost_content';
            return $this->_code_output($cur_mod, $dx_captcha_id, $page_type) . $this->_fix_fastpost_btn_extra_pos($dx_captcha_id);
        }
    }
    // 高级发帖回复
	function post_middle() {
		if($this->_cur_mod_is_valid()) {
			$cur_mod = 'newthread';
			$page_type = 'newthread_reply_grade';
			$dx_captcha_id = 'dx_post_middle';
			return $this->_code_output($cur_mod, $dx_captcha_id, $page_type, 'dx_verify_token_forum_reply_grade') . $this->_fix_post_middle();
		}
	}
	function _fix_post_middle() {
		$notice_message = lang('plugin/dxcaptcha', 'dxcaptcha_error2');
		$output = <<<JS
    <script type="text/javascript" defer="true">
        function js_fix_post_middle_before_submit() {
            var postsubmit = document.getElementById('postsubmit');
            var oculus_passed = false;
            postsubmit.onclick = function(){
            	var token = document.getElementsByName("dx_verify_token")[0].value;
                if(token == "" || token == null){
                    showError("$notice_message");
                    return false;
                }
            }
        }
        _attachEvent(window, 'load', js_fix_post_middle_before_submit);
        // paxmac_ready(function(){js_fix_post_middle();});

    </script>
JS;
		return $output;
	}

	//快速回复
    function viewthread_modaction() {
        
        //2.5版本不存在快速回复
        include_once (DISCUZ_ROOT . '/source/discuz_version.php');
        
        //其他版本
        global $_G;
        
        $allowfastreply = $_G['setting']['allowfastreply'] && $_G['group']['allowpost'];
        
        //快速回复是否开启,并且有发帖权限
        
        if (DISCUZ_VERSION != "X2.5" && $allowfastreply == 1 && $this->_cur_mod_is_valid()) {
            $cur_mod = 'reply';
            $dx_captcha_id = 'gt_viewthread_modaction';
            return $this->_code_output($cur_mod, $dx_captcha_id) . $this->_fix_fast_reply_pos($dx_captcha_id);
        }
    }
    
    //处理发帖/恢复/编辑验证
    function post_recode() {
        if (!$this->has_authority()) {
            return;
        }
        
        global $_G;
        $success = 0;
        
        if ($this->_cur_mod_is_valid() && $this->captcha_allow) {
            if (submitcheck('topicsubmit', 0, $seccodecheck, $secqaacheck) || submitcheck('replysubmit', 0, $seccodecheck, $secqaacheck) || submitcheck('editsubmit', 0, $seccodecheck, $secqaacheck)) {
            	if($_POST['dx_verify_token'] == null || $_POST['dx_verify_token'] == ''){
                    return showmessage(lang('plugin/dxcaptcha', 'dxcaptcha_error2'),'', array (), array (
                                'extrajs' => '<script type="text/javascript" reload="1">window.' . $_POST['captcha_id'] . '.reload(); </script>'));
                }

                //token校验
                if($this->dxcaptcha_validate($_POST['dx_verify_token'])==false){
                    return showmessage(lang('plugin/dxcaptcha', 'dxcaptcha_error3'),'', array (), array (
                                'extrajs' => '<script type="text/javascript" reload="1">window.' . $_POST['captcha_id'] . '.reload(); </script>'));
                }
            	$success = 1;
            }
        }
        
        if ($success == 1) {
            $post_count = $_G['cookie']['pc_size_c'];
            $post_count = intval($post_count);
            $post_count = ($post_count + 1);
            $arr = array('a', 'b', 'c', 'd', 'e', 'f');
            shuffle($arr);
            $post_count = $post_count . implode("", $arr);
            dsetcookie('pc_size_c', $post_count);
        }
    }  
    //判断是否有权限发帖留言，或者其他
    function has_authority() {
        
        //2.5版本不存在快速回复
        include_once (DISCUZ_ROOT . '/source/discuz_version.php');
        if (DISCUZ_VERSION == "X2.5" && $_GET['handlekey'] == "vfastpost") {
            return false;
        }
        
        //针对掌上论坛不需要验证
        if ($_GET['mobile'] == 'no' && $_GET['module'] == 'sendreply') {
            return false;
        }
        if ($_GET['mobile'] == 'no' && $_GET['module'] == 'newthread') {
            return false;
        }
        
        //针对广播，回复不好验证。有三处回复
        if ($_GET['action'] == 'reply' && $_GET['inajax'] == '1' && $_GET['handlekey'] != 'reply' && $_GET['infloat'] != 'yes') {
            
            return false;
        }
        
        global $_G;
        
        $action = $_GET['action'];
        
        //快速回复是否开启,并且有发帖权限,日志
        if ($action == 'newthread' && $_G['group']['allowpost'] != 1) {
            
            //发帖
            return false;
        } 
        else if ($action == 'reply' && $_G['group']['allowreply'] != 1) {
            
            //回复
            return false;
        }
        
        return true;
    }
}