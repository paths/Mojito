<?php

/**
 * Copyright (c) mojito
 * 
 */

define('MOJ_ABOUTUS_PAGE', 1);


require_once( 'inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'admin.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );

moj_import('MojTemplAboutUsPageView');

check_logged();

$oPageView = new MojTemplAboutUsPageView();

$oPage = $dir['root'].'templates/tpl_aboutus.php';
$arrVar = array();

$arrVar['title'] = "Doupit | about us";
$arrVar['icon'] = $site['icon'];

$arrVar['index'] = '<a href="'.$site['url'].'">';
$arrVar['right1'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? $_COOKIE['memberID'] : 'Login';
$arrVar['right2'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? 'Logout' : 'Register';
$arrVar['right1href'] = '<a href="'.$site['url'].'member.php">';
$arrVar['right2href'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? '<a href="'.$site['url'].'logout.php">' : '<a href="'.$site['url'].'register.php">';
$arrVar['hrefend'] = '</a>';

$oPageView->setTpl($oPage);
$oPageView->addParam($arrVar);

PageCode();