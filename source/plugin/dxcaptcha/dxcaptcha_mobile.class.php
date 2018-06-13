<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

loadcache('plugin');
C::import('dxcaptcha', 'plugin/dxcaptcha/config');
class mobileplugin_dxcaptcha {
    public $mods = array ();
    public $open;
    public $captcha_allow = false;

    public $appkey;
    public $appSecret;
    public $captchaUrl;
    public $validTokenUrl;
    public $mobile;

    function mobileplugin_dxcaptcha(){
        global $_G;
        $this->mods = unserialize($_G['cache']['plugin']['dxcaptcha']['mod']);   //
        // var_dump($_G['cache']['plugin']['dxcaptcha']);
        $this->appkey = $_G['cache']['plugin']['dxcaptcha']['appId'];
        $this->appSecret = $_G['cache']['plugin']['dxcaptcha']['appSecret'];

        $dxcaptcha = new DxCaptcha($this->appkey, $this->appSecret);

        $this->captchaUrl = $dxcaptcha->getCaptchaUrl();
        $this->validTokenUrl = $dxcaptcha->getValidTokenUrl();
        $this->appkey = $dxcaptcha->getCapcthaAppId();
        // var_dump($this->appkey);

        $this->open = $_G['cache']['plugin']['dxcaptcha']['open'];
        $this->mobile = $_G['cache']['plugin']['dxcaptcha']['mobile'];
        // 初始化
        if (in_array($_G['groupid'], unserialize($_G['cache']['plugin']['dxcaptcha']['groupid'])) && $this->mobile){
            $this->captcha_allow = true;
        }
       
        // 发帖大于限定数，则不用插件
        $post_count = $_G['cookie']['pc_size_c'];
        if ($post_count == null) {
            $arr = array (
                    'a',
                    'b',
                    'c',
                    'd',
                    'e',
                    'f' 
            );
            shuffle($arr);
            $post_count = '0' . explode($arr);
            dsetcookie('pc_size_c', $post_count, 24 * 60 * 60);
        } else {
            $post_count = intval($post_count);
            $post_num = intval($_G['cache']['plugin']['dxcaptcha']['post_num']);
            if ($post_num != 0 && $post_count >= $post_num) {
                $this->captcha_allow = false;
            }
        }
    }
    public function _code_output($dx_id = 'dx_captcha') {
        if (! $this->captcha_allow) {
            return;
        } 
        $random_id = "captcha_" . $dx_id;

        $output = '<script src="'.$this->captchaUrl.'" crossOrigin="anonymous"></script><div id="dx_captcha" class="" ><table><tbody><tr><td>';
        $output .= '<div id="'. $random_id .'" ></div></td></tr></tbody></table></div>
            <script type="text/javascript" defer="true">
                var form = document.forms[0];

                var node=document.createElement("input");
                form.appendChild(node);
                node.type = "hidden";
                node.name = "dx_verify_token";

                var captcha_node=document.createElement("input");
                form.appendChild(captcha_node);
                captcha_node.type="hidden";
                captcha_node.name="captcha_id";
                captcha_node.value="myCaptcha";

                var myCaptcha = _dx.Captcha(document.getElementById("'. $random_id .'"), {
                    appKey: "'.$this->appkey.'",
                    style: "popup",
                    success: function (token) {
                        // console.info(token);
                        document.getElementsByName("dx_verify_token")[0].value=token;
                        // setTimeout(function(){myCaptcha.reload();},60*1000);
                        myCaptcha.hide();
                        window.oc_custom_ajax(true, "dx_captcha");
                    }
                })
            </script>';
        return $output;
    }
    
    public function global_footer_mobile() {
        if (CURMODULE == 'register' && $this->_cur_mod_is_valid() && $this->captcha_allow) {
            return $this->_code_output('dx_register') . $this->_fix_register();
        } elseif (CURMODULE == 'logging' && $this->_cur_mod_is_valid() && $this->captcha_allow) {
            return $this->_code_output('dx_logging') . $this->_fix_loggin();
        } else {
            return;
        }
    }
    public function _fix_loggin(){
        return '<script id="testScript" type="text/javascript" src="source/plugin/dxcaptcha/js/dx_mobile.js" data-btn="btn_login" data-form="loginform"></script>';
    }
    public function _fix_register(){
        return '<script id="testScript" type="text/javascript" src="source/plugin/dxcaptcha/js/dx_mobile.js' . '" data-btn="btn_register" data-form="registerform"></script>';
    }
    public function _cur_mod_is_valid() {
        $cur = CURMODULE;
        switch (CURMODULE) {
            case "logging" :
                $cur = "2";
                break;
            case "register" :
                $cur = "1";
                break;
            case "post" : // 论坛模块
                if ($_GET["action"] == "reply") {
                    $cur = "4";
                } else if ($_GET["action"] == "newthread") {
                    $cur = "3";
                } else if ($_GET["action"] == "edit") {
                    $cur = "5";
                }
                break;
            case "forumdisplay" :
            case "viewthread" :
                $cur = "4";
                break;
        }
        return in_array($cur, $this->mods);
    }

    public function dxcaptcha_validate($token_constId) {   //token校验
        $dxcaptcha = new DxCaptcha($this->appkey, $this->appSecret);
        $this->appkey = $dxcaptcha->getCapcthaAppId();
        if($token_constId == "" || $token_constId == null){
            return false;
        }
        $arr = explode(":", $token_constId);
        if(count($arr) != 2){
            return false;
        }
        return $dxcaptcha->_validToken($arr[0], $arr[1]);
    }
}
/**
* 
*/
class mobileplugin_dxcaptcha_member extends mobileplugin_dxcaptcha
{
    
    public function logging_code() {
        global $_G;
        if ($_GET['action'] == "logout") {
            return;
        }
        
        if ($this->_cur_mod_is_valid() && $this->captcha_allow) {
            if (submitcheck('loginsubmit', 1, $seccodestatus) && empty($_GET['lssubmit'])) { //
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
        }
    }
    public function register_code() {
        global $_G;
        if ($this->_cur_mod_is_valid() && $this->captcha_allow) {
            if (submitcheck('regsubmit', 0, $seccodecheck, $secqaacheck)) {
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
        }
    }
}
class mobileplugin_dxcaptcha_forum extends mobileplugin_dxcaptcha {
    public function _fix_viewthread() {
        return '<script id="testScript" type="text/javascript" src="source/plugin/dxcaptcha/js/dx_mobile.js' . '" data-btn="fastpostsubmit" data-form="fastpostsubmitline"></script>';
    }
    // 手机底部回复
    public function viewthread_fastpost_button_mobile() {
        if (! ($this->_cur_mod_is_valid() && $this->captcha_allow)) {
            return;
        } else {
            return $this->_code_output("dx_fastpost") . $this->_fix_viewthread();
        }
    }
    
    // 手机跳转回复及发帖
    public function post_bottom_mobile() {
        if (CURMODULE == "post" && $this->_cur_mod_is_valid() && $this->captcha_allow) {
            return $this->_code_output("dx_post") . $this->_fix_post();
        } else {
            return;
        }
    }
    public function _fix_post() {
        return '<script id="testScript" type="text/javascript" src="source/plugin/dxcaptcha/js/dx_mobile.js' . '" data-btn="postsubmit" data-form="y"></script>';
    }
    public function post_rccode() {
        global $_G;
        $success = 0;
        if ($this->_cur_mod_is_valid() && $this->captcha_allow) {
            if (submitcheck('topicsubmit', 0, $seccodecheck, $secqaacheck) || submitcheck('replysubmit', 0, $seccodecheck, $secqaacheck) || submitcheck('editsubmit', 0, $seccodecheck, $secqaacheck)) {
                if($_POST['dx_verify_token'] == null || $_POST['dx_verify_token'] == ''){
                    showmessage(lang('plugin/dxcaptcha', 'dxcaptcha_error2'),'', array (), array (
                                'extrajs' => '<script type="text/javascript" reload="1">window.' . $_POST['captcha_id'] . '.reload(); </script>'));
                }

                //token校验
                if($this->dxcaptcha_validate($_POST['dx_verify_token'])==false){
                    showmessage(lang('plugin/dxcaptcha', 'dxcaptcha_error3'),'', array (), array (
                                'extrajs' => '<script type="text/javascript" reload="1">window.' . $_POST['captcha_id'] . '.reload(); </script>'));
                }
                $success = 1;
            }
        }
        
        if ($success == 1) {
            $post_count = $_G['cookie']['pc_size_c'];
            $post_count = intval($post_count);
            $post_count = ($post_count + 1);
            $arr = array (
                    'a',
                    'b',
                    'c',
                    'd',
                    'e',
                    'f' 
            );
            shuffle($arr);
            $post_count = $post_count . implode("", $arr);
            dsetcookie('pc_size_c', $post_count);
        }
    }
}
?>