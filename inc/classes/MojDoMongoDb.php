<?php

/**
 * Copyright (c) mojito
 * mongodb
 */
define('DO_TABLE_PHOTOS', 'Photos');

require_once(MOJ_DIRECTORY_PATH_CLASSES . 'MojDoMistake.php');
require_once(MOJ_DIRECTORY_PATH_CLASSES . 'MojDoParams.php');

class MojDoMongoDb extends MojDoMistake {
    
    var $error_checking = true;
    var $error_message;
    var $host, $port, $dbname, $user, $password, $link;
    var $db, $grid;
    var $current_res, $current_arr_type;

    var $oParams = null;
    var $oDbCacheObject = null;
    
    function MojDoMongoDb(){
        parent::DoMistake();
        
        $this->host = MONGODB_HOST;
        $this->port = MONGODB_PORT;
        $this->dbname = DO_TABLE_PHOTOS;
        $this->user = MONGODB_USER;
        $this->password = MONGODB_PASS;
    }
    
    function connect(){
        $this->link = new Mongo();
    }
    
    function select_db(){
        $this->db = $this->link->photos; //选择数据库 
        $this->grid = $this->db->getGridFS(); //取得gridfs对象
    }

    function close(){
        $this->link->close();
    }

    function save($filename){
        $id = $this->grid->storeFile($filename);
        return $id;
    }
    
    function delete($id) {
        $this->grid->delete($id);
    }
    
    function read($id) {
        $logo = $this->grid->findOne(array('_id'=>$id)); //以_id为索引取得文件,也可直接文件名 
        header('Content-type: image/png'); //输出图片头 
        echo $logo ->getBytes(); //输出数据流
    }
    
}

