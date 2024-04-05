<?php $this->_tpl_include('user_menu_header.tpl'); ?>

<script type="text/javascript">
$(document).ready(function() {
	$("#closeall").click(function() {
		var checked_status = this.checked;
		$("input[name='closenow[]']").each(function() {
			this.checked = checked_status;
		});
	});
	$("#deleteall").click(function() {
		var checked_status = this.checked;
		$("input[name='O_delete[]']").each(function() {
			this.checked = checked_status;
		});
	});
	$("#processdel").submit(function() {
		if (confirm('<?php echo ((isset($this->_rootref['L_30_0087'])) ? $this->_rootref['L_30_0087'] : ((isset($MSG['30_0087'])) ? $MSG['30_0087'] : '{ L_30_0087 }')); ?>'))
		{
			return true;
		}
		else
		{
			return false;
		}
	});
});
</script>

<?php if ($this->_rootref['USER_MESSAGE'] != ('')) {  ?>
<div class="success-box"><?php echo (isset($this->_rootref['USER_MESSAGE'])) ? $this->_rootref['USER_MESSAGE'] : ''; ?></div>
<?php } ?>

<form name="auctions" method="post" action="" id="processdel">
	<input type="hidden" name="csrftoken" value="<?php echo (isset($this->_rootref['_CSRFTOKEN'])) ? $this->_rootref['_CSRFTOKEN'] : ''; ?>">
	<ul class="nav nav-tabs nav-justified">
		<li role="presentation"><a href="yourauctions_p.php"><?php echo ((isset($this->_rootref['L_25_0115'])) ? $this->_rootref['L_25_0115'] : ((isset($MSG['25_0115'])) ? $MSG['25_0115'] : '{ L_25_0115 }')); ?></a></li>
		<li role="presentation" class="active"><a href="yourauctions.php"><?php echo ((isset($this->_rootref['L_619'])) ? $this->_rootref['L_619'] : ((isset($MSG['619'])) ? $MSG['619'] : '{ L_619 }')); ?></a></li>
		<li role="presentation"><a href="yourauctions_c.php"><?php echo ((isset($this->_rootref['L_204'])) ? $this->_rootref['L_204'] : ((isset($MSG['204'])) ? $MSG['204'] : '{ L_204 }')); ?></a></li>
		<li role="presentation"><a href="yourauctions_s.php"><?php echo ((isset($this->_rootref['L_2__0056'])) ? $this->_rootref['L_2__0056'] : ((isset($MSG['2__0056'])) ? $MSG['2__0056'] : '{ L_2__0056 }')); ?></a></li>
		<li role="presentation"><a href="yourauctions_sold.php"><?php echo ((isset($this->_rootref['L_25_0119'])) ? $this->_rootref['L_25_0119'] : ((isset($MSG['25_0119'])) ? $MSG['25_0119'] : '{ L_25_0119 }')); ?></a></li>
	</ul>
	<table class="table table-bordered table-condensed table-striped">
		<tr>
			<td width="32%">
				<a href="yourauctions.php?oa_ord=title&oa_type=<?php echo (isset($this->_rootref['ORDERNEXT'])) ? $this->_rootref['ORDERNEXT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_624'])) ? $this->_rootref['L_624'] : ((isset($MSG['624'])) ? $MSG['624'] : '{ L_624 }')); ?></a>
<?php if ($this->_rootref['ORDERCOL'] == ('title')) {  ?>
				<a href="yourauctions.php?oa_ord=title&oa_type=<?php echo (isset($this->_rootref['ORDERNEXT'])) ? $this->_rootref['ORDERNEXT'] : ''; ?>"><?php echo (isset($this->_rootref['ORDERTYPEIMG'])) ? $this->_rootref['ORDERTYPEIMG'] : ''; ?></a>
<?php } ?>
			</td>
			<td class="hidden-xs" width="11%">
				<a href="yourauctions.php?oa_ord=starts&oa_type=<?php echo (isset($this->_rootref['ORDERNEXT'])) ? $this->_rootref['ORDERNEXT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_625'])) ? $this->_rootref['L_625'] : ((isset($MSG['625'])) ? $MSG['625'] : '{ L_625 }')); ?></a>
<?php if ($this->_rootref['ORDERCOL'] == ('starts')) {  ?>
				<a href="yourauctions.php?oa_ord=starts&oa_type=<?php echo (isset($this->_rootref['ORDERNEXT'])) ? $this->_rootref['ORDERNEXT'] : ''; ?>"><?php echo (isset($this->_rootref['ORDERTYPEIMG'])) ? $this->_rootref['ORDERTYPEIMG'] : ''; ?></a>
<?php } ?>
			</td>
			<td width="11%">
				<a href="yourauctions.php?oa_ord=ends&oa_type=<?php echo (isset($this->_rootref['ORDERNEXT'])) ? $this->_rootref['ORDERNEXT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_626'])) ? $this->_rootref['L_626'] : ((isset($MSG['626'])) ? $MSG['626'] : '{ L_626 }')); ?></a>
<?php if ($this->_rootref['ORDERCOL'] == ('ends')) {  ?>
				<a href="yourauctions.php?oa_ord=ends&oa_type=<?php echo (isset($this->_rootref['ORDERNEXT'])) ? $this->_rootref['ORDERNEXT'] : ''; ?>"><?php echo (isset($this->_rootref['ORDERTYPEIMG'])) ? $this->_rootref['ORDERTYPEIMG'] : ''; ?></a>
<?php } ?>
			</td>
			<td class="hidden-xs" align="center" nowrap="nowrap">
				<?php echo ((isset($this->_rootref['L__0153'])) ? $this->_rootref['L__0153'] : ((isset($MSG['_0153'])) ? $MSG['_0153'] : '{ L__0153 }')); ?>
			</td>
			<td class="hidden-xs" width="7%" align="center">
				<a href="yourauctions.php?oa_ord=num_bids&oa_type=<?php echo (isset($this->_rootref['ORDERNEXT'])) ? $this->_rootref['ORDERNEXT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_627'])) ? $this->_rootref['L_627'] : ((isset($MSG['627'])) ? $MSG['627'] : '{ L_627 }')); ?></a>
<?php if ($this->_rootref['ORDERCOL'] == ('num_bids')) {  ?>
				<a href="yourauctions.php?oa_ord=num_bids&oa_type=<?php echo (isset($this->_rootref['ORDERNEXT'])) ? $this->_rootref['ORDERNEXT'] : ''; ?>"><?php echo (isset($this->_rootref['ORDERTYPEIMG'])) ? $this->_rootref['ORDERTYPEIMG'] : ''; ?></a>
<?php } ?>
			</td>
			<td width="10%" align="center">
				<a href="yourauctions.php?oa_ord=current_bid&oa_type=<?php echo (isset($this->_rootref['ORDERNEXT'])) ? $this->_rootref['ORDERNEXT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_116'])) ? $this->_rootref['L_116'] : ((isset($MSG['116'])) ? $MSG['116'] : '{ L_116 }')); ?></a>
<?php if ($this->_rootref['ORDERCOL'] == ('current_bid')) {  ?>
				<a href="yourauctions.php?oa_ord=current_bid&oa_type=<?php echo (isset($this->_rootref['ORDERNEXT'])) ? $this->_rootref['ORDERNEXT'] : ''; ?>"><?php echo (isset($this->_rootref['ORDERTYPEIMG'])) ? $this->_rootref['ORDERTYPEIMG'] : ''; ?></a>
<?php } ?>
			</td>
			<td width="6%" align="center">
				<?php echo ((isset($this->_rootref['L_298'])) ? $this->_rootref['L_298'] : ((isset($MSG['298'])) ? $MSG['298'] : '{ L_298 }')); ?>
			</td>
			<td width="8%" align="center">
				<?php echo ((isset($this->_rootref['L_008'])) ? $this->_rootref['L_008'] : ((isset($MSG['008'])) ? $MSG['008'] : '{ L_008 }')); ?>
			</td>
			<td width="6%" align="center" bgcolor="#FFFF00">
				<?php echo ((isset($this->_rootref['L_2__0048'])) ? $this->_rootref['L_2__0048'] : ((isset($MSG['2__0048'])) ? $MSG['2__0048'] : '{ L_2__0048 }')); ?>
			</td>
		</tr>
<?php if ($this->_rootref['B_AREITEMS']) {  $_items_count = (isset($this->_tpldata['items'])) ? sizeof($this->_tpldata['items']) : 0;if ($_items_count) {for ($_items_i = 0; $_items_i < $_items_count; ++$_items_i){$_items_val = &$this->_tpldata['items'][$_items_i]; ?>
		<tr bgcolor="#EEEEEE">
			<td width="32%">
				<a href="item.php?id=<?php echo $_items_val['ID']; ?>"><?php echo $_items_val['TITLE']; ?></a>
				<br>
				<small>[<?php echo ((isset($this->_rootref['L_30_0081'])) ? $this->_rootref['L_30_0081'] : ((isset($MSG['30_0081'])) ? $MSG['30_0081'] : '{ L_30_0081 }')); echo $_items_val['COUNTER']; echo ((isset($this->_rootref['L__0151'])) ? $this->_rootref['L__0151'] : ((isset($MSG['_0151'])) ? $MSG['_0151'] : '{ L__0151 }')); ?>]</small></td>
			<td class="hidden-xs" width="11%" align="center">
				<small><?php echo $_items_val['STARTS']; ?></small>
			</td>
			<td width="11%" align="center">
				<small><?php echo $_items_val['ENDS']; ?></small>
			</td>
			<td class="hidden-xs" width="9%"  align="center">
		<?php if ($_items_val['RELISTED'] == 0) {  ?>
				0
		<?php } else { ?>
				<?php echo $_items_val['RELISTED']; ?>
		<?php } ?>
			</td>
			<td class="hidden-xs" width="7%"  align="center">
				<?php echo $_items_val['BIDS']; ?>
			</td>
			<td width="10%"  align="center">
		<?php if ($_items_val['B_HASNOBIDS']) {  ?>
				<?php echo ((isset($this->_rootref['L_no_bids'])) ? $this->_rootref['L_no_bids'] : ((isset($MSG['no_bids'])) ? $MSG['no_bids'] : '{ L_no_bids }')); ?>
		<?php } else { ?>
				<?php echo $_items_val['BID']; ?>
		<?php } ?>
			</td>
			<td width="6%"  align="center">
		<?php if ($_items_val['B_HASNOBIDS']) {  ?>
				<a href="edit_active_auction.php?id=<?php echo $_items_val['ID']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true" title="<?php echo ((isset($this->_rootref['L_click_to_edit_auction'])) ? $this->_rootref['L_click_to_edit_auction'] : ((isset($MSG['click_to_edit_auction'])) ? $MSG['click_to_edit_auction'] : '{ L_click_to_edit_auction }')); ?>"></span></a>
		<?php } else { ?>
				<span class="glyphicon glyphicon-info-sign" aria-hidden="true" title="<?php echo ((isset($this->_rootref['L_edit_disabled'])) ? $this->_rootref['L_edit_disabled'] : ((isset($MSG['edit_disabled'])) ? $MSG['edit_disabled'] : '{ L_edit_disabled }')); ?>"></span>
		<?php } ?>
			</td>
			<td width="8%"  align="center">
		<?php if ($_items_val['B_HASNOBIDS']) {  ?>
				<input type="checkbox" name="O_delete[]" value="<?php echo $_items_val['ID']; ?>">
		<?php } else { ?>
				<span class="glyphicon glyphicon-info-sign" aria-hidden="true" title="<?php echo ((isset($this->_rootref['L_delete_auction_disabled'])) ? $this->_rootref['L_delete_auction_disabled'] : ((isset($MSG['delete_auction_disabled'])) ? $MSG['delete_auction_disabled'] : '{ L_delete_auction_disabled }')); ?>"></span>		
		<?php } ?>
			</td>
			<td width="6%"  align="center" bgcolor="#FFFFaa">
				<input type="checkbox" name="closenow[]" value="<?php echo $_items_val['ID']; ?>">
			</td>
		</tr>
	<?php }} } ?>
		<tr class="hidden-xs" <?php echo (isset($this->_rootref['BGCOLOUR'])) ? $this->_rootref['BGCOLOUR'] : ''; ?>>
			<td colspan="7" align="right"><?php echo ((isset($this->_rootref['L_30_0102'])) ? $this->_rootref['L_30_0102'] : ((isset($MSG['30_0102'])) ? $MSG['30_0102'] : '{ L_30_0102 }')); ?></td>
			<td align="center"><input type="checkbox" id="deleteall"></td>
			<td align="center"><input type="checkbox" id="closeall"></td>
		</tr>
		<tr>
			<td colspan="9" align="center">
				<input type="hidden" name="action" value="delopenauctions">
				<input type="submit" name="Submit" value="<?php echo ((isset($this->_rootref['L_631'])) ? $this->_rootref['L_631'] : ((isset($MSG['631'])) ? $MSG['631'] : '{ L_631 }')); ?>" class="btn btn-primary">
			</td>
		</tr>
	</table>
</form>
<div class="text-center">
	<?php echo ((isset($this->_rootref['L_5117'])) ? $this->_rootref['L_5117'] : ((isset($MSG['5117'])) ? $MSG['5117'] : '{ L_5117 }')); ?>&nbsp;<?php echo (isset($this->_rootref['PAGE'])) ? $this->_rootref['PAGE'] : ''; ?>&nbsp;<?php echo ((isset($this->_rootref['L_5118'])) ? $this->_rootref['L_5118'] : ((isset($MSG['5118'])) ? $MSG['5118'] : '{ L_5118 }')); ?>&nbsp;<?php echo (isset($this->_rootref['PAGES'])) ? $this->_rootref['PAGES'] : ''; ?>
	<br>
	<?php echo (isset($this->_rootref['PREV'])) ? $this->_rootref['PREV'] : ''; ?>
<?php $_pages_count = (isset($this->_tpldata['pages'])) ? sizeof($this->_tpldata['pages']) : 0;if ($_pages_count) {for ($_pages_i = 0; $_pages_i < $_pages_count; ++$_pages_i){$_pages_val = &$this->_tpldata['pages'][$_pages_i]; ?>
	<?php echo $_pages_val['PAGE']; ?>&nbsp;&nbsp;
<?php }} ?>
	<?php echo (isset($this->_rootref['NEXT'])) ? $this->_rootref['NEXT'] : ''; ?>
</div>

<?php $this->_tpl_include('user_menu_footer.tpl'); ?>