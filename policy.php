<?php
/**
 * Copyright (c) mojito
 * 
 */

define('MOJ_POLICY_PAGE', 1);

require_once( 'inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );

moj_import("MojTemplPolicyPageView");

$oPageView = null;

$oPage = $dir['root'].'templates/tpl_policy.php';
$arrVar = array();

$arrVar['icon'] = $site['icon'];
$arrVar['index'] = '<a href="'.$site['url'].'">';
$arrVar['right1'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? $_COOKIE['memberID'] : 'Login';
$arrVar['right2'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? 'Logout' : 'Register';
$arrVar['right1href'] = '<a href="'.$site['url'].'member.php">';
$arrVar['right2href'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? '<a href="'.$site['url'].'logout.php">' : '<a href="'.$site['url'].'register.php">';
$arrVar['hrefend'] = '</a>';


$arrVar['title'] = "Doupit | Photo";
$oPageView = new MojTemplPolicyPageView();

$oPageView->addParam($arrVar);
$oPageView->setTpl($oPage);


PageCode();