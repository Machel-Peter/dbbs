<?php

/* 333
 *DZ盒子：www.idzbox.com
 *更多商业插件/模版免费下载 就在dz盒子
 *本资源来源于网络收集,仅供个人学习交流，请勿用于商业用途，并于下载24小时后删除!
 *如果侵犯了您的权益,请及时告知我们,我们即刻删除!
 */
$readme=<<<EOF
<br>
<table border=0 cellspacing=1 cellpadding=5 width=72%>
<tr height=27>
<td align="center" class=p11t bgcolor="eeeecc"><b>论坛动态(Session)增强版 For X2.0/X2.5/X3.0 使用说明</b></td>
</tr>
</table><br>
<table border="0" cellpadding="2" cellspacing="2" width="72%">
<tr><td><span class="p11blk"><ol>
<li>本插件由土著人宁巴开发,<a href="http://www.idzbox.com/" target="_blank">Dz盒子</a>技术团队 出品（Made By Nimba, Team From idzbox.com ）请尊重开发者版权<br><br>
<li>开发者主页<a href="http://addon.discuz.com/?@1552.developer" target="_blank">http://addon.discuz.com/?@1552.developer</a><br><br>
<li>本插件调用数据皆由Discuz官方程序产生的记录，记录的真实性不用怀疑<br><br>
<li>本插件用于解析IP地址的ip数据库来自官方正版文件，可以正常解析到全国几乎所有县市（内网将解析为LAN）<br><br>
<li>本插件显示的游客活动时间是您服务器上的时间；显示的论坛动态是一段时间内的用户浏览记录，这个时间段的长短是由后台->全局->性能优化->服务器优化->在线保持时间决定的，部分浏览量较小的网站可能会出现会员动态数据没有的情况，这是正常的！<br><br>
<li>显示的动态是该用户最后一次活跃（仅包含版块和帖子里）的记录<br><br>
<li>本插件开启后将在前台“管理中心”和“退出”之间显示一个“论坛动态”的链接，部分深度开发的模板中丢失了global_usernav_extra2嵌入点，您可以访问http://域名/plugin.php?id=nimba_session:session<br><br>
<li>由于各种难以预料的原因，插件在设计和使用上难免会有些细节问题，敬请见谅，商业版用户请加QQ：594941227，以便获得我们插件的最新动态！<br><br>
<li>购买商业版的用户将具有免费或打折升级的优惠！<br><br>
</ol></span></td></tr></table>
<DIV>Dz盒子开发小组作品精选 作者 土著人宁巴 Dz盒子 出品（Made By Nimba, Team From idzbox.com ）<BR></DIV>
<DIV><BR></DIV>
<DIV>
<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
<TBODY>
<TR>
<TD>
<P><A href="http://addon.discuz.com/?@nimba_thot.plugin"><IMG src="http://open.discuz.net/resource/plugin/nimba_thot.png"></A></P>
<P><A href="http://addon.discuz.com/?@nimba_thot.plugin">楼主热贴</A></P></TD>
<TD>
<P><A href="http://addon.discuz.com/?@nimba_sitemap.plugin"><IMG src="http://open.discuz.net/resource/plugin/nimba_sitemap.png"></A></P>
<P><A href="http://addon.discuz.com/?@nimba_sitemap.plugin">网站地图</A></P></TD>
<TD>
<P><A href="http://addon.discuz.com/?@nimba_weather.plugin"><IMG src="http://open.discuz.net/resource/plugin/nimba_weather.png"></A></P>
<P><A href="http://addon.discuz.com/?@nimba_weather.plugin">本地天气</A></P></TD>
<TD>
<P><A href="http://addon.discuz.com/?@nimba_badlink.plugin"><IMG src="http://open.discuz.net/resource/plugin/nimba_badlink.png"></A></P>
<P><A href="http://addon.discuz.com/?@nimba_badlink.plugin">垃圾链杀手</A></P></TD>
<TD>
<P><A href="http://addon.discuz.com/?@nimba_newuser.plugin"><IMG src="http://open.discuz.net/resource/plugin/nimba_newuser.png"></A></P>
<P><A href="http://addon.discuz.com/?@nimba_newuser.plugin">新手报到</A></P></TD>
<TD>
<P><A href="http://addon.discuz.com/?@nimba_session.plugin"><IMG src="http://open.discuz.net/resource/plugin/nimba_session.png"></A></P>
<P><A href="http://addon.discuz.com/?@nimba_session.plugin">网站地图</A></P></TD>
<TD>
<P><A href="http://addon.discuz.com/?@nimba_outlink.plugin"><IMG src="http://open.discuz.net/resource/plugin/nimba_outlink.png"></A></P>
<P><A href="http://addon.discuz.com/?@nimba_outlink.plugin">贴内外链弹窗提示</A></P></TD>
<TD>
<P><A href="http://addon.discuz.com/?@nimba_romotepic.plugin"><IMG src="http://addon.discuz.com/resource/plugin/nimba_romotepic.png"></A></P>
<P><A href="http://addon.discuz.com/?@nimba_romotepic.plugin">远程图片本地化</A></P></TD>
<TD>
<P><A href="http://addon.discuz.com/?@nimba_fastpost.plugin"><IMG src="http://addon.discuz.com/resource/plugin/nimba_fastpost.png"></A></P>
<P><A href="http://addon.discuz.com/?@nimba_fastpost.plugin">快捷回复观点</A></P></TD>
</TR></TBODY></TABLE></DIV>
<DIV><BR></DIV>
<DIV>【团队招募】：Dz盒子开发团队正处在一个快速发展的时期，先需要扩充团队力量，吸收新鲜血液，我们诚招具有以下技能之一的朋友加入我们的团队：1、熟悉PHP程序开发和discuz框架结构，2、精通算法设计或具有扎实的数学基础，3、精通mysql数据库，4、熟悉Linux服务器的搭建和配置，5、具有扎实的美工功底，精通html、DIV+CSS、js！Dz盒子欢迎心怀梦想的朋友加入我们的团队！</DIV>
<DIV><BR></DIV>
<DIV>【技术服务】Dz盒子(AiLab Inc.)技术团队承接以下各种论坛外包技术业务：1、插件定制开发，2、程序问题修复，3、论坛搬家，4、数据库修复，5、GBK和UTF-8版本互转，6、论坛升级，7、其他论坛转discuz，8、其他程序与UCenter整合，9、其他个性化需求！ </DIV>
<DIV><BR></DIV>
<DIV>【联系我们】QQ群：idzbox.com</DIV>
<DIV><BR></DIV>
EOF;
if(strtolower(CHARSET) == 'utf-8') $readme=iconv('GB2312', 'UTF-8',$readme);//utf-8
echo $readme;
?>
