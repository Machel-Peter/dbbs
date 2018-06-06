<?php echo '草根吧商业模板保护！下载获取正版模板请访问草根吧官网：www.caogen8.co';exit;?>
{if strpos($multipage, 'first')!=-1}
	{eval $resultPage = preg_replace('%(<a .*class="first"[^>]*>.*?</a>)(<a .*class="prev"[^>]*>(.*?)</a>)%s', '$2$1', $multipage);}
	{eval $multipage = str_replace('&nbsp;&nbsp;', '', $resultPage);}
{/if}
$multipage
