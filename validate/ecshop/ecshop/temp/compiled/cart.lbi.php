<div  id="ECS_CARTINFO" class="fd30_slideTog ShopCartWrap">
  <?php if ($this->_var['goods']): ?>
  <h4 class="cs_transform"><a href="flow.php">购物车<b id="goodsCount"><?php echo $this->_var['goods_number']; ?></b>件</a> <i></i></h4>
  <div id="cart_list" class="slideTog_info">
    <div id="goodsList"> <?php $_from = $this->_var['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_62761100_1601356808');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_62761100_1601356808']):
        $this->_foreach['goods']['iteration']++;
?>
      <ul>
        <li class="cart_img"><a href="<?php echo $this->_var['goods_0_62761100_1601356808']['url']; ?>"><img src="<?php echo $this->_var['goods_0_62761100_1601356808']['goods_thumb']; ?>" /></a></li>
        <li class="cart_name"><a  href="<?php echo $this->_var['goods_0_62761100_1601356808']['url']; ?>"><?php echo $this->_var['goods_0_62761100_1601356808']['short_name']; ?></a>
          <p><em><?php echo $this->_var['goods_0_62761100_1601356808']['goods_price']; ?></em><a class="del" href="javascript:" onClick="deleteCartGoods(<?php echo $this->_var['goods_0_62761100_1601356808']['rec_id']; ?>)">删除</a></p>
        </li>
        <div class="clear0"></div>
      </ul>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </div>
    <div class="total"><span>共<b id="goodsCount2"><?php echo $this->_var['goods_number']; ?></b>件商品，总计：￥<b id="goodsAmount"><?php echo $this->_var['order_amount']; ?></b></span><a class="btn" href="flow.php">去结算</a></div>
  </div>
  <?php else: ?>
 <h4 class="cs_transform"><a href="flow.php">购物车<b id="goodsCount"><?php echo $this->_var['goods_number']; ?></b>件</a> <i></i></h4>
   <div id="cart_list" class="slideTog_info"><div class="noprc">您购物车暂商品，赶紧选购吧！</div></div>
  <?php endif; ?>
</div>
<script type="text/javascript">

function deleteCartGoods(rec_id)

{

Ajax.call('delete_cart_goods.php', 'id='+rec_id, deleteCartGoodsResponse, 'POST', 'JSON');

}

/**

* 接收删除后返回的信息

*/

function deleteCartGoodsResponse(res)

{

  if (res.error)

  {

    alert(res.err_msg);

  }

  else

  {

      document.getElementById('ECS_CARTINFO').innerHTML = res.content;

  }

}

</script>
