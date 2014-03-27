<?php /* Smarty version Smarty-3.1.16, created on 2014-03-13 00:17:39
         compiled from "F:\Mojito\templates\tpl_register.html" */ ?>
<?php /*%%SmartyHeaderCode:20970532086da62e100-72302336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd1364544ff610dde8eaa76854c1427075d47430' => 
    array (
      0 => 'F:\\Mojito\\templates\\tpl_register.html',
      1 => 1394641056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20970532086da62e100-72302336',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532086da868861_71381699',
  'variables' => 
  array (
    'title' => 0,
    'index' => 0,
    'hrefend' => 0,
    'right1href' => 0,
    'right1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532086da868861_71381699')) {function content_532086da868861_71381699($_smarty_tpl) {?><!DOCTYPE html>
<!-- saved from url=(0052)#homepage/hello-homepage/ -->
<html lang="en-US" class="upscale horizontal-page no-scroll ">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <link rel="shortcut icon" href="templates/img/icons/favicon.ico">
	
	<!--[if lt IE 9]>
	<script src="#wp-content/themes/fluxus/js/html5.js?38b35f" type="text/javascript"></script>
	<link rel="stylesheet" href="#wp-content/themes/fluxus/css/ie.css?38b35f" type="text/css" media="all" />
	<script type="text/javascript">window.oldie = true;</script>
	<![endif]-->
	<link rel="stylesheet" id="contact-form-7-css" href="templates/css/styles.css" type="text/css" media="all">
	<link rel="stylesheet" id="fluxus-global-css" href="templates/css/global.css" type="text/css" media="all">
	<link rel="stylesheet" id="fluxus-grid-css" href="templates/css/grid.css" type="text/css" media="all">
	<link rel="stylesheet" id="fontello-icons-css" href="templates/css/fontello.css" type="text/css" media="all">
	<link rel="stylesheet" id="style-css" href="templates/css/style.css" type="text/css" media="all">
	<link rel="stylesheet" id="fluxus-responsive-css" href="templates/css/responsive.css" type="text/css" media="all">
	<link rel="stylesheet" id="fluxus-skin-css" href="templates/css/light.css" type="text/css" media="all">
	<link rel="stylesheet" id="fluxus-user-css" href="templates/css/user.css" type="text/css" media="all">
	<link rel="stylesheet" id="intheme-customizer-color-stylesheet-css" href="templates/css/light.css" type="text/css" media="all">

</head>

<body class="page page-id-436 page-child parent-pageid-2 page-template page-template-template-background-php" style="" screen_capture_injected="true">

	<div id="page-wrapper">

		<header id="header" class="clearfix">
			<hgroup>
				<h1 class="site-title">
					<?php echo $_smarty_tpl->tpl_vars['index']->value;?>

						<span class="default-logo">DOUPIT.</span>
					<?php echo $_smarty_tpl->tpl_vars['hrefend']->value;?>

				</h1>
				<h2 class="site-description">Upload Your Live</h2>
			</hgroup>

			<div class="site-navigation" data-menu="Menu">
				<nav class="primary-navigation">
					<div class="menu-main-menu-container">
						<ul id="menu-main-menu" class="menu">
							<li id="menu-item-9" class="menu-item">
								<a href="#">时间线</a>
							</li>
							<li id="menu-item-120" class="menu-item">
								<a href="#">热门</a>
							</li>
							<li id="menu-item-194" class="menu-item">
								<a href="#">分类</a>								
							</li>
							<li id="menu-item-131" class="menu-item">
								<a href="#">我的写真</a>
							</li>
						</ul>
					</div>
				</nav>
				<nav class="secondary-navigation">
					<div class="menu-secondary-menu-container">
						<ul id="menu-secondary-menu" class="menu">
                                                    <li id="menu-item-14" class="menu-item">
							<?php echo $_smarty_tpl->tpl_vars['right1href']->value;?>
<?php echo $_smarty_tpl->tpl_vars['right1']->value;?>
<?php echo $_smarty_tpl->tpl_vars['hrefend']->value;?>

                                                    </li>
						</ul>
					</div>
				</nav>
			</div>
		</header>

		<div id="main" class="site" style="height: 510px; top: 76px; opacity: 1;">
			<div class="slider">
				<div class="slide image-center-center active" id="slide-436" style="background-image: url(templates/img/1440x900-6.png); visibility: visible; opacity: 1;">
					<article class="info white no-fade style-page-with-background dim-background" style="overflow: hidden; top: 18.2%; left: 48.88%; height: auto;" data-position="custom" data-top="18.2%" data-left="48.88%">
						<div class="viewport" style="-webkit-transition: -webkit-transform 0ms; transition: -webkit-transform 0ms; -webkit-transform-origin: 0px 0px; -webkit-transform: translate(0px, 0px) translateZ(0px);">
							<h1 class="entry-title">Register Doupit.</h1>
							<div class="entry-content">
                                                            <form action="register.php" method="post">
                                                                Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="input" name="ID" /><br /><br />
                                                                Password:<input type="password" name="Password" /><br /><br />
                                                                Confirm:&nbsp;&nbsp;&nbsp;<input type="password" name="ConfirmPassword" /><br /><br />
                                                                <input type="submit" />
                                                            </form>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>

	</div>
	<!-- #page-wrapper -->

	<footer id="footer">
		<div class="footer-inner clearfix">
			<div class="social-networks">
			</div>
			<div class="footer-links">
				<nav class="footer-navigation">
					<div class="menu-footer-menu-container">
					</div>
				</nav>
				<div class="credits">© Doupit.com</div>
			</div>
			<div class="nav-tip">
				Use arrows
				<a href="#" class="button-minimal icon-left-open-mini" id="key-left"></a>
				<a href="#" class="button-minimal icon-right-open-mini" id="key-right"></a>
				for navigation
			</div>
		</div>
	</footer>
</body>
</html><?php }} ?>
