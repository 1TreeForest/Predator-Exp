<html>
<head>
	<title>WeBid Administration back-end</title>
	<link rel="stylesheet" type="text/css" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>/themes/<?php echo (isset($this->_rootref['THEME'])) ? $this->_rootref['THEME'] : ''; ?>/style.css" />
</head>
<body style="margin:0;">
<div style="width:400px; padding:40px;" class="centre">
	<div class="plain-box">
<?php if ($this->_rootref['PAGE'] == (1)) {  ?>
		<div class="alert alert-info"><b><?php echo ((isset($this->_rootref['L_441'])) ? $this->_rootref['L_441'] : ((isset($MSG['441'])) ? $MSG['441'] : '{ L_441 }')); ?></b></div>
<?php } else { ?>
		<div class="alert alert-success"><b><?php echo ((isset($this->_rootref['L_442'])) ? $this->_rootref['L_442'] : ((isset($MSG['442'])) ? $MSG['442'] : '{ L_442 }')); ?></b></div>
<?php } if ($this->_rootref['ERROR'] != ('')) {  ?>
		<div class="alert alert-error"><b><?php echo (isset($this->_rootref['ERROR'])) ? $this->_rootref['ERROR'] : ''; ?></b></div>
<?php } ?>
		<form action="login.php" method="post">
			<input type="hidden" name="csrftoken" value="<?php echo (isset($this->_rootref['_CSRFTOKEN'])) ? $this->_rootref['_CSRFTOKEN'] : ''; ?>">
			<table width="100%" border="0" cellspacing="0" cellpadding="1" class="blank">
				<tr>
					<td align="right" stype="width:170px;">
						<?php echo ((isset($this->_rootref['L_username'])) ? $this->_rootref['L_username'] : ((isset($MSG['username'])) ? $MSG['username'] : '{ L_username }')); ?>
					</td>
					<td style="padding:10px;">
						<input type="text" name="username" size="20" autofocus>
					</td>
				</tr>
				<tr>
					<td align="right">
						<?php echo ((isset($this->_rootref['L_password'])) ? $this->_rootref['L_password'] : ((isset($MSG['password'])) ? $MSG['password'] : '{ L_password }')); ?>
					</td>
					<td style="padding:10px;">
						<input type="password" name="password" size="20">
					</td>
				</tr>
<?php if ($this->_rootref['PAGE'] == (1)) {  ?>
				<tr>
					<td align="right">
						<?php echo ((isset($this->_rootref['L_005'])) ? $this->_rootref['L_005'] : ((isset($MSG['005'])) ? $MSG['005'] : '{ L_005 }')); ?>
					</td>
					<td style="padding:10px;">
						<input type="password" name="repeat_password" size="20">
					</td>
				</tr>
<?php } ?>
				<tr>
					<td align="center" colspan="2">
<?php if ($this->_rootref['PAGE'] == (1)) {  ?>
						<input type="hidden" name="action" value="insert">
						<input type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_5204'])) ? $this->_rootref['L_5204'] : ((isset($MSG['5204'])) ? $MSG['5204'] : '{ L_5204 }')); ?>">
<?php } else { ?>
						<input type="hidden" name="action" value="login">
						<input type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_052'])) ? $this->_rootref['L_052'] : ((isset($MSG['052'])) ? $MSG['052'] : '{ L_052 }')); ?>">
<?php } ?>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<div>
	<div>