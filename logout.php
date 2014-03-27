<?php

/**
 * Copyright (c) mojito
 * 
 */

ob_start();
require_once( 'inc/header.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'design.inc.php' );
require_once( MOJ_DIRECTORY_PATH_INC . 'profiles.inc.php' );
ob_end_clean();

if (isset( $_COOKIE['memberID']) && isset($_COOKIE['memberPassword'])){
    moj_logout();
}

send_headers_page_changed();
header("Location:index.php");