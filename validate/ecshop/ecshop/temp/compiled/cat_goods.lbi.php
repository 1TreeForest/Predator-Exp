<h2><span><?php echo htmlspecialchars($this->_var['goods_cat']['name']); ?></span><a href="<?php echo $this->_var['goods_cat']['url']; ?>" class="more">更多></a></h2>
<div class="i_prclist hover" id="goods_cat<?php echo $this->_var['goods_cat']['id']; ?>"><a href="<?php echo $this->_var['goods_cat']['url']; ?>" class="pmore">更多<?php echo htmlspecialchars($this->_var['goods_cat']['name']); ?>分类</a>
  <div class="cxjad_m">
    <div class="cxjinfo">
      <?php $_from = $this->_var['cat_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_45855600_1601356808');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_45855600_1601356808']):
?>
      <div class="cxjitem">
        <div class="p"><a href="<?php echo $this->_var['goods_0_45855600_1601356808']['url']; ?>" class="aimg"><img src="<?php echo $this->_var['goods_0_45855600_1601356808']['thumb']; ?>" width="200" height="200" alt="<?php echo htmlspecialchars($this->_var['goods_0_45855600_1601356808']['name']); ?>" class="goodsimg" /></a></div>
        <div class="i">
          <h3><a href="<?php echo $this->_var['goods_0_45855600_1601356808']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_45855600_1601356808']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods_0_45855600_1601356808']['short_name']); ?>
            <?php if ($this->_var['goods_0_45855600_1601356808']['brief']): ?>
            <em class="brief"><?php echo $this->_var['goods_0_45855600_1601356808']['brief']; ?></em>
            <?php endif; ?>
            </a></h3>
          <ul class="prices">
            <li class="gel-price">
              <?php if ($this->_var['goods_0_45855600_1601356808']['promote_price'] != ""): ?>
              <?php echo $this->_var['lang']['promote_price']; ?><em><?php echo $this->_var['goods_0_45855600_1601356808']['promote_price']; ?></em>
              <?php else: ?>
              销售价：<em><?php echo $this->_var['goods_0_45855600_1601356808']['shop_price']; ?></em>
              <?php endif; ?>
            </li>
            <li class="gel-mktprice"><em>市场价：</em><?php echo $this->_var['goods_0_45855600_1601356808']['market_price']; ?></li>
          </ul>
        </div>
      </div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
  </div>
  <div class="clear0"></div>
</div>

<script>$(function (){					  
					$(".post_cat<?php echo $this->_var['goods_cat']['id']; ?> dt a").clone().prependTo($("#goods_cat<?php echo $this->_var['goods_cat']['id']; ?>").parent().parent().children(".fl").children(".fd30_wordmenu"));					 	
					$("#goods_cat<?php echo $this->_var['goods_cat']['id']; ?> .pmore").appendTo($("#goods_cat<?php echo $this->_var['goods_cat']['id']; ?>").parent().parent().children(".fl").children(".fd30_wordmenu"));
					  })
</script>