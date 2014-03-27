<?php
/**
 * Copyright (c) mojito
 * 
 */
require_once( 'inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );

$bAjxMode = ( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) and $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ? true : false;

if($bAjxMode){
    if(isset($_POST['RegEmail']) && $_POST['RegEmail']){
        $ID = process_pass_data(empty($_POST['RegEmail']) ? '' : $_POST['RegEmail']);

        $oProfiles = new MojDoProfilesController();
        
        if($oProfiles->checkUserExist($ID) > 0)
        {
            echo 'Email已经注册';
        }else{
            echo 'Email可以注册';
        }
    }
}else{
    header("Location:".$site['url']."register.php");
}
