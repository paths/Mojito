<?php

/**
 * Copyright (c) mojito
 * 
 */

require_once("header.inc.php");

moj_import('MojDoModule');

define('MOJ_LOCALE_TIME', 2);
define('MOJ_LOCALE_DATE_SHORT', 4);
define('MOJ_LOCALE_DATE', 5);

define('MOJ_LOCALE_PHP', 1);
define('MOJ_LOCALE_DB', 2);

define('MOJ_TAGS_NO_ACTION', 0); // default
define('MOJ_TAGS_STRIP', 1);
define('MOJ_TAGS_SPECIAL_CHARS', 8);
define('MOJ_TAGS_VALIDATE', 16);
define('MOJ_TAGS_STRIP_AND_NL2BR', 32);

define('MOJ_SLASHES_AUTO', 0); // default
define('MOJ_SLASHES_ADD', 1);
define('MOJ_SLASHES_STRIP', 2);
define('MOJ_SLASHES_NO_ACTION', 3);

define('MOJ_ESCAPE_STR_AUTO', 0); ///< turn apostropes and quote signs into html special chars, for use in @see bx_js_string and @see bx_html_attribute
define('MOJ_ESCAPE_STR_APOS', 1); ///< escape apostrophes only, for js strings enclosed in apostrophes, for use in @see bx_js_string and @see bx_html_attribute
define('MOJ_ESCAPE_STR_QUOTE', 2); ///< escape quotes only, for js strings enclosed in quotes, for use in @see bx_js_string and @see bx_html_attribute

/**
 * The following two functions are needed to convert title to uri and back.
 * It usefull when titles are used in URLs, like in Categories and Tags.
 */
function title2uri($sValue)
{
    return str_replace(
        array('&', '/', '\\', '"', '+'),
        array('[and]', '[slash]', '[backslash]', '[quote]', '[plus]'),
        $sValue
    );
}
function uri2title($sValue)
{
    return str_replace(
        array('[and]', '[slash]', '[backslash]', '[quote]', '[plus]'),
        array('&', '/', '\\', '"', '+'),
        $sValue
    );
}

/**
 * Convert date(timestamp) in accordance with requested format code.
 *
 * @param string $sTimestamp - timestamp
 * @param integer $iCode - format code
 *                  1(4) - short date format. @see sys_options -> short_date_format_php
 *                  2 - time format. @see sys_options -> time_format_php
 *                  3(5) - long date format. @see sys_options -> date_format_php
 *                  6 - RFC 2822 date format.
 */
function getLocaleDate($sTimestamp = '', $iCode = MOJ_LOCALE_DATE_SHORT)
{
    $sFormat = (int)$iCode == 6 ? 'r' : getLocaleFormat($iCode);

    return date($sFormat, $sTimestamp);
}
/**
 * Get data format in accordance with requested format code and format type.
 *
 * @param integer $iCode - format code
 *                  1(4) - short date format. @see sys_options -> short_date_format_php
 *                  2 - time format. @see sys_options -> time_format_php
 *                  3(5) - long date format. @see sys_options -> date_format_php
 *                  6 - RFC 2822 date format.
 * @param integer $iType - format type
 *                  1 - for PHP code.
 *                  2 - for database.
 */
function getLocaleFormat($iCode = MOJ_LOCALE_DATE_SHORT, $iType = MOJ_LOCALE_PHP)
{
    $sPostfix = (int)$iType == MOJ_LOCALE_PHP ? '_php' : '';

    $sResult = '';
    switch ($iCode) {
        case 2:
            $sResult = getParam('time_format' . $sPostfix);
            break;
        case 1:
        case 4:
            $sResult = getParam('short_date_format' . $sPostfix);
            break;
        case 3:
        case 5:
            $sResult = getParam('date_format' . $sPostfix);
            break;
    }

    return $sResult;
}

/*
 * functions for limiting maximal word length (returned from ash).
 */
function WordWrapStr($sString, $iWidth = 35, $sWrapCharacter = ' ')
{
    if(empty($sString) || mb_strlen($sString, 'UTF-8') <= $iWidth)
        return $sString;

    $sResult = '';
    $aWords = mb_split("[\s\r\n]", $sString);
    foreach($aWords as $sWord) {
        $sWord = trim($sWord);

        if(($iWord = mb_strlen($sWord, 'UTF-8')) <= $iWidth) {
            if($iWord > 0)
                $sResult .= $sWord . $sWrapCharacter;

            continue;
        }

        $iPosition = 0;
        while($iPosition < $iWord) {
            $sResult .= mb_substr($sWord, $iPosition, $iWidth, 'UTF-8') . $sWrapCharacter;
            $iPosition += $iWidth;
        }
    }

    return trim($sResult);
}

/*
 * functions for limiting maximal word length
 */
function strmaxwordlen($input, $len = 100)
{
    return $input;
}

/*
 * functions for limiting maximal text length
 */
function strmaxtextlen($sInput, $iMaxLen = 60)
{
    $sTail = '';
    $s = trim(strip_tags($sInput));
    if (mb_strlen($s) > $iMaxLen) {
        $s = mb_substr($s, 0, $iMaxLen);
        $sTail = '&#8230;';
    }
    return htmlspecialchars_adv($s) . $sTail;
}

function html2txt($content, $tags = "")
{
    while($content != strip_tags($content, $tags)) {
        $content = strip_tags($content, $tags);
    }

    return $content;
}

function html_encode($text)
{
     $searcharray =  array(
    "'([-_\w\d.]+@[-_\w\d.]+)'",
    "'((?:(?!://).{3}|^.{0,2}))(www\.[-\d\w\.\/]+)'",
    "'(http[s]?:\/\/[-_~\w\d\.\/]+)'");

    $replacearray = array(
    "<a href=\"mailto:\\1\">\\1</a>",
    "\\1http://\\2",
    "<a href=\"\\1\" target=_blank>\\1</a>");

   return preg_replace($searcharray, $replacearray, stripslashes($text));
}

/*
 * functions for input data into database
 * @param $text string to pass to database
 * @param $strip_tags tags parameter:
 *          BX_TAGS_STRIP - strip tags
 *          BX_TAGS_SPECIAL_CHARS - translate to special html chars (not good to use this, it is better to do such thing during output to browser)
 *          BX_TAGS_VALIDATE - validate HTML
 *          BX_TAGS_NO_ACTION - do not perform any action with tags
 *  @param $addslashes slashes parameter:
 *          BX_SLASHES_AUTO - automatically detect magic_quotes_gpc setting
 *          BX_SLASHES_STRIP - strip slashes
 *          BX_SLASHES_ADD - add slashes
 *          BX_SLASHES_NO_ACTION - do not perform any action with slashes
 */
function process_db_input( $text, $strip_tags = 0, $addslashes = 0 )
{
    if (is_array($text)) {
        foreach ($text as $k => $v)
            $text[$k] = process_db_input($v, $strip_tags, $addslashes);
        return $text;
    }

    if ((get_magic_quotes_gpc() && $addslashes == MOJ_SLASHES_AUTO) || $addslashes == MOJ_SLASHES_STRIP)
        $text = stripslashes($text);
    elseif ($addslashes == MOJ_SLASHES_ADD)
        $text = addslashes($text);

    switch ($strip_tags) {
    case MOJ_TAGS_STRIP_AND_NL2BR:
        return mysql_real_escape_string(nl2br(strip_tags($text)));
    case MOJ_TAGS_STRIP:
        return mysql_real_escape_string(strip_tags($text));
    case MOJ_TAGS_SPECIAL_CHARS:
        return mysql_real_escape_string(htmlspecialchars($text, ENT_QUOTES, 'UTF-8'));
    case MOJ_TAGS_VALIDATE:
        return mysql_real_escape_string(clear_xss($text));
    case MOJ_TAGS_NO_ACTION:
    default:
        return mysql_real_escape_string($text);
    }
}

/*
 * function for processing pass data
 *
 * This function cleans the GET/POST/COOKIE data if magic_quotes_gpc() is on
 * for data which should be outputed immediately after submit
 */
function process_pass_data( $text, $strip_tags = 0 )
{
    if ( $strip_tags )
        $text = strip_tags($text);

    if ( !get_magic_quotes_gpc() )
        return $text;
    else
        return stripslashes($text);
}

/*
 * function for output data from database into html
 */
function htmlspecialchars_adv( $string )
{
    return htmlspecialchars($string, ENT_COMPAT, 'UTF-8');

    /*
    $patterns = array( "/(?!&#\d{2,};)&/m", "/>/m", "/</m", "/\"/m", "/'/m" );
    $replaces = array( "&amp;", "&gt;", "&lt;", "&quot;", "&#039;" );
    return preg_replace( $patterns, $replaces, $string );
    */
}

function process_text_output( $text, $maxwordlen = 100 )
{
    return ( htmlspecialchars_adv( strmaxwordlen( $text, $maxwordlen ) ) );
}

function process_textarea_output( $text, $maxwordlen = 100 )
{
    return htmlspecialchars_adv( strmaxwordlen( $text, $maxwordlen ) );
}

function process_text_withlinks_output( $text, $maxwordlen = 100 )
{
    return nl2br( html_encode( htmlspecialchars_adv( strmaxwordlen( $text, $maxwordlen ) ) ) );
}

function process_line_output( $text, $maxwordlen = 100 )
{
    return htmlspecialchars_adv( strmaxwordlen( $text, $maxwordlen ) );
}

function process_html_output( $text, $maxwordlen = 100 )
{
    return strmaxwordlen( $text, $maxwordlen );
}

/**
*	Used to construct sturctured arrays in GET or POST data. Supports multidimensional arrays.
*
*	@param array	$Values	Specifies values and values names, that should be submitted. Can be multidimensional.
*
*	@return string	HTML code, which contains <input type="hidden"...> tags with names and values, specified in $Values array.
*/
function ConstructHiddenValues($Values)
{
    /**
    *	Recursive function, processes multidimensional arrays
    *
    *	@param string $Name	Full name of array, including all subarrays' names
    *
    *	@param array $Value	Array of values, can be multidimensional
    *
    *	@return string	Properly consctructed <input type="hidden"...> tags
    */
    function ConstructHiddenSubValues($Name, $Value)
    {
        if (is_array($Value)) {
            $Result = "";
            foreach ($Value as $KeyName => $SubValue) {
                $Result .= ConstructHiddenSubValues("{$Name}[{$KeyName}]", $SubValue);
            }
        } else
            // Exit recurse
            $Result = "<input type=\"hidden\" name=\"".htmlspecialchars($Name)."\" value=\"".htmlspecialchars($Value)."\" />\n";

        return $Result;
    }
    /* End of ConstructHiddenSubValues function */

    $Result = '';
    if (is_array($Values)) {
        foreach ($Values as $KeyName => $Value) {
            $Result .= ConstructHiddenSubValues($KeyName, $Value);
        }
    }

    return $Result;
}

/**
*	Returns HTML/javascript code, which redirects to another URL with passing specified data (through specified method)
*
*	@param string	$ActionURL	destination URL
*
*	@param array	$Params	Parameters to be passed (through GET or POST)
*
*	@param string	$Method	Submit mode. Only two values are valid: 'get' and 'post'
*
*	@return mixed	Correspondent HTML/javascript code or false, if input data is wrong
*/
function RedirectCode($ActionURL, $Params = NULL, $Method = "get", $Title = 'Redirect')
{
    if ((strcasecmp(trim($Method), "get") && strcasecmp(trim($Method), "post")) || (trim($ActionURL) == ""))
        return false;

    ob_start();

?>
<html>
    <head>
        <title><?= $Title ?></title>
    </head>
    <body>
        <form name="RedirectForm" action="<?= htmlspecialchars($ActionURL) ?>" method="<?= $Method ?>">

<?= ConstructHiddenValues($Params) ?>

        </form>
        <script type="text/javascript">
            <!--
            document.forms['RedirectForm'].submit();
            -->
        </script>
    </body>
</html>
<?php

    $Result = ob_get_contents();
    ob_end_clean();

    return $Result;
}

/**
*	Redirects browser to another URL, passing parameters through POST or GET
*	Actually just prints code, returned by RedirectCode (see RedirectCode)
*/
function Redirect($ActionURL, $Params = NULL, $Method = "get", $Title = 'Redirect')
{
    $RedirectCodeValue = RedirectCode($ActionURL, $Params, $Method, $Title);
    if ($RedirectCodeValue !== false)
        echo $RedirectCodeValue;
}

function isRWAccessible($sFileName)
{
    clearstatcache();
    $perms = fileperms($sFileName);
    return ( $perms & 0x0004 && $perms & 0x0002 ) ? true : false;
}

/*
 * Getting Array with Templates Names
*/

function get_templates_array($isAllParams = false)
{
    $aTempls = array();
    $sPath = MOJ_DIRECTORY_PATH_ROOT . 'templates/';
    $sUrl = MOJ_URL_ROOT . 'templates/';

    if (!($handle = opendir($sPath)))
        return array ();

    while (false !== ($sFileName = readdir($handle))) {

        if (!is_dir($sPath . $sFileName) || 0 != strncmp($sFileName, 'tmpl_', 5))
            continue;

        $sTemplName = substr($sFileName, 5);
        $sTemplVer = _t('_undefined');
        $sTemplVendor = _t('_undefined');
        $sTemplDesc = '';
        $sTemplPreview = 'preview.jpg';
        $sPreviewImg = false;

        if (file_exists($sPath . $sFileName . '/scripts/MojTemplName.php'))
            @include($sPath . $sFileName . '/scripts/MojTemplName.php');
        if ($isAllParams && $sTemplPreview && file_exists($sPath . $sFileName . '/images/' . $sTemplPreview))
            $sPreviewImg = $sUrl . $sFileName . '/images/' . $sTemplPreview;

        $aTempls[substr($sFileName, 5)] = $isAllParams ? array ('name' => $sTemplName, 'ver' => $sTemplVer, 'vendor' => $sTemplVendor, 'desc' => $sTemplDesc, 'preview' => $sPreviewImg) : $sTemplName;
    }

    closedir($handle);

    return $aTempls;
}

/*
 * The Function Show a Line with Templates Names
 */

function templates_select_txt()
{
    $templ_choices = get_templates_array();
    $current_template = ( strlen( $_GET['skin'] ) ) ? $_GET['skin'] : $_COOKIE['skin'];

    foreach ($templ_choices as $tmpl_key => $tmpl_value) {
        if ($current_template == $tmpl_key) {
            $ReturnResult .= $tmpl_value . ' | ';
        } else {
            $sGetTransfer = moj_encode_url_params($_GET, array('skin'));
            $ReturnResult .= '<a href="' . moj_html_attribute($_SERVER['PHP_SELF']) . '?' . $sGetTransfer . 'skin=' . $tmpl_key . '">' . $tmpl_value . '</a> | ';
        }
    }
    return $ReturnResult;
}

function extFileExists( $sFileSrc )
{
    return (file_exists( $sFileSrc ) && is_file( $sFileSrc )) ? true : false;
}

function getVisitorIP($isProxyCheck = true)
{
    if (!$isProxyCheck)
        return $_SERVER['REMOTE_ADDR'];

    $ip = "0.0.0.0";
    if( ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) && ( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) ) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif( ( isset( $_SERVER['HTTP_CLIENT_IP'])) && (!empty($_SERVER['HTTP_CLIENT_IP'] ) ) ) {
        $ip = explode(".",$_SERVER['HTTP_CLIENT_IP']);
        $ip = $ip[3].".".$ip[2].".".$ip[1].".".$ip[0];
    } elseif((!isset( $_SERVER['HTTP_X_FORWARDED_FOR'])) || (empty($_SERVER['HTTP_X_FORWARDED_FOR']))) {
        if ((!isset( $_SERVER['HTTP_CLIENT_IP'])) && (empty($_SERVER['HTTP_CLIENT_IP']))) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    }

    if (!preg_match("/^\d+\.\d+\.\d+\.\d+$/", $ip))
        $ip = $_SERVER['REMOTE_ADDR'];

    return $ip;
}

function genFlag( $country )
{
    return '<img src="' . genFlagUrl($country) . '" />';
}

function genFlagUrl($country)
{
    return $GLOBALS['site']['flags'] . strtolower($country) . '.gif';
}

// print debug information ( e.g. arrays )
function echoDbg( $what, $desc = '' )
{
    if ( $desc )
        echo "<b>$desc:</b> ";
    echo "<pre>";
        print_r( $what );
    echo "</pre>\n";
}

function echoDbgLog($mWhat, $sDesc = '', $sFileName = 'debug.log')
{
    global $dir;

    $sCont =
        '--- ' . date('r') . ' (' . MOJ_START_TIME . ") ---\n" .
        $sDesc . "\n" .
        print_r($mWhat, true) . "\n\n\n";

    $rFile = fopen($dir['tmp'] . $sFileName, 'a');
    fwrite($rFile, $sCont);
    fclose($rFile);
}


function _format_when ($iSec)
{
    $s = '';

    if ($iSec >= 0) {
        if ($iSec < 3600) {
            $i = round($iSec/60);
            $s .= (0 == $i || 1 == $i) ? _t('_x_minute_ago') : _t('_x_minutes_ago', $i);
        } else if ($iSec < 86400) {
            $i = round($iSec/60/60);
            $s .= (0 == $i || 1 == $i) ? _t('_x_hour_ago') : _t('_x_hours_ago', $i);
        } else {
            $i = round($iSec/60/60/24);
            $s .= (0 == $i || 1 == $i) ? _t('_yesterday') : _t('_x_days_ago', $i);
        }
    } else {
        if ($iSec > -3600) {
            $i = round($iSec/60);
            $s .= (0 == $i || 1 == $i) ? _t('_in_x_minute') : _t('_in_x_minutes', -$i);
        } else if ($iSec > -86400) {
            $i = round($iSec/60/60);
            $s .= (0 == $i || 1 == $i) ? _t('_in_x_hour') : _t('_in_x_hours', -$i);
        } elseif ($iSec < -86400) {
            $i = round($iSec/60/60/24);
            $s .= (0 == $i || 1 == $i) ? _t('_tomorrow') : _t('_in_x_days', -$i);
        }
    }
    return $s;
}

function _format_time($iSec, $aParams = array())
{
    $sDivider = isset($aParams['divider']) ? $aParams['divider'] : ':';

    $iSec = (int)$iSec;
    $sFormat = $iSec > 3600 ? 'H' . $sDivider . 'i' . $sDivider . 's' : 'i' . $sDivider . 's';

    return gmdate($sFormat, $iSec);
}

function defineTimeInterval($iTime)
{
    $iTime = time() - (int)$iTime;
    $sCode = _format_when($iTime);
    return $sCode;
}

function execSqlFile($sFileName)
{
    if (! $f = fopen($sFileName, "r"))
        return false;

    db_res( "SET NAMES 'utf8'" );

    $s_sql = "";
    while ( $s = fgets ( $f, 10240) ) {
        $s = trim( $s ); //Utf with BOM only

        if( !strlen( $s ) ) continue;
        if ( mb_substr( $s, 0, 1 ) == '#'  ) continue; //pass comments
        if ( mb_substr( $s, 0, 2 ) == '--' ) continue;

        $s_sql .= $s;

        if ( mb_substr( $s, -1 ) != ';' ) continue;

        db_res( $s_sql );
        $s_sql = "";
    }

    fclose($f);
    return true;
}

function replace_full_uris( $text )
{
    $text = preg_replace_callback( '/([\s\n\r]src\=")([^"]+)(")/', 'replace_full_uri', $text );
    return $text;
}

function replace_full_uri( $matches )
{
    if( substr( $matches[2], 0, 7 ) != 'http://' and substr( $matches[2], 0, 8 ) != 'https://' and substr( $matches[2], 0, 6 ) != 'ftp://' )
        $matches[2] = MOJ_URL_ROOT . $matches[2];

    return $matches[1] . $matches[2] . $matches[3];
}

//--------------------------------------- friendly permalinks --------------------------------------//
//------------------------------------------- main functions ---------------------------------------//
function uriGenerate ($s, $sTable, $sField, $iMaxLen = 255)
{
  $s = uriFilter($s);

  if (uriCheckUniq($s, $sTable, $sField)) return $s;

  // try to add date

  if (get_mb_len($s) > 240)
     $s = get_mb_substr ($s, 0, 240);

  $s .= '-' . date('Y-m-d');

  if (uriCheckUniq($s, $sTable, $sField)) return $s;

  // try to add number

    for ($i = 0 ; $i < 999 ; ++$i) {
        if (uriCheckUniq($s . '-' . $i, $sTable, $sField)) {
       return ($s . '-' . $i);
    }
  }
   return rand(0, 999999999);
}

function uriFilter ($s)
{
    if ($GLOBALS['oTemplConfig']->bAllowUnicodeInPreg)
        $s = get_mb_replace ('/[^\pL^\pN]+/u', '-', $s); // unicode characters
    else
        $s = get_mb_replace ('/([^\d^\w]+)/u', '-', $s); // latin characters only

    $s = get_mb_replace ('/([-^]+)/', '-', $s);
    $s = get_mb_replace ('/([-]+)$/', '', $s); // remove trailing dash
    if (!$s) $s = '-';
    return $s;
}

function uriCheckUniq ($s, $sTable, $sField)
{
    return !db_arr("SELECT 1 FROM $sTable WHERE $sField = '$s' LIMIT 1");
}

function get_mb_replace ($sPattern, $sReplace, $s)
{
    return preg_replace ($sPattern, $sReplace, $s);
}

function get_mb_len ($s)
{
    return (function_exists('mb_strlen')) ? mb_strlen($s) : strlen($s);
}

function get_mb_substr ($s, $iStart, $iLen)
{
    return (function_exists('mb_substr')) ? mb_substr ($s, $iStart, $iLen) : substr ($s, $iStart, $iLen);
}

/**
 * Block user IP
 *
 * @param $sIP mixed
 * @param $iExpirationInSec integer
 * @param $sComment string
 * @return void
 */



/**
 *  spam checking function
 *  @param $s content to check for spam
 *  @param $isStripSlashes slashes parameter:
 *          BX_SLASHES_AUTO - automatically detect magic_quotes_gpc setting
 *          BX_SLASHES_NO_ACTION - do not perform any action with slashes
 *  @return true if spam detected
 */


function getmicrotime()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function genSiteStatFile($aVal)
{
    $oMenu = new Menu();

    $sLink = $oMenu -> getCurrLink($aVal['link']);
    $sAdmLink = $oMenu -> getCurrLink($aVal['adm_link']);
    $sLine = "'{$aVal['name']}'=>array('capt'=>'{$aVal['capt']}', 'query'=>'".addslashes($aVal['query'])."', 'link'=>'$sLink', 'icon'=>'{$aVal['icon']}', 'adm_query'=>'".addslashes($aVal['adm_query'])."', 'adm_link'=>'$sAdmLink', ),\n";

    return $sLine;
}

/**
 * Function will cute the parameter from received string;
 * remove received parameter from 'GET' query ;
 *
 * @param        : $aExceptNames (string) - name of unnecessary parameter;
 * @return       : cleared string;
 */
function getClearedParam( $sExceptParam, $sString )
{
    return preg_replace( "/(&amp;|&){$sExceptParam}=([a-z0-9\_\-]{1,})/i",'', $sString);
}

/**
 * import class file, it detect class path by its prefix or module array
 *
 * @param $sClassName - full class name or class postfix in a case of module class
 * @param $aModule - module array or true to get module array from global variable
 */
function moj_import($sClassName, $aModule = array())
{
    if (class_exists($sClassName))
        return;

    if ($aModule) {
        $a = (true === $aModule) ? $GLOBALS['aModule'] : $aModule;
        if (class_exists($a['class_prefix'] . $sClassName))
            return;
        require_once (MOJ_DIRECTORY_PATH_MODULES . $a['path'] . 'classes/' . $a['class_prefix'] . $sClassName . '.php');
    }

    if (0 == strncmp($sClassName, 'MojDo', 5)) {
        require_once(MOJ_DIRECTORY_PATH_CLASSES . $sClassName . '.php');
        return;
    }
    if (0 == strncmp($sClassName, 'MojBase', 7)) {
        require_once(MOJ_DIRECTORY_PATH_BASE . $sClassName . '.php');
        return;
    }
    if (0 == strncmp($sClassName, 'MojTempl', 8) && !class_exists($sClassName)) {
        require_once(MOJ_DIRECTORY_PATH_BASE . $sClassName . '.php');
        return;
    }
}

/**
 * Gets an instance of class pathing necessary parameters if it's necessary.
 *
 * @param string $sClassName class name.
 * @param array $aParams an array of parameters to be pathed to the constructor of the class.
 * @param array $aModule an array with module description. Is used when the requested class is located in some module.
 * @return unknown
 */
function moj_instance($sClassName, $aParams = array(), $aModule = array())
{
    if(isset($GLOBALS['mojDoClasses'][$sClassName]))
        return $GLOBALS['mojDoClasses'][$sClassName];
    else {
        moj_import((empty($aModule) ? $sClassName : str_replace($aModule['class_prefix'], '', $sClassName)), $aModule);

        if(empty($aParams))
            $GLOBALS['mojDoClasses'][$sClassName] = new $sClassName();
        else {
            $sParams = "";
            foreach($aParams as $mixedKey => $mixedValue)
                $sParams .= "\$aParams[" . $mixedKey . "], ";
            $sParams = substr($sParams, 0, -2);

            $GLOBALS['mojDoClasses'][$sClassName] = eval("return new " . $sClassName . "(" . $sParams . ");");
        }

        return $GLOBALS['mojDoClasses'][$sClassName];
    }
}

/**
 * Escapes string/array ready to pass to js script with filtered symbols like ', " etc
 *
 * @param $mixedInput - string/array which should be filtered
 * @param $iQuoteType - string escaping method: BX_ESCAPE_STR_AUTO(default), BX_ESCAPE_STR_APOS or BX_ESCAPE_STR_QUOTE
 * @return converted string / array
 */
function moj_js_string ($mixedInput, $iQuoteType = MOJ_ESCAPE_STR_AUTO)
{
    $aUnits = array(
        "\n" => "\\n",
        "\r" => "",
    );
    if (MOJ_ESCAPE_STR_APOS == $iQuoteType) {
        $aUnits["'"] = "\\'";
        $aUnits['<script'] = "<scr' + 'ipt";
        $aUnits['</script>'] = "</scr' + 'ipt>";
    } elseif (MOJ_ESCAPE_STR_QUOTE == $iQuoteType) {
        $aUnits['"'] = '\\"';
        $aUnits['<script'] = '<scr" + "ipt';
        $aUnits['</script>'] = '</scr" + "ipt>';
    } else {
        $aUnits['"'] = '&quote;';
        $aUnits["'"] = '&apos;';
        $aUnits["<"] = '&lt;';
        $aUnits[">"] = '&gt;';
    }
    return str_replace(array_keys($aUnits), array_values($aUnits), $mixedInput);
}

/**
 * Return input string/array ready to pass to html attribute with filtered symbols like ', " etc
 *
 * @param mixed $mixedInput - string/array which should be filtered
 * @return converted string / array
 */
function moj_html_attribute ($mixedInput)
{
    $aUnits = array(
        "\"" => "&quot;",
        "'" => "&apos;",
    );
    return str_replace(array_keys($aUnits), array_values($aUnits), $mixedInput);
}

/**
 * Escapes string/array ready to pass to php script with filtered symbols like ', " etc
 *
 * @param mixed $mixedInput - string/array which should be filtered
 * @return converted string / array
 */
function moj_php_string_apos ($mixedInput)
{
    return str_replace("'", "\\'", $mixedInput);
}
function moj_php_string_quot ($mixedInput)
{
    return str_replace('"', '\\"', $mixedInput);
}

/**
 * Gets file contents by URL.
 *
 * @param string $sFileUrl - file URL to be read.
 * @param array $aParams - an array of parameters to be pathed with URL.
 * @return string the file's contents.
 */
function moj_file_get_contents($sFileUrl, $aParams = array())
{
	$sFileUrl = moj_append_url_params($sFileUrl, $aParams);

    $sResult = '';
    if(function_exists('curl_init')) {
        $rConnect = curl_init();

        curl_setopt($rConnect, CURLOPT_TIMEOUT, 10);
        curl_setopt($rConnect, CURLOPT_URL, $sFileUrl);
        curl_setopt($rConnect, CURLOPT_HEADER, 0);
        curl_setopt($rConnect, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($rConnect, CURLOPT_FOLLOWLOCATION, 1);

        $sAllCookies = '';
        foreach($_COOKIE as $sKey=>$sValue){
            $sAllCookies .= $sKey."=".$sValue.";";
        }
        curl_setopt($rConnect, CURLOPT_COOKIE, $sAllCookies);

        $sResult = curl_exec($rConnect);
        curl_close($rConnect);
    } else
        $sResult = @file_get_contents($sFileUrl);

    return $sResult;
}

/**
 * perform write log into 'tmp/log.txt' (for any debug development)
 *
 * @param $sNewLineText - New line debug text
  */
function writeLog($sNewLineText = 'test')
{
    $sFileName = MOJ_DIRECTORY_PATH_ROOT . 'tmp/log.txt';

    if (is_writable($sFileName)) {
        if (! $vHandle = fopen($sFileName, 'a')) {
             echo "Unable to open ({$sFileName})";
        }
        if (fwrite($vHandle, $sNewLineText . "\r\n") === FALSE) {
            echo "Unable write to ({$sFileName})";
        }
        fclose($vHandle);

    } else {
        echo "{$sFileName} is not writeable";
    }
}

function getLink($sString, $sUrl)
{
    return '<a href="' . $sUrl . '">' . $sString . '</a> ';
}

function getLinkSet($sLinkString, $sUrlPrefix, $sDivider = ';,', $bUriConvert = false)
{
    $aSet = preg_split( '/['.$sDivider.']/', $sLinkString, 0, PREG_SPLIT_NO_EMPTY);
    $sFinalSet = '';

    foreach ($aSet as $sKey) {
        $sLink =  $sUrlPrefix . urlencode($bUriConvert ? title2uri($sKey) : $sKey);
        $sFinalSet .= '<a href="' . $sUrlPrefix . urlencode(title2uri(trim($sKey))) . '">' . $sKey . '</a> ';
    }

    return trim($sFinalSet, ' ');
}

function getRelatedWords (&$aInfo)
{
    $sString = implode(' ', $aInfo);
    $aRes = array_unique(explode(' ', $sString));
    $sString = implode(' ', $aRes);
    return addslashes($sString);
}

function getSiteInfo($sSourceUrl)
{
    $aResult = array();
    $sContent = moj_file_get_contents($sSourceUrl);

    if (strlen($sContent)) {
        preg_match("/<title>(.*)<\/title>/", $sContent, $aMatch);
        $aResult['title'] = $aMatch[1];

        preg_match("/<meta.*name[='\" ]+description['\"].*content[='\" ]+(.*)['\"].*><\/meta>/", $sContent, $aMatch);
        $aResult['description'] = $aMatch[1];
    }

    return $aResult;
}

// simple comparator for strings etc
function simple_cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

// calculation ini_get('upload_max_filesize') in bytes as example
function return_bytes($val)
{
    $val = trim($val);
    $last = strtolower($val{strlen($val)-1});
    $val = (int)$val;
    switch($last) {
        // The 'G' modifier is available since PHP 5.1.0
        case 'k':
            $val *= 1024;
            break;
        case 'm':
            $val *= 1024 * 1024;
            break;
        case 'g':
            $val *= 1024 * 1024 * 1024;
            break;
    }
    return $val;
}

// Generate Random Password
function genRndPwd($iLength = 8, $bSpecialCharacters = true)
{
    $sPassword = '';
    $sChars = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789";

    if($bSpecialCharacters === true)
        $sChars .= "!?=/&+,.";

    srand((double)microtime()*1000000);
    for($i = 0; $i < $iLength; $i++) {
        $x = mt_rand(0, strlen($sChars) -1);
        $sPassword .= $sChars{$x};
    }

    return $sPassword;
}

// Generate Random Salt for Password encryption
function genRndSalt()
{
    return genRndPwd(8, true);
}

// Encrypt User Password
function encryptUserPwd($sPwd, $sSalt)
{
    return sha1(md5($sPwd) . $sSalt);
}

// Advanced stripslashes. Strips strings and arrays
function stripslashes_adv($s)
{
    if (is_string($s))
        return stripslashes($s);
    elseif (is_array($s)) {
        foreach ($s as $k => $v) {
            $s[$k] = stripslashes($v);
        }
        return $s;
    } else
        return $s;
}

function moj_get ($sName)
{
    if (isset($_GET[$sName]))
        return $_GET[$sName];
    elseif (isset($_POST[$sName]))
        return $_POST[$sName];
    else
        return false;
}

function moj_encode_url_params ($a, $aExcludeKeys = array (), $aOnlyKeys = false)
{
    $s = '';
    foreach ($a as $sKey => $sVal) {
        if (in_array($sKey, $aExcludeKeys))
            continue;
        if (false !== $aOnlyKeys && !in_array($sKey, $aOnlyKeys))
            continue;
        if (is_array($sVal)) {
            foreach ($sVal as $sSubVal) {
                $s .= rawurlencode($sKey) . '[]=' . rawurlencode(is_array($sSubVal) ? 'array' : $sSubVal) . '&';
            }
        } else {
            $s .= rawurlencode($sKey) . '=' . rawurlencode($sVal) . '&';
        }
    }
    return $s;
}

function moj_append_url_params ($sUrl, $mixedParams)
{
    $sParams = false == strpos($sUrl, '?') ? '?' : '&';

    if (is_array($mixedParams)) {
        foreach($mixedParams as $sKey => $sValue)
            $sParams .= $sKey . '=' . $sValue . '&';
        $sParams = substr($sParams, 0, -1);
    } else {
        $sParams .= $mixedParams;
    }
    return $sUrl . $sParams;
}

function moj_rrmdir($directory)
{
    if (substr($directory,-1) == "/")
        $directory = substr($directory,0,-1);

    if (!file_exists($directory) || !is_dir($directory))
        return false;
    elseif (!is_readable($directory))
        return false;

    if (!($directoryHandle = opendir($directory)))
        return false;

    while ($contents = readdir($directoryHandle)) {
        if ($contents != '.' && $contents != '..') {
            $path = $directory . "/" . $contents;

            if (is_dir($path))
                moj_rrmdir($path);
            else
                unlink($path);
        }
    }

    closedir($directoryHandle);

    if (!rmdir($directory))
        return false;

    return true;
}

function moj_clear_folder ($sPath, $aExts = array ())
{
    if (substr($$sPath,-1) == "/")
        $sPath = substr($sPath,0,-1);

    if (!file_exists($sPath) || !is_dir($sPath))
        return false;
    elseif (!is_readable($sPath))
        return false;

    if (!($h = opendir($sPath)))
        return false;

    while ($sFile = readdir($h)) {
        if ('.' == $sFile || '..' == $sFile)
            continue;

        $sFullPath = $sPath . '/' . $sFile;

        if (is_dir($sFullPath))
            continue;

        if (!$aExts || (($sExt = pathinfo($sFullPath, PATHINFO_EXTENSION)) && in_array($sExt, $aExts)))
            @unlink($sFullPath);
    }

    closedir($h);

    return true;
}

function moj_ltrim_str ($sString, $sPrefix, $sReplace = '') {
    if ($sReplace && substr($sString, 0, strlen($sReplace)) == $sReplace)
        return $sString;
    if (substr($sString, 0, strlen($sPrefix)) == $sPrefix)
        return $sReplace . substr($sString, strlen($sPrefix));
    return $sString;
} 


