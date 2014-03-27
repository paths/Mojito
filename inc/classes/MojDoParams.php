<?php
/**
 * Copyright (c) BoonEx Pty Limited - http://www.boonex.com/
 * CC-BY License - http://creativecommons.org/licenses/by/3.0/
 */

require_once(MOJ_DIRECTORY_PATH_CLASSES . 'MojDoMistake.php');
require_once(MOJ_DIRECTORY_PATH_CLASSES . 'MojDoCacheFile.php');

class MojDoParams extends MojDoMistake
{
    var $_oDb;
    var $_oCache;
    var $_sCacheFile;
    var $_aParams;

    /**
     * constructor
     */
    function MojDoParams($oDb)
    {
        parent::MojDoMistake();
    }

    function isInCache($sKey)
    {
        return isset($this->_aParams[$sKey]);
    }

    function get($sKey, $bFromCache = true)
    {
        if (!$sKey)
            return false;
        if ($bFromCache && $this->isInCache($sKey))
           return $this->_aParams[$sKey];
        else
           //return $this->_oDb->getOne("SELECT `VALUE` FROM `sys_options` WHERE `Name`='" . $sKey . "' LIMIT 1");
            return false;
    }

    function set($sKey, $mixedValue)
    {
        //--- Update Database ---//
        //$this->_oDb->query("UPDATE `sys_options` SET `VALUE`='" . $mixedValue . "' WHERE `Name`='" . $sKey . "' LIMIT 1");

        //--- Update Cache ---//
        $this->cache();
    }

    function cache()
    {
        //$this->_aParams = $this->_oDb->getPairs("SELECT `Name`, `VALUE` FROM `sys_options`", "Name", "VALUE");
        if (empty($this->_aParams)) {
            $this->_aParams = array ();
            return false;
        }

        return $this->_oCache->setData($this->_sCacheFile, $this->_aParams);
    }

    function clearCache()
    {
        $this->_oCache->delData($this->_sCacheFile);
    }
}
