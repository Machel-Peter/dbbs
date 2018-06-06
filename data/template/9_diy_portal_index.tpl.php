<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('common/header_w'); ?><link rel="stylesheet" type="text/css" id="time_diy" href="<?php echo $_G['style']['styleimgdir'];?>css/wdao_index.css" />
<script src="<?php echo $_G['style']['styleimgdir'];?>js/jquery.SuperSlide.js" type="text/javascript" type="text/javascript"></script>
<style id="diy_style" type="text/css"></style>


<div class="w1200 cl" style="margin-top: 20px;">
  <!--[diy=diy_top]--><div id="diy_top" class="area"></div><!--[/diy]-->
 </div> 
<div class="works_body">
<div class="wdao_works_tt w1200">
<h2> <a href="./"> 今日推荐</a></h2>
</div>
<div class="wdao_works_box" style="width: 1221px;margin:0 auto">
  <!--[diy=diy_works]--><div id="diy_works" class="area"></div><!--[/diy]--> 
  </div>
</div>   
<div class="wdao_works_tt w1200">
<h2> <a href="./"> 社区热点</a></h2>
</div>
<div class="w1200 cl" style="margin-top: 20px;">
<div class="wdao_ll">
  <!--[diy=diy_wdao_l1]--><div id="diy_wdao_l1" class="area"></div><!--[/diy]-->
</div>
<div class="wdao_r">
  <!--[diy=diy_wdao_r1]--><div id="diy_wdao_r1" class="area"></div><!--[/diy]-->
  <div class="cl" style="margin:20px 0;">
  <div class="wdao_blog_re">热点聚焦</div>
  <!--[diy=diy_wdao_r2]--><div id="diy_wdao_r2" class="area"></div><!--[/diy]-->
  </div>
    <div class="cl" style="margin:20px 0;">
  <!--[diy=diy_wdao_r3]--><div id="diy_wdao_r3" class="area"></div><!--[/diy]-->
  </div>
</div>
<div class="cl"></div>
  <!--[diy=diy_bottom]--><div id="diy_bottom" class="area"></div><!--[/diy]-->
</div>






<script src="misc.php?mod=diyhelp&action=get&type=index&diy=yes&r=<?php echo random(4); ?>" type="text/javascript" type="text/javascript"></script><?php include template('common/footer'); ?>