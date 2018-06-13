<?php
if(! defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/**
* 
*/
class plugin_dxcaptcha_home extends plugin_dxcaptcha
{
	//包含到form表单中
	function _fix_fast_form_pos($dx_captcha_name, $dx_captcha_id, $fastpostform){
         $output = <<<JS
    <script type="text/javascript">
        function move_fast_dxcaptcha_before_submit() {
            var fastpostform = document.getElementById('$fastpostform');
            var dxcaptcha = document.createElement("input");
            var captcha_node = document.createElement("input");

            if (fastpostform != null) {
                fastpostform.insertBefore(dxcaptcha, fastpostform.firstChild);
                fastpostform.insertBefore(captcha_node, fastpostform.firstChild);
            }
            		
            dxcaptcha.type='hidden';
			dxcaptcha.name='$dx_captcha_name';
            dxcaptcha.id='$dx_captcha_id';
         	
            captcha_node.type='hidden';
            captcha_node.name='captcha_id';
            captcha_node.value='myCaptcha_c';
        }
        _attachEvent(window, 'load', move_fast_dxcaptcha_before_submit);

    </script>
JS;
		return $output;
	}
	//广播
	function follow_top() {
		if ($this->_cur_mod_is_valid()) {
			$cur_mod = 'follow';
			$dx_captcha_id = 'dx_follow_top';
			$page_type = 'follow';
			return $this->_code_output($cur_mod, $dx_captcha_id, $page_type, '') . $this->_fix_fast_form_pos('dx_verify_token', 
                'dx_verify_token_follow', 'fastpostform');
		}
	}
	//日志
	function spacecp_blog_middle() {
		if ($this->_cur_mod_is_valid()) {
			$cur_mod = 'blog';
			$dx_captcha_id = 'dx_spacecp_blog_middle';
			$page_type = 'blog';
			return $this->_code_output($cur_mod, $dx_captcha_id, $page_type) . $this->_fix_blog_middle();
		}
	}
	function _fix_blog_middle() {
		$notice_message = lang('plugin/dxcaptcha', 'dxcaptcha_error2');
		$output = <<<JS
    <script type="text/javascript" defer="true">
        function js_fix_blog_middle_before_submit() {
            var postsubmit = document.getElementById('issuance');
            
            postsubmit.onclick = function(){
            	var token = document.getElementsByName("dx_verify_token")[0].value;
                if(token == "" || token == null){
                    showError("$notice_message");
                    return false;
                }
            }
        }
        _attachEvent(window, 'load', js_fix_blog_middle_before_submit);

    </script>
JS;
		return $output;
	}
	//日志评论
	function space_blog_face_extra() {
		if ($this->_cur_mod_is_valid()) {
			$cur_mod = 'popup';
			$dx_captcha_id = 'dx_space_blog_face_extra';
			$btn_id = "commentsubmit_btn";
			return $this->_code_output($cur_mod, $dx_captcha_id, "",$btn_id) . $this->_fix_wall_face_middle();
		}
	}
	//留言板
	function space_wall_face_extra(){
		if ($this->_cur_mod_is_valid()) {
			$cur_mod = "popup";
			$dx_captcha_id = "gt_space_wall_face_extra";
			$btn_id = "commentsubmit_btn";
			return $this->_code_output($cur_mod, $dx_captcha_id, $page_type) . $this->_fix_wall_face_middle();
		}
	}
	function _fix_wall_face_middle() {  //留言板修正
		$notice_message = lang('plugin/dxcaptcha', 'dxcaptcha_error2');
		$notice_message_ajax = lang('plugin/dxcaptcha', 'dxcaptcha_error1');
		$notice_message_valid = lang('plugin/dxcaptcha', 'dxcaptcha_error3');
		$output = <<<JS
	<script type="text/javascript" src="source/plugin/dxcaptcha/js/dx.js"></script>
    <script type="text/javascript" defer="true">
        function js_fix_wall_face_middle_before_submit() {
            var postsubmit = document.getElementById('commentsubmit_btn');

            postsubmit.onclick = function(){
            	var token = document.getElementsByName("dx_verify_token")[0].value;
                if(token == "" || token == null){
                    showError("$notice_message");
                    return false;
                }
            }
        }
        _attachEvent(window, 'load', js_fix_wall_face_middle_before_submit);

    </script>
JS;
		return $output;
	}
	//支付
	function spacecp_credit_bottom(){
		if ($this->_cur_mod_is_valid()) {
			$cur_mod = 'popup_pay';
			$btn_id = "addfundssubmit_btn";
			$oc_dxcaptcha_id = 'oc_spacecp_credit_bottom';
			return $this->_code_output($cur_mod, $oc_dxcaptcha_id, "", $btn_id).$this->_fix_pay_submit($oc_dxcaptcha_id);
		}
	}
	//修复支付提交
	function _fix_pay_submit($oc_dxcaptcha_id) {
		$output = <<<JS
    <script type="text/javascript">
        function move_dxcaptcha_before_submit() {
            var oc_submitBtn = document.getElementById('addfundssubmit_btn');   //支付
            addfundssubmit_btn.onclick = function(){
            	myCaptcha.reload();
            	myCaptcha.show();

            	var token = document.getElementById("dx_verify_token5").value;
                if(token == "" || token == null){
                    showError("$notice_message");
                    return false;
                }
                var arr = token.split(":");

                ajax({
                    type:'GET',
                    url:'$this->validTokenUrl'+'?appKey=$this->appkey'+'&constId='+arr[1]+'&token='+arr[0],
                    data: '',
                    success:function(response, xml){
                    	var obj = JSON.parse(response);
                    	if(obj.success == false){
                    		showError("$notice_message_valid");
                    		return false;
                    	}
                        return true;
                    },
                    error:function(ex){
                    	showError("$notice_message_ajax");
                    	return false;
                    }   
                });
            }
        }
        _attachEvent(window, 'load', move_dxcaptcha_before_submit);
    </script>
JS;
		return $output;
	}

	//处理广播、日志验证
    function spacecp_follow_recode(){
    	
    	$this->spacecp_recode();
    }
    function spacecp_blog_recode(){
    	$this->spacecp_recode();
    }
    function spacecp_comment_recode(){
    	
    	$this->spacecp_recode();
    }

	
	function spacecp_recode() {
		if( ! $this->has_authority() ){
            return;
		}
		global $_G;
		$success = 0;
		
		if($this->_cur_mod_is_valid() && $this->captcha_allow) {
			if(submitcheck('topicsubmit', 0, $seccodecheck, $secqaacheck) || submitcheck('blogsubmit', 0, $seccodecheck, $secqaacheck)) {
				if($_POST['dx_verify_token'] == null || $_POST['dx_verify_token'] == ''){
                    showmessage(lang('plugin/dxcaptcha', 'dxcaptcha_error2'),'', array (), array (
                                'extrajs' => '<script type="text/javascript" reload="1">window.' . $_POST['captcha_id'] . '.reload(); </script>'));
                }

                //token校验
                if($this->dxcaptcha_validate($_POST['dx_verify_token'])==false){
                    showmessage(lang('plugin/dxcaptcha', 'dxcaptcha_error3'),'', array (), array (
                                'extrajs' => '<script type="text/javascript" reload="1">window.' . $_POST['captcha_id'] . '.reload(); </script>'));
                }
			}
			$success=1;
		}
		if($success == 1){
			$post_count = $_G['cookie']['pc_size_c'];
			$post_count = intval($post_count);
			$post_count = ($post_count + 1);
			$arr = array('a','b','c','d','e','f');
			shuffle($arr);
			$post_count = $post_count.implode("",$arr);
			dsetcookie('pc_size_c',  $post_count);
		}
	}
	//判断是否有权限发帖留言，或者其他
	function has_authority(){
		//针对掌上论坛不需要验证
        if( $_GET['mobile'] == 'no' && $_GET['submodule'] == 'checkpost' ){
            return false;
        }
        
		global $_G;
		
        $action = $_GET['ac'];
        //快速回复是否开启,并且有发帖权限,日志
        if($action == 'follow' && $_G['group']['allowpost'] != 1 ){//发帖
            return false;
        }else if($action == 'blog' && $_G['group']['allowblog'] != 1 ){//回复
			return false;
        }else if($action == 'comment' && $_G['group']['allowcomment'] != 1 ){//回复
			return false;
        }

        return true;
	}

}