<?php echo '草根吧商业模板保护！下载获取正版模板请访问草根吧官网：www.caogen8.co';exit;?>
<!--{eval $_G['home_tpl_titles'] = array('{lang pm}');}-->
<!--{template common/header}-->
<div id="pt" class="bm cl">
	<div class="z">
		<a href="./" class="nvhm" title="{lang homepage}">$_G[setting][bbname]</a> <em>&rsaquo;</em>
		<span>{lang prompt}</span> <em>&rsaquo;</em>
		<a href="home.php?mod=space&do=pm">{lang news}</a>
	</div>
</div>

<style id="diy_style" type="text/css"></style>
<div class="wp">
	<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>

<div id="ct" class="ct2_a wp cl">
	<div class="mn">
		<div class="bm bw0">
			<h1 class="mt"><img alt="pm" src="{STATICURL}image/feed/pm.gif" class="vm" /> {lang news}</h1>
			<ul class="tb cl">
				<li class="y"><a href="home.php?mod=space&do=pm&subop=setting" class="xi2">{lang pm_setting}</a></li>
				<li$actives[privatepm] $actives[newpm]><a href="home.php?mod=space&do=pm&filter=privatepm">{lang private_pm}</a></li>
				<li$actives[announcepm]><a href="home.php?mod=space&do=pm&filter=announcepm">{lang announce_pm}</a></li>
				<li><a href="home.php?mod=spacecp&ac=pm">{lang send_pm}</a></li>
			</ul>

			<!--{if ($filter == 'privatepm' && $newpm) || $filter == 'newpm'}-->
			<div class="tbms mtm mbm">
				<!--{if $filter != 'newpm'}-->
					<a href="home.php?mod=space&do=pm&filter=newpm" class="xi2">{lang view_newpm}</a>
				<!--{else}-->
					<a href="home.php?mod=space&do=pm&filter=privatepm" class="xi2">{lang view_privatepm}</a>
				<!--{/if}-->
			</div>
			<!--{/if}-->

			<!--{if $_GET['subop'] == 'view'}-->

				<!--{if !$type && $plid}-->
					<div class="tbmu pml pm_op_r cl">
						<div class="y pm_o">
							<a href="javascript:;" id="pm_operation" class="o" onmouseover="showMenu({'ctrlid':this.id, 'pos':'34'})">{lang menu}</a>
							<div id="pm_operation_menu" class="p_pop" style="display: none;">
								<ul>
									<li><a href="home.php?mod=spacecp&ac=pm&op=delete&deletepm_delplid[]=$plid&plid=$plid&handlekey=pmdeletehk_{$plid}" id="a_pmdelete_$plid" onclick="showWindow(this.id, this.href, 'get', 0);" title="{lang delete_privatepm_user}">{lang pm_delete_all}</a></li>
								</ul>
							</div>
						</div>
						<a href="home.php?mod=spacecp&ac=pm&op=export&plid=$plid" class="xw1">[{lang pm_export}]</a>
					</div>
				<!--{elseif $touid}-->
					<div class="tbmu pml pm_op_r cl">
						<div class="y pm_o">
							<a href="javascript:;" id="pm_operation" class="o" onmouseover="showMenu({'ctrlid':this.id, 'pos':'34'})">{lang menu}</a>
							<div id="pm_operation_menu" class="p_pop" style="display: none;">
								<ul>
									<li><a href="home.php?mod=spacecp&ac=pm&op=delete&deletepm_deluid[]=$touid&uid=$touid&handlekey=pmdeletehk_{$plid}" id="a_pmdelete_$plid" onclick="showWindow(this.id, this.href, 'get', 0);" title="{lang delete_privatepm_user}">{lang pm_delete_all}</a></li>
								</ul>
							</div>
						</div>
						<div class="xw1">
							{lang pm_totail}
							<a href="home.php?mod=spacecp&ac=pm&op=export&touid=$touid">[{lang pm_export}]</a>
						</div>
					</div>
				<!--{else}-->
					<div class="tbmu pml pm_op_r cl{if $list && $daterange && !$touid} bw0{/if}">
						<div class="y pm_o">
							<a href="javascript:;" id="pm_operation" class="o" onmouseover="showMenu({'ctrlid':this.id, 'pos':'34'})">{lang menu}</a>
							<div id="pm_operation_menu" class="p_pop" style="display: none;">
								<ul>
									<!--{if $founderuid == $_G[uid]}-->
									<li><a href="home.php?mod=spacecp&ac=pm&op=delete&deletepm_delplid[]=$plid&plid=$plid&handlekey=pmdeletehk_{$plid}" id="a_pmdelete_$plid" onclick="showWindow(this.id, this.href, 'get', 0);" title="{lang delete_chatpm_comment}">{lang delete_chatpm}</a></li>
									<!--{else}-->
									<li><a href="home.php?mod=spacecp&ac=pm&op=delete&deletepm_quitplid[]=$plid&plid=$plid&handlekey=pmdeletehk_{$plid}" id="a_pmdelete_$plid" onclick="showWindow(this.id, this.href, 'get', 0);" title="{lang quit_chatpm_comment}">{lang quit_chatpm}</a></li>
									<!--{/if}-->
								</ul>
							</div>
						</div>
						<a href="home.php?mod=space&do=pm&subop=view&plid=$plid&type=1&daterange=2"{if $list && $daterange && !$touid} class="a"{/if}>{lang pm_group_index}</a>
						<span class="pipe">|</span>
						<a href="home.php?mod=space&do=pm&subop=view&plid=$plid&type=1#last"{if $list && !$daterange} class="a"{/if}>{lang pm_group_record}</a>
						<span class="pipe">|</span>
						<a href="home.php?mod=space&do=pm&subop=view&chatpmmember=1&plid=$plid&type=1" id="a_pmdelete_$plid"{if $chatpmmemberlist && !$daterange} class="a"{/if} $actives[chatpmmember]><!--{if $authorid == $_G['uid']}-->{lang pm_group_admin}<!--{else}-->{lang pm_group_member_list}<!--{/if}--></a>
						<span class="pipe">|</span>
						<a href="home.php?mod=spacecp&ac=pm&op=export&plid=$plid&type=1" class="xw1">[{lang pm_export}]</a>
					</div>
				<!--{/if}-->

				<!--{if $list && $daterange && !$touid}-->
					<!--{if empty($lastanchor)}--><a name="last"></a><!--{eval $lastanchor=1;}--><!--{/if}-->
					<div class="pm_g cl">
						<h2 class="mbm xs2"><span class="xi1">$membernum</span> {lang pm_members_message} : <span class="xi2">$subject</span></h2>
						<div class="pm_sd">
							<ul class="pm_mem_l{if $authorid == $_G['uid']} pm_admin{/if}">
							<!--{loop $chatpmmemberlist $key $value}-->
								<li><a href="home.php?mod=space&uid=$value[uid]" target="_blank" {if $ols[$value[uid]]} class="xi2" title="{lang online}"{else} class="xg1"{/if}>$value[username]</a></li>
							<!--{/loop}-->
							</ul>
							<!--{if $authorid == $_G['uid']}-->
								<div class="pm_add cl">
									<input type="text" name="username" id="username" class="px z" value="" />
									<span class="z">&nbsp;</span>
									<a href="home.php?mod=spacecp&ac=pm&op=appendmember&plid=$plid" id="a_appendmember" class="pn z" title="{lang appendchatpmmember_comment}" onclick="getchatpmappendmember();"><span>+</span></a>
								</div>
							<!--{/if}-->
						</div>
						<div class="pm_mn">
							<div id="msglist" class="pm_b">
							<!--{loop $list $key $value}-->
								<p class="xg1 mbn"><a href="home.php?mod=space&uid=$value[authorid]" target="_blank" class="xi2">$value[author]</a> &nbsp; <!--{date($value[dateline], 'u')}--></p>
								<p class="mbm">$value[message]</p>
							<!--{/loop}-->
							</div>
							<script type="text/javascript">
							var refresh = true;
							var refreshHandle = -1;
							var autorefresh = {$refreshtime};
							</script>
							<script type="text/javascript">var forumallowhtml = 0,allowhtml = 0,allowsmilies = true,allowbbcode = parseInt('{$_G[group][allowsigbbcode]}'),allowimgcode = parseInt('{$_G[group][allowsigimgcode]}');var DISCUZCODE = [];DISCUZCODE['num'] = '-1';DISCUZCODE['html'] = [];</script>
							<script type="text/javascript" src="{$_G[setting][jspath]}bbcode.js?{VERHASH}"></script>
							<script type="text/javascript">
								var msgListObj = $('msglist');
								msgListObj.scrollTop = msgListObj.scrollHeight;
								function succeedhandle_pmsend(url, msg, values) {
									var pObj = document.createElement("p");
									pObj.className = 'xg1 mbn';
									pObj.innerHTML = '<a href="home.php?mod=space&uid=$_G[uid]" target="_blank" class="xi2">$_G[username]</a> &nbsp;'+ "{lang just_now}";
									var pObjmsg = document.createElement("p");
									pObjmsg.className = 'mbm';
									var pmMsg = $('replymessage');
									pObjmsg.innerHTML = bbcode2html(parseurl(pmMsg.value));
									msgListObj.appendChild(pObj);
									msgListObj.appendChild(pObjmsg);
									msgListObj.scrollTop = msgListObj.scrollHeight;
									pmMsg.value = "";
									showCreditPrompt();
								}

								function refreshMsg(refreshnow) {
									if(refresh) {
										if(autorefresh <= 0 || refreshnow){
											var x = new Ajax();
											x.get('home.php?mod=spacecp&ac=pm&op=showchatmsg&inajax=1&daterange=$daterange&plid=$plid', function(s){
												msgListObj.innerHTML = s;
												msgListObj.scrollTop = msgListObj.scrollHeight;
											});
											autorefresh = {$refreshtime};
										}
										<!--{if $refreshtime}-->
										$('refreshtip').innerHTML = autorefresh + ' {lang next_refresh}';
										<!--{/if}-->
										autorefresh -= 2;
									} else {
										window.clearInterval(refreshHandle);
									}
								}
								<!--{if $refreshtime}-->
								refreshHandle = window.setInterval('refreshMsg(0);', 2000);
								<!--{/if}-->
								hideMenu();
							</script>
						<!--/div/div-->
				<!--{elseif $list && !$daterange}-->
					<div id="pm_ul" class="xld xlda mbm pml">
						<!--{loop $list $key $value}-->
							<!--{subtemplate home/space_pm_node}-->
						<!--{/loop}-->
						<div id="pm_append" style="display: none"></div>
					</div>
					<!--{if $multi}--><div class="pbm bbda cl">$multi</div><!--{/if}-->
				<!--{elseif $chatpmmemberlist}-->
					<!--{if $authorid == $_G['uid']}-->
						<div class="tbmu mtn tfm pmform cl">
							<script type="text/javascript" src="{$_G[setting][jspath]}home_friendselector.js?{VERHASH}"></script>
							<script type="text/javascript">
								var fs;
								var clearlist = 0;
							</script>
							<div class="cl">
								<div class="un_selector px z cl" onclick="$('username').focus();">
									<input type="text" name="username" id="username" autocomplete="off" />
								</div>
								<a href="home.php?mod=spacecp&ac=pm&op=appendmember&plid=$plid" id="a_appendmember" class="pn appendmb z" title="{lang appendchatpmmember_comment}" onclick="getchatpmappendmember();"><span class="z">{lang appendchatpmmember}</span></a>
								<a href="javascript:;" id="showSelectBox" class="z mtn showmenu" onclick="showMenu({'showid':this.id, 'duration':3, 'pos':'34!'});fs.showPMFriend('showSelectBox_menu','selectorBox', this);" title="{lang selectfromfriendlist}">{lang select_friend}</a>
							</div>
							<p class="d">{lang sendpm_tip}</p>
						</div>
						<div id="username_menu" style="display: none;">
							<ul id="friends" class="pmfrndl"></ul>
						</div>
						<div class="p_pof" id="showSelectBox_menu" unselectable="on" style="display:none;">
							<div class="pbm">
								<select class="ps" onchange="clearlist=1;getUser(1, this.value)">
									<option value="-1">{lang invite_all_friend}</option>
									<!--{loop $friendgrouplist $groupid $group}-->
										<option value="$groupid">$group</option>
									<!--{/loop}-->
								</select>
							</div>
							<div id="selBox" class="ptn pbn">
								<ul id="selectorBox" class="xl xl2 cl"></ul>
							</div>
							<div class="cl">
								<button type="button" class="y pn" onclick="fs.showPMFriend('showSelectBox_menu','selectorBox', $('showSelectBox'));doane(event)"><span>{lang close}</span></button>
							</div>
						</div>

						<script type="text/javascript">

							var page = 1;
							var gid = -1;
							var showNum = 0;
							var haveFriend = true;
							function getUser(pageId, gid) {
								page = parseInt(pageId);
								gid = isUndefined(gid) ? -1 : parseInt(gid);
								var x = new Ajax();
								x.get('home.php?mod=spacecp&ac=friend&op=getinviteuser&inajax=1&page='+ page + '&gid=' + gid + '&' + Math.random(), function(s) {
									var data = eval('('+s+')');
									var singlenum = parseInt(data['singlenum']);
									var maxfriendnum = parseInt(data['maxfriendnum']);
									fs.addDataSource(data, clearlist);
									haveFriend = singlenum && singlenum == 20 ? true : false;
									if(singlenum && fs.allNumber < 20 && fs.allNumber < maxfriendnum && maxfriendnum > 20 && haveFriend) {
										page++;
										getUser(page);
									}
								});
							}
							function selector() {
								var parameter = {'searchId':'username', 'showId':'friends', 'formId':'', 'showType':3, 'handleKey':'fs', 'selBox':'selectorBox', 'selBoxMenu':'showSelectBox_menu', 'maxSelectNumber':'20', 'selectTabId':'selectNum', 'unSelectTabId':'unSelectTab', 'maxSelectTabId':'remainNum'};
								fs = new friendSelector(parameter);
								var listObj = $('selBox');
								listObj.onscroll = function() {
									clearlist = 0;
									if(this.scrollTop >= this.scrollHeight/5) {
										page++;
										gid = isUndefined(gid) ? 0 : parseInt(gid);
										if(haveFriend) {
											getUser(page, gid);
										}
									}
								}
								getUser(page);
							}
							selector();
						</script>

					<!--{/if}-->
					<ul class="buddy cl">
						<li>
							<div class="avt"><a href="home.php?mod=space&uid=$authorid" title="$chatpmmemberlist[$authorid][username]" target="_blank" c="1"><em class="gm"></em><!--{avatar($authorid,small)}--></a></div>
							<h4><a href="home.php?mod=space&uid=$authorid" title="$chatpmmemberlist[$authorid][username]">$chatpmmemberlist[$authorid][username]</a></h4>
							<p class="maxh">$chatpmmemberlist[$authorid][recentnote]</p>
						</li>
					<!--{eval unset($chatpmmemberlist[$authorid]);}-->
					<!--{loop $chatpmmemberlist $key $value}-->
						<li>
							<div class="avt"><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]" target="_blank" c="1"><!--{avatar($value[uid],small)}--></a></div>
							<h4><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]">$value[username]</a></h4>
							<p class="maxh">$value[recentnote]</p>
							<!--{if $authorid == $_G['uid']}-->
								<p class="xg1"><a href="home.php?mod=spacecp&ac=pm&op=kickmember&memberuid=$key&plid=$plid" id="a_kickmmeber_$key" title="{lang kickmemberwho}" onclick="showWindow(this.id, this.href, 'get', 0);">{lang kickmember}</a></p>
							<!--{/if}-->
						</li>
					<!--{/loop}-->
					</ul>
				<!--{else}-->
					<div class="emp">
						{lang no_corresponding_pm}
					</div>
				<!--{/if}-->

				<!--{if ($touid || $plid) && $list}-->
					<!--{if empty($lastanchor)}--><a name="last"></a><!--{/if}-->
					<div id="pm_ul_post" class="xld xlda pml">
						<dl class="cl">
							<dd class="m avt">
								<a href="home.php?mod=space&uid=$space[uid]"><!--{avatar($space[uid],small)}--></a>
							</dd>
							<dd class="ptm">
								<form id="pmform" name="pmform" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=send&pmid=$pmid&daterange=$daterange&handlekey=pmsend&pmsubmit=yes" onsubmit="this.message.value = parseurl(this.message.value);ajaxpost('pmform', 'pmforum_return', 'pmforum_return');return false;">
									<div class="tedt">
										<div class="bar">
											<!--{if $list && $daterange && !$touid}-->
											<span onclick="refreshMsg(1);" title="{lang refresh}" class="y xg1 cur1"><img src="static/image/common/pm-ico5.png" alt="{lang refresh}" class="vm" /> <span id="refreshtip">{lang refresh}</span></span>
											<!--{/if}-->
											<!--{eval $seditor = array('reply', array('bold', 'color', 'img', 'link', 'quote', 'code', 'smilies'));}-->
											<!--{subtemplate common/seditor}-->
										</div>
										<div class="area">
											<textarea rows="3" cols="40" name="message" class="pt" id="replymessage" onkeydown="ctrlEnter(event, 'pmsubmit');"></textarea>
										</div>
									</div>
									<p class="mtn">
										<button type="submit" name="pmsubmit" id="pmsubmit" class="pn pnc" value="true"><strong>{lang send}</strong></button>
										<span id="pmforum_return"></span>
									</p>
									<input type="hidden" name="formhash" value="{FORMHASH}" />
									<input type="hidden" name="topmuid" value="$touid" />
								</form>
							</dd>
						</dl>
					</div>
				<!--{/if}-->
				<!--{if $list && $daterange && !$touid}-->
						</div>
					</div>
				<!--{/if}-->

			<!--{elseif $_GET['subop'] == 'viewg'}-->
				<!--{if $grouppm}-->
					<div id="pm_ul" class="xld xlda pml mbm">
						<dl class="bbda cl">
							<dd class="y mtm pm_o">
								<a href="javascript:;" id="pm_o_$grouppm[id]" class="o" onmouseover="showMenu({'ctrlid':this.id, 'pos':'34'})">{lang menu}</a>
								<div id="pm_o_$grouppm[id]_menu" class="p_pop" style="display: none;">
									<ul>
										<li><a href="home.php?mod=spacecp&ac=pm&op=delete&deletepm_gpmid[]=$grouppm[id]&pmid=$grouppm[id]&handlekey=gpmdeletehk_{$grouppm[id]}" id="a_gpmdelete_$grouppm[id]" onclick="showWindow(this.id, this.href, 'get', 0);" title="{lang delete}">{lang delete}</a></li>
									</ul>
								</div>
							</dd>
							<dd class="m avt">
								<!--{if $grouppm[author]}-->
									<img src="{IMGDIR}/annpm.png" alt="" />
								<!--{else}-->
									<img src="{IMGDIR}/systempm.png" alt="" />
								<!--{/if}-->
							</dd>
							<dd class="ptm">
								<!--{if $grouppm['author']}-->{lang sendmultipmwho}<!--{else}-->{lang sendmultipmsystem}<!--{/if}-->&nbsp; 
								<span class="xg1"><!--{date($grouppm[dateline], 'u')}--></span>
							</dd>
							<dd>
								<p class="pm_smry">$grouppm[message]</p>
								<!--{if $grouppm[author]}-->
									<p class="ptn xi2">
										<a href="home.php?mod=spacecp&ac=pm&touid=$grouppm[authorid]">{lang reply} $grouppm[author]</a>
									</p>
								<!--{/if}-->
							</dd>
							
						</dl>
					</div>
				<!--{else}-->
					<div class="emp">
						{lang no_corresponding_pm}
					</div>
				<!--{/if}-->

			<!--{elseif $_GET['subop'] == 'setting'}-->

				<form id="pmsettingform" name="pmsettingform" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=setting">
					<table cellspacing="0" cellpadding="0" class="tfm mtm">
						<tr>
							<th>{lang pm_onlyacceptfriendpm}</th>
							<td>
								<label class="lb"><input type="radio" name="onlyacceptfriendpm" class="pr" value="1"{if $acceptfriendpmstatus == 1} checked="checked"{/if} />{lang yes}</label>
								<label class="lb"><input type="radio" name="onlyacceptfriendpm" class="pr" value="2"{if $acceptfriendpmstatus == 2} checked="checked"{/if} />{lang no}</label>
							</td>
						</tr>
						<tr>
							<th>{lang ignore_list}</th>
							<td>
								<textarea id="ignorelist" name="ignorelist" cols="40" rows="3" class="pt" onkeydown="ctrlEnter(event, 'ignoresubmit');">$ignorelist</textarea>
								<div class="d">{lang ignore_member_pm_message}</div>
							</td>
						</tr>
						<tr>
							<th></th>
							<td><button type="submit" name="settingsubmit" value="true" class="pn"><strong>{lang save}</strong></button></td>
						</tr>
					</table>
					<input type="hidden" name="formhash" value="{FORMHASH}" />
				</form>

			<!--{else}-->

				<!--{if $count || $grouppms}-->
					<form id="deletepmform" action="home.php?mod=spacecp&ac=pm&op=delete&folder=$folder" method="post" autocomplete="off" name="deletepmform">
						<div class="xld xlda pml mtm mbm">
							<!--{if $grouppms}-->
								<!--{loop $grouppms $grouppm}-->
									<dl id="gpmlist_$grouppm[id]" class="bbda cur1 cl{if !$gpmstatus[$grouppm[id]]} newpm{/if}">
										<dd class="y mtm pm_o">
											<a href="javascript:;" id="pm_o_$grouppm[id]" class="o" onmouseover="showMenu({'ctrlid':this.id, 'pos':'34'})">{lang menu}</a>
											<div id="pm_o_$grouppm[id]_menu" class="p_pop" style="display: none;">
												<ul>
													<li><a href="javascript:;" onclick="ajaxget('home.php?mod=spacecp&ac=pm&op=delete&deletesubmit=1&deletepm_gpmid[]=$grouppm[id]', '', 'ajaxwaitid', '', 'none', '$(\'gpmlist_$grouppm[id]\').style.display=\'none\';');">{lang delete}</a></li>
												</ul>
											</div>
										</dd>
										<dd class="m avt">
											<div class="newpm_avt" title="{lang new_pm}"></div>
											<a href="home.php?mod=space&do=pm&subop=viewg&pmid=$grouppm[id]">
											<!--{if $grouppm[author]}-->
												<img src="{IMGDIR}/annpm.png" alt="" />
											<!--{else}-->
												<img src="{IMGDIR}/systempm.png" alt="" />
											<!--{/if}-->
											</a>
										</dd>
										<dd class="ptm pm_c">
											<div class="o">
												<input type="checkbox" name="deletepm_gpmid[]" id="a_deleteg_$grouppm[id]" class="pc" value="$grouppm[id]" />
											</div>
											<!--{if $grouppm[author]}-->
												<a href="home.php?mod=space&uid=$grouppm[authorid]" target="_blank">$grouppm[author]</a> {lang say} :
											<!--{/if}-->
											<span id="p_gpmid_$grouppm[id]">$grouppm[message]</span> &nbsp; 
											<span class="xg1"><!--{date($grouppm[dateline], 'u')}--></span>&nbsp; 
											<a href="home.php?mod=space&do=pm&subop=viewg&pmid=$grouppm[id]" id="gpmlist_$grouppm[id]_a">{lang show}</a>
										</dd>
									</dl>
								<!--{/loop}-->
							<!--{/if}-->
							<!--{loop $list $key $value}-->
								<dl id="pmlist_$value[plid]" class="bbda cur1 cl{if $value[isnew]} newpm{/if}">									
									<dd class="m avt">
										<div class="newpm_avt" title="{lang new_pm}"></div>
										<!--{if $value['pmtype'] == 1}-->
										<a href="home.php?mod=space&uid=$value[touid]" target="_blank"><!--{avatar($value[touid],small)}--></a>
										<!--{elseif $value['pmtype'] == 2}-->
										<a href="home.php?mod=space&do=pm&subop=view&plid=$value[plid]&type=1&daterange=$value[daterange]"><img src="{IMGDIR}/grouppm.png" alt="" /></a>
										<!--{/if}-->
									</dd>
									<dd class="ptm pm_c">
										<div class="o">
											<!--{if $value['pmtype'] == 1}-->
												<input type="checkbox" name="deletepm_deluid[]" id="a_delete_$value[plid]" class="pc" value="$value[touid]" />
											<!--{elseif $value['pmtype'] == 2}-->
												<!--{if $value['authorid'] == $_G['uid']}-->
												<input type="checkbox" name="deletepm_delplid[]" id="a_delete_$value[plid]" class="pc" value="$value[plid]" />
												<!--{else}-->
												<input type="checkbox" name="deletepm_quitplid[]" id="a_delete_$value[plid]" class="pc" value="$value[plid]" />
												<!--{/if}-->
											<!--{/if}-->
										</div>
										<!--{if $value['pmtype'] == 1}-->
											<!--{if $value['lastauthorid'] == $_G['uid']}-->
												<span class="xi2 xw1">{lang you}</span> {lang you_to} <a href="home.php?mod=space&uid=$value[touid]" target="_blank">{$value[tousername]}</a> {lang say} :<br />
											<!--{else}-->
												<a href="home.php?mod=space&uid=$value[touid]" target="_blank" class="xw1">{$value[tousername]}</a> {lang you_to} <span class="xi2">{lang you}</span> {lang say} :<br />
											<!--{/if}-->
											$value[lastsummary] &nbsp;  <br />
											<span class="xg1"><!--{date($value[lastdateline], 'u')}--></span> &nbsp; 
											<span class="pm_o y">
												<div id="pm_o_$value[plid]_menu" class="p_pop" style="display: none;">
													<ul>
														<!--{if $value['pmtype'] == 1}-->
														<li><a href="javascript:;" onclick="ajaxget('home.php?mod=spacecp&ac=pm&op=delete&deletesubmit=1&deletepm_deluid[]=$value[touid]', '', 'ajaxwaitid', '', 'none', '$(\'pmlist_$value[plid]\').style.display=\'none\';');">{lang delete}</a></li>
														<li><a href="home.php?mod=spacecp&ac=pm&op=pm_ignore&username=$value[tousername]&plid=$value[plid]&handlekey=pmignorehk_{$value[plid]}" id="a_feed_menu_$value[plid]" onclick="showWindow(this.id, this.href, 'get', 0);doane(event);" title="{lang pmignore}">{lang pmignore}</a></li>
														<!--{elseif $value['pmtype'] == 2}-->
															<!--{if $value['authorid'] == $_G['uid']}-->
														<li><a href="javascript:;" onclick="ajaxget('home.php?mod=spacecp&ac=pm&op=delete&deletesubmit=1&deletepm_delplid[]=$value[plid]', '', 'ajaxwaitid', '', 'none', '$(\'pmlist_$value[plid]\').style.display=\'none\';');">{lang delete}</a></li>
															<!--{else}-->
														<li><a href="javascript:;" onclick="ajaxget('home.php?mod=spacecp&ac=pm&op=delete&deletesubmit=1&deletepm_quitplid[]=$value[plid]', '', 'ajaxwaitid', '', 'none', '$(\'pmlist_$value[plid]\').style.display=\'none\';');">{lang delete}</a></li>
															<!--{/if}-->
														<!--{/if}-->
													</ul>
												</div>
												<span class="xg1 z">{lang pm_num}</span>
												<a href="javascript:;" id="pm_o_$value[plid]" class="o" onmouseover="showMenu({'ctrlid':this.id, 'pos':'34'})">{lang menu}</a>
												 | 
												<a href="home.php?mod=space&do=pm&subop=view&touid=$value[touid]#last" id="pmlist_$value[plid]_a">{lang reply}</a>
											</span>
										<!--{elseif $value['pmtype'] == 2}-->
											<table>
												<tr>
													<td valign="top" width="65">$value[members] {lang pm_members_message} :</td>
												</tr>
												<tr>
													<td>
														<p><a href="home.php?mod=space&do=pm&subop=view&plid=$value[plid]&type=1&daterange=$value[daterange]#last" id="pmlist_$value[plid]_a">$value[subject]</a></p>
														<!--{if $value[lastauthorid]}-->
															<p class="mbn">{lang dots}</p>
															<p>
																<a href="home.php?mod=space&uid=$value[lastauthorid]" target="_blank">$value[lastauthor]</a> : 
																$value[lastsummary] &nbsp; 
																<span class="xg1"><!--{date($value[lastdateline], 'u')}--></span>
																<a href="home.php?mod=space&do=pm&subop=view&plid=$value[plid]&type=1&daterange=$value[daterange]#last">{lang reply}</a>
															</p>
														<!--{/if}-->
													</td>
												</tr>
												<tr><td><span class="xg1"><!--{date($value[lastdateline], 'u')}--></span></td></tr>
											</table>
											<span class="pm_o y" style="margin-top: -20px; ">
												<div id="pm_o_$value[plid]_menu" class="p_pop" style="display: none;">
													<ul>
														<!--{if $value['pmtype'] == 1}-->
														<li><a href="javascript:;" onclick="ajaxget('home.php?mod=spacecp&ac=pm&op=delete&deletesubmit=1&deletepm_deluid[]=$value[touid]', '', 'ajaxwaitid', '', 'none', '$(\'pmlist_$value[plid]\').style.display=\'none\';');">{lang delete}</a></li>
														<li><a href="home.php?mod=spacecp&ac=pm&op=pm_ignore&username=$value[tousername]&plid=$value[plid]&handlekey=pmignorehk_{$value[plid]}" id="a_feed_menu_$value[plid]" onclick="showWindow(this.id, this.href, 'get', 0);doane(event);" title="{lang pmignore}">{lang pmignore}</a></li>
														<!--{elseif $value['pmtype'] == 2}-->
															<!--{if $value['authorid'] == $_G['uid']}-->
														<li><a href="javascript:;" onclick="ajaxget('home.php?mod=spacecp&ac=pm&op=delete&deletesubmit=1&deletepm_delplid[]=$value[plid]', '', 'ajaxwaitid', '', 'none', '$(\'pmlist_$value[plid]\').style.display=\'none\';');">{lang delete}</a></li>
															<!--{else}-->
														<li><a href="javascript:;" onclick="ajaxget('home.php?mod=spacecp&ac=pm&op=delete&deletesubmit=1&deletepm_quitplid[]=$value[plid]', '', 'ajaxwaitid', '', 'none', '$(\'pmlist_$value[plid]\').style.display=\'none\';');">{lang delete}</a></li>
															<!--{/if}-->
														<!--{/if}-->
													</ul>
												</div>
												<span class="xg1 z">{lang pm_num}</span>
												<a href="javascript:;" id="pm_o_$value[plid]" class="o" onmouseover="showMenu({'ctrlid':this.id, 'pos':'34'})">{lang menu}</a>
												 | 
												<a href="home.php?mod=space&do=pm&subop=view&touid=$value[touid]#last" id="pmlist_$value[plid]_a">{lang reply}</a>
											</span>
										<!--{/if}-->
									</dd>
								</dl>
							<!--{/loop}-->
						</div>
						<div class="pgs pbm cl pm_op">
							<!--{if $multi}-->$multi<!--{/if}-->
							<!--{if $count || $grouppms}-->
								<label for="delete_all" onclick="checkall(this.form, 'deletepm_');"><input type="checkbox" name="chkall" id="delete_all" class="pc" />{lang select_all}</label> &nbsp; 
								<button class="pn" type="submit" name="deletepmsubmit_btn" value="true"><strong>{lang delete}</strong></button>
								<button class="pn" type="button" name="markreadpm_btn" value="true" onclick="setpmstatus(this.form);"><strong>{lang change_old_pm}</strong></button>
							<!--{/if}-->
						</div>
						<input type="hidden" name='deletesubmit' value="true" />
						<input type="hidden" name="formhash" value="{FORMHASH}" />
					</form>
					<script type="text/javascript">addBlockLink('deletepmform', 'dl');</script>
				<!--{else}-->
					<div class="emp">
						{lang no_corresponding_pm}
					</div>
				<!--{/if}-->

			<!--{/if}-->

		</div>
	</div>
	<div class="appl">
		<!--{subtemplate home/space_prompt_nav}-->

		<div class="drag">
			<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
		</div>

	</div>
</div>

<div class="wp mtn">
	<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>

<!--{template common/footer}-->