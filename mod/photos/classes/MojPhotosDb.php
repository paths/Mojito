<?php
/**
 * Copyright (c) 
 * 
 */
require_once( 'inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );

moj_import("MojDoDb");

class MojPhotosDb extends MojDoDb
{
    
    private $table = "photo";
    /*
     * Constructor.
     */
    function MojPhotosDb ()
    {
        parent::MojDoDb();
        
    }

    function getIdByHash ($sHash)
    {
        $sQuery = "";
    }
    
    /* get User photo by Email*/
    function getPhotoByEmail($Email)
    {
        $sQuery = "";
    }
    
    /* File system Uri*/
    function getPhotoByUri()
    {
        $sQuery = "SELECT ";
    }
    
    /* insert */
    function InsertPhotoMeta($filename, $id)
    {
        $sQuery = "INSERT INTO photos ";
    }
    
    function DeletePhotoMeta($photoId)
    {
        $sQuery = "DELETE FROM photos WHERE Uri = '{$photoId}'";
        
        return db_res($sQuery);
    }
    
    function getUserPhotoList($email)
    {
        $sQuery = "SELECT Uri FROM photos WHERE Owner = '{$email}'";
        
        return db_res($sQuery);
    }
    
    function addAds($company)
    {
        $sQuery = "UPDATE photos SET AdsId = '{$company}' LIMIT 1";
        
        return db_res($sQuery);
    }
    
    function isAds($photoId)
    {
        $sQuery = "SELECT IsAds FROM photos WHERE Uri = '{$photoId}'  LIMIT 1";
        $res = db_arr($sQuery);
        
        if($res && is_array($res))
        {
            if(is_set($res['IsAds']))
            {
                if($res['IsAds'] == 1)
                    return true;
            }
        }
        return false;
    }
}
