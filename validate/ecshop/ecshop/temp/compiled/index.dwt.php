<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v4.1.1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<style>
.classmenu{visibility:visible}
</style>
<script language='javascript' src='<?php echo $this->_var['template_dir']; ?>/js/cxjc0.js' type='text/javascript' charset='utf-8'></script>
  <div class="clear0"></div>
 
<?php $this->assign('ads_id','1'); ?><?php $this->assign('ads_num','3'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

<div class="index_body">
  <div class="index_0">
    <div class="fl">
      <div class="hide_show">
        <div class="show_title"><span cid="4" class="v">特价抢购<i></i></span> <span cid="2">精品推荐<i></i></span> <span cid="3">新品上市<i></i></span> <span cid="1">本周热销<i></i></span>
          <div class="clear0"></div>
        </div>
        <div class="show_info">
          <div class="shows show4"> <?php echo $this->fetch('library/recommend_promotion.lbi'); ?></div>
          <div class="shows show2" style="display:none">
<?php echo $this->fetch('library/recommend_best.lbi'); ?>
</div>
          <div class="shows show3" style="display:none"> 
<?php echo $this->fetch('library/recommend_new.lbi'); ?>
</div>
          <div class="shows show1" style="display:none"> 
<?php echo $this->fetch('library/recommend_hot.lbi'); ?>
 </div>
        </div>
        <div class="clear0"></div>
      </div>
    </div>
    <div class="fr">

      
<?php echo $this->fetch('library/cat_articles.lbi'); ?>
<?php echo $this->fetch('library/order_query.lbi'); ?>
 </div>
    <div class="clear0"></div>
  </div>
  <div class="clear10 fd30_goods_pic"></div>
  <div class="index_f index_f1" id="f1"><span class="allf">1F</span>
    <div class="fl"> 
<?php $this->assign('ads_id','2'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
 <div class="fd30_wordmenu"></div> <div class="clear0"></div></div>
    <div class="fr"> 
<?php $this->assign('cat_goods',$this->_var['cat_goods_1']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_1']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
 </div>
    <div class="clear0"></div>
  </div>
  <div class="index_f index_f2" id="f2"><span class="allf">2F</span>
    <div class="fl"> 
<?php $this->assign('ads_id','3'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
 <div class="fd30_wordmenu"></div> <div class="clear0"></div></div>
    <div class="fr"> 
<?php $this->assign('cat_goods',$this->_var['cat_goods_8']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_8']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
 </div>
    <div class="clear0"></div>
  </div>
  <div class="index_f index_f3" id="f3"><span class="allf">3F</span>
    <div class="fl"> 
<?php $this->assign('ads_id','4'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
 <div class="fd30_wordmenu"></div> <div class="clear0"></div></div>
    <div class="fr"> 
<?php $this->assign('cat_goods',$this->_var['cat_goods_9']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_9']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
 </div>
    <div class="clear0"></div>
  </div>
  <div class="index_f index_f4" id="f4"><span class="allf">4F</span>
    <div class="fl"> 
<?php $this->assign('ads_id','5'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
<div class="fd30_wordmenu"></div>  <div class="clear0"></div></div>
    <div class="fr"> 
<?php $this->assign('cat_goods',$this->_var['cat_goods_5']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_5']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
 </div>
    <div class="clear0"></div>
  </div>
  <div class="index_f index_f5" id="f5"><span class="allf">5F</span>
    <div class="fl"> 
<?php $this->assign('ads_id','6'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
 <div class="fd30_wordmenu"></div> <div class="clear0"></div></div>
    <div class="fr"> 
<?php $this->assign('cat_goods',$this->_var['cat_goods_10']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_10']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
 </div>
    <div class="clear0"></div>
  </div>
  <div class="index_f index_f6" id="f6"><span class="allf">6F</span>
    <div class="fl"> 
<?php $this->assign('ads_id','7'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
 <div class="fd30_wordmenu"></div> <div class="clear0"></div></div>
    <div class="fr"> 
<?php $this->assign('cat_goods',$this->_var['cat_goods_11']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_11']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
 </div>
    <div class="clear0"></div>
  </div>

  <script>$(function (){
		 for (var i = 0; i < $(".Tr_cs1 .cxjitem").size(); i++){
 							 var imgsrc=$(".Tr_cs1 .cxjitem>a>img").eq(i).attr("src");
			 $(".Tr_cs1 .cxjitem").eq(i).css({'background-image':'url('+imgsrc+')'});
 							 };
        $(".Tr_cs1").textSlider({
            speeds: 5000,
            lines: 1,
            offset: 7000,
            direc: 4,
            qnum: 1
        });
$(".show_title span").hover(function(){
  var type=$(this).attr("cid");
  $(".show_title span[cid]").removeClass("v");
  $(this).addClass("v");
  $(".show_info>div").hide();
  $(".show_info>div.show"+type).show();
 });
$(".show_title0 span").hover(function(){
  var type=$(this).attr("cid");
  $(".show_title0 span[cid]").removeClass("v");
  $(this).addClass("v");
  $(".show_info0>div").hide();
  $(".show_info0>div.show"+type).show();
 });
var f_top = $(".fd30_goods_pic").offset().top-50;
$(window).scroll(function() {  
   var s_top=$(window).scrollTop();
	$('.index_f').each(function(i) {
	   if(s_top>=f_top+i*420){
		 $("#gotop").show();
	     $(".allf>li").removeClass("li_v");
		 $('.allf>li.f'+i).addClass('li_v');
        }
       });

	if(s_top<f_top){
	     $(".allf>li").removeClass("li_v");
		 $("#gotop").hide();
         }

 });
var fright = $(window).width() - 1190;
$("#gotop").css({"right":fright/2-55});

});
</script>
  <div class="clear10"></div>
  <div class="index_footad opacity"> 
   <div class="clear0"></div></div>
  <div class="clear10"></div>
</div>
<?php echo $this->fetch('library/index_allf.lbi'); ?>
<?php echo $this->fetch('library/help.lbi'); ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>
