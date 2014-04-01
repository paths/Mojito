<?php

/**
 * Copyright (c) mojito
 * for ads connection
 */

define('DO_TABLE_ADVERTISE', '`ads`');

require_once("../../inc/header.inc.php");
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );

moj_import('MojDoDb');

class MojAdsConnectionDb extends MojDoDb
{
    /*
    * Constructor.
    */
    function MojAdsConnectionDb()
    {
        parent::MojDolDb();
    }
    
    /* 图片使用该LOGO */
    function initPhotoAds($ads, $photo)
    {
        $sQuery = "INSERT INTO ads_connection (AdsId, PhotoId, ClickCount) VALUES ('{$ads}', '{$photo}', 0)";
        
        return db_res($sQuery);
    }
    
    function isLogoUsedBefore($ads, $photo)
    {
        $sQuery = "SELECT ID FROM ads_connection WHERE AdsId = '{$ads}' AND PhotoId = '{$photo}' LIMIT 1";
        
        return getFirstRow($sQuery);
    }

    /**/
    function adsClickConnection($PhotoId, $AdsId)
    {
        $sQuery = "UPDATE ads_connection SET ClickCount = ClickCount+1 WHERE PhotoId = '{$PhotoId}' AND AdsId = '{$AdsId}'";
        
        return db_res($sQuery);
    }

    function getAdsClickCount($Ads, $PhotoId)
    {
        $sQuery = "SELECT ClickCount FROM ads_connection WHERE Adsid = '{$Ads}' AND PhotoId = '{$PhotoId}' LIMIT 1";
        
        return db_res($sQuery);
    }
    
}
