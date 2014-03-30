<?php

/*
if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
        $ip = getenv("HTTP_CLIENT_IP");
else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
        $ip = getenv("REMOTE_ADDR");
else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
        $ip = $_SERVER['REMOTE_ADDR'];
else 
    $ip = "unknown";


echo $ip;
*/


define('MOJ_SEARCH_PAGE', 1);

require_once( './inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'admin.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'db.inc.php' );

moj_import('MojTemplSearchPageView');
moj_import("MojDoSearch");



$oSearchObj = new MojDoSearch();
$oSearchObj->setIdxPath(LUCENE_PATH);
$oSearchObj->setEncoded("utf-8");

$oSearchObj->insert('email', 'grahamtsui@gmail.com');
//$oSearchObj->insert('email', 'pathstsui');

$word = "gmail";

$search_length = $oSearchObj->getDocCount();

echo "{$search_length}";

$length = $oSearchObj->search($word);

echo "{$length}";