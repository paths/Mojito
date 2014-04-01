<?php /* Smarty version Smarty-3.1.16, created on 2014-03-31 22:05:58
         compiled from "templates\header.php" */ ?>
<?php /*%%SmartyHeaderCode:214625339764661a860-04905786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d8a781aa5bdaf4242330105ceba6a8ecb18c643' => 
    array (
      0 => 'templates\\header.php',
      1 => 1396030964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214625339764661a860-04905786',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'right1href' => 0,
    'right1' => 0,
    'hrefend' => 0,
    'right2href' => 0,
    'right2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53397646694441_73918223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53397646694441_73918223')) {function content_53397646694441_73918223($_smarty_tpl) {?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<!--[if lt IE 9]>
<script src="js/html5.js?38b35f" type="text/javascript"></script>
<link rel="stylesheet" href="css/ie.css?38b35f" type="text/css" media="all" />
<script type="text/javascript">window.oldie = true;</script>
<![endif]-->
<link rel="icon" href="templates/img/icons/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" id="contact-form-7-css" href="templates/css/styles.css" type="text/css" media="all">
<link rel="stylesheet" id="fluxus-global-css" href="templates/css/global.css" type="text/css" media="all">
<link rel="stylesheet" id="fluxus-grid-css" href="templates/css/grid.css" type="text/css" media="all">
<link rel="stylesheet" id="fontello-icons-css" href="templates/css/fontello.css" type="text/css" media="all">
<link rel="stylesheet" id="style-css" href="templates/css/style.css" type="text/css" media="all">
<link rel="stylesheet" id="fluxus-responsive-css" href="templates/css/responsive.css" type="text/css" media="all">
<link rel="stylesheet" id="fluxus-skin-css" href="templates/css/light.css" type="text/css" media="all">
<link rel="stylesheet" id="fluxus-user-css" href="templates/css/user.css" type="text/css" media="all">
<link rel="stylesheet" id="intheme-customizer-css" href="templates/css/customize.css" type="text/css" media="all">
<link rel="stylesheet" id="intheme-customizer-color-stylesheet-css" href="templates/css/light.css" type="text/css" media="all">

<script type="text/javascript" src="templates/js/jquery.js"></script>
<script type="text/javascript" src="templates/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="templates/js/script.js"></script>
<script type="text/javascript" src="templates/js/user.js"></script>
</head>

<body>

<div id="page-wrapper">

    <header id="header" class="clearfix">
        <hgroup>
            <h1 class="site-title">
                <a href="index.php" title="Doupit" rel="home">
                    <img src="templates/img/logo.png"></a>
            </h1>
        </hgroup>
        <div class="site-navigation" data-menu="Menu">
            <nav class="primary-navigation">
                <div class="menu-main-menu-container">
                    <ul id="menu-main-menu" class="menu">
                        <li id="menu-item-9" class="menu-item">
                            <a href="index.php">热门</a>
                        </li>
                        <li id="menu-item-120" class="menu-item">
                            <a href="map.php">地图</a>
                        </li>
                        <li id="menu-item-194" class="menu-item">
                            <a href="activity.php">活动</a>
                        </li>
                        <li id="memu-search" class="menu-item">
                            <form action="search.php" method="GET">
                                <input type="text" name="wd" value="" id="searchtext" placeholder="关键字 &hellip;" />
                                <input type="submit" name="submit" id="searchsubmit" value="搜索" OnClick="return ValSearch();" />
                            </form>
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
                        <li id="menu-item-14" class="menu-item">
                            <?php echo $_smarty_tpl->tpl_vars['right2href']->value;?>
<?php echo $_smarty_tpl->tpl_vars['right2']->value;?>
<?php echo $_smarty_tpl->tpl_vars['hrefend']->value;?>

                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header><?php }} ?>
