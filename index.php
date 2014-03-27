<?php
/**
 * Copyright (c) mojito
 * 
 */

define('MOJ_INDEX_PAGE', 1);

if(!file_exists("inc/header.inc.php")){
    $now = gmdate('D, d M Y H:i:s') . ' GMT';
    header("Expires: $now");
    header("Last-Modified: $now");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");

    echo "Some file seems to be <b>missing</b>.<br />\n";
    exit;
}

require_once( 'inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'admin.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'prof.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );

//require_once( MOJ_DIRECTORY_PATH_INC . 'membership_levels.inc.php' );
require_once (MOJ_DIRECTORY_PATH_INC.'smarty/Smarty.class.php');

moj_import('MojTemplIndexPageView');

//check_logged();

$oPageView = null;

$oPage = $dir['root'].'templates/tpl_index.php';
$arrVar = array();

$oPageView = new MojTemplIndexPageView();

$arrVar['title'] = $site['title'];
$arrVar['icon'] = $site['icon'];

$arrVar['index'] = '<a href="'.$site['url'].'">';
$arrVar['right1'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? $_COOKIE['memberID'] : 'Login';
$arrVar['right2'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? 'Logout' : 'Register';
$arrVar['right1href'] = '<a href="'.$site['url'].'member.php">';
$arrVar['right2href'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? '<a href="'.$site['url'].'logout.php">' : '<a href="'.$site['url'].'register.php">';
$arrVar['hrefend'] = '</a>';

$oPageView->addParam($arrVar);
$oPageView->setTpl($oPage);

PageCode();


