<?php

/**
 * Copyright (c) mojito
 * 
 */

$site['ver']               = '1.0';
$site['build']             = '4';
$site['title']             = "Doupit | Make Your Photos Valuable";
$site['url']               = "http://localhost/";
$admin_dir                 = "admin";
$iAdminPage				= 0;
$site['url_admin']         = "{$site['url']}$admin_dir/";
$site['icon']              = "template/img/favicon.ico";

$site['mediaImages']       = "{$site['url']}media/images/";
$site['gallery']           = "{$site['url']}media/images/gallery/";
$site['flags']             = "{$site['url']}media/images/flags/";
$site['banners']           = "{$site['url']}media/images/banners/";
$site['tmp']               = "{$site['url']}tmp/";
$site['plugins']           = "{$site['url']}plugins/";
$site['base']              = "{$site['url']}templates/base/";

$site['bugReportMail']     = "598394355@qq.com";

$dir['root']               = "F:/Mojito/";
$dir['inc']                = "{$dir['root']}inc/";
$dir['profileImage']       = "{$dir['root']}media/images/profile/";

$dir['mediaImages']        = "{$dir['root']}media/images/";
$dir['gallery']            = "{$dir['root']}media/images/gallery/";
$dir['flags']              = "{$dir['root']}media/images/flags/";
$dir['banners']            = "{$dir['root']}media/images/banners/";
$dir['tmp']                = "{$dir['root']}tmp/";
$dir['cache']              = "{$dir['root']}cache/";
$dir['plugins']            = "{$dir['root']}plugins/";
$dir['base']               = "{$dir['root']}templates/base/";
$dir['classes']            = "{$dir['inc']}classes/";
$dir['smarty']             = "{$dir['inc']}smarty/";

$video_ext                 = 'avi';
$MOGRIFY                   = "/usr/local/bin/mogrify";
$CONVERT                   = "/usr/local/bin/convert";
$COMPOSITE                 = "/usr/local/bin/composite";
$PHPBIN                    = "/usr/local/bin/php";

$db['host']                = '127.0.0.1';
$db['sock']                = '';
$db['port']                = '3306';
$db['user']                = 'root';
$db['passwd']              = 'pathsmatch1987';
$db['db']                  = 'mojito';

$mongodb['host']           = '127.0.0.1';
$mongodb['port']           = '27017';
$mongodb['user']           = 'mojito';
$mongodb['passwd']         = 'mojitojinnpaths';

$memcached['host']         = '127.0.0.1';
$memcached['port']         = '11211';

$lucene['path']            = "{$dir['root']}SEIdx/";
$lucene['class']           = "LuceneSearch";

define('MOJ_URL_ROOT', $site['url']);
define('MOJ_URL_ADMIN', $site['url_admin']);
define('MOJ_URL_PLUGINS', $site['plugins']);
define('MOJ_URL_MODULES', $site['url'] . 'modules/' );
define('MOJ_URL_CACHE_PUBLIC', $site['url'] . 'cache_public/');

define('MOJ_DIRECTORY_PATH_INC', $dir['inc']);
define('MOJ_DIRECTORY_PATH_SMARTY', $dir['smarty']);
define('MOJ_DIRECTORY_PATH_ROOT', $dir['root']);
define('MOJ_DIRECTORY_PATH_BASE', $dir['base']);
define('MOJ_DIRECTORY_PATH_CACHE', $dir['cache']);
define('MOJ_DIRECTORY_PATH_CLASSES', $dir['classes']);
define('MOJ_DIRECTORY_PATH_PLUGINS', $dir['plugins']);
define('MOJ_DIRECTORY_PATH_DBCACHE', $dir['cache']);
define('MOJ_DIRECTORY_PATH_MODULES', $dir['root'] . 'mod/' );
define('MOJ_DIRECTORY_PATH_CACHE_PUBLIC', $dir['root'] . 'cache_public/' );

define('DATABASE_HOST', $db['host']);
define('DATABASE_SOCK', $db['sock']);
define('DATABASE_PORT', $db['port']);
define('DATABASE_USER', $db['user']);
define('DATABASE_PASS', $db['passwd']);
define('DATABASE_NAME', $db['db']);

define('MONGODB_HOST', $mongodb['host']);
define('MONGODB_PORT', $mongodb['port']);
define('MONGODB_USER', $mongodb['user']);
define('MONGODB_PASS', $mongodb['passwd']);

define('MEMCACHED_HOST', $mongodb['host']);
define('MEMCACHED_PASS', $mongodb['port']);

define('LUCENE_CLASS', $lucene['class']);
define('LUCENE_PATH', $lucene['path']);

define('MOJ_SPLASH_VIS_DISABLE', 'disable');
define('MOJ_SPLASH_VIS_INDEX', 'index');
define('MOJ_SPLASH_VIS_ALL', 'all');




//check correct hostname
$aUrl = parse_url( $site['url'] );
if ( isset($_SERVER['HTTP_HOST']) and 0 != strcasecmp($_SERVER['HTTP_HOST'], $aUrl['host']) and 0 != strcasecmp($_SERVER['HTTP_HOST'], $aUrl['host'] . ':80') ) {
    header( "Location:http://{$aUrl['host']}{$_SERVER['REQUEST_URI']}" );
    exit;
}


// set error reporting level
if (version_compare(phpversion(), "5.3.0", ">=") == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
else
  error_reporting(E_ALL & ~E_NOTICE);
set_magic_quotes_runtime(0);
ini_set('magic_quotes_sybase', 0);


// set default encoding for multibyte functions
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');



