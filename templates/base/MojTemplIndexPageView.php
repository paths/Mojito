<?php

/*
 * Copyright (c) mojito
 * 
 */

moj_import ('MojBaseIndexPageView');

class MojTemplIndexPageView extends MojBaseIndexPageView {

    var $top, $left, $width, $length;
    var $numPerRow;
    
    var $pic_length,$pic_width;
    
    function MojTemplIndexPageView() {
        parent::MojBaseIndexPageView();
        
        $this->top = 0;
        $this->left = 0;
        $this->length = 249;
        $this->width = 385;
        
        $this->pic_length = 264;
        $this->pic_width = 400;
        
        $this->numPerRow = 3;//每行三张
    }
    
    
    /*设置图片在*/
    function setPhotoPos($iNum) {
        $this->top = 0;
        $this->left = 0;
        
        $row = $iNum % $this->numPerRow;
        $column = $iNum - $row*$this->numPerRow;
        
        $this->top = $this->pic_length*$row;
        $this->left = $this->pic_width*$column;
        
        $retArray = array();
        
        $retArray['top'] = $this->top;
        $retArray['left'] = $this->left;
        $retArray['length'] = $this->length;
        $retArray['width'] = $this->width;
        
        return $retArray;
    }
}

