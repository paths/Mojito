<?php

/**
 * Copyright (c) mojito
 * 
 */
require_once( 'inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );

moj_import("MojPhotosDb");
moj_import("MojDoMongoDb");

class MojPhotosUploader extends MojDoMongoDb
{
    // constructor
    var $oPhotoDb = null;
    function MojPhotosUploader()
    {
        parent::MojDoMongoDb();
        
        $this->oPhotosDb = new MojPhotosDb();
    }

    function UploadPhoto($filename/*local path*/)
    {
        $id = $this->save($filename);
        if($id){
            $res = $this->oPhotosDb->InsertPhotoMeta($filename, $id);
            return $res;
        }
        return false;
    }
    
    function DeletePhoto($id/*filesystem id*/)
    {
        $res = $this->delete($id);
        if($res){
            $res1 = $this->oPhotosDb->DeletePhotoMeta($id);
            return $res1;
        }
        return false;
    }
    
    function ReadPhoto($id, $cachepath)
    {
        $res = $this->ReadPhoto($id, $cachepath);
        return $res;
    }
    
    function AddAdsLogoButton($company)
    {
        return $this->oPhotosDb->addAds($company);
    }
    
    function isAdsLogo($photoId)
    {
        return $this->oPhotosDb->isAds($photoId);
    }
}
