<?php if ($this->_var['promotion_goods']): ?>
<div class="i_prclist">
  <?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['promotion_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['promotion_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['promotion_foreach']['iteration']++;
?>
  <div class="cxjitem <?php if (($this->_foreach['promotion_foreach']['iteration'] <= 1)): ?>cxjitem_f<?php endif; ?>">
    <div class="p"><a href="<?php echo $this->_var['goods']['url']; ?>" class="aimg"><img src="<?php echo $this->_var['goods']['thumb']; ?>" width="200" height="200" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="goodsimg" /></a>
    
  
    </div>
    <div class="i">
      <h3 class="promotion_h3"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['short_name']); ?>
        <?php if ($this->_var['goods']['brief']): ?>
        <em class="brief"><?php echo $this->_var['goods']['brief']; ?></em>
        <?php endif; ?>
        </a></h3>
      <ul class="prices">
        <li class="gel-price"> <?php echo $this->_var['lang']['promote_price']; ?><em><?php echo $this->_var['goods']['promote_price']; ?></em> </li>
        <li class="gel-mktprice"><em>市场价：</em><?php echo $this->_var['goods']['market_price']; ?></li>
      </ul>
      <div class="clear0"></div>
   
    </div>
  </div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <div class="clear0"></div>
</div>
<?php endif; ?>
