<?php echo '���ػ�ȡ����ģ�������aspku��www.aspku.com';exit;?>
<div class="foot foot_shequ cl" id="ft">
	<div class="web_widht">
		<div class="foot_left">
			<a href="./" class="ft_logo" title="�Ὺ����ƽ̨���Ὺ����Ӳ�����Ὺϵͳ���û�����"></a>
		</div>
		<div>
		    <div class="foot_nav">
		        <h2>���²�Ʒ</h2>
		        <ul>
		            <li><a href="./">T55��������</a>
		            </li>
		            <li><a href="./">A55�ǻ۴���</a>
		            </li>
		            <li><a href="./">ָ��ң��</a>
		            </li>
		            <li><a href="./">�ῪӰ��</a>
		            </li>
		        </ul>
		    </div>
		    <div class="foot_nav">
		        <h2>���ڿῪ</h2>
		        <ul>
		            <li><a href="./">Ʒ�ƽ���</a>
		            </li>
		            <li><a href="./">�˽�����</a>
		            </li>
		            <li><a href="./">���ű���</a>
		            </li>
		            <li><a href="./">����Ǣ̸</a>
		            </li>
		        </ul>
		    </div>
		    <div class="foot_nav">
		        <h2>��ע�Ὺ</h2>
		        <ul>
		            <li><a href="./">΢��/΢�ž���</a>
		            </li>
		            <li><a href="./">�ٿ�Ʒ�ƾ���</a>
		            </li>
		            <li><a href="./">PCƽ̨</a>
		            </li>
		            <li><a href="./">��׿ƽ̨</a>
		            </li>
		            <li><a href="./">IOSƽ̨</a>
		            </li>
		        </ul>
		    </div>
		    <div class="foot_nav">
		        <h2>����֧��</h2>
		        <ul>
		            <li><a href="./">��������</a>
		            </li>
		            <li><a href="./">����ԤԼ����</a>
		            </li>
		            <li><a href="./">����ֲ�</a>
		            </li>
		        </ul>
		    </div>
		    <div class="foot_nav" style="border:none;">
		        <h2>����Ὺ</h2>
		        <ul>
		            <li><a href="./">��Ƹ��λ</a>
		            </li>
		            <li><a href="./">�˲�����</a>
		            </li>
		        </ul>
		    </div>
		</div>
		<div class="clear"></div>
		<div class="slogan">
			<img src="$_G['style']['directory']/images/slogan.jpg" width="297" height="33" alt="�Ὺ��Ϊ��ͥ����������" />
		</div>
		<div class="foot_text">
			<div class="foot_sky">
				<div class="foot_sky_con"> 
					<!--{if $_G['basescript'] == 'portal'}-->
					<div class="lk flink"> <b>��������</b>
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
								<li><b>������أ�</b></li>
								<!--{loop $_G['setting']['footernavs'] $nav}--><!--{if $nav['available'] && ($nav['type'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1)) ||
										!$nav['type'] && ($nav['id'] == 'stat' && $_G['group']['allowstatdata'] || $nav['id'] == 'report' && $_G['uid'] || $nav['id'] == 'archiver' || $nav['id'] == 'mobile' || $nav['id'] == 'darkroom'))}--><li> $nav[code] </li><!--{/if}--><!--{/loop}-->
								<li>
									<a href="http://shang.qq.com/wpa/qunwpa?idkey=0f4c016d66a9c8c6bf70d225c849528b49d2ac9f55ffddf2d74563f30734ad87" target="_blank" title="qqȺ��1691300">qqȺ��1691300</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<h2>(c) 2015-<?php echo date("Y")?> <a href="http://bbs.aspku.com" target="_blank" style="color: #999;text-decoration: none;">Comsenz Inc.</a> <a href="http://www.discuz.net" target="_blank" style="color: #999;text-decoration: none;">Discuz!</a> All Rights Reserved</h2>
			<h3>ICP����֤���: <!--{if $_G['setting']['icp']}-->$_G['setting']['icp']<!--{else}-->��ICP��12345670��<!--{/if}-->&nbsp;&nbsp;����֤���룺��B2-20120050-3</h3>
		</div>
	</div>
</div>
<!--{if $_G['setting']['statcode']}-->
<div class="tongji" style="display:none">$_G['setting']['statcode']</div>
<!--{/if}-->