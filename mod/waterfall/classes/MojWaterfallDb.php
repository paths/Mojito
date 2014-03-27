<?php
/**
 * Copyright (c) mojito
 * 
 */
require_once("../../inc/header.inc.php");
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );

moj_import("MojDoDb");
moj_import("MojDoMemcached");

class MojWaterfallDb extends MojDoDb{
    
    var $oMemcached = null;
    function MojWaterfallDb(){
        $this->oMemcached = new MojDoMemcached();
    }
    
    function updatePhotoList($iMax = 1000)
    {
        $sQuery = "SELECT Uri FROM photos ORDER BY Rate DESC LIMIT {$iMax}";
        
        $res = db_arr($sQuery);
        
        if(is_array($res)){
            foreach ($res as $ikey => $aValue){
                //INSERT INTO MEMCACHED
                $this->oMemcached->set("WF_".$ikey, $aValue);
            }
        }
    }
    
    function getPhotoList($iBegin, $iEnd)
    {
        $retUri = array();
        if(($iBegin > $iEnd) || ($iBegin < 0))
        {
            return null;
        }
        
        for ($i = $iBegin; $i < $iEnd; $i++)
        {
            $res = $this->oMemcached->get("WF_".$i);
            $retUri = $res;
        }
        
        return $retUri;
    }

    function flushPhotoList()
    {
        $this->oMemcached->flush();
    }
    
    function mongoDbClose()
    {
        $this->oMemcached->close();
    }
}

