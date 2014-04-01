<?php
/**
 * Copyright (c) mojito
 * for ads public
 */

//require_once( '../../../inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );

moj_import("MojDoDb");

class MojAdsDb extends MojDoDb 
{
    function MojAdsDb()
    {
        parent::MojDoDb();
    }
    
    /*发布ads, 必须先提交logo*/
    function publishAds($company, $ads, $logo)
    {
        $sQuery = "INSERT INTO ads (CompanyEmail, AdsId, Logo) VALUES ('{$company}', '{$ads}', '{$logo}')";
        
        return db_res($sQuery);
    }
    
    function deleteAds($company, $ads)
    {
        $sQuery = "DELETE FROM ads WHERE CompanyEmail ='{$company}' and AdsId =  '{$ads}'";
        
        return db_res($sQuery);
    }
    
    function getAdsList($Max)
    {
        $sQuery = "SELECT * FROM ads limit {$Max}";
        
        $tmpArr = $this->getAll($sQuery);
        
        return $tmpArr;
    }
    
    function getAdsListByCompany($email, $iMax)
    {
        $sQuery = "SELECT * FROM ads WHERE CompanyEmail = '{$email}' limit {$Max}";
        
        $tmpArr = $this->getAll($sQuery);
        
        return $tmpArr;
    }
}


