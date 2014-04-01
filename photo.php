<?php
/**
 * Copyright (c) mojito
 * 
 */

define('MOJ_PHOTO_PAGE', 1);

require_once( 'inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'utils.inc.php' );

moj_import("MojTemplPhotoPageView");

$oPageView = null;

$oPage = $dir['root'].'templates/tpl_photo_big.php';
$arrVar = array();

$arrVar['icon'] = $site['icon'];
$arrVar['index'] = '<a href="'.$site['url'].'">';
$arrVar['right1'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? $_COOKIE['memberID'] : 'Login';
$arrVar['right2'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? 'Logout' : 'Register';
$arrVar['right1href'] = '<a href="'.$site['url'].'member.php">';
$arrVar['right2href'] = ( (!empty($_COOKIE['memberID']) &&  $_COOKIE['memberID']) && $_COOKIE['memberPassword'] ) ? '<a href="'.$site['url'].'logout.php">' : '<a href="'.$site['url'].'register.php">';
$arrVar['hrefend'] = '</a>';

$arrVar['img'] = 'templates/img/alt.jpg';//图片源
$arrVar['ads'] = '<div class="info style-default black" style="overflow: hidden; top: 10.62%; left: 5.94%; height: auto;" data-position="custom" data-left="5.94%" data-top="10.62%">';
$arrVar['ads'] .= '<div class="viewport" style="-webkit-transition: -webkit-transform 0ms; transition: -webkit-transform 0ms; -webkit-transform-origin: 0px 0px; -webkit-transform: translate(0px, 0px) translateZ(0px);">';

$arrVar['ads'] .= '<div class="animate-1">';
$arrVar['ads'] .= '<p class="slide-subtitle">推广</p>';
$arrVar['ads'] .= '<img height="52px" width="100px" src="templates/img/google_logo.jpg" />';
$arrVar['ads'] .= '</div><div class="animate-2"><div class="description"><p>这是来自图片上传者的添加广告，为了不影响使用，您可以点击';
$arrVar['ads'] .= '<a href="#" class="button">解除广告</a></p></div></div></div></div>';


$arrVar['title'] = "Doupit | Photo";
$oPageView = new MojTemplPhotoPageView();

$oPageView->addParam($arrVar);
$oPageView->setTpl($oPage);


PageCode();


