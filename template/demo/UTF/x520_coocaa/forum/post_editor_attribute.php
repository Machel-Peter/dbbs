<?php echo '草根吧商业模板保护！下载获取正版模板请访问草根吧官网：www.caogen8.co';exit;?>
<div id="post_extra" class="ptm cl post_tag">
	<div id="post_extra_tb" class="cl" onselectstart="return false">
		<label id="extra_additional_b" onclick="showExtra('extra_additional')"><span id="extra_additional_chk">{lang post_additional_options}</span></label>
		<!--{if $_GET[action] == 'newthread' || $_GET[action] == 'edit' && $isfirstpost}-->
			<!--{if $_G['group']['allowsetreadperm']}-->
				<label id="extra_readperm_b" onclick="showExtra('extra_readperm')"><span id="extra_readperm_chk">{lang readperm}</span></label>
			<!--{/if}-->
			<!--{if $_G['group']['allowreplycredit'] && !in_array($special, array(2, 3))}-->
				<!--{if $_GET[action] == 'newthread'}-->
					<!--{eval $extcreditstype = $_G['setting']['creditstransextra'][10];}-->
				<!--{else}-->
					<!--{eval $extcreditstype = $replycredit_rule['extcreditstype'] ? $replycredit_rule['extcreditstype'] : $_G['setting']['creditstransextra'][10];}-->
				<!--{/if}-->
				<!--{eval $userextcredit = getuserprofile('extcredits'.$extcreditstype);}-->
				<!--{if ($_GET[action] == 'newthread' && $userextcredit > 0) || ($_GET[action] == 'edit' && $isorigauthor && isfirstpost)}-->
					<label id="extra_replycredit_b" onclick="showExtra('extra_replycredit')"><span id="extra_replycredit_chk">{lang replycredit}</span></label>
				<!--{/if}-->
			<!--{/if}-->
			<!--{if ($_GET[action] == 'newthread' && $_G['group']['allowpostrushreply'] && $special != 2) || ($_GET[action] == 'edit' && getstatus($thread['status'], 3))}-->
				<label id="extra_rushreplyset_b" onclick="showExtra('extra_rushreplyset')"><span id="extra_rushreplyset_chk">{lang rushreply_thread}</span></label>
			<!--{/if}-->
			<!--{if $_G['group']['maxprice'] && !$special}-->
				<label id="extra_price_b" onclick="showExtra('extra_price')"><span id="extra_price_chk">{lang thread_pricepay}</span></label>
			<!--{/if}-->
			<!--{if $_G['group']['allowsetpublishdate'] && ($_GET[action] == 'newthread' || ($_GET[action] == 'edit' && $isfirstpost && $thread['displayorder'] == -4))}-->
				<label id="extra_pubdate_b" onclick="showExtra('extra_pubdate')"><span id="extra_pubdate_chk">{lang post_timer}</span></label>
			<!--{/if}-->
		<!--{/if}-->
		<!--{hook/post_attribute_extra}-->
	</div>

	<div id="post_extra_c">
		<!--{if $_GET[action] == 'newthread' || $_GET[action] == 'edit' && $isfirstpost}-->
			<!--{if !empty($userextcredit)}-->
				<div id="extra_replycredit_c" class="exfm cl" style="display: none;">
					<div><label>{lang replycredit_once} <input type="text" name="replycredit_extcredits" id="replycredit_extcredits" class="px pxs vm" value="{if $replycredit_rule['extcredits'] && $thread['replycredit'] > 0}{$replycredit_rule['extcredits']}{else}0{/if}" onkeyup="javascript:getreplycredit();" onblur="extraCheck(0)" /> {$_G['setting']['extcredits'][$extcreditstype][unit]}{$_G['setting']['extcredits'][$extcreditstype][title]}</label><span class="xg1">{lang replycredit_empty}</span> , <label>{lang replycredit_reward} <input type="text" name="replycredit_times" id="replycredit_times" class="px pxs vm" value="{if $replycredit_rule['lasttimes']}{$replycredit_rule['lasttimes']}{else}1{/if}" onkeyup="javascript:getreplycredit();"  onblur="extraCheck(0)" /> {lang replycredit_time}</label>, <label>{lang replycredit_member} <select id="replycredit_membertimes" name="replycredit_membertimes" class="ps vm">
					<!--{eval for($i=1;$i<11;$i++) {;}-->
					<option value="$i"{if $replycredit_rule['membertimes'] == $i} selected="selected"{/if}>$i</option>
					<!--{eval };}-->
					</select> {lang replycredit_time}</label>, <label>{lang replycredit_rate} <select id="replycredit_random" name="replycredit_random" class="ps vm">
					 <!--{eval for($i=100;$i>9;$i=$i-10) {;}-->
					<option value="$i"{if $replycredit_rule['random'] == $i} selected="selected"{/if}>$i</option>
					<!--{eval };}-->
					</select> %</label></div>
					<div class="xg1">{lang replycredit_total} <span id="replycredit_sum"><!--{if $thread['replycredit']}-->{$thread['replycredit']}<!--{else}-->0<!--{/if}--></span> {$_G['setting']['extcredits'][$extcreditstype][unit]}{$_G['setting']['extcredits'][$extcreditstype][title]}<!--{if $thread['replycredit']}--><span class="xg1">({lang replycredit_however} {$thread['replycredit']} {$_G['setting']['extcredits'][$extcreditstype][unit]}{$_G['setting']['extcredits'][$extcreditstype][title]})</span><!--{/if}-->, <span id="replycredit">{lang replycredit_revenue} {$_G['setting']['extcredits'][$extcreditstype][title]} 0</span> {$_G['setting']['extcredits'][$extcreditstype][unit]}, {lang you_have} {$_G['setting']['extcredits'][$extcreditstype][title]} $userextcredit {$_G['setting']['extcredits'][$extcreditstype][unit]}</div>
				</div>
			<!--{/if}-->

			<!--{if $_G['group']['allowsetreadperm']}-->
				<div id="extra_readperm_c" class="exfm cl" style="display:none">
					<table cellspacing="0" cellpadding="0">
						<tr>
							<td class="xw1">{lang readperm}</td>
							<td>
								<select name="readperm" id="readperm" class="ps" style="width:90px" onchange="extraCheck(1)">
									<option value="">{lang unlimited}</option>
									<!--{loop $_G['cache']['groupreadaccess'] $val}-->
										<option value="$val[readaccess]" title="{lang readperm}: $val[readaccess]"{if $thread['readperm'] == $val[readaccess]} selected="selected"{/if}>$val[grouptitle]</option>
									<!--{/loop}-->
									<option value="255"{if $thread['readperm'] == 255} selected="selected"{/if}>{lang highest_right}</option>
								</select>
								<span class="xg1">{lang post_select_usergroup_readacces}</span>
							</td>
						</tr>
					</table>
				</div>
			<!--{/if}-->

			<!--{if $_G['group']['maxprice'] && !$special}-->
				<div id="extra_price_c" class="exfm cl" style="display:none">
					{lang price}:
					<input type="text" id="price" name="price" class="px pxs" value="$thread[pricedisplay]" onblur="extraCheck(2)" /> {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}
					<span class="xg1">({lang post_price_comment})</span>
					<!--{if $_G['group']['maxprice'] && ($_GET[action] == 'newthread' || $_GET[action] == 'edit' && $isfirstpost)}-->
						<!--{if $_G['setting']['maxincperthread']}--><p class="xg1">{lang post_price_income_comment}</p><!--{/if}-->
						<!--{if $_G['setting']['maxchargespan']}--><p class="xg1">{lang post_price_charge_comment}<!--{if $_GET[action] == 'edit' && $freechargehours}-->{lang post_price_free_chargehours}<!--{/if}--></p><!--{/if}-->
					<!--{/if}-->
				</div>
			<!--{/if}-->

			

			<!--{if ($_GET[action] == 'newthread' && $_G['group']['allowpostrushreply'] && $special != 2) || ($_GET[action] == 'edit' && getstatus($thread['status'], 3))}-->
				<div class="exfm cl" id="extra_rushreplyset_c" style="display: none;">
					<div class="sinf sppoll z">
						<dl>
							<dt><span style="width: 4em">&nbsp;</span></dt>
							<dd><label for="rushreply"><input type="checkbox" name="rushreply" id="rushreply" class="pc vm" value="1" {if $_GET[action] == 'edit' && getstatus($thread['status'], 3)}disabled="disabled" checked="checked"{/if} onclick="extraCheck(3)" /> {lang rushreply_change}</label></dd>
							<dt><label>{lang rushreply_time}</label></dt>
							<dd>
								<div>
									<input type="text" name="rushreplyfrom" id="rushreplyfrom" class="px" onclick="showcalendar(event, this, true)" autocomplete="off" value="$postinfo[rush][starttimefrom]" onkeyup="$('rushreply').checked = true;" /><span> ~ </span><input type="text" onclick="showcalendar(event, this, true)" autocomplete="off" id="rushreplyto" name="rushreplyto" class="px" value="$postinfo[rush][starttimeto]" onkeyup="$('rushreply').checked = true;" />
								</div>
							</dd>
							<dt><label>{lang rushreply_rewardfloor}</label></dt>
							<dd>
								<input type="text" name="rewardfloor" id="rewardfloor" class="px oinf" value="$postinfo[rush][rewardfloor]" onkeyup="$('rushreply').checked = true;" />
								<p class="xg1">{lang rushreply_rewardfloor_comment}</p>
							</dd>
						</dl>
					</div>
					<div class="sadd z">
						<dl>
							<dt>&nbsp;</dt>
							<dd>&nbsp;</dd>
							<dt><label for="stopfloor">{lang stopfloor}: </label></dt>
							<dd>
								<input type="text" name="replylimit" id="replylimit" class="px" autocomplete="off" value="$postinfo[rush][replylimit]" onkeyup="$('rushreply').checked = true;" /> <span class="xg1">{lang replylimit}</span>
							</dd>
							<dt><label for="stopfloor">{lang rushreply_end}</label></dt>
							<dd>
								<input type="text" name="stopfloor" id="stopfloor" class="px" autocomplete="off" value="$postinfo[rush][stopfloor]" onkeyup="$('rushreply').checked = true;" />
							</dd>
							<dt><label for="creditlimit"><!--{if $_G['setting']['creditstransextra'][11]}-->{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][11]][title]}<!--{else}-->{lang credits}<!--{/if}-->{lang min_limit}:</label></dt>
							<dd>
								<input type="text" name="creditlimit" id="creditlimit" class="px" autocomplete="off" value="$postinfo[rush][creditlimit]" onkeyup="$('rushreply').checked = true;" />
								<p class="xg1"><!--{if $_G['setting']['creditstransextra'][11]}-->({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][11]][title]})<!--{else}-->{lang total_credits}<!--{/if}-->{lang post_rushreply_credit}</p>
							</dd>
						</dl>
					</div>
				</div>
			<!--{/if}-->
			<!--{if $_G['group']['allowsetpublishdate'] && ($_GET[action] == 'newthread' || ($_GET[action] == 'edit' && $isfirstpost && $thread['displayorder'] == -4))}-->
				<div class="exfm cl" id="extra_pubdate_c" style="display: none;">
					<label><input type="checkbox" name="cronpublish" onclick="if(this.checked) {$('cronpublishdate').click();doane(event,false);};extraCheck(5);hidenFollowBtn(this.checked);" id="cronpublish" value="true" class="pc"{if $cronpublish} checked="checked"{/if} />{lang post_timer}</label>
					<input type="text" name="cronpublishdate" id="cronpublishdate" class="px" onclick="showcalendar(event, this, true, false, false, true);" autocomplete="off" value="{$cronpublishdate}" onchange="if(this.value) $('cronpublish').checked = true;">
				</div>
			<!--{/if}-->
		<!--{/if}-->

		<div class="exfm cl" id="extra_additional_c" style="display: none;">
			<table cellspacing="0" cellpadding="0">
				<tr>
					<td class="xw1" valign="top">{lang basic_attr}</td>
					<td>
						<!--{if $_GET[action] != 'edit'}-->
							<!--{if $_G['group']['allowanonymous']}--><label for="isanonymous"><input type="checkbox" name="isanonymous" id="isanonymous" class="pc" value="1" />{lang post_anonymous}</label><!--{/if}-->
						<!--{else}-->
							<!--{if $_G['group']['allowanonymous'] || (!$_G['group']['allowanonymous'] && $orig['anonymous'])}--><label for="isanonymous"><input type="checkbox" name="isanonymous" id="isanonymous" class="pc" value="1" {if $orig['anonymous']}checked="checked"{/if} />{lang post_anonymous}</label><!--{/if}-->
						<!--{/if}-->

						<!--{if $_GET[action] == 'newthread' || $_GET[action] == 'edit' && $isfirstpost}-->
							<label for="hiddenreplies"><input type="checkbox" name="hiddenreplies" id="hiddenreplies" class="pc"{if $thread['hiddenreplies']} checked="checked"{/if} value="1">{lang hiddenreplies}</label>
						<!--{/if}-->
						<!--{if $_G['uid'] && ($_GET[action] == 'newthread' || $_GET[action] == 'edit' && $isfirstpost) && $special != 3}-->
							<label for="ordertype"><input type="checkbox" name="ordertype" id="ordertype" class="pc" value="1" $ordertypecheck />{lang post_descviewdefault}</label>
						<!--{/if}-->
						<!--{if ($_GET[action] == 'newthread' || $_GET[action] == 'edit' && $isfirstpost)}-->
							<label for="allownoticeauthor"><input type="checkbox" name="allownoticeauthor" id="allownoticeauthor" class="pc" value="1"{if $allownoticeauthor} checked="checked"{/if} />{lang post_noticeauthor}</label>
						<!--{/if}-->
						<!--{if $_GET[action] != 'edit' && helper_access::check_module('feed') && $_G['forum']['allowfeed']}-->
							<label for="addfeed"><input type="checkbox" name="addfeed" id="addfeed" class="pc" value="1" $addfeedcheck>{lang addfeed}</label>
						<!--{/if}-->
						<label for="usesig"><input type="checkbox" name="usesig" id="usesig" class="pc" value="1" {if !$_G['group']['maxsigsize']}disabled {else}$usesigcheck {/if}/>{lang post_show_sig}</label>
					</td>
				</tr>
				<tr>
					<td class="xw1" valign="top">{lang text_feature}</td>
					<td>
						<!--{if ($_G['forum']['allowhtml'] || ($_GET[action] == 'edit' && ($orig['htmlon'] & 1))) && $_G['group']['allowhtml']}-->
							<label for="htmlon"><input type="checkbox" name="htmlon" id="htmlon" class="pc" value="1" $htmloncheck />{lang post_html}</label>
						<!--{else}-->
							<label for="htmlon"><input type="checkbox" name="htmlon" id="htmlon" class="pc" value="0" $htmloncheck disabled="disabled" />{lang post_html}</label>
						<!--{/if}-->
						<label for="allowimgcode"><input type="checkbox" id="allowimgcode" class="pc" disabled="disabled"{if $_G['forum']['allowimgcode']} checked="checked"{/if} />{lang post_imgcode}</label>
						<!--{if $_G['forum']['allowimgcode']}-->
							<label for="allowimgurl"><input type="checkbox" id="allowimgurl" class="pc" checked="checked" />{lang post_imgurl}</label>
						<!--{/if}-->
						<label for="parseurloff"><input type="checkbox" name="parseurloff" id="parseurloff" class="pc" value="1" $urloffcheck />{lang disable}{lang post_parseurl}</label>
						<label for="smileyoff"><input type="checkbox" name="smileyoff" id="smileyoff" class="pc" value="1" $smileyoffcheck />{lang disable}{lang smilies}</label>
						<label for="bbcodeoff"><input type="checkbox" name="bbcodeoff" id="bbcodeoff" class="pc" value="1" $codeoffcheck />{lang disable}{lang discuzcode}</label>
						<!--{if $_G['group']['allowimgcontent']}-->
							<label for="imgcontent"><input type="checkbox" name="imgcontent" id="imgcontent" class="pc" value="1" $imgcontentcheck onclick="switchEditor(this.checked?0:1);$('e_switchercheck').checked=this.checked;" />{lang content_to_pic}</label>
						<!--{else}-->
							<label for="imgcontent"><input type="checkbox" name="imgcontent" id="imgcontent" class="pc" value="0" $imgcontentcheck disabled="disabled"/>{lang content_to_pic}</label>
						<!--{/if}-->
					</td>
				</tr>
				<!--{if $_GET[action] == 'newthread' && $_G['forum']['ismoderator'] && ($_G['group']['allowdirectpost'] || !$_G['forum']['modnewposts'])}-->
					<!--{if $_GET[action] == 'newthread' && $_G['forum']['ismoderator'] && ($_G['group']['allowdirectpost'] || !$_G['forum']['modnewposts']) && ($_G['group']['allowstickthread'] || $_G['group']['allowdigestthread'])}-->
						<tr>
							<td class="xw1" valign="top">{lang manage_operation}</td>
							<td>
								<!--{if $_G['group']['allowstickthread']}-->
									<label for="sticktopic"><input type="checkbox" name="sticktopic" id="sticktopic" class="pc" value="1" $stickcheck />{lang post_stick_thread}</label>
								<!--{/if}-->
								<!--{if $_G['group']['allowdigestthread']}-->
									<label for="addtodigest"><input type="checkbox" name="addtodigest" id="addtodigest" class="pc" value="1" $digestcheck />{lang post_digest_thread}</label>
								<!--{/if}-->
							</td>
						</tr>
					<!--{/if}-->
				<!--{elseif $_GET[action] == 'edit' && $_G['forum_auditstatuson']}-->
					<tr>
						<td class="xw1" valign="top">{lang manage_operation}</td>
						<td>
							<label for="audit"><input type="checkbox" name="audit" id="audit" class="pc" value="1">{lang auditstatuson}</label>
						</td>
					</tr>
				<!--{/if}-->
				<!--{if $_GET[action] == 'edit' && $isorigauthor && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost) && !$rushreply && $_G['setting']['editperdel']}-->
					<tr>
						<td class="xw1" valign="top">{lang post_delpost}</td>
						<td>
							<button type="button" class="pn xi1" onclick="deleteThread();"><span>{lang post_delpost}</span></button>
							<input type="hidden" name="delete" id="delete" value="0" />
							{lang del_thread_warning}<!--{if $thread[special] == 3}-->, {lang reward_price_back}<!--{/if}-->
						</td>
					</tr>
				<!--{/if}-->
			</table>
		</div>

		<!--{hook/post_attribute_extra_body}-->
	</div>
</div>
