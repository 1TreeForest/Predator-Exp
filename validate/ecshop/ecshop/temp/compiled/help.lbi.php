<div class="footer_wrap"><div class="our_services footer">
  <div class="c c1">
    <DIV class=weixin>
      <DIV class=pic><IMG alt="ECshop测试站移动商城" src="<?php echo $this->_var['template_dir']; ?>/images/wx.jpg" width="70"></DIV>
      <H4>ECshop测试站移动商城</H4>
      <DIV class=desc>文字内容修改位置：模板管理-库项目管理-help.lbi-帮助内容</DIV>
    </DIV>
    
  </div>
  <?php if ($this->_var['helps']): ?>
  <?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');if (count($_from)):
    foreach ($_from AS $this->_var['help_cat']):
?>
  <div class="c c2"><i></i>
    <dt><?php echo $this->_var['help_cat']['cat_name']; ?></dt>
    <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
    <dd><a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['item']['title']); ?>"><?php echo $this->_var['item']['short_title']; ?></a></dd>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <?php endif; ?>
  <div class="clear10"></div>
</div></div>