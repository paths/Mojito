<?php
/**
 * Copyright (c) mojito
 * 
 */
require_once ('MojWaterfallDb.php');

class MojWaterfallModule {
    
    var $oWaterfallDb = null;
    
    function MojWaterfallModule()
    {
        $this->oWaterfallDb = new MojWaterfallDb();
    }
    
    function refreshPhotoList()
    {
        $this->oWaterfallDb->updatePhotoList();
    }
    
    function getNewPhotoView($iBegin, $iEnd)
    {
        $oView = $this->oWaterfallDb->getPhotoList($iBegin, $iEnd);
        return $oView;
    }
    
}


