<?php

/**
 * Copyright (c) mojito
 * 
 */

define('MOJ_MEMBER_PAGE', 1);

require_once( 'inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );
require_once ( MOJ_DIRECTORY_PATH_MODULES. 'photos/classes/MojPhotosDb.php' );

moj_import("MojTemplLoginPageView");
moj_import("MojTemplMemberPageView");

$oPageView = null;

$oPage = $dir['root'].'templates/tpl_login.php';
$arrVar = array();

$arrVar['icon'] = $site['icon'];
$arrVar['index'] = '<a href="'.$site['url'].'">';
$arrVar['right1'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? $_COOKIE['memberID'] : 'Login';
$arrVar['right2'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? 'Logout' : 'Register';
$arrVar['right1href'] = '<a href="'.$site['url'].'member.php">';
$arrVar['right2href'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? '<a href="'.$site['url'].'logout.php">' : '<a href="'.$site['url'].'register.php">';
$arrVar['hrefend'] = '</a>';

if( ((!empty($_COOKIE['memberID']) ) && $_COOKIE['memberID'] && (!empty($_COOKIE['memberPassword'])) && $_COOKIE['memberPassword']))
{
    //Logged Home
    $arrVar['title'] = "Doupit | Home";
    $oPhotoObj = new MojPhotosDb();
    $arrVal['issue'] = $oPhotoObj->getPhotoByEmail($_COOKIE['memberID']);
    $oPageView = new MojTemplMemberPageView();
    $oPageView->addParam($arrVar);
    $oPage = $dir['root'].'templates/tpl_member.php';
    
    $oPageView->setTpl($oPage);
    
    PageCode();
    
}else {
    //Login Page
    $arrVar['title'] = "Doupit | Login";
    $oPageView = new MojTemplLoginPageView();
    $oPage = $dir['root'].'templates/tpl_login.php';

    $oPageView->setTpl($oPage);
    $oPageView->addParam($arrVar);

    PageCode();
    
}


