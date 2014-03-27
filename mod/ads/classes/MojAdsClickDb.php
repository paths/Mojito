<?php
/**
 * Copyright (c) mojito
 * for ads click
 */

require_once("../../inc/header.inc.php");
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );

moj_import("MojDoDb");

class MojAdsClickDb extends MojDoDb
{

    function MojAdsClickDb()
    {
        parent::MojDoDb();
    }

    function isAdsIpClicked($clickIP, $PhotoId, $Ads)
    {
        $sQuery = "SELECT ID FROM ads_click WHERE Ip = '{$clickIP}' AND AdsId = '{$Ads}' AND PhotoId = '{$PhotoId}'";
        
        return db_arr($sQuery);
    }
    
    function isAdsUserClicked($userEmail, $PhotoId, $Ads)
    {
        $sQuery = "SELECT ID FROM ads_click WHERE User = '{$userEmail}' AND AdsId = '{$Ads}' AND PhotoId = '{$PhotoId}'";
        
        return db_arr($sQuery);
    }

    /* 第一次点击*/
    function firstAdsClick($ads, $photo, $ip, $user)
    {
        $sQuery = "INSERT INTO ads_click (AdsId, PhotoId, User, Ip， DateLastClick)  VALUES ('{$ads}', '{$photo}', '{$ip}', '{$user}'， NOW())";
        
        return db_arr($sQuery);
    }
    
    /* 为了防止恶意点击，只更新点击时间 */
    function UpdateClickTime($company, $photo, $ip, $user)
    {
        return true;
    }
}


