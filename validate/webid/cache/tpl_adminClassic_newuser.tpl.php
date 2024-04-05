<div style="width:25%; float:left;">
			<div style="margin-left:auto; margin-right:auto;">
				<?php $this->_tpl_include('sidebar-' . ((isset($this->_rootref['CURRENT_PAGE'])) ? $this->_rootref['CURRENT_PAGE'] : '') . '.tpl'); ?>
			</div>
		</div>
		<div style="width:75%; float:right;">
			<div class="main-box">
				<h4 class="rounded-top rounded-bottom"><?php echo ((isset($this->_rootref['L_25_0010'])) ? $this->_rootref['L_25_0010'] : ((isset($MSG['25_0010'])) ? $MSG['25_0010'] : '{ L_25_0010 }')); ?>&nbsp;&gt;&gt;&nbsp;<?php echo ((isset($this->_rootref['L_045'])) ? $this->_rootref['L_045'] : ((isset($MSG['045'])) ? $MSG['045'] : '{ L_045 }')); ?>&nbsp;&gt;&gt;&nbsp;<?php echo ((isset($this->_rootref['L__0026'])) ? $this->_rootref['L__0026'] : ((isset($MSG['_0026'])) ? $MSG['_0026'] : '{ L__0026 }')); ?></h4>
				<form name="errorlog" action="" method="post">
					<table width="98%" celpadding="0" cellspacing="0" class="blank">
					<tr>
						<td width="204"><?php echo ((isset($this->_rootref['L_302'])) ? $this->_rootref['L_302'] : ((isset($MSG['302'])) ? $MSG['302'] : '{ L_302 }')); ?> *</td>
						<td><input type="text" name="name" size="40" maxlength="255" value="<?php echo (isset($this->_rootref['REALNAME'])) ? $this->_rootref['REALNAME'] : ''; ?>"></td>
						<td><b><?php echo ((isset($this->_rootref['L_448'])) ? $this->_rootref['L_448'] : ((isset($MSG['448'])) ? $MSG['448'] : '{ L_448 }')); ?></b></td>
					</tr>
					<tr>
						<td><?php echo ((isset($this->_rootref['L_username'])) ? $this->_rootref['L_username'] : ((isset($MSG['username'])) ? $MSG['username'] : '{ L_username }')); ?></td>
						<td><input type="text" name="username" size="40" maxlength="255" value="<?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>"></td>
						<td rowspan="15" width="33%" valign="top">
							<?php echo (isset($this->_rootref['USERGROUPS'])) ? $this->_rootref['USERGROUPS'] : ''; ?>
						</td>
					</tr>
					<tr class="bg">
						<td><?php echo ((isset($this->_rootref['L_password'])) ? $this->_rootref['L_password'] : ((isset($MSG['password'])) ? $MSG['password'] : '{ L_password }')); ?> *</td>
						<td><input type="password" name="password" size="20" maxlength="20"></td>
					</tr>
					<tr class="bg">
						<td><?php echo ((isset($this->_rootref['L_password'])) ? $this->_rootref['L_password'] : ((isset($MSG['password'])) ? $MSG['password'] : '{ L_password }')); ?> *</td>
						<td><input type="password" name="repeat_password" size="20" maxlength="20"></td>
					</tr>
					<tr>
						<td><?php echo ((isset($this->_rootref['L_303'])) ? $this->_rootref['L_303'] : ((isset($MSG['303'])) ? $MSG['303'] : '{ L_303 }')); ?> *</td>
						<td><input type="text" name="email" size="50" maxlength="50" value="<?php echo (isset($this->_rootref['EMAIL'])) ? $this->_rootref['EMAIL'] : ''; ?>"></td>
					</tr>
					<tr>
						<td><?php echo ((isset($this->_rootref['L_252'])) ? $this->_rootref['L_252'] : ((isset($MSG['252'])) ? $MSG['252'] : '{ L_252 }')); echo (isset($this->_rootref['REQUIRED'][0])) ? $this->_rootref['REQUIRED'][0] : ''; ?></td>
						<td><input type="text" name="birthdate" size="10" maxlength="10" value="<?php echo (isset($this->_rootref['DOB'])) ? $this->_rootref['DOB'] : ''; ?>"></td>
					</tr>
					<tr>
						<td><?php echo ((isset($this->_rootref['L_009'])) ? $this->_rootref['L_009'] : ((isset($MSG['009'])) ? $MSG['009'] : '{ L_009 }')); echo (isset($this->_rootref['REQUIRED'][1])) ? $this->_rootref['REQUIRED'][1] : ''; ?></td>
						<td><input type="text" name="address" size="40" maxlength="255" value="<?php echo (isset($this->_rootref['ADDRESS'])) ? $this->_rootref['ADDRESS'] : ''; ?>"></td>
					</tr>
					<tr>
						<td><?php echo ((isset($this->_rootref['L_010'])) ? $this->_rootref['L_010'] : ((isset($MSG['010'])) ? $MSG['010'] : '{ L_010 }')); echo (isset($this->_rootref['REQUIRED'][2])) ? $this->_rootref['REQUIRED'][2] : ''; ?></td>
						<td><input type="text" name="city" size="40" maxlength="255" value="<?php echo (isset($this->_rootref['CITY'])) ? $this->_rootref['CITY'] : ''; ?>"></td>
					</tr>
					<tr>
						<td><?php echo ((isset($this->_rootref['L_011'])) ? $this->_rootref['L_011'] : ((isset($MSG['011'])) ? $MSG['011'] : '{ L_011 }')); echo (isset($this->_rootref['REQUIRED'][3])) ? $this->_rootref['REQUIRED'][3] : ''; ?></td>
						<td><input type="text" name="prov" size="40" maxlength="255" value="<?php echo (isset($this->_rootref['PROV'])) ? $this->_rootref['PROV'] : ''; ?>"></td>
					</tr>
					<tr>
						<td><?php echo ((isset($this->_rootref['L_012'])) ? $this->_rootref['L_012'] : ((isset($MSG['012'])) ? $MSG['012'] : '{ L_012 }')); echo (isset($this->_rootref['REQUIRED'][5])) ? $this->_rootref['REQUIRED'][5] : ''; ?></td>
						<td><input type="text" name="zip" size="15" maxlength="15" value="<?php echo (isset($this->_rootref['ZIP'])) ? $this->_rootref['ZIP'] : ''; ?>"></td>
					</tr>
					<tr>
						<td><?php echo ((isset($this->_rootref['L_014'])) ? $this->_rootref['L_014'] : ((isset($MSG['014'])) ? $MSG['014'] : '{ L_014 }')); echo (isset($this->_rootref['REQUIRED'][4])) ? $this->_rootref['REQUIRED'][4] : ''; ?></td>
						<td>
							<select name="country">
								<option value=""></option>
								<?php echo (isset($this->_rootref['COUNTRY_LIST'])) ? $this->_rootref['COUNTRY_LIST'] : ''; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><?php echo ((isset($this->_rootref['L_013'])) ? $this->_rootref['L_013'] : ((isset($MSG['013'])) ? $MSG['013'] : '{ L_013 }')); echo (isset($this->_rootref['REQUIRED'][6])) ? $this->_rootref['REQUIRED'][6] : ''; ?></td>
						<td><input type="text" name="phone" size="40" maxlength="40" value="<?php echo (isset($this->_rootref['PHONE'])) ? $this->_rootref['PHONE'] : ''; ?>"></td>
					</tr>
					<tr>
						<td><?php echo ((isset($this->_rootref['L_763'])) ? $this->_rootref['L_763'] : ((isset($MSG['763'])) ? $MSG['763'] : '{ L_763 }')); ?></td>
						<td><input type="text" name="balance" size="40" maxlength="10" value="<?php echo (isset($this->_rootref['BALANCE'])) ? $this->_rootref['BALANCE'] : ''; ?>"></td>
					</tr>
					</table>
					<input type="hidden" name="action" value="update">
					<input type="hidden" name="csrftoken" value="<?php echo (isset($this->_rootref['_CSRFTOKEN'])) ? $this->_rootref['_CSRFTOKEN'] : ''; ?>">
					<input type="submit" name="act" class="centre" value="<?php echo ((isset($this->_rootref['L__0026'])) ? $this->_rootref['L__0026'] : ((isset($MSG['_0026'])) ? $MSG['_0026'] : '{ L__0026 }')); ?>">
				</form>
			</div>
		</div>