<?php echo '草根吧商业模板保护！下载获取正版模板请访问草根吧官网：www.caogen8.co';exit;?>
<div class="tl search_con"> 
	<div class="sttl mbn">
		<h2><!--{if $keyword}--><span class="bbsname"><!--{$_G['setting']['bbname']}--></span> <span class="resu">{lang search_result_keyword}</span> <!--{if $modfid}--><a href="forum.php?mod=modcp&action=thread&fid=$modfid&keywords=$modkeyword&submit=true&do=search&page=$page" target="_blank"><!--{$_G['setting']['bbname']}--> {lang goto_memcp}</a><!--{/if}--><!--{else}--><!--{$_G['setting']['bbname']}--> {lang search_result}<!--{/if}--></h2>
	</div>
	<!--{ad/search/y mtw}-->
	<!--{if empty($threadlist)}-->
		<p class="emp xs2 xg2">
          <span><em>对不起！</em> 没有找到匹配结果···</span>
          <i>建议您，看看输入的文字是否有误，去掉可能不必要的词，如"的"、"什么"等。</i>
        </p>
	<!--{else}-->
		<div class="slst mtw" id="threadlist" {if $modfid} style="position: relative;"{/if}>
			<!--{if $modfid}-->
			<form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&action=moderate&fid=$modfid&infloat=yes&nopost=yes">
			<!--{/if}-->
			<ul>
			<!--{eval //out($threadlist)}-->
				<!--{loop $threadlist $thread}-->
				<li class="pbw" id="$thread[tid]">
					<h3 class="xs3">
						<!--{if $modfid}-->
							<!--{if $thread['fid'] == $modfid && ($thread['displayorder'] <= 3 || $_G['adminid'] == 1)}-->
								<input onclick="tmodclick(this)" type="checkbox" name="moderate[]" value="$thread[tid]" />&nbsp;
							<!--{else}-->
								<input type="checkbox" disabled="disabled" />&nbsp;
							<!--{/if}-->
						<!--{/if}-->
						<a href="forum.php?mod=viewthread&tid=$thread[realtid]&highlight=$index[keywords]" target="_blank" $thread[highlight]>$thread[subject]</a>
					</h3>
					<p><!--{if !$thread['price'] && !$thread['readperm']}-->$thread[message]<!--{else}-->{lang thread_list_message1}<!--{/if}--></p>
					<p class="xg1">
						<span>$thread[dateline]</span>
						 -
						<span>
							<!--{if $thread['authorid'] && $thread['author']}-->
								<a href="home.php?mod=space&uid=$thread[authorid]" target="_blank">$thread[author]</a>
							<!--{else}-->
								<!--{if $_G['forum']['ismoderator']}--><a href="home.php?mod=space&uid=$thread[authorid]" target="_blank">{lang anonymous}</a><!--{else}-->{lang anonymous}<!--{/if}-->
							<!--{/if}-->
						</span>
						 -
						<span><a href="forum.php?mod=forumdisplay&fid=$thread[fid]" target="_blank" class="xi1">$thread[forumname]</a> - $thread[replies] {lang a_comment_thread} - $thread[views] {lang a_visit}</span>
					</p>
				</li>
				<!--{/loop}-->
			</ul>
		<!--{if $modfid}-->
			</form>
			<script type="text/javascript" src="{$_G[setting][jspath]}forum_moderate.js?{VERHASH}"></script>
			<!--{template forum/topicadmin_modlayer}-->
		<!--{/if}-->
		</div>
	<!--{/if}-->
	<!--{if !empty($multipage)}--><div class="pgs cl mbm">$multipage</div><!--{/if}-->
</div>