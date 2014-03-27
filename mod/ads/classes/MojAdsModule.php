<?php
/**
 * Copyright (c) mojito
 * for ads action
 */

require_once('../../inc/header.inc.php');
require_once(MOJ_DIRECTORY_PATH_INC . 'design.inc.php');
require_once(MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php');
require_once(MOJ_DIRECTORY_PATH_INC . 'db.inc.php');
require_once(MOJ_DIRECTORY_PATH_INC . 'utils.inc.php');

moj_import("MojDoDb");

class MojAdsModule extends MojDoDb
{

    var $oAdsClick = null;
    var $oAdsConnnection = null;

    function MojAdsModule(){
        //?
        parent::MojDoDb();
        
        $this->oAdsClick = new MojAdsClickDb();
        $this->oAdsConnnection = new MojAdsConnection();
    }

    
    
    function antiCheat($ip, $user, $photo, $ads)
    {
        
        if($user == "" && !($ip == "")){
            
            if(isAdsIpClicked($ip, $photo, $ads)){
                return false;
            }
        }else if(!($user == "")){
            
            if(isAdsUserClicked($user, $photo, $ads)){
                return false;
            }
        }
        return true;
    }
    
    function getClntIP()
    {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
                $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                $ip = getenv("REMOTE_ADDR");
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                $ip = $_SERVER['REMOTE_ADDR'];
        else 
            $ip = "unknown";
        return $ip;
        
    }
    
    function doClickRecord($ip, $user, $photo, $ads)
    {
        /* 防作弊 */
        if($this->antiCheat($ip, $user)){
            $this->oAdsConnnection->adsClick($photo, $ads);
            $this->oAdsClick->firstAdsClick($ads, $photo, $ip, $user);
            return 0;
        }else
        {
            return -1;
        }
    }
    
    function call($user, $photo, $ads)
    {
        $ip = getClntIP();
        
        if(antiCheat($ip, $user, $photo, $ads)){
            doClickRecord($ip, $user, $photo, $ads);
            return true;
        }else{
            return false;
        }
    }
    
}
