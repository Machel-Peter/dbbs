<?php echo '草根吧商业模板保护！下载获取正版模板请访问草根吧官网：www.caogen8.co';exit;?>
<div class="alltop">
	<div class="allnav">
		<div class="nav_left"> 
			<!--{loop $_G['setting']['topnavs'][0] $nav}--> 
			<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}--><em>$nav[code]</em><!--{/if}--> 
			<!--{/loop}--> 
		</div>
		<div class="y">
			<!--{if $_G['uid']}-->
		    <div class="cl qin_af_login">
		        <a href="home.php?mod=space&uid=$_G[uid]" id="qin_user" onMouseOver="showMenu({'ctrlid':'qin_user','ctrlclass':'a'});">
		            <!--{$_G[member][username]}--> ( <!--{$_G[group][grouptitle]}--> ) <i></i>
		        </a> 
		        <a href="home.php?mod=space&do=notice" id="myprompt" class="a showmenu" onmouseover="showMenu({'ctrlid':'myprompt'});" style="padding-right:0;">
		        	提醒
		        </a>
		        <span id="myprompt_check"></span>
		        <div id="qin_user_menu" class="qin_user_pop" style="display: none;">
		            <a href="home.php?mod=spacecp&ac=avatar" class="qin_userinfo_avtar">
		                <div class="grid_edit">编辑</div>
		                <!--{avatar($_G[uid],middle)}-->
		            </a> 
		            <a href="home.php?mod=spacecp&ac=credit&showcredit=1">
		            	<span class="z">积分</span><span class="y"><!--{$_G[member][credits]}--></span>
		            </a>
		            <a href="home.php?mod=spacecp">设置</a>
		            <!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}-->
		            <a href="javascript:saveUserdata('diy_advance_mode', '1');openDiy();">DIY</a>
		            <a href="admin.php" target="_blank">后台</a>
		            <!--{/if}-->
		            <a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">退出</a>
		        </div>
		    </div>
		    <!--{elseif !$_G[connectguest]}-->
		    <div class="qin_no_login cl">
				<a href="member.php?mod=logging&action=login" onclick="showWindow('login', this.href)">登录</a>
			    <a href="member.php?mod=register">注册</a>
			</div>
			<!--{/if}-->
		</div>
	</div>
</div>

<div class="head">
	<div class="web_widht">
		<div class="logo">
			<a href="./" title="$_G['setting']['bbname']" class="cotv" target="_blank">$_G['setting']['bbname']</a>
		</div>
		<div class="nav f_nav ">
			<div class="searbar">
				<div class="hot_search"> 
					<!--{if $_G['setting']['srchhotkeywords']}-->
						<!--{loop $_G['setting']['srchhotkeywords'] $val}-->
							<!--{if $val=trim($val)}-->
								<!--{eval $valenc=rawurlencode($val);}-->
								<!--{block srchhotkeywords[]}-->
									<!--{if !empty($searchparams[url])}-->
										<a href="$searchparams[url]?q=$valenc&source=hotsearch{$srchotquery}" target="_blank" sc="1">$val</a>
									<!--{else}-->
										<a href="search.php?mod=forum&srchtxt=$valenc&formhash={FORMHASH}&searchsubmit=true&source=hotsearch" target="_blank" sc="1">$val</a>
									<!--{/if}-->
								<!--{/block}-->
							<!--{/if}-->
						<!--{/loop}-->
						<!--{echo implode('', $srchhotkeywords);}-->
					<!--{/if}-->	
				</div>
				<!--{subtemplate common/pubsearchform}--> 
			</div>
			<!--{hook/global_ad_top}--> <!--{hook/global_cpnav_extra2}--> 
		</div>
	</div>
</div>
