<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

loadcache('plugin');
C::import('dxcaptcha', 'plugin/dxcaptcha/config');
class plugin_dxcaptcha {
    public $mods = array ();
    public $open;
    public $captcha_allow = false;
    public $style = array ();

    public $appkey;
    public $appSecret;
    public $captchaUrl;
    public $validTokenUrl;

    function plugin_dxcaptcha(){
        global $_G;
        $this->mods = unserialize($_G['cache']['plugin']['dxcaptcha']['mod']);   //获取开启验证的位置
        // var_dump($this->mods);
        $this->appkey = $_G['cache']['plugin']['dxcaptcha']['appId'];
        $this->appSecret = $_G['cache']['plugin']['dxcaptcha']['appSecret'];

        $dxcaptcha = new DxCaptcha($this->appkey, $this->appSecret);

        $this->captchaUrl = $dxcaptcha->getCaptchaUrl();
        $this->validTokenUrl = $dxcaptcha->getValidTokenUrl();
        $this->appkey = $dxcaptcha->getCapcthaAppId();
        // var_dump($this->appkey);

        $this->open = $_G['cache']['plugin']['dxcaptcha']['open'];
        $this->style = $_G['cache']['plugin']['dxcaptcha'];
        // 初始化
        if ($this->open == '1') {
            // 登陆注册不需要选择用户组
            if (CURMODULE == "logging" || CURMODULE == "register") {
                $this->captcha_allow = true;
            } else if (in_array($_G['groupid'], unserialize($_G['cache']['plugin']['dxcaptcha']['groupid']))) {
                $this->captcha_allow = true;
            } else {
                $this->captcha_allow = false;
            }
        } else {
            $this->captcha_allow = false;
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
   

    function global_login_extra(){   //加入弹窗校验
        global $_G;
        if ($_G['uid'] == '1') {
            return;
        } else if ($_G['uid'] == '0' && $this->logging_mod_valid()) {   //
            $html = <<<HTML
            <script src="$this->captchaUrl" crossOrigin="anonymous"></script>
            <div id="test"></div>
            <script>
                var myCaptcha1=_dx.Captcha(document.getElementById("test"), {
                    appKey: "$this->appkey",
                    style: "popup",
                    success: function (token) {
                        document.getElementById("dx_verify_token1").value=token;
                        myCaptcha1.hide();
                        lsSubmit();
                    }
                });

                var lsform = document.getElementById('lsform');
                var obj = document.createElement("input");
                obj.name = "dx_verify_token";
                obj.id = "dx_verify_token1";
                obj.type = "hidden";
                lsform.appendChild(obj);

                var button = document.forms[0].getElementsByTagName('button')[0];
                if (button.addEventListener) {   
                    button.addEventListener("click", function(e){
                        if(document.getElementById("ls_username").value!='' && document.getElementById("ls_password").value!=''){
                            e.preventDefault();
                            e.stopPropagation();

                            myCaptcha1.reload();
                            myCaptcha1.show();
                        }
                    }, false); 
                } else if (button.attachEvent) {
                    button.attachEvent("onclick", function(e){
                        if(document.getElementById("ls_username").value!='' && document.getElementById("ls_password").value!=''){

                            myCaptcha1.reload();
                            myCaptcha1.show();
                        }
                    }); 
                }
            </script>
HTML;
            return $html;
        }
    }

    public function global_header() {   //
        // var_dump(CURMODULE);
         $html = <<<HTML
            <script src="$this->captchaUrl" crossOrigin="anonymous"></script>
HTML;
            return $html;
    }

    public function logging_mod_valid() {
        $mod = "2";
        return in_array($mod, $this->mods);
    }
    

    public function _cur_mod_is_valid() {
        $cur = CURMODULE;   //
        switch (CURMODULE) {
            case "logging" :
                $mod = "2";
                break;
            
            case "register" :
                $mod = "1";
                break;
            
            case "post" :
                if ($_GET["action"] == "reply") {
                    $mod = "4";
                } else if ($_GET["action"] == "newthread") {
                    $mod = "3";
                } else if ($_GET["action"] == "edit") {
                    $mod = "5";
                }
                break;
            
            case "forumdisplay" :
                $mod = "3";
                break;
            
            case "viewthread" :
                $mod = "4";
                break;
            
            case "follow" :
                $mod = "6";
                break;
            
            case "spacecp" :
                if ($_GET["ac"] == "blog") {
                    $mod = "7";
                }
                if ($_GET["ac"] == "comment") {
                    $mod = "8";
                }
                if ($_GET["ac"] == "follow") {
                    $mod = "6";
                }
                if ($_GET["ac"] == "credit") {
                    $mod = "9";
                }
                break;
            
            case "space" :
                if ($_GET["do"] == "wall") {
                    $mod = "8";
                }
                if ($_GET["do"] == "blog" || $_GET["do"] == "index") {
                    $mod = "7";
                } else {
                    $mod = "4";
                }
                
                break;
            
            case "connect" :
                $mod = "1";
                break;
            
            case "index" :
                $mod = "2";
                break;
            case "lostpasswd" :
                $mod = "10";
                break;
            default :
                return 1;
        }
        return in_array($mod, $this->mods);  //判断该模块用户是否开启，从而选择是否开放插件
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

    public function _code_output($cur_mod = '', $dx_captcha_id = 'dx_test', $page_type = '', $dx_captcha_verify_id = 'dx_captcha_verify') {
        if (! $this->captcha_allow) {
            return;
        } 
        $notice_lostpw = lang('plugin/dxcaptcha', 'dxcaptcha_notice');
        
        $cur_mod = empty($cur_mod) ? CURMODULE : $cur_mod;
        $style = $this->getStyle($page_type);  //样式
        $random_id = "captcha_" . $dx_captcha_id;

        if (in_array("10", $this->mods)) {   //找密模块
            include template('dxcaptcha:lostpasswd');
        }

        switch ($cur_mod) {                 //通过该模块来控制插件输出
            case 'register' :
            case 'logging' :
                include template('dxcaptcha:common');
                break;
            case 'reply' :
                include template('dxcaptcha:reply');
                break;
            case 'newthread' :
            case 'edit' :
                include template('dxcaptcha:newthread_edit');
                break;
            case 'blog' :
                include template('dxcaptcha:blog');
                break;
            case 'follow' :
            case 'comment' :
                include template('dxcaptcha:follow_comment');
                break;
            case 'popup' :
                include template('dxcaptcha:popup');
                break;
            case 'popup_pay' :  //针对支付
                include template('dxcaptcha:popup1');
                break;
            case 'popup_livereplay' :
                include template('dxcaptcha:popup_livereplay');
                break;
        }
        
        return $return1 . $return;
    }
    private function getStyle($page_type) {
        $style_str = $style_str = $this->style[$page_type];
        
        $style_arr = explode(" ", $style_str);
        $top = $style_arr[0] == "auto" ? "auto" : $style_arr[0] . 'px ';
        $bottom = $style_arr[1] == "auto" ? "auto" : $style_arr[1] . 'px ';
        $left = $style_arr[2] == "auto" ? "auto" : $style_arr[2] . 'px ';
        $right = $style_arr[3] == "auto" ? "auto" : $style_arr[3] . 'px';
        $margin = "margin:" . $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
        return $margin;
    }
}
include ('plugin_class/plugin_dxcaptcha_member.class.php');

include ('plugin_class/plugin_dxcaptcha_forum.class.php');

include ('plugin_class/plugin_dxcaptcha_home.class.php');

include ('plugin_class/plugin_dxcaptcha_group.class.php');
?>