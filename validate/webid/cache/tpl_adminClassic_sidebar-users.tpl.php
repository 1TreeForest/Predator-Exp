<div class="box">
					<h4 class="rounded-top"><?php echo ((isset($this->_rootref['L_25_0010'])) ? $this->_rootref['L_25_0010'] : ((isset($MSG['25_0010'])) ? $MSG['25_0010'] : '{ L_25_0010 }')); ?></h4>
					<div class="rounded-bottom">
						<ul class="menu">
							<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>admin/listusers.php"><?php echo ((isset($this->_rootref['L_045'])) ? $this->_rootref['L_045'] : ((isset($MSG['045'])) ? $MSG['045'] : '{ L_045 }')); ?></a></li>
							<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>admin/newuser.php"><?php echo ((isset($this->_rootref['L__0026'])) ? $this->_rootref['L__0026'] : ((isset($MSG['_0026'])) ? $MSG['_0026'] : '{ L__0026 }')); ?></a></li>
							<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>admin/usergroups.php"><?php echo ((isset($this->_rootref['L_448'])) ? $this->_rootref['L_448'] : ((isset($MSG['448'])) ? $MSG['448'] : '{ L_448 }')); ?></a></li>
							<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>admin/profile.php"><?php echo ((isset($this->_rootref['L_048'])) ? $this->_rootref['L_048'] : ((isset($MSG['048'])) ? $MSG['048'] : '{ L_048 }')); ?></a></li>
							<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>admin/activatenewsletter.php"><?php echo ((isset($this->_rootref['L_25_0079'])) ? $this->_rootref['L_25_0079'] : ((isset($MSG['25_0079'])) ? $MSG['25_0079'] : '{ L_25_0079 }')); ?></a></li>
							<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>admin/newsletter.php"><?php echo ((isset($this->_rootref['L_607'])) ? $this->_rootref['L_607'] : ((isset($MSG['607'])) ? $MSG['607'] : '{ L_607 }')); ?></a></li>
							<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>admin/banips.php"><?php echo ((isset($this->_rootref['L_ip_addresses'])) ? $this->_rootref['L_ip_addresses'] : ((isset($MSG['ip_addresses'])) ? $MSG['ip_addresses'] : '{ L_ip_addresses }')); ?></a></li>
						</ul>
					</div>
				</div>
				<div class="box">
					<h4 class="rounded-top"><?php echo ((isset($this->_rootref['L_365'])) ? $this->_rootref['L_365'] : ((isset($MSG['365'])) ? $MSG['365'] : '{ L_365 }')); ?></h4>
					<div class="rounded-bottom">
						<ul class="menu">
							<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>admin/newadminuser.php"><?php echo ((isset($this->_rootref['L_new_admin_user'])) ? $this->_rootref['L_new_admin_user'] : ((isset($MSG['new_admin_user'])) ? $MSG['new_admin_user'] : '{ L_new_admin_user }')); ?></a></li>
							<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>admin/adminusers.php"><?php echo ((isset($this->_rootref['L_525'])) ? $this->_rootref['L_525'] : ((isset($MSG['525'])) ? $MSG['525'] : '{ L_525 }')); ?></a></li>
						</ul>
					</div>
				</div>
				<div class="box">
					<h4 class="rounded-top"><?php echo ((isset($this->_rootref['L_1061'])) ? $this->_rootref['L_1061'] : ((isset($MSG['1061'])) ? $MSG['1061'] : '{ L_1061 }')); ?></h4>
					<div class="rounded-bottom">
						<form name="anotes" action="" method="post">
							<textarea rows="15" name="anotes" class="anotes"><?php echo (isset($this->_rootref['ADMIN_NOTES'])) ? $this->_rootref['ADMIN_NOTES'] : ''; ?></textarea>
							<input type="hidden" name="csrftoken" value="<?php echo (isset($this->_rootref['_CSRFTOKEN'])) ? $this->_rootref['_CSRFTOKEN'] : ''; ?>">
							<input type="submit" name="act" value="<?php echo ((isset($this->_rootref['L_submit'])) ? $this->_rootref['L_submit'] : ((isset($MSG['submit'])) ? $MSG['submit'] : '{ L_submit }')); ?>">
						</form>
					</div>
				</div>