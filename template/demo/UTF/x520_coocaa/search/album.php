<?php echo '草根吧商业模板保护！下载获取正版模板请访问草根吧官网：www.caogen8.co';exit;?>
<!--{subtemplate common/header}-->
<div id="ct" class="cl w search_wrap nbk yanjiao" style="margin-top:18px;">
	<form class="searchform" method="post" autocomplete="off" action="search.php?mod=album" onsubmit="if($('scform_srchtxt')) searchFocus($('scform_srchtxt'));">
		<input type="hidden" name="formhash" value="{FORMHASH}" />

		<!--{subtemplate search/pubsearch}-->
		<!--{hook/album_top}-->

	</form>

	<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
		<!--{subtemplate search/album_list}-->
	<!--{/if}-->
	
</div>
<!--{hook/album_bottom}-->

<!--{subtemplate common/footer}-->