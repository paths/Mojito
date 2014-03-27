<?php

/*
 * Copyright (c) mojito
 * 
 */

define('MOJ_REGISTER_PAGE', 1);

require_once( './inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'admin.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );

moj_import('MojTemplRegisterPageView');
moj_import("MojDoProfilesController");
moj_import('MojTemplMemberPageView');

check_logged();

$aUser = array();

if (isLogged()) {
    header ('Location:' . MOJ_URL_ROOT . 'member.php');
    exit;
}

if(isset($_POST['RegEmail']) && $_POST['RegEmail'] && isset($_POST['RegPassword']) &&$_POST['RegPassword']){
    $member['ID']	= process_pass_data(empty($_POST['RegEmail']) ? '' : $_POST['RegEmail']);
    $member['Password'] = process_pass_data(empty($_POST['RegPassword']) ? '' : $_POST['RegPassword']);
    
    $oProfiles = new MojDoProfilesController();
    $aData['ID'] = $member['ID'];
    $aData['Password'] = $member['Password'];
    
    if($oProfiles->checkUserExist($aData['ID']) > 0)
    {
        header("Location:".$site['url']."register.php");
    }
    
    $res = $oProfiles->createProfile($aData);
    
    if($res && is_array($res)){
        $aUser['Password'] = $res['Password'];
        moj_login($member['ID'],true);
        header("Location:".$site['url']."member.php");
    }else{
        header("Location:".$site['url']."register.php");
    }
    exit;
}


$oPage = $dir['root'].'templates/tpl_index.php';
$arrVar = array();

$oPageView = new MojTemplRegisterPageView();
$oPage = $dir['root'].'templates/tpl_register.php';

$arrVar['title'] = "Doupit | Register";
$arrVar['icon'] = $site['icon'];
$arrVar['index'] = '<a href="'.$site['url'].'">';
$arrVar['right1'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? $_COOKIE['memberID'] : 'Login';
$arrVar['right2'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? 'Logout' : 'Register';
$arrVar['right1href'] = '<a href="'.$site['url'].'member.php">';
$arrVar['right2href'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? '<a href="'.$site['url'].'logout.php">' : '<a href="'.$site['url'].'register.php">';
$arrVar['hrefend'] = '</a>';

$oPageView->setTpl($oPage);
$oPageView->addParam($arrVar);


PageCode();
