<?php

/*
 * Copyright (c) mojito
 * Map
 */

class MojDoMapDb extends MojDoDb{
    
    private $table = "";
    
    function MojDoMap() {
        parent::MojDoDb();
        
        $this->table = "bx_photos_main";
    }
    
    /* 根据地理位置获取图片 */
    function getNearByPhotos($lng, $lat) {
        $query = "SELECT FROM ".$this->table." where Lng = ".$lng.", and Lat = ".$lat.";";
        $res = $this->getOne($query);
        return $res;
    }
    
    
}

