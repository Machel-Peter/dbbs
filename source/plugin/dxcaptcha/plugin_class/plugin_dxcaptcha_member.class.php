<?php
if(! defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/**
* 用户模块
**/
class plugin_dxcaptcha_member extends plugin_dxcaptcha
{
    
    public function register_input_output(){
        if ($this->_cur_mod_is_valid()) {
            $cur_mod = "register";
            
            if($_GET["infloat"] == "yes"){
                $dx_captcha_id = "dx_float_register_input";
                $page_type = "register_float";
            }else{
                $dx_captcha_id = "dx_page_register_input";
                $page_type = "register";
            }
            return $this->_code_output($cur_mod, $dx_captcha_id, $page_type, "dx_captcha_verify_register");
       }   
    }
    public function logging_input_output() {
        global $_G;
        $cur_mod = "logging";

        if ($_G['uid'] == '1') {   //用户已登录
            return;
        } else if ($_G['uid'] == '0' && $this->logging_mod_valid()) {
            if($_GET["infloat"] == "yes"){
                $dx_captche_id = "dx_float_logging_input";
                $page_type = "logging_float";
            }else{
                $dx_captche_id = "dx_page_logging_input";
                $page_type = "logging";
            }
            return $this->_code_output($cur_mod, $dx_captche_id, $page_type, "dx_captcha_verify_logging");
        }
    }
    
    function logging_code() {
        if($_GET['action'] == "logout"){
            return;
        }

        $cur = CURMODULE;
        if ($this->open && $this->logging_mod_valid()) {
            if($_GET['username'] != "" && $_GET['password'] != "" && $_GET['lssubmit'] == "yes"){
                if( $_POST['dx_verify_token'] == null ){
                    $this->_show();
                    return;
                }
            }
        }else{
            return;
        }

        if( ! $this->has_authority() ){
            return;
        }
        if($this->_cur_mod_is_valid() && $this->captcha_allow) {
            if(submitcheck('loginsubmit', 1, $seccodestatus) && empty($_POST['lssubmit'])) {
                if($_POST['dx_verify_token'] == null || $_POST['dx_verify_token'] == ''){
                    showmessage(lang('plugin/dxcaptcha', 'dxcaptcha_error2'),'', array(), array(
                                'extrajs' => '<script type="text/javascript" reload="1">window.' . $_POST['captcha_id'] . '.reload(); </script>'));
                }

                //token校验
                if($this->dxcaptcha_validate($_POST['dx_verify_token'])==false){
                    // showmessage(lang('plugin/dxcaptcha', 'dxcaptcha_error3'));
                    showmessage(lang('plugin/dxcaptcha', 'dxcaptcha_error3'), '', array(), array(
                                'extrajs' => '<script type="text/javascript" reload="1">window.' . $_POST['captcha_id'] . '.reload(); </script>'));
                }
            }
        }
    }
    function register_code(){
        global $_G;
        $cur = CURMODULE;
        if($this->_cur_mod_is_valid() && $this->captcha_allow && $cur == "register") {
            if(submitcheck('regsubmit', 0, $seccodecheck, $secqaacheck)){
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
    
    function lostpasswd_code(){
        global $_G;
        $cur = CURMODULE;
        if($this->_cur_mod_is_valid() && $this->captcha_allow && $cur == "lostpasswd") {
            if(submitcheck('lostpwsubmit', 0, $seccodecheck, $secqaacheck)){
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

    public function _show(){
         include template('common/header_ajax');
         $js = <<<JS
        <script type="text/javascript" reload="1" defer="true">
            // var btn=document.getElementById("header-loggin-btn");
            // btn.click();
         </script>
JS;
        echo($js);
         include template('common/footer_ajax');
         dexit();
    }

    public function _init(){
         include template('common/header_ajax');
         $js = <<<JS
JS;
        echo($js);
         include template('common/footer_ajax');
         dexit();
    }

    function has_authority(){
        //针对掌上论坛不需要验证
        if( $_GET['mobile'] == 'no' && $_GET['submodule'] == 'checkpost' ){
            return false;
        }
        return true;
    }

}