<?php echo '草根吧商业模板保护！下载获取正版模板请访问草根吧官网：www.caogen8.co';exit;?>
<!--{template common/header}-->

<div id="pt" class="bm cl">
	<div class="z">
		<a href="./" class="nvhm" title="{lang homepage}">$_G[setting][bbname]</a> <em>&rsaquo;</em>
		{lang comment_view}
	</div>
</div>

<style id="diy_style" type="text/css"></style>
<div class="wp">
	<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>

<div id="ct" class="wp cl">
	<div class="mn">
		<div class="bm vw">
			<div class="h hm">
				<h1 class="ph"><a href="$url">$csubject[title]</a></h1>
				<p>{lang comment} ($csubject[commentnum])<!--{if $csubject['allowcomment'] == 1}--><span class="pipe">|</span><a href="javascript:;" onclick="location.href=location.href.replace(/(\#.*)/, '')+'#message';$('message').focus();return false;" class="xi2 xw1">{lang post_comment}</a><!--{/if}--></p>
			</div>
			<div class="qin_wzlogin_list_comment">
			<!--{loop $commentlist $comment}-->
				<!--{template portal/comment_li}-->
			<!--{/loop}-->
			<!--{if $pricount}-->
				<p class="mbn mtn y">{lang hide_portal_comment}</p>
			<!--{/if}-->
			<div class="pgs cl mtm mbm">$multi</div>
			<!--{if $_G['uid']}-->
				<!--{if $csubject['allowcomment'] == 1}-->
					<form id="cform" name="cform" action="portal.php?mod=portalcp&ac=comment" method="post" autocomplete="off">
						<div class="tedt">
							<div class="area">
								<textarea name="message" cols="60" rows="3" class="pt" id="message"></textarea>
							</div>
						</div>
						<!--{if $secqaacheck || $seccodecheck}-->
							<!--{block sectpl}--><sec> <span id="sec<hash>" onclick="showMenu(this.id);"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div><!--{/block}-->
							<div class="mtm"><!--{subtemplate common/seccheck}--></div>
						<!--{/if}-->

						<!--{if $idtype == 'topicid' }-->
							<input type="hidden" name="topicid" value="$id">
						<!--{else}-->
							<input type="hidden" name="aid" value="$id">
						<!--{/if}-->
						<input type="hidden" name="formhash" value="{FORMHASH}">
						<p class="ptn"><button type="submit" name="commentsubmit" value="true" class="pn pnc"><strong>{lang comment}</strong></button></p>
					</form>
				<!--{/if}-->
			<!--{elseif !$_G[connectguest]}-->
				<div class="attach_nopermission">
	                <div>
	                    <p class="pc px beforelogin">
	 						<a href="member.php?mod=logging&action=login" onclick="showWindow('login', this.href)">登录</a>
	                        <a href="member.php?mod=register">立即注册</a>
	                    </p>
	                </div>
	            </div>
			<!--{/if}-->
			</div>
		</div>
	</div>
</div>

<div class="wp mtn">
	<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>

<!--{template common/footer}-->