<?php
/**
 * Copyright (c) mojito
 * 
 */
require_once('../../inc/header.inc.php');
require_once(MOJ_DIRECTORY_PATH_INC . 'design.inc.php');
require_once(MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php');
require_once(MOJ_DIRECTORY_PATH_INC . 'db.inc.php');
require_once(MOJ_DIRECTORY_PATH_INC . 'utils.inc.php');

require_once ('MojMapSearch.php');

class MojMapModule {

    var $oMapSearch = null;
    
    function MojMapModule(){
        $oMapSearch = new MojMapSearch();
        
    }
    
    function callSearch($iLng, $Lat, $iMax = 6){
        
        return $this->oMapSearch->Search($iLng, $Lat, $iMax);
    }
    
    function callSetting($Uri, $iLng, $iLat){
        return $this->oMapSearch->setLocation($Uri, $iLng, $iLat);
    }
    
    function callCancel($Uri){
        return $this->oMapSearch->cancelLocation($Uri);
    }
    
}


