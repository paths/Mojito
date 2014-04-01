<?php
/**
 * Copyright (c) mojito
 * 
 */

define('MOJ_ADS_INDEX_PAGE', 1);

require_once( '../inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );
require_once ( MOJ_DIRECTORY_PATH_MODULES. 'adss/classes/MojPhotosDb.php' );

moj_import("MojTemplAdsIndexPageView");
moj_import("MojTemplAdsHomePageView");

$oPageView = null;
$arrVar = array();

if( ((!empty($_COOKIE['memberID']) ) && $_COOKIE['memberID'] && (!empty($_COOKIE['memberPassword'])) && $_COOKIE['memberPassword'])){
    //以用户身份访问
    send_headers_page_changed();
    header("Location:l.php");
}else if( ((!empty($_COOKIE['companyID']) ) && $_COOKIE['companyID'] && (!empty($_COOKIE['companyPassword'])) && $_COOKIE['conpanyPassword'])){
    
    $oPageView = null;
    $oPage = $dir['root'].'company/templates/tpl_company_home.php';

    $arrVar['icon'] = $site['icon'];
    $arrVar['index'] = '<a href="'.$site['url'].'">';
    $arrVar['right1'] = ( (!empty($_COOKIE['companyID']) &&  $_COOKIE['companyID']) && $_COOKIE['companyPassword'] ) ? $_COOKIE['companyID'] : 'Login';
    $arrVar['right2'] = ( (!empty($_COOKIE['companyID']) &&  $_COOKIE['companyID']) && $_COOKIE['companyPassword'] ) ? 'Logout' : 'Register';
    $arrVar['right1href'] = '<a href="'.$site['url'].'conpany/index.php">';
    $arrVar['right2href'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['companyID']) && $_COOKIE['companyPassword'] ) ? '<a href="'.$site['url'].'logout.php">' : '<a href="'.$site['url'].'register.php">';
    $arrVar['hrefend'] = '</a>';
    
}else{
    //未登录，登录
    $oPageView = null;
    $oPage = $dir['root'].'company/templates/tpl_company_index.php';

    $arrVar['icon'] = $site['icon'];
    $arrVar['index'] = '<a href="'.$site['url'].'">';
    $arrVar['right1'] = ( (!empty($_COOKIE['companyID']) &&  $_COOKIE['companyID']) && $_COOKIE['companyPassword'] ) ? $_COOKIE['companyID'] : 'Login';
    $arrVar['right2'] = ( (!empty($_COOKIE['companyID']) &&  $_COOKIE['companyID']) && $_COOKIE['companyPassword'] ) ? 'Logout' : 'Register';
    $arrVar['right1href'] = '<a href="'.$site['url'].'conpany/index.php">';
    $arrVar['right2href'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['companyID']) && $_COOKIE['companyPassword'] ) ? '<a href="'.$site['url'].'logout.php">' : '<a href="'.$site['url'].'register.php">';
    $arrVar['hrefend'] = '</a>';
    send_headers_page_changed();
    header("Location:l.php");
}

