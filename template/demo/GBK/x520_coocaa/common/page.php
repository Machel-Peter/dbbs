<?php echo '�ݸ�����ҵģ�屣�������ػ�ȡ����ģ������ʲݸ��ɹ�����www.caogen8.co';exit;?>
{if strpos($multipage, 'first')!=-1}
	{eval $resultPage = preg_replace('%(<a .*class="first"[^>]*>.*?</a>)(<a .*class="prev"[^>]*>(.*?)</a>)%s', '$2$1', $multipage);}
	{eval $multipage = str_replace('&nbsp;&nbsp;', '', $resultPage);}
{/if}
$multipage
