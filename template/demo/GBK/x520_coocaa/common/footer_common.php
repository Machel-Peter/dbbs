<?php echo '下载获取正版模板请访问aspku：www.aspku.com';exit;?>
<div class="foot foot_shequ cl" id="ft">
	<div class="web_widht">
		<div class="foot_left">
			<a href="./" class="ft_logo" title="酷开电商平台、酷开智能硬件、酷开系统、用户服务"></a>
		</div>
		<div>
		    <div class="foot_nav">
		        <h2>创新产品</h2>
		        <ul>
		            <li><a href="./">T55艺术电视</a>
		            </li>
		            <li><a href="./">A55智慧大屏</a>
		            </li>
		            <li><a href="./">指尖遥控</a>
		            </li>
		            <li><a href="./">酷开影棒</a>
		            </li>
		        </ul>
		    </div>
		    <div class="foot_nav">
		        <h2>关于酷开</h2>
		        <ul>
		            <li><a href="./">品牌介绍</a>
		            </li>
		            <li><a href="./">了解社区</a>
		            </li>
		            <li><a href="./">新闻报道</a>
		            </li>
		            <li><a href="./">合作洽谈</a>
		            </li>
		        </ul>
		    </div>
		    <div class="foot_nav">
		        <h2>关注酷开</h2>
		        <ul>
		            <li><a href="./">微博/微信矩阵</a>
		            </li>
		            <li><a href="./">百科品牌矩阵</a>
		            </li>
		            <li><a href="./">PC平台</a>
		            </li>
		            <li><a href="./">安卓平台</a>
		            </li>
		            <li><a href="./">IOS平台</a>
		            </li>
		        </ul>
		    </div>
		    <div class="foot_nav">
		        <h2>服务支持</h2>
		        <ul>
		            <li><a href="./">服务政策</a>
		            </li>
		            <li><a href="./">在线预约服务</a>
		            </li>
		            <li><a href="./">玩机手册</a>
		            </li>
		        </ul>
		    </div>
		    <div class="foot_nav" style="border:none;">
		        <h2>加入酷开</h2>
		        <ul>
		            <li><a href="./">招聘岗位</a>
		            </li>
		            <li><a href="./">人才政策</a>
		            </li>
		        </ul>
		    </div>
		</div>
		<div class="clear"></div>
		<div class="slogan">
			<img src="$_G['style']['directory']/images/slogan.jpg" width="297" height="33" alt="酷开，为家庭互联网而生" />
		</div>
		<div class="foot_text">
			<div class="foot_sky">
				<div class="foot_sky_con"> 
					<!--{if $_G['basescript'] == 'portal'}-->
					<div class="lk flink"> <b>友情链接</b>
						<div id="category_lk">
							<ul class="x mbm cl">
								<!--{eval $friendlinks = DB::fetch_all('select * from ' . DB::table('common_friendlink') . '  order by displayorder asc');}-->
								<!--{loop $friendlinks $v}-->
								<li> <a href="{$v[url]}" target="_blank" title="{$v[name]}">{$v[name]} </a></li>
								<!--{/loop}-->
							</ul>
						</div>
					</div>
					<!--{/if}-->
					<div class="lk cclre"> 
						<div id="category_lk">
							<ul class="x mbm cl">
								<li><b>社区相关：</b></li>
								<!--{loop $_G['setting']['footernavs'] $nav}--><!--{if $nav['available'] && ($nav['type'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1)) ||
										!$nav['type'] && ($nav['id'] == 'stat' && $_G['group']['allowstatdata'] || $nav['id'] == 'report' && $_G['uid'] || $nav['id'] == 'archiver' || $nav['id'] == 'mobile' || $nav['id'] == 'darkroom'))}--><li> $nav[code] </li><!--{/if}--><!--{/loop}-->
								<li>
									<a href="http://shang.qq.com/wpa/qunwpa?idkey=0f4c016d66a9c8c6bf70d225c849528b49d2ac9f55ffddf2d74563f30734ad87" target="_blank" title="qq群：1691300">qq群：1691300</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<h2>(c) 2015-<?php echo date("Y")?> <a href="http://bbs.aspku.com" target="_blank" style="color: #999;text-decoration: none;">Comsenz Inc.</a> <a href="http://www.discuz.net" target="_blank" style="color: #999;text-decoration: none;">Discuz!</a> All Rights Reserved</h2>
			<h3>ICP备案证书号: <!--{if $_G['setting']['icp']}-->$_G['setting']['icp']<!--{else}-->粤ICP备12345670号<!--{/if}-->&nbsp;&nbsp;许可证号码：川B2-20120050-3</h3>
		</div>
	</div>
</div>
<!--{if $_G['setting']['statcode']}-->
<div class="tongji" style="display:none">$_G['setting']['statcode']</div>
<!--{/if}-->
