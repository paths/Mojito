<?php
/*
 * Copyright (c) mojito
 * 
 */

define('MOJ_SEARCH_PAGE', 1);

require_once( './inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'admin.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );

moj_import('MojTemplSearchPageView');
moj_import("MojDoSearch");

check_logged();

$word = process_pass_data(empty($_GET['wd']) ? '' : $_GET['wd']);
$searchArray = array();

$oPageView = null;

$oPage = $dir['root'].'templates/tpl_search.php';
$arrVar = array();

if(empty($word)){
    header("Location:member.php");
}

$arrVar['title'] = "Doupit | ".$word;
$oSearch = new MojDoSearch();
$oSearch->setIdxPath(LUCENE_PATH);
$oSearch->setEncoded("utf-8");

if((!empty($_COOKIE['memberID'])) && $_COOKIE['memberID'] && (!empty($_COOKIE['memberPassword'])) && $_COOKIE['memberPassword']){
    
    $arrVar['icon'] = $site['icon'];
    $arrVar['index'] = '<a href="'.$site['url'].'">';
    $arrVar['right1'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? $_COOKIE['memberID'] : 'Login';
    $arrVar['right2'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? 'Logout' : 'Register';
    $arrVar['right1href'] = '<a href="'.$site['url'].'member.php">';
    $arrVar['right2href'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? '<a href="'.$site['url'].'logout.php">' : '<a href="'.$site['url'].'register.php">';
    $arrVar['hrefend'] = '</a>';
    $arrVar['searchword'] = $word;
    
    $searchArray = $oSearch->search($word);
    $arrVar['result_count'] = count($searchArray);
    $arrVar['result'] = $searchArray;
    
    $oPageView = new MojTemplSearchPageView();
    $oPageView->setTpl($oPage);
    $oPageView->addParam($arrVar);
    PageCode();
    
}else{
    header("Location:member.php");
}