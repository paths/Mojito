<?php
/**
 * Copyright (c) mojito
 * 
 */
require_once(MOJ_DIRECTORY_PATH_CLASSES . 'MojDoMistake.php');
require_once(MOJ_DIRECTORY_PATH_CLASSES . 'MojDoParams.php');

class MojDoMemcached extends MojDoMistake{
    
    var $host, $port;
    var $oMemcached;
    function MojDoMemcached()
    {
        parent::DoMistake();
        
        $this->oMemcached = new Memcache;
        $this->host = MEMCACHED_HOST;
        $this->port = MEMCACHED_PASS;
    }
    
    function connect()
    {
        $this->oMemcached->connect($this->host, $this->port);
    }
    
    function set($iKey, $iValue, $time=3600)
    {
        $this->oMemcached->set($iKey, $iValue, 0, $time);
    }

    function get($iKey)
    {
        $oValue = $this->oMemcached->get($iKey);
        return $oValue;
    }
    
    function flush()
    {
        $this->oMemcached->flush();
    }

    function close()
    {
        $this->oMemcached->close();
    }
}


