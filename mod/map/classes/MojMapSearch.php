<?php
/**
 * Copyright (c) mojito
 * 
 */
require_once ('../../inc/header.inc.php');
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );

moj_import("MojDoDb");

class MojMapSearch extends MojDoDb{
    //put your code here
    
    var $LngDis;
    var $LatDis;
    var $oPhotosDb;

    function MojMapSearch($iLngDis, $iLatDis)
    {
        $this->$LngDis = abs($LngDis);
        $this->$LatDis = abs($LatDis);
        
    }
    
    function Search($iLng, $iLat, $max)
    {
        $LngMin = $iLng - $this->LngDis;
        $LngMax = $iLng + $this->LngDis;
        $LatMin = $iLat - $this->LatDis;
        $LatMax = $iLat + $this->LatDis;
        
        $sQuery = "SELECT Uri FROM photos WHERE Located = 1 AND Lng>{$LngMin} AND Lng<{$LngMax}, AND Lat>{$LatMin} AND lat<{$LatMax} LIMIT {$max};";
        
        $res = db_res_assoc_arr($sQuery);
        
        return $res;
    }
    
    function setLocation($Uri, $iLng, $iLat)
    {
        $sQuery = "UPDATE photos SET Lng={$iLng}, Lat={$iLat}, Located=1 WHERE Uri = '{$Uri}'";
        
        return db_res($sQuery);
    }
    
    function cancelLocation($Uri)
    {
        $sQuery = "UPDATE photos SET Lng=0, Lat=0, Located=0 WHERE Uri = '{$Uri}'";
        
        return db_res($sQuery);
    }
}



