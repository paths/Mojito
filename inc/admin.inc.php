<?php

/**
 * Copyright (c) mojito
 */

require_once( 'header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'admin_design.inc.php' );

function getID( $str, $with_email = 0 )
{
    if ( $with_email ) {
        if ( eregi("^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$", $str) ) {
            $str = process_db_input($str);
            $mail_arr = db_arr( "SELECT `ID` FROM `Profiles` WHERE `Email` = '$str'" );
            if ( (int)$mail_arr['ID'] ) {
                return (int)$mail_arr['ID'];
            }
        }
    }

    $str = process_db_input($str);
    $iID = (int)db_value( "SELECT `ID` FROM `Profiles` WHERE `NickName` = '$str'" );

    if(!$iID) {
        $aProfile = getProfileInfo($str);
        $iID = isset($aProfile['ID']) ? $aProfile['ID'] : 0;
    }
    return $iID;
}

// check encrypted password (ex., from Cookie)
function check_login($ID, $passwd, $iRole = MOJ_ROLE_MEMBER, $error_handle = true)
{
    global $aUser;

    switch ($iRole) {
        case MOJ_ROLE_MEMBER: $member = 0; break;
        case MOJ_ROLE_ADMIN:  $member = 1; break;
    }

    // If password is incorrect
    if (strcmp($aUser['Password'], $passwd) != 0) {
        return false;
    }
    
    update_date_lastnav($ID);
    return true;
}

function check_logged()
{
    $aAccTypes = array(
       1 => 'admin',
       0 => 'member'
    );

    $bLogged = false;
    foreach($aAccTypes as $iKey => $sValue)
        if($GLOBALS['logged'][$sValue] = member_auth($iKey, false)) {
            $bLogged = true;
            break;
        }

    if((isset($_COOKIE['memberID']) || isset($_COOKIE['memberPassword'])) && !$bLogged)
        moj_logout(false);
}

// 0 - member, 1 - admin
function member_auth($member = 0, $error_handle = true, $bAjx = false)
{
    global $site;

    switch ($member) {
        case 0:
            $mem	    = 'member';
            $login_page = MOJ_URL_ROOT . "member.php";
            $iRole      = MOJ_ROLE_MEMBER;
            break;
        case 1:
            $mem	    = 'admin';
            $login_page = MOJ_URL_ADMIN . "index.php";
            $iRole      = MOJ_ROLE_ADMIN;
            break;
    }

    if (empty($_COOKIE['memberID']) || !isset($_COOKIE['memberPassword'])) {
        return false;
    }

    //return check_login(process_pass_data($_COOKIE['memberID']), process_pass_data($_COOKIE['memberPassword' ]), $iRole, $error_handle);
    return true;
}

// check unencrypted password
function check_password($sUserEmail, $sPassword, $iRole = MOJ_ROLE_MEMBER, $error_handle = true)
{
    global $aUser;
    if ( !isset($aUser['Salt']) ){
        return false;
    }

    $sPassCheck = encryptUserPwd($sPassword, $aUser['Salt']);
    
    return check_login($iId, $sPassCheck, $iRole, $error_handle);
}

function update_date_lastnav($iId)
{
    $iId = (int) $iId;

    // update the date of last navigate;
    $sQuery = "UPDATE `Profiles` SET `DateLastNav` = NOW() WHERE `Email` = '{$iId}'";
    db_res($sQuery);
}

function profile_delete($ID, $isDeleteSpammer = false)
{
    //global $MySQL;
    global $dir;

    $ID = (int)$ID;

    if ( !$ID )
        return false;

    if ( !($aProfileInfo = getProfileInfo( $ID )) )
        return false;

    $iLoggedInId = getLoggedId();

    
    db_res( "DELETE FROM `Profiles` WHERE `ID` = '{$ID}'" );

}