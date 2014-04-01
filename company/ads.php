<?php
/**
 * Copyright (c) mojito
 * 
 */

define('MOJ_ADS_PAGE', 1);

require_once( '../inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );
require_once( MOJ_DIRECTORY_PATH_MODULES.'ads/classes/MojAdsDb.php' );

moj_import("MojTemplAdsPageView");

$oPageView = null;

$oPage = $dir['root'].'company/templates/tpl_ads.php';
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
    $iMax = 20;
    $oAdsDb = new MojAdsDb();
    $retArr = array();
    $ads = array();
    $retArr = $oAdsDb->getAdsList($iMax);
    
    if(is_array($retArr)){
        foreach ($retArr as $value) {
            $tmp = array();
        
            $tmp['title'] = $value['AdsName'];
            $tmp['link'] = $value['AdsId'];
            $tmp['desc'] = $value['AdsDesc'];
            $ads[] = $tmp;
        }
    }
    
    $arrVar['title'] = "Doupit | 广告平台";
    $arrVar['ad_list'] = $ads;
    $oPageView = new MojTemplAdsPageView();
    $oPageView->addParam($arrVar);
    $oPage = $dir['root'].'company/templates/tpl_ads.php';
    
    $oPageView->setTpl($oPage);
    
    PageCode();
    
}else {
    header("Location:".$site['url']."register.php");
    
}


