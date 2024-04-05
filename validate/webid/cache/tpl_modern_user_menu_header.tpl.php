<div class="row">
	<div class="col-md-3">
		<div class="btn-group btn-group-justified visible-xs visible-sm" role="group" aria-label="...">
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<?php echo ((isset($this->_rootref['L_25_0081'])) ? $this->_rootref['L_25_0081'] : ((isset($MSG['25_0081'])) ? $MSG['25_0081'] : '{ L_25_0081 }')); ?>
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=summary"><?php echo ((isset($this->_rootref['L_25_0080'])) ? $this->_rootref['L_25_0080'] : ((isset($MSG['25_0080'])) ? $MSG['25_0080'] : '{ L_25_0080 }')); ?></a></li>
					<li><a href="yourfeedback.php"><?php echo ((isset($this->_rootref['L_208'])) ? $this->_rootref['L_208'] : ((isset($MSG['208'])) ? $MSG['208'] : '{ L_208 }')); ?></a></li>
					<li><a href="leave_feedback.php"><?php echo ((isset($this->_rootref['L_207'])) ? $this->_rootref['L_207'] : ((isset($MSG['207'])) ? $MSG['207'] : '{ L_207 }')); ?></a></li>
					<li><a href="mail.php"><?php echo ((isset($this->_rootref['L_623'])) ? $this->_rootref['L_623'] : ((isset($MSG['623'])) ? $MSG['623'] : '{ L_623 }')); ?></a></li>
					<li><a href="outstanding.php"><?php echo ((isset($this->_rootref['L_422'])) ? $this->_rootref['L_422'] : ((isset($MSG['422'])) ? $MSG['422'] : '{ L_422 }')); ?></a></li>
					<li><a href="invoices.php"><?php echo ((isset($this->_rootref['L_1057'])) ? $this->_rootref['L_1057'] : ((isset($MSG['1057'])) ? $MSG['1057'] : '{ L_1057 }')); ?></a></li>
					<li><a href="selleremails.php"><?php echo ((isset($this->_rootref['L_25_0188'])) ? $this->_rootref['L_25_0188'] : ((isset($MSG['25_0188'])) ? $MSG['25_0188'] : '{ L_25_0188 }')); ?></a></li>
					<li><a href="edit_data.php"><?php echo ((isset($this->_rootref['L_621'])) ? $this->_rootref['L_621'] : ((isset($MSG['621'])) ? $MSG['621'] : '{ L_621 }')); ?></a></li>
				</ul>
			</div>
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<?php echo ((isset($this->_rootref['L_25_0082'])) ? $this->_rootref['L_25_0082'] : ((isset($MSG['25_0082'])) ? $MSG['25_0082'] : '{ L_25_0082 }')); ?>
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
<?php if ($this->_rootref['B_CAN_SELL']) {  ?>
					<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>select_category.php?"><?php echo ((isset($this->_rootref['L_028'])) ? $this->_rootref['L_028'] : ((isset($MSG['028'])) ? $MSG['028'] : '{ L_028 }')); ?></a></li>
					<li><a href="yourauctions_p.php"><?php echo ((isset($this->_rootref['L_25_0115'])) ? $this->_rootref['L_25_0115'] : ((isset($MSG['25_0115'])) ? $MSG['25_0115'] : '{ L_25_0115 }')); ?></a></li>
					<li><a href="yourauctions.php"><?php echo ((isset($this->_rootref['L_203'])) ? $this->_rootref['L_203'] : ((isset($MSG['203'])) ? $MSG['203'] : '{ L_203 }')); ?></a></li>
					<li><a href="yourauctions_c.php"><?php echo ((isset($this->_rootref['L_204'])) ? $this->_rootref['L_204'] : ((isset($MSG['204'])) ? $MSG['204'] : '{ L_204 }')); ?></a></li>
					<li><a href="yourauctions_s.php"><?php echo ((isset($this->_rootref['L_2__0056'])) ? $this->_rootref['L_2__0056'] : ((isset($MSG['2__0056'])) ? $MSG['2__0056'] : '{ L_2__0056 }')); ?></a></li>
					<li><a href="yourauctions_sold.php"><?php echo ((isset($this->_rootref['L_25_0119'])) ? $this->_rootref['L_25_0119'] : ((isset($MSG['25_0119'])) ? $MSG['25_0119'] : '{ L_25_0119 }')); ?></a></li>
					<li><a href="selling.php"><?php echo ((isset($this->_rootref['L_453'])) ? $this->_rootref['L_453'] : ((isset($MSG['453'])) ? $MSG['453'] : '{ L_453 }')); ?></a></li>
<?php } ?>
				</ul>
			</div>
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<?php echo ((isset($this->_rootref['L_25_0083'])) ? $this->_rootref['L_25_0083'] : ((isset($MSG['25_0083'])) ? $MSG['25_0083'] : '{ L_25_0083 }')); ?>
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu dropdown-menu-right" role="menu">
					<li><a href="auction_watch.php"><?php echo ((isset($this->_rootref['L_471'])) ? $this->_rootref['L_471'] : ((isset($MSG['471'])) ? $MSG['471'] : '{ L_471 }')); ?></a></li>
					<li><a href="item_watch.php"><?php echo ((isset($this->_rootref['L_472'])) ? $this->_rootref['L_472'] : ((isset($MSG['472'])) ? $MSG['472'] : '{ L_472 }')); ?></a></li>
					<li><a href="yourbids.php"><?php echo ((isset($this->_rootref['L_620'])) ? $this->_rootref['L_620'] : ((isset($MSG['620'])) ? $MSG['620'] : '{ L_620 }')); ?></a></li>
					<li><a href="buying.php"><?php echo ((isset($this->_rootref['L_454'])) ? $this->_rootref['L_454'] : ((isset($MSG['454'])) ? $MSG['454'] : '{ L_454 }')); ?></a></li>
				</ul>
			</div>
		</div>
		<div class="panel panel-default hidden-xs hidden-sm">
			<div class="list-group">
				<a class="list-group-item" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=summary"><?php echo ((isset($this->_rootref['L_25_0080'])) ? $this->_rootref['L_25_0080'] : ((isset($MSG['25_0080'])) ? $MSG['25_0080'] : '{ L_25_0080 }')); ?></a>
				<a class="list-group-item disabled" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=account"><?php echo ((isset($this->_rootref['L_25_0081'])) ? $this->_rootref['L_25_0081'] : ((isset($MSG['25_0081'])) ? $MSG['25_0081'] : '{ L_25_0081 }')); ?></a>
				<a class="list-group-item" href="yourfeedback.php"><?php echo ((isset($this->_rootref['L_208'])) ? $this->_rootref['L_208'] : ((isset($MSG['208'])) ? $MSG['208'] : '{ L_208 }')); ?></a>
				<a class="list-group-item" href="leave_feedback.php"><?php echo ((isset($this->_rootref['L_207'])) ? $this->_rootref['L_207'] : ((isset($MSG['207'])) ? $MSG['207'] : '{ L_207 }')); ?></a>
				<a class="list-group-item" href="mail.php"><?php echo ((isset($this->_rootref['L_623'])) ? $this->_rootref['L_623'] : ((isset($MSG['623'])) ? $MSG['623'] : '{ L_623 }')); ?></a>
				<a class="list-group-item" href="outstanding.php"><?php echo ((isset($this->_rootref['L_422'])) ? $this->_rootref['L_422'] : ((isset($MSG['422'])) ? $MSG['422'] : '{ L_422 }')); ?></a>
				<a class="list-group-item" href="invoices.php"><?php echo ((isset($this->_rootref['L_1057'])) ? $this->_rootref['L_1057'] : ((isset($MSG['1057'])) ? $MSG['1057'] : '{ L_1057 }')); ?></a>
				<a class="list-group-item disabled" href="#"><?php echo ((isset($this->_rootref['L_244'])) ? $this->_rootref['L_244'] : ((isset($MSG['244'])) ? $MSG['244'] : '{ L_244 }')); ?></a>
				<a class="list-group-item" href="selleremails.php"><?php echo ((isset($this->_rootref['L_25_0188'])) ? $this->_rootref['L_25_0188'] : ((isset($MSG['25_0188'])) ? $MSG['25_0188'] : '{ L_25_0188 }')); ?></a>
				<a class="list-group-item" href="edit_data.php"><?php echo ((isset($this->_rootref['L_621'])) ? $this->_rootref['L_621'] : ((isset($MSG['621'])) ? $MSG['621'] : '{ L_621 }')); ?></a>
<?php if ($this->_rootref['B_CAN_SELL']) {  ?>
				<a class="list-group-item disabled" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=selling"><?php echo ((isset($this->_rootref['L_25_0082'])) ? $this->_rootref['L_25_0082'] : ((isset($MSG['25_0082'])) ? $MSG['25_0082'] : '{ L_25_0082 }')); ?></a>
				<a class="list-group-item" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>select_category.php?"><?php echo ((isset($this->_rootref['L_028'])) ? $this->_rootref['L_028'] : ((isset($MSG['028'])) ? $MSG['028'] : '{ L_028 }')); ?></a>
				<a class="list-group-item" href="yourauctions_p.php"><?php echo ((isset($this->_rootref['L_25_0115'])) ? $this->_rootref['L_25_0115'] : ((isset($MSG['25_0115'])) ? $MSG['25_0115'] : '{ L_25_0115 }')); ?></a>
				<a class="list-group-item" href="yourauctions.php"><?php echo ((isset($this->_rootref['L_203'])) ? $this->_rootref['L_203'] : ((isset($MSG['203'])) ? $MSG['203'] : '{ L_203 }')); ?></a>
				<a class="list-group-item" href="yourauctions_c.php"><?php echo ((isset($this->_rootref['L_204'])) ? $this->_rootref['L_204'] : ((isset($MSG['204'])) ? $MSG['204'] : '{ L_204 }')); ?></a>
				<a class="list-group-item" href="yourauctions_s.php"><?php echo ((isset($this->_rootref['L_2__0056'])) ? $this->_rootref['L_2__0056'] : ((isset($MSG['2__0056'])) ? $MSG['2__0056'] : '{ L_2__0056 }')); ?></a>
				<a class="list-group-item" href="yourauctions_sold.php"><?php echo ((isset($this->_rootref['L_25_0119'])) ? $this->_rootref['L_25_0119'] : ((isset($MSG['25_0119'])) ? $MSG['25_0119'] : '{ L_25_0119 }')); ?></a>
				<a class="list-group-item" href="selling.php"><?php echo ((isset($this->_rootref['L_453'])) ? $this->_rootref['L_453'] : ((isset($MSG['453'])) ? $MSG['453'] : '{ L_453 }')); ?></a>
<?php } ?>
				<a class="list-group-item disabled" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=buying"><?php echo ((isset($this->_rootref['L_25_0083'])) ? $this->_rootref['L_25_0083'] : ((isset($MSG['25_0083'])) ? $MSG['25_0083'] : '{ L_25_0083 }')); ?></a>
				<a class="list-group-item" href="auction_watch.php"><?php echo ((isset($this->_rootref['L_471'])) ? $this->_rootref['L_471'] : ((isset($MSG['471'])) ? $MSG['471'] : '{ L_471 }')); ?></a>
				<a class="list-group-item" href="item_watch.php"><?php echo ((isset($this->_rootref['L_472'])) ? $this->_rootref['L_472'] : ((isset($MSG['472'])) ? $MSG['472'] : '{ L_472 }')); ?></a>
				<a class="list-group-item" href="yourbids.php"><?php echo ((isset($this->_rootref['L_620'])) ? $this->_rootref['L_620'] : ((isset($MSG['620'])) ? $MSG['620'] : '{ L_620 }')); ?></a>
				<a class="list-group-item" href="buying.php"><?php echo ((isset($this->_rootref['L_454'])) ? $this->_rootref['L_454'] : ((isset($MSG['454'])) ? $MSG['454'] : '{ L_454 }')); ?></a>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<ul class="nav nav-tabs hidden">
			<li role="presentation"><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=summary"><?php echo ((isset($this->_rootref['L_25_0080'])) ? $this->_rootref['L_25_0080'] : ((isset($MSG['25_0080'])) ? $MSG['25_0080'] : '{ L_25_0080 }')); ?></a></li>
			<li role="presentation"><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=account"><?php echo ((isset($this->_rootref['L_25_0081'])) ? $this->_rootref['L_25_0081'] : ((isset($MSG['25_0081'])) ? $MSG['25_0081'] : '{ L_25_0081 }')); ?></a></li>
<?php if ($this->_rootref['B_CAN_SELL']) {  ?>
			<li role="presentation"><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=selling"><?php echo ((isset($this->_rootref['L_25_0082'])) ? $this->_rootref['L_25_0082'] : ((isset($MSG['25_0082'])) ? $MSG['25_0082'] : '{ L_25_0082 }')); ?></a></li>
<?php } ?>
			<li role="presentation"><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=buying"><?php echo ((isset($this->_rootref['L_25_0083'])) ? $this->_rootref['L_25_0083'] : ((isset($MSG['25_0083'])) ? $MSG['25_0083'] : '{ L_25_0083 }')); ?></a></li>
		</ul>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<?php echo ((isset($this->_rootref['L_205'])) ? $this->_rootref['L_205'] : ((isset($MSG['205'])) ? $MSG['205'] : '{ L_205 }')); ?>
			</div>
		</div>
<?php if ($this->_rootref['B_MENUTITLE']) {  ?>
		<legend>
			<?php echo (isset($this->_rootref['UCP_TITLE'])) ? $this->_rootref['UCP_TITLE'] : ''; ?>
		</legend>
<?php } if ($this->_rootref['B_ISERROR']) {  ?>
		<div class="alert alert-danger" role="alert">
			<?php echo (isset($this->_rootref['UCP_ERROR'])) ? $this->_rootref['UCP_ERROR'] : ''; ?>
		</div>
<?php } ?>