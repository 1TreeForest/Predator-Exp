<div id="Tr_cs<?php echo $this->_var['ads_id']; ?>"><?php 
$k = array (
  'name' => 'ads',
  'id' => $this->_var['ads_id'],
  'num' => $this->_var['ads_num'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>