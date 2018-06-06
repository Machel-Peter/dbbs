<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('list_1');?><?php include template('common/header'); $data = array();?><?php $wheresql = category_get_wheresql($cat);?><?php $data = category_get_list_more($cat, $wheresql);?><div id="pt" class="bm cl">
<div class="z">
<a href="index.php" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="<?php echo $_G['setting']['navs']['1']['filename'];?>"><?php echo $_G['setting']['navs']['1']['navname'];?></a> <em>&rsaquo;</em><?php if(is_array($cat['ups'])) foreach($cat['ups'] as $value) { ?> <a href="<?php echo $portalcategory[$value['catid']]['caturl'];?>"><?php echo $value['catname'];?></a><em>&rsaquo;</em><?php } ?>
<?php echo $cat['catname'];?>
</div>
</div>

<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>

<div id="ct" class="ct2 wp cl">
<div class="mn">
<!--[diy=listlooptop]--><div id="listlooptop" class="area"></div><!--[/diy]-->
<?php if($cat['subs']) { if(is_array($data)) foreach($data as $key => $item) { $subcatid = intval(str_replace('subcate', '', $key));?><?php if(!empty($portalcategory[$subcatid])) { ?>
<div class="bm">
<div class="bm_h cl">
<span class="y xi2">
<?php if(($_G['group']['allowpostarticle'] || $_G['group']['allowmanagearticle'] || $categoryperm[$catid]['allowmanage'] || $categoryperm[$catid]['allowpublish']) && empty($portalcategory[$subcatid]['disallowpublish'])) { ?>
<a href="portal.php?mod=portalcp&amp;ac=article&amp;catid=<?php echo $subcatid;?>">发布文章</a>
<span class="pipe">|</span>
<?php } ?>
<a href="<?php echo $portalcategory[$subcatid]['caturl'];?>">更多&rsaquo;</a>
</span>
<h2><a href="<?php echo $portalcategory[$subcatid]['caturl'];?>"><?php echo $portalcategory[$subcatid]['catname'];?></a></h2>
</div>
<div class="bm_c">
<ul class="xs2 xl xl1"><?php if(is_array($item)) foreach($item as $value) { $article_url = fetch_article_url($value);?><li><span class="xl1_elp">&bull; <a href="<?php echo $article_url;?>" target="_blank"><?php echo $value['title'];?></a></span>
<em><?php echo dgmdate($value['timestamp'], 'm-d')?></em>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } } } ?>
<!--[diy=listloopbottom]--><div id="listloopbottom" class="area"></div><!--[/diy]-->
</div>
<div class="sd">

<div class="drag">
<!--[diy=diyrighttop]--><div id="diyrighttop" class="area"></div><!--[/diy]-->
</div>

<?php if($cat['others']) { ?>
<div class="bm">
<div class="bm_h cl">
<h2>相关分类</h2>
</div>
<div class="bm_c">
<ul class="xl xl2 cl"><?php if(is_array($cat['others'])) foreach($cat['others'] as $value) { ?><li><a href="<?php echo $portalcategory[$value['catid']]['caturl'];?>"><?php echo $value['catname'];?></a></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="drag">
<!--[diy=newarticletop]--><div id="newarticletop" class="area"></div><!--[/diy]-->
</div>

<?php if($data['portalnewarticle']) { ?>
<div class="bm">
<div class="bm_h cl">最新文章</div>
<div class="bm_c">
<ul class="xl xl1"><?php if(is_array($data['portalnewarticle'])) foreach($data['portalnewarticle'] as $value) { $article_url = fetch_article_url($value);?><li><a href="<?php echo $article_url;?>"><?php echo $value['title'];?></a></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="drag">
<!--[diy=hotarticletop]--><div id="hotarticletop" class="area"></div><!--[/diy]-->
</div>

<?php if($data['portalhotarticle']) { ?>
<div class="bm">
<div class="bm_h cl">热门内容</div>
<div class="bm_c">
<ul class="xl xl1"><?php if(is_array($data['portalhotarticle'])) foreach($data['portalhotarticle'] as $value) { $article_url = fetch_article_url($value);?><li><a href="<?php echo $article_url;?>"><?php echo $value['title'];?></a></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="drag">
<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
</div>

</div>
</div>

<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div><?php include template('common/footer'); ?>