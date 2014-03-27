<?php

/**
 * Copyright (c) mojito
 * 
 */

require_once( 'inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );

$aUser = array();

$member['ID']    = process_pass_data(empty($_POST['LoginEmail']) ? '' : $_POST['LoginEmail']);
$member['Password'] = process_pass_data(empty($_POST['LoginPassword']) ? '' : $_POST['LoginPassword']);

$bAjxMode = ( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) and $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ? true : false;

if ( isset($_POST['LoginEmail']) && $_POST['LoginEmail'] && isset($_POST['LoginPassword']) && $_POST['LoginPassword'] ) {
    
    $rRes = getProfileInfo($member['ID']);
    if($rRes){
        $res = check_password($member['ID'], $member['Password']);
        if($res){
            
            moj_login($member['ID'], $aUser['Password'], (bool)$_POST['rememberMe']);
            
            if($bAjxMode){
                echo "ok";
                exit;
            }
            global $site;
            $sRelocate = moj_get('relocate');
            if (!$sUrlRelocate = $sRelocate or $sRelocate == $site['url'] or basename($sRelocate) == 'register.php')
                $sUrlRelocate = MOJ_URL_ROOT . 'member.php';
            send_headers_page_changed();
            header("Location:member.php");

            exit;
        }else{
            if($bAjxMode){
                echo "fail";
            }else{
                send_headers_page_changed();
                header("Location:member.php");
            }
            exit;
            
        }
    }
    else {
        if($bAjxMode){
            echo "no";
        }else{
            send_headers_page_changed();
            header("Location:".$site['url']);
        }
        exit;
    }
    exit;
} else {
    send_headers_page_changed();
    header("Location:member.php");
    exit;
}

