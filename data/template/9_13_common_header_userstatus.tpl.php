<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
				<?php if($_G['uid']) { ?>
<ul class="login">


<li class="wdao_message">

<a class="message-list"><i></i></a>

<div class="menu-list message-box hide">

<ul class="message-box-list">

<li class="no-news-circle"><a href="home.php?mod=space&amp;do=pm" target="_blank">新消息</a></li>							
<li class="no-news-circle"><a href="home.php?mod=follow&amp;do=follower">新听众</a>

</ul>



</div>

</li>

<li class="user">

<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" class="user-list" id="header-logined-user-face">

<img src="uc_server/avatar.php?uid=<?php echo $_G['uid'];?>&amp;size=small" title="访问我的空间" alt="<?php echo $_G['member']['username'];?>">

</a>

<div class="menu-list user-box hide">


<div class="user-box-list">
<div class="user-box-list-area">
<p class="works-manange">
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><?php echo $_G['member']['username'];?></a>
</p></div>

<div class="user-box-list-area">

<p class="works-manange"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>">我的作品</a></p>
<p class="works-manange"><a href="home.php?mod=space&amp;do=favorite&amp;view=me">我的收藏</a></p>
</div>

<div class="user-box-list-area">

<p class="works-manange"><a href="home.php?mod=spacecp">个人设置</a></p>

<p class="works-manange"><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" >个人主页</a></p>
<?php if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?>
<p class="works-manange"><a href="home.php?mod=task&amp;item=doing">进行中的任务</a></p>
<?php } ?>
<div class="hook">
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?>
<?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra4'])) echo $_G['setting']['pluginhooks']['global_usernav_extra4'];?>
</div>

</div>
<?php if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>
<div class="user-box-list-area">
<p class="works-manange"><a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a></p>
<?php if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>
<p class="works-manange"><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a></p>
<?php } if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>
<p class="works-manange"><a href="admin.php" target="_blank">管理中心</a></p>
<?php } if(check_diy_perm($topic)) { ?>
<p class="works-manange"><a href="javascript:saveUserdata('diy_advance_mode', '1');openDiy();" >打开DIY</a></p>
<?php } ?>	
</div>							
<?php } ?>

<div class="user-box-list-area">

<p class="works-manange"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出登录</a></p>

</div>

</div>

</div>

</li>

</ul>

<?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>
<ul class="login">
<div class="user-box-list-area">
<p class="works-manange">
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><img class="avatar" src="uc_server/avatar.php?uid=<?php echo $_G['uid'];?>&amp;size=small" alt=""></a></p>
<p class="works-manange">
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a></p>
<p class="works-manange"><a href="member.php?mod=logging&amp;action=login" onClick="showWindow('login', this.href)"><i class="i-con-info"></i>激活</a></p>
<p class="works-manange"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>"><i class="i-con-exit"></i>退出</a></p>
</div></ul>



<?php } elseif(!$_G['connectguest']) { ?>
<ul class="unlogin">
<li>
<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>">注册<i></i></a>
<a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)">登录</a>
</li>
</ul>
                      <?php } else { ?>
<div class="user-box-list-area">
<p class="works-manange">
<a  href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><img class="avatar" src="uc_server/avatar.php?uid=<?php echo $_G['uid'];?>&amp;size=small" alt=""></a></p></div>
<div class="user-box-list-area">
<p class="works-manange">
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>"><i class="i-con-res"></i><?php echo $_G['member']['username'];?></a></p>
<p class="works-manange"><?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?></p>
<p class="works-manange"><a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1"><i class="i-con-info"></i>积分</a></p>
<p class="works-manange"><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>"><i class="i-con-exit"></i>退出</a></p>
</div>
<?php } ?>