<?php echo 'Theme by Jeaviking  http://www.jeavi.name';exit;?>
<div class="pcb">
<!--{if !$_G['forum']['ismoderator'] && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($_G['thread']['digest'] == 0 && ($post['groupid'] == 4 || $post['groupid'] == 5 || $post['memberstatus'] == '-1')))}-->
	<div class="locked">{lang message_banned}</div>
<!--{elseif !$_G['forum']['ismoderator'] && $post['status'] & 1}-->
	<div class="locked">{lang message_single_banned}</div>
<!--{elseif $needhiddenreply}-->
	<div class="locked">{lang message_ishidden_hiddenreplies}</div>
<!--{elseif $post['first'] && $_G['forum_threadpay']}-->
	<!--{template forum/viewthread_pay}-->
<!--{elseif $_G['forum_discuzcode']['passwordlock'][$post[pid]]}-->
	<div class="locked">{lang message_password_exists} {lang pleaseinputpw}<input type="text" id="postpw_$post[pid]" class="vm" />&nbsp;<button class="pn vm" type="button" onclick="submitpostpw($post[pid]{if $_GET['from'] == 'preview'},{$post[tid]}{else}{/if})"><strong>{lang submit}</strong></button></div>
<!--{else}-->
	<!--{if !$post['first'] && !empty($post[subject])}-->
		<h2>$post[subject]</h2>
	<!--{/if}-->
	<!--{hook/viewthread_posttop $postcount}-->
	<!--{if $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($_G['thread']['digest'] == 0 && ($post['groupid'] == 4 || $post['groupid'] == 5 || $post['memberstatus'] == '-1')))}-->
		<div class="locked">{lang admin_message_banned}</div>
	<!--{elseif $post['status'] & 1}-->
		<div class="locked">{lang admin_message_single_banned}</div>
	<!--{/if}-->
	<!--{if !$post['first'] && $hiddenreplies && $_G['forum']['ismoderator']}-->
		<div class="locked">{lang message_ishidden_hiddenreplies}</div>
	<!--{/if}-->
	<!--{if $post['first']}--> 
		<!--{if $_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0 && empty($previewspecial)}-->
			<div class="locked"><em class="y"><a href="forum.php?mod=misc&action=viewpayments&tid=$_G[tid]" onclick="showWindow('pay', this.href)">{lang pay_view}</a></em>{lang pay_threads}: <strong>$_G[forum_thread][price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]} </strong></div>
		<!--{/if}-->
		<!--{if $threadsort && $threadsortshow}-->
			<!--{if $threadsortshow['typetemplate']}-->
				$threadsortshow[typetemplate]
			<!--{elseif $threadsortshow['optionlist']}-->
				<div class="typeoption">
					<!--{if $threadsortshow['optionlist'] == 'expire'}-->
						{lang has_expired}
					<!--{else}-->
						<table summary="{lang threadtype_option}" cellpadding="0" cellspacing="0" class="cgtl mbm">
							<caption>$_G[forum][threadsorts][types][$_G[forum_thread][sortid]]</caption>
							<tbody>
								<!--{loop $threadsortshow['optionlist'] $option}-->
									<!--{if $option['type'] != 'info'}-->
										<tr>
											<th>$option[title]:</th>
											<td><!--{if $option['value'] || ($option['type'] == 'number' && $option['value'] !== '')}-->$option[value] $option[unit]<!--{else}-->-<!--{/if}--></td>
										</tr>
									<!--{/if}-->
								<!--{/loop}-->
							</tbody>
						</table>
					<!--{/if}-->
				</div>
			<!--{/if}-->
		<!--{/if}-->
	<!--{/if}-->
	<!--{if $_G['forum_discuzcode']['passwordauthor'][$post[pid]]}-->
		<div class="locked">{lang message_password_exists}</div>
	<!--{/if}-->
	<div class="{if !$_G[forum_thread][special]}t_fsz{else}pcbs{/if}">
		$_G['forum_posthtml']['header'][$post[pid]]
		<!--{if $post['first']}-->
			<!--{if !$_G[forum_thread][special]}-->
				<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_$post[pid]">
				<!--{if !$_G['inajax']}-->
					<!--{if $ad_a_pr}-->
						$ad_a_pr
					<!--{/if}-->
				<!--{/if}-->
				<!--{if !empty($_G['setting']['guesttipsinthread']['flag']) && empty($_G['uid']) && !$post['attachment'] && $_GET['from'] != 'preview'}-->
				<div class="attach_nopermission attach_tips">
					<div>
						<h3><strong>
								<!--{if !empty($_G['setting']['guesttipsinthread']['text'])}-->
								{$_G['setting']['guesttipsinthread']['text']}
								<!--{else}-->
								{lang guesttipsinthread_text}
								<!--{/if}-->
							</strong></h3>
						<p>{lang attach_nopermission_login} <!--{hook/global_login_text}--></p>
					</div>
					<span class="atips_close" onclick="this.parentNode.style.display='none'">x</span>
				</div>
				<!--{/if}-->
				$post[message]</td></tr></table>
			<!--{elseif $_G[forum_thread][special] == 1}-->
				<!--{template forum/viewthread_poll}-->
			<!--{elseif $_G[forum_thread][special] == 2}-->
				<!--{template forum/viewthread_trade}-->
			<!--{elseif $_G[forum_thread][special] == 3}-->
				<!--{template forum/viewthread_reward}-->
			<!--{elseif $_G[forum_thread][special] == 4}-->
				<!--{template forum/viewthread_activity}-->
			<!--{elseif $_G[forum_thread][special] == 5}-->
				<!--{template forum/viewthread_debate}-->
			<!--{elseif $_G[forum_thread][special] == 127}-->
				$threadplughtml
				<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_$post[pid]">$post[message]</td></tr></table>
			<!--{/if}-->
		<!--{else}-->
			<table cellspacing="0" cellpadding="0"><tr><td class="t_f" id="postmessage_$post[pid]">
			<!--{if !$_G['inajax']}-->
				<!--{if $ad_a_pr}-->
					$ad_a_pr
				<!--{/if}-->
			<!--{/if}-->
			<!--{if $post['invisible'] != '-2' || $_G['forum']['ismoderator']}-->$post[message]<!--{else}--><span class="xg1">{lang moderate_need}</span><!--{/if}--></td></tr></table>
		<!--{/if}-->
		$_G['forum_posthtml']['footer'][$post[pid]]

		<!--{if $post['first'] && ($post[tags] || $relatedkeywords) && $_GET['from'] != 'preview'}-->
			<div class="ptg mbm mtn">
				<!--{if $post[tags]}-->
					<!--{eval $tagi = 0;}-->
					<!--{loop $post[tags] $var}-->
						<!--{if $tagi}-->, <!--{/if}--><a title="$var[1]" href="misc.php?mod=tag&id=$var[0]" target="_blank">$var[1]</a>
						<!--{eval $tagi++;}-->
					<!--{/loop}-->
				<!--{/if}-->
				<!--{if $relatedkeywords}--><span>$relatedkeywords</span><!--{/if}-->
			</div>
		<!--{/if}-->

		<!--{if !IS_ROBOT && $post['first'] && !$_G['forum_thread']['archiveid']}-->
			<!--{if !empty($lastmod['modaction'])}--><div class="modact"><a href="forum.php?mod=misc&action=viewthreadmod&tid=$_G[tid]" title="{lang thread_mod}" onclick="showWindow('viewthreadmod', this.href)"><!--{if $lastmod['modactiontype'] == 'REB'}-->{lang thread_mod_recommend_by}<!--{else}-->{lang thread_mod_by}<!--{/if}--></a></div><!--{/if}-->
			<!--{hook/viewthread_modaction}-->
		<!--{/if}-->

		<!--{if $post['attachment'] && $_GET['from'] != 'preview'}-->
			<div class="attach_nopermission attach_tips">
				<div>
					<h3><strong>{lang attach_nopermission_notice}</strong></h3>
					<p><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{elseif $_G['connectguest']}-->{lang attach_nopermission_connect_fill_profile}<!--{else}-->{lang attach_nopermission_login} <!--{hook/global_login_text}--><!--{/if}--></p>
				</div>
				<span class="atips_close" onclick="this.parentNode.style.display='none'">x</span>
			</div>
		<!--{elseif $post['imagelist'] || $post['attachlist']}-->
			<div class="pattl">
				<!--{if $post['imagelist'] && $_G['setting']['imagelistthumb'] && $post['imagelistcount'] >= $_G['setting']['imagelistthumb']}-->
					<!--{if !isset($imagelistkey)}-->
						<!--{eval $imagelistkey = rawurlencode(dsign($_G[tid].'|100|100'))}-->
						<script type="text/javascript" reload="1">var imagelistkey = '$imagelistkey';</script>
					<!--{/if}-->
					<!--{eval $post['imagelistthumb'] = true;}-->
					<div class="bbda cl mtw mbm pbm">
						<strong>{lang more_images}</strong>
						<a href="javascript:;" onclick="attachimglst('$post[pid]', 0)" class="xi2 attl_g">{lang image_small}</a>
						<a href="javascript:;" onclick="attachimglst('$post[pid]', 1, {echo intval($_G['setting']['lazyload'])})" class="xi2 attl_m">{lang image_big}</a>
					</div>
					<div id="imagelist_$post[pid]" class="cl" style="display:none"><!--{echo showattach($post, 1)}--></div>
					<div id="imagelistthumb_$post[pid]" class="pattl_c cl"><img src="{IMGDIR}/loading.gif" width="16" height="16" class="vm" /> {lang image_list_openning}</div>
				<!--{else}-->
					<!--{echo showattach($post, 1)}-->
				<!--{/if}-->
				<!--{if $post['attachlist']}-->
					<!--{echo showattach($post)}-->
				<!--{/if}-->
			</div>
		<!--{/if}-->
		
		<!--{if $_G['setting']['allowfastreply'] && $post['first'] && $fastpost && $allowpostreply && !$_G['forum_thread']['archiveid'] && $_GET['from'] != 'preview'}-->
			<div id="vfastpost" class="fullvfastpost">
				<form method="post" autocomplete="off" id="vfastpostform" action="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&fromvf=1&extra=$_G[gp_extra]&replysubmit=yes{if $_G['gp_ordertype'] != 1}&infloat=yes&handlekey=vfastpost{/if}{if $_G[gp_from]}&from=$_G[gp_from]{/if}" onsubmit="this.message.value = parseurl(this.message.value);ajaxpost('vfastpostform', 'return_reply', 'return_reply', 'onerror');return false;">
					<input type="hidden" name="formhash" value="{FORMHASH}" />
					<table cellspacing="0" cellpadding="0" id="vfastposttb">
						<tr>
							<td id="vf_l"></td>
							<td id="vf_m">
								<input type="text" name="message" id="vmessage" onKeyDown="seditor_ctlent(event, '$(\'vfastpostform\').submit()');"/>
							</td>
							<td id="vf_r"></td>
							<td id="vf_b">
								<button type="submit" class="pn pnc" name="replysubmit" id="vreplysubmit" value="true" style="">post_newreply</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<script type="text/javascript">
				//$('note_{$tid}').focus();
				function succeedhandle_vfastpost(url, message, param) {
					$('vmessage').value = '';
					succeedhandle_fastpost(url, message, param);
					showCreditPrompt();
				}
				var vf_tips = '{lang forum_live_fastreply_notice}';
				$('vmessage').value = vf_tips;
				$('vmessage').style.color = '#CDCDCD';
				$('vmessage').onclick = function() {
					if($('vmessage').value==vf_tips) {
						$('vmessage').value='';
						$('vmessage').style.color="#000";
					}
				}
				$('vmessage').onblur = function() {
					if(!$('vmessage').value) {
						$('vmessage').value=vf_tips;
						$('vmessage').style.color="#CDCDCD";
					}
				}
				$('vreplysubmit').onclick = function() {
					if($('vmessage').value == vf_tips) {
						return false;
					}
				}
			</script>
		<!--{/if}-->
		
	</div>
	<div id="comment_$post[pid]" class="cm">
	<!--{if $_GET['from'] != 'preview' && $_G['setting']['commentnumber'] && !empty($comments[$post[pid]])}-->
		<h3 class="psth xs1"><span class="icon_ring vm"></span>{lang comments}</h3>
		<!--{if $totalcomment[$post[pid]]}--><div class="pstl">$totalcomment[$post[pid]]</div><!--{/if}-->
		<!--{loop $comments[$post[pid]] $comment}-->
			<div class="pstl xs1 cl">
				<div class="psta vm">
					<a href="home.php?mod=space&uid=$comment[authorid]" c="1">$comment[avatar]</a>
					<!--{if $comment['authorid']}-->
						<a href="home.php?mod=space&uid=$comment[authorid]" class="xi2 xw1">$comment[author]</a>
						<!--{else}-->
						{lang guest}
					<!--{/if}-->
				</div>
				<div class="psti">
					$comment[comment]&nbsp;
					<!--{if $comment[rpid]}-->
						<a href="forum.php?mod=redirect&goto=findpost&pid=$comment[rpid]&ptid=$_G[tid]" class="xi2">{lang detail}</a>
						<a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$comment[rpid]&extra=$_GET[extra]&page=$page{if $_GET[from]}&from=$_GET[from]{/if}" class="xi2" onclick="showWindow('reply', this.href)">{lang reply}</a>
					<!--{/if}-->
					<span class="xg1">
						{lang poston} <!--{date($comment[dateline], 'u')}-->
						<!--{if $comment['useip'] && $_G['group']['allowviewip']}-->&nbsp;IP:$comment[useip]<!--{/if}-->
						<!--{if $_G['forum']['ismoderator'] && $_G['group']['allowdelpost']}-->&nbsp;<a href="javascript:;" onclick="modaction('delcomment', $comment[id])">{lang delete}</a><!--{/if}-->
					</span>
				</div>
			</div>
		<!--{/loop}-->
		<!--{if $commentcount[$post[pid]] > $_G['setting']['commentnumber']}--><div class="pgs mbm mtn cl"><div class="pg"><a href="javascript:;" class="nxt" onclick="ajaxget('forum.php?mod=misc&action=commentmore&tid=$post[tid]&pid=$post[pid]&page=2', 'comment_$post[pid]')">{lang next_page}</a></div></div><!--{/if}-->
	<!--{/if}-->
	</div>

	<!--{if $_GET['from'] != 'preview' && !empty($post['ratelog'])}-->
		<h3 class="psth xs1"><span class="icon_ring vm"></span>{lang rate}</h3>
		<dl id="ratelog_$post[pid]" class="rate{if !empty($_G['cookie']['ratecollapse'])} rate_collapse{/if}">
			<!--{if $_G['setting']['ratelogon']}-->
				<dd style="margin:0">
			<!--{else}-->
				<dt>
					<!--{if !empty($postlist[$post[pid]]['totalrate'])}-->
						<strong><a href="forum.php?mod=misc&action=viewratings&tid=$_G[tid]&pid=$post[pid]" onclick="showWindow('viewratings', this.href)" title="{lang have}{echo count($postlist[$post[pid]][totalrate]);}{lang people_score}, {lang rate_view}"><!--{echo count($postlist[$post[pid]][totalrate]);}--></a></strong>
						<p><a href="forum.php?mod=misc&action=viewratings&tid=$_G[tid]&pid=$post[pid]" onclick="showWindow('viewratings', this.href)">{lang rate_view}</a></p>
					<!--{/if}-->
				</dt>
				<dd>
			<!--{/if}-->
				<div id="post_rate_$post[pid]"></div>
				<!--{if $_G['setting']['ratelogon']}-->
					<table class="ratl">
						<tr>
							<th class="xw1" width="120"><a href="forum.php?mod=misc&action=viewratings&tid=$_G[tid]&pid=$post[pid]" onclick="showWindow('viewratings', this.href)" title="{lang rate_view}"> {lang number_of_participants} <span class="xi1"><!--{echo count($postlist[$post[pid]][totalrate]);}--></span></a></th>
							<!--{loop $post['ratelogextcredits'] $id $score}-->
								<!--{if $score > 0}-->
									<th class="xw1" width="80">{$_G['setting']['extcredits'][$id][title]} <i><span class="xi1">+$score</span></i></th>
								<!--{else}-->
									<th class="xw1" width="80">{$_G['setting']['extcredits'][$id][title]} <i><span class="xi1">$score</span></i></th>
								<!--{/if}-->
							<!--{/loop}-->
							<th>
								<a href="javascript:;" onclick="toggleRatelogCollapse('ratelog_$post[pid]', this);" class="y xi2 op"><!--{if !empty($_G['cookie']['ratecollapse'])}-->{lang open}<!--{else}-->{lang pack}<!--{/if}--></a>
								<i class="txt_h">{lang reason}</i>
							</th>
						</tr>
						<tbody class="ratl_l">
							<!--{loop $post['ratelog'] $uid $ratelog}-->
							<tr id="rate_{$post[pid]}_{$uid}">
								<td>
									<a href="home.php?mod=space&uid=$uid" target="_blank"><!--{echo avatar($uid, 'small');}--></a> <a href="home.php?mod=space&uid=$uid" target="_blank">$ratelog[username]</a>
								</td>
								<!--{loop $post['ratelogextcredits'] $id $score}-->
									<!--{if $ratelog['score'][$id] > 0}-->
										<td class="xi1"> + $ratelog[score][$id]</td>
									<!--{else}-->
										<td class="xg1">$ratelog[score][$id]</td>
									<!--{/if}-->
								<!--{/loop}-->
								<td class="xg1">$ratelog[reason]</td>
							</tr>
							<!--{/loop}-->
						</tbody>
					</table>
					<p class="ratc">
						<a href="forum.php?mod=misc&action=viewratings&tid=$_G[tid]&pid=$post[pid]" onclick="showWindow('viewratings', this.href)" title="{lang rate_view}" class="xi2">{lang rate_view}</a>
					</p>
				<!--{else}-->
					<ul class="cl">
						<!--{loop $post['ratelog'] $uid $ratelog}-->
							<li>
								<p id="rate_{$post[pid]}_{$uid}" onmouseover="showTip(this)" tip="<strong>$ratelog[reason]</strong>&nbsp;
										<!--{loop $ratelog['score'] $id $score}-->
											<!--{if $score > 0}-->
												<em class='xi1'>{$_G['setting']['extcredits'][$id][title]} + $score $_G['setting']['extcredits'][$id][unit]</em>
											<!--{else}-->
												<span>{$_G['setting']['extcredits'][$id][title]} $score $_G['setting']['extcredits'][$id][unit]</span>
											<!--{/if}-->
										<!--{/loop}-->" class="mtn mbn"><a href="home.php?mod=space&uid=$uid" target="_blank" class="avt"><!--{echo avatar($uid, 'small');}--></a></p>
								<p><a href="home.php?mod=space&uid=$uid" target="_blank">$ratelog[username]</a></p>
							</li>
						<!--{/loop}-->
					</ul>
				<!--{/if}-->
			</dd>
		</dl>
	<!--{else}-->
		<div id="post_rate_div_$post[pid]"></div>
	<!--{/if}-->
	<!--{/if}-->
	<!--{hook/viewthread_postbottom $postcount}-->
</div>
