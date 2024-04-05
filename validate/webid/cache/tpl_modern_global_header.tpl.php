<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo (isset($this->_rootref['CHARSET'])) ? $this->_rootref['CHARSET'] : ''; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo (isset($this->_rootref['DESCRIPTION'])) ? $this->_rootref['DESCRIPTION'] : ''; ?>">
<meta name="keywords" content="<?php echo (isset($this->_rootref['KEYWORDS'])) ? $this->_rootref['KEYWORDS'] : ''; ?>">
<meta name="generator" content="WeBid">

<link rel="stylesheet" type="text/css" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>themes/<?php echo (isset($this->_rootref['THEME'])) ? $this->_rootref['THEME'] : ''; ?>/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>themes/<?php echo (isset($this->_rootref['THEME'])) ? $this->_rootref['THEME'] : ''; ?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>themes/<?php echo (isset($this->_rootref['THEME'])) ? $this->_rootref['THEME'] : ''; ?>/css/jquery.lightbox.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>includes/calendar.css">

<link rel="alternate" type="application/rss+xml" title="<?php echo ((isset($this->_rootref['L_924'])) ? $this->_rootref['L_924'] : ((isset($MSG['924'])) ? $MSG['924'] : '{ L_924 }')); ?>" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>rss.php?feed=1">
<link rel="alternate" type="application/rss+xml" title="<?php echo ((isset($this->_rootref['L_925'])) ? $this->_rootref['L_925'] : ((isset($MSG['925'])) ? $MSG['925'] : '{ L_925 }')); ?>" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>rss.php?feed=2">
<link rel="alternate" type="application/rss+xml" title="<?php echo ((isset($this->_rootref['L_926'])) ? $this->_rootref['L_926'] : ((isset($MSG['926'])) ? $MSG['926'] : '{ L_926 }')); ?>" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>rss.php?feed=3">
<link rel="alternate" type="application/rss+xml" title="<?php echo ((isset($this->_rootref['L_927'])) ? $this->_rootref['L_927'] : ((isset($MSG['927'])) ? $MSG['927'] : '{ L_927 }')); ?>" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>rss.php?feed=4">
<link rel="alternate" type="application/rss+xml" title="<?php echo ((isset($this->_rootref['L_928'])) ? $this->_rootref['L_928'] : ((isset($MSG['928'])) ? $MSG['928'] : '{ L_928 }')); ?>" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>rss.php?feed=5">
<link rel="alternate" type="application/rss+xml" title="<?php echo ((isset($this->_rootref['L_929'])) ? $this->_rootref['L_929'] : ((isset($MSG['929'])) ? $MSG['929'] : '{ L_929 }')); ?>" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>rss.php?feed=6">
<link rel="alternate" type="application/rss+xml" title="<?php echo ((isset($this->_rootref['L_930'])) ? $this->_rootref['L_930'] : ((isset($MSG['930'])) ? $MSG['930'] : '{ L_930 }')); ?>" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>rss.php?feed=7">
<link rel="alternate" type="application/rss+xml" title="<?php echo ((isset($this->_rootref['L_931'])) ? $this->_rootref['L_931'] : ((isset($MSG['931'])) ? $MSG['931'] : '{ L_931 }')); ?>" href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>rss.php?feed=8">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>themes/<?php echo (isset($this->_rootref['THEME'])) ? $this->_rootref['THEME'] : ''; ?>/js/bootstrap.min.js"></script>
<script><?php echo (isset($this->_rootref['CAL_CONF'])) ? $this->_rootref['CAL_CONF'] : ''; ?></script>
<script src="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>js/calendar.js"></script>

<?php if ($this->_rootref['GOOGLEANALYTICS'] != ('')) {  ?>
<?php echo (isset($this->_rootref['GOOGLEANALYTICS'])) ? $this->_rootref['GOOGLEANALYTICS'] : ''; ?>
<?php } ?>
</head>
<body>
<div class="container">
	<div class="row header">
		<div class="col-md-6"><img src="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>uploaded/logo/<?php echo (isset($this->_rootref['LOGO'])) ? $this->_rootref['LOGO'] : ''; ?>" border="0" alt="<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>"></div>
		<div class="col-md-6 hidden-xs text-right"><?php echo (isset($this->_rootref['BANNER'])) ? $this->_rootref['BANNER'] : ''; ?></div>
	</div>
	<div class="row">
		<div class="col-md-6 text-muted"><small><?php if ($this->_rootref['B_LOGGED_IN']) {  echo ((isset($this->_rootref['L_200'])) ? $this->_rootref['L_200'] : ((isset($MSG['200'])) ? $MSG['200'] : '{ L_200 }')); ?> <?php echo (isset($this->_rootref['YOURUSERNAME'])) ? $this->_rootref['YOURUSERNAME'] : ''; ?>. <a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>logout.php?"><?php echo ((isset($this->_rootref['L_245'])) ? $this->_rootref['L_245'] : ((isset($MSG['245'])) ? $MSG['245'] : '{ L_245 }')); ?></a><?php } ?></small></div>
		<div class="col-md-6 text-right text-muted"><small><?php echo (isset($this->_rootref['HEADERCOUNTER'])) ? $this->_rootref['HEADERCOUNTER'] : ''; ?></small></div>
	</div>
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>index.php?"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
<?php if ($this->_rootref['B_CAN_SELL']) {  ?>
				<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>select_category.php"><?php echo ((isset($this->_rootref['L_028'])) ? $this->_rootref['L_028'] : ((isset($MSG['028'])) ? $MSG['028'] : '{ L_028 }')); ?></a></li>
<?php } if ($this->_rootref['B_LOGGED_IN']) {  ?>
				<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php"><?php echo ((isset($this->_rootref['L_622'])) ? $this->_rootref['L_622'] : ((isset($MSG['622'])) ? $MSG['622'] : '{ L_622 }')); ?></a></li>
				<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>logout.php"><?php echo ((isset($this->_rootref['L_245'])) ? $this->_rootref['L_245'] : ((isset($MSG['245'])) ? $MSG['245'] : '{ L_245 }')); ?></a></li>
<?php } else { ?>
				<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>register.php"><?php echo ((isset($this->_rootref['L_235'])) ? $this->_rootref['L_235'] : ((isset($MSG['235'])) ? $MSG['235'] : '{ L_235 }')); ?></a></li>
				<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_login.php"><?php echo ((isset($this->_rootref['L_052'])) ? $this->_rootref['L_052'] : ((isset($MSG['052'])) ? $MSG['052'] : '{ L_052 }')); ?></a></li>
<?php } if ($this->_rootref['B_BOARDS']) {  ?>
				<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>boards.php"><?php echo ((isset($this->_rootref['L_5030'])) ? $this->_rootref['L_5030'] : ((isset($MSG['5030'])) ? $MSG['5030'] : '{ L_5030 }')); ?></a></li>
<?php } ?>
				<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>help.php" alt="faqs" class="new-window"><?php echo ((isset($this->_rootref['L_148'])) ? $this->_rootref['L_148'] : ((isset($MSG['148'])) ? $MSG['148'] : '{ L_148 }')); ?></a></li>
				<li><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>adsearch.php"><?php echo ((isset($this->_rootref['L_464'])) ? $this->_rootref['L_464'] : ((isset($MSG['464'])) ? $MSG['464'] : '{ L_464 }')); ?></a></li>
			</ul>
			<form class="navbar-form navbar-right" role="search" action="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>search.php" method="get">
				<div class="form-group">
					<select class="form-control" name="id">
						<?php echo (isset($this->_rootref['SELECTION_BOX'])) ? $this->_rootref['SELECTION_BOX'] : ''; ?>
					</select>
				</div>
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" name="q" value="<?php echo (isset($this->_rootref['Q'])) ? $this->_rootref['Q'] : ''; ?>" placeholder="<?php echo ((isset($this->_rootref['L_861'])) ? $this->_rootref['L_861'] : ((isset($MSG['861'])) ? $MSG['861'] : '{ L_861 }')); ?>">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary" name="sub" value="<?php echo ((isset($this->_rootref['L_399'])) ? $this->_rootref['L_399'] : ((isset($MSG['399'])) ? $MSG['399'] : '{ L_399 }')); ?>"><?php echo ((isset($this->_rootref['L_399'])) ? $this->_rootref['L_399'] : ((isset($MSG['399'])) ? $MSG['399'] : '{ L_399 }')); ?></button>
						</span>
					</div>
				</div>
				
				
			</form>
		</div><!-- /.navbar-collapse -->
	</nav>