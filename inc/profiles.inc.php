<?php

/**
 * Copyright (c) BoonEx Pty Limited - http://www.boonex.com/
 * CC-BY License - http://creativecommons.org/licenses/by/3.0/
 */

require_once( 'header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'images.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'params.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'tags.inc.php' );

// user roles
define('MOJ_DO_ROLE_GUEST',     0);
define('MOJ_DO_ROLE_MEMBER',    1);
define('MOJ_DO_ROLE_ADMIN',     2);
define('MOJ_DO_ROLE_AFFILIATE', 4);
define('MOJ_DO_ROLE_MODERATOR', 8);

/**
 * The following functions are needed to check whether user is logged in or not, active or not and get his ID.
 */
function isLogged()
{
    return getLoggedId() != 0;
}
function isLoggedActive()
{
    return isProfileActive();
}
function getLoggedId()
{
    return isset($_COOKIE['memberID']) ? 1 : 0;
}
function getLoggedPassword()
{
    return isset($_COOKIE['memberPassword']) ? $_COOKIE['memberPassword'] : '';
}

/**
 * The following functions are needed to check the ROLE of user.
 */
function isMember($iId = 0)
{
    return isRole(MOJ_DO_ROLE_MEMBER, $iId);
}
if(!function_exists("isAdmin")) {
    function isAdmin($iId = 0)
    {
        return isRole(MOJ_DO_ROLE_ADMIN, $iId);
    }
}
function isAffiliate($iId = 0)
{
    return isRole(MOJ_DO_ROLE_AFFILIATE, $iId);
}
function isModerator($iId = 0)
{
    return isRole(MOJ_DO_ROLE_MODERATOR, $iId);
}
function isRole($iRole, $iId = 0)
{
    $aProfile = getProfileInfo($iId);
    if($aProfile === false)
        return false;

    if(!((int)$aProfile['Role'] & $iRole))
        return false;

    return true;
}

$aUser = array(); //global cache array

function ShowZodiacSign( $date )
{
    global $site;

    if ( $date == "0000-00-00" )
        return "";

    if ( strlen($date) ) {
        $m = substr( $date, -5, 2 );
        $d = substr( $date, -2, 2 );

        switch ( $m ) {
            case '01': if ( $d <= 20 ) $sign = "capricorn"; else $sign = "aquarius";
                break;
            case '02': if ( $d <= 20 ) $sign = "aquarius"; else $sign = "pisces";
                break;
            case '03': if ( $d <= 20 ) $sign = "pisces"; else $sign = "aries";
                break;
            case '04': if ( $d <= 20 ) $sign = "aries"; else $sign = "taurus";
                break;
            case '05': if ( $d <= 20 ) $sign = "taurus"; else $sign = "gemini";
                break;
            case '06': if ( $d <= 21 ) $sign = "gemini"; else $sign = "cancer";
                break;
            case '07': if ( $d <= 22 ) $sign = "cancer"; else $sign = "leo";
                break;
            case '08': if ( $d <= 23 ) $sign = "leo"; else $sign = "virgo";
                break;
            case '09': if ( $d <= 23 ) $sign = "virgo"; else $sign = "libra";
                break;
            case '10': if ( $d <= 23 ) $sign = "libra"; else $sign = "scorpio";
                break;
            case '11': if ( $d <= 22 ) $sign = "scorpio"; else $sign = "sagittarius";
                break;
            case '12': if ( $d <= 21 ) $sign = "sagittarius"; else $sign = "capricorn";
        }
        $sIcon = $sign . '.png';
        return '<img src="' . $site['zodiac'] . $sIcon . '" alt="' . $sign . '" title="' . $sign . '" />';
    } else {
        return "";
    }
}

function age( $birth_date )
{
    if ( $birth_date == "0000-00-00" )
        return _t("_uknown");

    $bd = explode( "-", $birth_date );
    $age = date("Y") - $bd[0] - 1;

    $arr[1] = "m";
    $arr[2] = "d";

    for ( $i = 1; $arr[$i]; $i++ ) {
        $n = date( $arr[$i] );
        if ( $n < $bd[$i] )
            break;
        if ( $n > $bd[$i] ) {
            ++$age;
            break;
        }
    }

    return $age;
}


function createUserDataFile( $userID )
{
    global $aUser;

    $bUseCacheSystem = ( getParam('enable_cache_system') == 'on' ) ? true : false;
    if (!$bUseCacheSystem) return false;

    $userID = (int)$userID;
    $fileName = MOJ_DIRECTORY_PATH_CACHE . 'user' . $userID . '.php';
    if( $userID > 0 ) {

        $aPreUser = getProfileInfoDirect ($userID);

        if( isset( $aPreUser ) and is_array( $aPreUser ) and $aPreUser) {
            $sUser = '<'.'?php';
            $sUser .= "\n\n";
            $sUser .= '$aUser[' . $userID . '] = array();';
            $sUser .= "\n";
            $sUser .= '$aUser[' . $userID . '][\'datafile\'] = true;';
            $sUser .= "\n";

            $replaceWhat = array( '\\',   '\''   );
            $replaceTo   = array( '\\\\', '\\\'' );

            foreach( $aPreUser as $key =>  $value )
                $sUser .= '$aUser[' . $userID . '][\'' . $key . '\']' . ' = ' . '\'' . str_replace( $replaceWhat, $replaceTo, $value )  . '\'' . ";\n";

            if( $file = fopen( $fileName, "w" ) ) {
                fwrite( $file, $sUser );
                fclose( $file );
                @chmod ($fileName, 0666);

                @include( $fileName );
                return true;
            } else
                return false;
        }
    } else
        return false;
}

/**
 * Check whether the requested profile is active or not.
 */
function isProfileActive($iId = 0)
{
    $aProfile = getProfileInfo($iId);
    if($aProfile === false || empty($aProfile))
        return false;

    return $aProfile['Status'] == 'Active';
}
function getProfileInfoDirect ($iProfileID)
{
    return $GLOBALS['MySQL']->getRow("SELECT * FROM `Profiles` WHERE `Email`='" . $iProfileID . "' LIMIT 1");
}

function getProfileInfo($iProfileID = 0, $checkActiveStatus = false, $forceCache = false)
{
    global $aUser;
    
    if(!$iProfileID)
        return false;

    $res = getProfileInfoDirect($iProfileID);
    if(!$res){
        return false;
    }
    
    $aUser['Password'] = $res['Password'];//加密后的
    $aUser['Salt'] = $res['Salt'];
    return true;
}

/*
* The function returns NickName by given ID. If no ID specified, it tryes to get if from _COOKIE['memberID'];
*/
function getUsername( $ID = '' )
{
    if ( !$ID && !empty($_COOKIE['memberID']) )
        $ID = (int)$_COOKIE['memberID'];

    if ( !$ID )
        return '';

    $aProfile = getProfileInfo($ID);
    if (!$aProfile)
        return false;

    return $aProfile['NickName'];
}

/*
* The function returns NickName by given ID. If no ID specified, it tryes to get if from _COOKIE['memberID'];
*/
function getNickName( $ID = '' )
{
    if ( !$ID && !empty($_COOKIE['memberID']) )
        $ID = (int)$_COOKIE['memberID'];

    if ( !$ID )
        return '';

    return $GLOBALS['oFunctions']->getUserTitle ($ID);
}

/*
 * The function returns Password by given ID.
 */
function getPassword( $ID = '' )
{
    if ( !$ID )
        return '';
    if(isset($GLOBALS['aUser']['Password']))
        return $GLOBALS['aUser']['Password'];
    else
        return '';

}

function moj_login($iId, $bRememberMe = false)
{
    $sPassword = getPassword($iId);

    $aUrl = parse_url($GLOBALS['site']['url']);
    $sPath = isset($aUrl['path']) && !empty($aUrl['path']) ? $aUrl['path'] : '/';
    $sHost = '';
    $iCookieTime = $bRememberMe ? time() + 24*60*60*30 : 0;
    setcookie("memberID", $iId, $iCookieTime, $sPath, $sHost);
    $_COOKIE['memberID'] = $iId;
    setcookie("memberPassword", $sPassword, $iCookieTime, $sPath, $sHost, false, true /* http only */);
    $_COOKIE['memberPassword'] = $sPassword;

    db_res("UPDATE `Profiles` SET `DateLastLogin`=NOW(), `DateLastNav`=NOW() WHERE `Email`='" . $iId . "'");

    return true;
}

function moj_logout($bNotify = true)
{
    $aUrl = parse_url($GLOBALS['site']['url']);
    $sPath = isset($aUrl['path']) && !empty($aUrl['path']) ? $aUrl['path'] : '/';

    setcookie('memberID', '', time() - 96 * 3600, $sPath);
    setcookie('memberPassword', '', time() - 96 * 3600, $sPath);

    unset($_COOKIE['memberID']);
    unset($_COOKIE['memberPassword']);
}

check_logged();


