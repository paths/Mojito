<?php

/**
 * Copyright (c) mojito
 * 我想把这个文件作为呈现html的入口
 */

require_once( 'header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'admin.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'languages.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'prof.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'params.inc.php' );
require_once( MOJ_DIRECTORY_PATH_SMARTY . 'Smarty.class.php' );

//require_once( MOJ_DIRECTORY_PATH_ROOT . "templates/tmpl_{$tmpl}/scripts/TemplMenu.php" );
//require_once( MOJ_DIRECTORY_PATH_ROOT . "templates/tmpl_{$tmpl}/scripts/TemplFunctions.php" );

function spacer( $width, $height )
{
    global $site;
    return '<img src="' . $site['images'] . 'spacer.gif" width="' . $width . '" height="' . $height . '" alt="" />';
}


function PageCode()
{
    global $oPageView;
    
    header( 'Content-type: text/html; charset=utf-8' );
    
    $smarty = new Smarty();
    $smarty->cache_lifetime = 0;
    $smarty->caching = false;
    $smarty->left_delimiter = "{moj_tag:";
    $smarty->right_delimiter = ":moj_tag}";
    
    $oPageView->show($smarty);
}

function send_headers_page_changed()
{
    $now = gmdate('D, d M Y H:i:s') . ' GMT';

    header("Expires: $now");
    header("Last-Modified: $now");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
}

