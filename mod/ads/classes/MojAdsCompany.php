<?php

/**
 * Copyright (c) mojito
 * 
 */

define('DO_TABLE_COMPANY', '`company`');

require_once("../../inc/header.inc.php");
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );

moj_import('MojDoDb');

class MojAdsCompany extends MojDoDb{
    
    function MojAdsCompany(){
        parent::MojDoDb();
    }
    
    function checkCompanyExist($email){
        $sQuery = "SELECT ID FROM company where Email = '{$email}' limit 1";
        
        $retArr = array();
        $retArr = $this->getFirstRow($sQuery);
        if(empty($retArr)){
            return false;
        }else{
            return true;
        }
    }

    function registerAdsCompany(){
        $sQuery = "INSERT INTO company (CompanyName, Email, Password, Salt) VALUES Email = '{$email}' limit 1";
    }
    
    function loginAdsCompany($email, $password){
        $sQuery = "SELECT Password,Salt FROM company where Email = '{$email}' limit 1";
        
        $retArr = array();
        
        $retArr = $this->getFirstRow($sQuery);
        if(is_array($retArr)){
            
        }else{
            return false;
        }
        
    }


    function deleteAdsCompany(){
        
    }
    
    function publishAds(){
        
    }
    
    function deleteAds(){
        
    }
    
    function setAdsClickReward(){
        
    }
    
    function getAdsDetail(){
        
    }
}


