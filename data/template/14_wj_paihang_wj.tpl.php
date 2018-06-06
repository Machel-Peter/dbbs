<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF

<script type="text/javascript">
window.onerror=function(){return true;}
function _f(obj) {
return (document.getElementById(obj))
}
function turn(n,m,x){
for(i=1;i<=m;i++){
if(i==n){
_f('lm'+x+'_'+i).className="now";
_f('content'+x+'_'+i).style.display="";
}else{
_f('lm'+x+'_'+i).className="1";
_f('content'+x+'_'+i).style.display="none";
}
}
}
</script>
<link rel="stylesheet" href="source/plugin/wj_paihang/template/images/wj_paihang.css" />
<div id="wj_contentC" style="background:{$bgcolor};margin:{$_G['cache']['plugin']['wj_paihang']['padding']}px 0;
EOF;
 if($_G['cache']['plugin']['wj_paihang']['weather']) { 
$return .= <<<EOF
height:360px;
EOF;
 } 
$return .= <<<EOF
">

EOF;
 if($_G['cache']['plugin']['wj_paihang']['weather']) { 
$return .= <<<EOF

<div style="
EOF;
 if(!$_G['cache']['plugin']['wj_paihang']['border']) { 
$return .= <<<EOF
border:1px solid 
EOF;
 if($_G['cache']['plugin']['wj_paihang']['bordercolor']) { 
$return .= <<<EOF
{$_G['cache']['plugin']['wj_paihang']['bordercolor']}
EOF;
 } else { 
$return .= <<<EOF
{$boxbg[$skin]}
EOF;
 } 
$return .= <<<EOF
;
EOF;
 } 
$return .= <<<EOF
border-bottom:0;height:30px;">
    <iframe scrolling="no" src="http://tianqiapi.com/api.php?style=tq&amp;skin={$_G['cache']['plugin']['wj_paihang']['weatherskin']}&amp;paddingleft=7&amp;paddingtop=6" frameborder="0" width="100%" height="24" allowtransparency="true"></iframe>
</div>

EOF;
 } 
$return .= <<<EOF

<div style="
EOF;
 if(!$_G['cache']['plugin']['wj_paihang']['border']) { 
$return .= <<<EOF
border:1px solid 
EOF;
 if($_G['cache']['plugin']['wj_paihang']['bordercolor']) { 
$return .= <<<EOF
{$_G['cache']['plugin']['wj_paihang']['bordercolor']}
EOF;
 } else { 
$return .= <<<EOF
{$boxbg[$skin]}
EOF;
 } 
$return .= <<<EOF
;
EOF;
 } 
$return .= <<<EOF
height:325px;overflow:hidden;">
  <div id="wj_hot24" >
    <h3 class="wjhot_{$skin}">{$wtext['0']}</h3>
    <div class="list12" id="ch_28">
      <ul>
  
EOF;
 if($rewrite) { if(is_array($hotsubject)) foreach($hotsubject as $result) { 
$return .= <<<EOF
<li><span>{$result['views']}</span><a href="thread-{$result['tid']}-1-1.html">{$result['subject']}</a></li>
        
EOF;
 } } else { if(is_array($hotsubject)) foreach($hotsubject as $result) { 
$return .= <<<EOF
<li><span>{$result['views']}</span><a href="forum.php?mod=viewthread&amp;tid={$result['tid']}&amp;extra=page=1">{$result['subject']}</a></li>

EOF;
 } } 
$return .= <<<EOF

      </ul>
    </div>
  </div>
  <div id="wj_hot24">
    <h3 class="com_{$skin}">{$wtext['1']}</h3>
    <div id="ch_29">
      <div class="list12" id="ch_28">
      <ul>
  
EOF;
 if($rewrite) { 
$return .= <<<EOF

      
EOF;
 if(is_array($hotreplies)) foreach($hotreplies as $result) { 
$return .= <<<EOF
        <li><span>{$result['replies']}</span><a href="thread-{$result['tid']}-1-1.html">{$result['subject']}</a></li>
        
EOF;
 } } else { if(is_array($hotreplies)) foreach($hotreplies as $result) { 
$return .= <<<EOF
        <li><span>{$result['replies']}</span><a href="forum.php?mod=viewthread&amp;tid={$result['tid']}&amp;extra=page=1">{$result['subject']}</a></li>
        
EOF;
 } } 
$return .= <<<EOF

      </ul>
    </div>
    </div>
    
  </div>
  <div id="wj_online" >
    <h3 class="wjbk_{$skin}">{$wtext['2']}</h3>
    <div id="ch_30">
      <div class="list12" id="paihang_index">
        <ul>
        
EOF;
 if(is_array($hotforum)) foreach($hotforum as $result) { 
$return .= <<<EOF
          <li><span class="num{$result['num']}">{$result['clicks']}</span><a href="forum.php?mod=forumdisplay&amp;fid={$result['fid']}">{$result['name']}</a></li>
          
EOF;
 } 
$return .= <<<EOF

        </ul>
      </div>
    </div>
    
  </div>
  <div id="wj_users" class="right">
    <!-- 修改内容一开始 -->
    
    <!-- 修改内容一结束 -->
    <div id="ch_31">
  <h3 id="tag">
  <a href="javascript:;" id="lm1_1" class="now" onmouseover="turn(1,3,1);return false;">{$wtext['3']}</a>
  <a onmouseover="turn(2,3,1);return false;" class="" id="lm1_2" href="javascript:;">{$wtext['4']}</a>
  </h3>
      <div id="content1_1" style="">
        
EOF;
 if($rewrite) { if(is_array($userjifen)) foreach($userjifen as $result) { 
$return .= <<<EOF
<div class="ptA st clear"><a href="space-uid-{$result['uid']}.html" target="_blank"><img src="uc_server/avatar.php?uid={$result['uid']}&amp;size=small" alt="{$result['username']}" height="41" width="41"></a>
          <h4><a href="space-uid-{$result['uid']}.html" target="_blank">{$result['username']}</a></h4>
          <p>{$wtext['5']}<span>{$result['credits']}</span></p>
        </div>

EOF;
 } } else { if(is_array($userjifen)) foreach($userjifen as $result) { 
$return .= <<<EOF
<div class="ptA st clear"><a href="home.php?mod=space&amp;uid={$result['uid']}" target="_blank"><img src="uc_server/avatar.php?uid={$result['uid']}&amp;size=small" alt="{$result['username']}" height="41" width="41"></a>
  <h4><a href="home.php?mod=space&amp;uid={$result['uid']}" target="_blank">{$result['username']}</a></h4>
  <p>{$wtext['5']}<span>{$result['credits']}</span></p>
</div>

EOF;
 } } 
$return .= <<<EOF

      </div>
  <div id="content1_2" style="display:none">
        
EOF;
 if($rewrite) { if(is_array($userregdate)) foreach($userregdate as $result) { 
$return .= <<<EOF
<div class="ptA st clear"><a href="space-uid-{$result['uid']}.html" target="_blank"><img src="uc_server/avatar.php?uid={$result['uid']}&amp;size=small" alt="" height="41" width="41"></a>
          <h4><a href="space-uid-{$result['uid']}.html" target="_blank">{$result['username']}</a></h4>
          <p class="wj_birth"><span>{$result['regdate']}</span></p>
        </div>

EOF;
 } } else { if(is_array($userregdate)) foreach($userregdate as $result) { 
$return .= <<<EOF
<div class="ptA st clear"><a href="home.php?mod=space&amp;uid={$result['uid']}" target="_blank"><img src="uc_server/avatar.php?uid={$result['uid']}&amp;size=small" alt="" height="41" width="41"></a>
          <h4><a href="home.php?mod=space&amp;uid={$result['uid']}" target="_blank">{$result['username']}</a></h4>
          <p class="wj_birth"><span>{$result['regdate']}</span></p>
        </div>

EOF;
 } } 
$return .= <<<EOF

      </div>
    </div>
  </div>
</div>
</div>

EOF;
?>