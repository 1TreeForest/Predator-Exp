<?php echo $this->smarty_insert_scripts(array('files'=>'transport2.js,utils.js')); ?>
<link href="<?php echo $this->_var['template_dir']; ?>/images/ec12.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
<script language='javascript' src='<?php echo $this->_var['template_dir']; ?>/js/fdjs.js' type='text/javascript' charset='utf-8'></script>
<script language='javascript' src='<?php echo $this->_var['template_dir']; ?>/js/fdjs.json.js' type='text/javascript' charset='utf-8'></script>
<a name="top"></a>
<div class=fd_top0>
  <div class=fd_top>
  <div class=pull-left>
      <table border=0>
        <tbody>
          <TR>
            <td><font id="ECS_MEMBERZONE"><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?> </font></td>
            <td><div class=fd30_wordmenu><i class="toptel"></i><span>400-821-3016 位置：模板管理-库项目管理-page_header.lbi–页面顶部</span></div></td>
          </TR>
        </tbody>
      </table>
    </div>
    <div class=pull-right>
      <ul>
        <li class=myorder><a href="user.php?act=order_list" class="order">我的订单</a></li>
        <li class=li1><a onclick=addFavorite(window.location,document.title) href="#">收藏本站</a></li>
        <li class="li3 cs_transform"><a href="">微信扫一扫<I></I><SPaN><IMG src="themes/default/images/wechat.png"></SPaN></a></li>
      </ul>
    </div>
  </div>
  <div class=clear0></div>
</div>
<div class="fd_top1">
  <div class="fd_top">
    <div class="logo1"><a href="index.php" name="top"><img src="<?php echo $this->_var['template_dir']; ?>/images/logo.gif" class="logo" /></a></div>
    <div class="logo_r">
      <div class="logo2 search">
        <div class="search_label">
          <form id="searchForm" name="searchForm" method="get" action="search.php"  class="SearchBar" onSubmit="return checkSearchForm()">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><select name="category" id="category" class="B_input" style="display:none">
                    <option value="0"><?php echo $this->_var['lang']['all_category']; ?></option>
                    <?php echo $this->_var['category_list']; ?>
                  </select>
                  <input name="keywords" type="text" id="keyword" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>" class="inputstyle keywords"  /></td>
                <td><input name="imageField" type="submit" value="" title="搜索" class="btn_search" style="cursor:pointer;" /></td>
                <td style="display:none"><a href="search.php?act=advanced_search"><?php echo $this->_var['lang']['advanced_search']; ?></a></td>
              </tr>
            </table>
          </form>
        </div>
        <div class="hot-keywords"> <span>热门搜索:</span>
          <script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
            alert("<?php echo $this->_var['lang']['no_keywords']; ?>");
            return false;
        }
    }
    -->
    
    </script>
          <?php if ($this->_var['searchkeywords']): ?>
          <?php $_from = $this->_var['searchkeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?> <a href="search.php?keywords=<?php echo urlencode($this->_var['val']); ?>"><?php echo $this->_var['val']; ?></a> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php endif; ?> </div>
      </div>
      <div class="logo3">
        <div class="cart" id="ECS_CaRTINFO"> <?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?> </div>
         </div>
    </div>
    <div class="clear0"></div>
  </div>
</div>
<div class="fd_top2">
  <div class="navs fd_top">
    <div class="navs_l hover">
      <div class="fd30_cat">
        <div class="t">全部商品分类</div>
        <div class="classmenu">
          <ul>
            <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['catename'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['catename']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['catename']['iteration']++;
?>  <?php if (($this->_foreach['catename']['iteration'] - 1) < 6): ?>
            <li class="cat_lv1 hover  post_cat<?php echo $this->_var['cat']['id']; ?> li<?php echo $this->_foreach['catename']['iteration']; ?>">
              <h4><a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a>
              
       
                <span>></span><i></i></h4><div class="next_t">         <?php if ($this->_var['cat']['cat_id']): ?>
                <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['childname'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['childname']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['childname']['iteration']++;
?>
                <?php if (($this->_foreach['childname']['iteration'] - 1) <= 2): ?>
                <a class="xz" href="<?php echo $this->_var['child']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endif; ?></div>
              <div class="cat_p">
                <div class="cat_cat">
                  <?php if ($this->_var['cat']['cat_id']): ?>
                  <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['childname'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['childname']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['childname']['iteration']++;
?>
                  <dl 
                    
                
                  <?php if (($this->_foreach['childname']['iteration'] <= 1)): ?>
                  class="fore"
                  <?php endif; ?>
                  >
                  <dt><a class="at" href="<?php echo $this->_var['child']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a></dt>
                  <?php if ($this->_var['child']['cat_id']): ?>
                  <dd>
                    <?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
                    <a href="<?php echo $this->_var['childer']['url']; ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php endif; ?>
                  </dd>
                  <div class="clear0"></div>
                  </dl>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  <?php endif; ?>
                </div>
                <div class="cat_brand">
                  <h2>推荐品牌</h2>
                  <div class="show_cat_brand">
                    <?php $_from = get_cat_brands($this->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brandCat');if (count($_from)):
    foreach ($_from AS $this->_var['brandCat']):
?>
                    <div  class="cxjitem post_brand"> <a href="<?php echo $this->_var['brandCat']['url']; ?>"><img src="data/brandlogo/<?php echo $this->_var['brandCat']['brand_logo']; ?>" title="<?php echo $this->_var['brandCat']['brand_name']; ?>" /></a> </div>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   <div class="clear0"></div>
                  </div>
                </div>
              </div>
            </li>   <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="navs_m">
      <ul class="Menulist">
        <li class="li1"><a href="index.php"<?php if ($this->_var['navigator_list']['config']['index'] == 1): ?> class="cur"<?php endif; ?>><?php echo $this->_var['lang']['home']; ?></a></li>
        <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
        <?php if (($this->_foreach['nav_middle_list']['iteration'] - 1) < 6): ?>
        <?php if (($this->_foreach['nav_middle_list']['iteration'] == $this->_foreach['nav_middle_list']['total'])): ?>
        <li><a href="<?php echo $this->_var['nav']['url']; ?>" 
          <?php if ($this->_var['nav']['opennew'] == 1): ?>
          target="_blank"
          <?php endif; ?>
          ><?php echo $this->_var['nav']['name']; ?></a></li>
        <?php else: ?>
        <li><a href="<?php echo $this->_var['nav']['url']; ?>" 
          <?php if ($this->_var['nav']['opennew'] == 1): ?>
          target="_blank"
          <?php endif; ?>
          ><?php echo $this->_var['nav']['name']; ?></a></li>
        <?php endif; ?>
        <?php if ($this->_var['nav']['active'] == 1): ?>
        <?php endif; ?>     <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>
    </div>
    <div class="navs_r"> <a href="exchange.php"> 积分商城</a> | <a href="brand.php">全部品牌</a> </div>
    <div class="clear0"></div>
  </div>
</div>
<script>	
function addFavorite(sURL, sTitle)
{
    try
    {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("对不起您的浏览器不支持操作，请使用Ctrl+D进行添加");
        }
    }
};
$(function (){
			
			
	/*		$('.navs_l .cat_lv1').each(function(i){ $(this).find("h4").addClass("a" + i);
									      if($(this).find("span").size()==0){
													$(this).children().children().find("div").detach();
															  }															  
										 });  */
	$(".fd30_slideTog").hover(function(){
     $(this).children(".slideTog_info").slideDown("slow");
	 $(this).addClass("fd30_slideTog_v");
},function () {	
     $(this).children(".slideTog_info").hide();
	 $(this).removeClass("fd30_slideTog_v");
  });	
				
				}) 
</script>
