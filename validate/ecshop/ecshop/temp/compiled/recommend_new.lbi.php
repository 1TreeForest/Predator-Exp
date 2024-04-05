<?php if ($this->_var['new_goods']): ?>
<?php if ($this->_var['cat_rec_sign'] != 1): ?>
<DIV class="i_prclist_t"><SPAN>新品速递</SPAN><a href="search.php?intro=new" class="more">查看更多></a></DIV>
<div id="show_new_area" class="clearfix i_prclist">
  <?php endif; ?>
  <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_38811800_1601356808');$this->_foreach['new_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['new_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_38811800_1601356808']):
        $this->_foreach['new_goods']['iteration']++;
?>
  <div class="cxjitem <?php if (($this->_foreach['new_goods']['iteration'] <= 1)): ?>cxjitem_f<?php endif; ?>">
    <div class="p"><a href="<?php echo $this->_var['goods_0_38811800_1601356808']['url']; ?>" class="aimg"><img src="<?php echo $this->_var['goods_0_38811800_1601356808']['thumb']; ?>" width="200" height="200" alt="<?php echo htmlspecialchars($this->_var['goods_0_38811800_1601356808']['name']); ?>" class="goodsimg" /></a></div>
    <div class="i">
      <h3><a href="<?php echo $this->_var['goods_0_38811800_1601356808']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_38811800_1601356808']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods_0_38811800_1601356808']['short_name']); ?>
        <?php if ($this->_var['goods_0_38811800_1601356808']['brief']): ?>
        <em class="brief"><?php echo $this->_var['goods_0_38811800_1601356808']['brief']; ?></em>
        <?php endif; ?>
        </a></h3>
      <ul class="prices">
        <li class="gel-price">
          <?php if ($this->_var['goods_0_38811800_1601356808']['promote_price'] != ""): ?>
          <?php echo $this->_var['lang']['promote_price']; ?><em><?php echo $this->_var['goods_0_38811800_1601356808']['promote_price']; ?></em>
          <?php else: ?>
          销售价：<em><?php echo $this->_var['goods_0_38811800_1601356808']['shop_price']; ?></em>
          <?php endif; ?>
        </li>
        <li class="gel-mktprice"><em>市场价：</em><?php echo $this->_var['goods_0_38811800_1601356808']['market_price']; ?></li>
      </ul>
    </div>
  </div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <?php if ($this->_var['cat_rec_sign'] != 1): ?>
  <div class="clear0"></div>
</div>
<?php endif; ?>
<?php endif; ?>
