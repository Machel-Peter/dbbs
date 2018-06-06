<?php echo '草根吧商业模板保护！下载获取正版模板请访问草根吧官网：www.caogen8.co';exit;?>
<div class="bm">
	<div class="bm_h">
		<h2 class="tt_jiaodian_h cl">{lang latest_comment}</h2>
	</div>
	<div class="qin_wz_login cl">
		<!--{if $_G['uid']}-->
			<a href="home.php?mod=space&uid=$_G[uid]" class="listavatar" target="_blank">
            	<img src="uc_server/avatar.php?uid=$_G[uid]&size=middle" />
        	</a>
		<!--{elseif !$_G[connectguest]}-->
        	<a href="home.php?mod=space&uid=$_G[uid]" class="listavatar" target="_blank">
            	<img src="$_G['style']['directory']/images/anonymity_1.jpg" />
        	</a>
        <!--{/if}-->
        <div class="list_des z">
            <!--{if $_G['uid']}-->
	            <!--{if !$data[htmlmade]}-->
					<form id="cform" name="cform" action="$form_url" method="post" autocomplete="off">
						<div class="tedt">
							<div class="area">
								<textarea name="message" rows="3" class="pt" id="message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');"></textarea>
							</div>
						</div>

						<!--{if $secqaacheck || $seccodecheck}-->
							<!--{block sectpl}--><sec> <span id="sec<hash>" onclick="showMenu(this.id);"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div><!--{/block}-->
							<div class="mtm"><!--{subtemplate common/seccheck}--></div>
						<!--{/if}-->
						<!--{if !empty($topicid) }-->
							<input type="hidden" name="referer" value="$topicurl#comment" />
							<input type="hidden" name="topicid" value="$topicid">
						<!--{else}-->
							<input type="hidden" name="portal_referer" value="$viewurl#comment">
							<input type="hidden" name="referer" value="$viewurl#comment" />
							<input type="hidden" name="id" value="$data[id]" />
							<input type="hidden" name="idtype" value="$data[idtype]" />
							<input type="hidden" name="aid" value="$aid">
						<!--{/if}-->
						<input type="hidden" name="formhash" value="{FORMHASH}">
						<input type="hidden" name="replysubmit" value="true">
						<input type="hidden" name="commentsubmit" value="true" />
						<p class="ptn"><button type="submit" name="commentsubmit_btn" id="commentsubmit_btn" value="true" class="y pn pnc"><strong>{lang comment}</strong></button></p>
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
		<ul class="qin_wzlogin_list cl">
		<!--{loop $commentlist $comment}-->
		<!--{template portal/comment_li}-->
		<!--{if !empty($aimgs[$comment[cid]])}-->
			<script type="text/javascript" reload="1">aimgcount[{$comment[cid]}] = [<!--{echo implode(',', $aimgs[$comment[cid]]);}-->];attachimgshow($comment[cid]);</script>
		<!--{/if}-->
		<!--{/loop}-->
		</ul>
		<!--{if !empty($pricount)}-->
			<p class="mtn mbn y">{lang hide_portal_comment}</p>
		<!--{/if}-->
		<!--{if $data[commentnum]}--><p class="ptm pbm" style="margin-left: 20px;"><a href="$common_url" class="xi2">评论 (<em id="_commentnum">$data[commentnum]</em>)</a></p><!--{/if}-->
		
</div>
