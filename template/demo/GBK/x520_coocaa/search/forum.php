<?php echo '草根吧商业模板保护！下载获取正版模板请访问草根吧官网：www.caogen8.co';exit;?>
<!--{subtemplate common/header}-->
<div id="ct" class="cl w search_wrap nbk yanjiao" style="margin-top:18px;">
	<div class="mw cl">
		<form class="searchform" method="post" autocomplete="off" action="search.php?mod=forum" onsubmit="if($('scform_srchtxt')) searchFocus($('scform_srchtxt'));">
			<input type="hidden" name="formhash" value="{FORMHASH}" />

			<!--{subtemplate search/pubsearch}-->
			<!--{hook/forum_top}-->

			<!--{eval $policymsgs = $p = '';}-->
			<!--{loop $_G['setting']['creditspolicy']['search'] $id $policy}-->
			<!--{block policymsg}--><!--{if $_G['setting']['extcredits'][$id][img]}-->$_G['setting']['extcredits'][$id][img] <!--{/if}-->$_G['setting']['extcredits'][$id][title] $policy $_G['setting']['extcredits'][$id][unit]<!--{/block}-->
			<!--{eval $policymsgs .= $p.$policymsg;$p = ', ';}-->
			<!--{/loop}-->
			<!--{if $policymsgs}--><p>{lang search_credit_msg}</p><!--{/if}-->
		</form>

		<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
			<!--{subtemplate search/thread_list}-->
		<!--{/if}-->

	</div>
</div>
<!--{hook/forum_bottom}-->

<!--{subtemplate common/footer}-->
