<?php

/*
 * Copyright (c) mojito
 * 
 */

moj_import ('MojBaseIndexPageView');

class MojTemplIndexPageView extends MojBaseIndexPageView {

    var $pic_length, $pic_width;
    function MojTemplIndexPageView() {
        parent::MojBaseIndexPageView();
        
        $this->pic_length = 264;
        $this->pic_width = 385;
    }
    
    
    /*设置图片在*/
    function setPhotoPos($iNum) {
        
    }
}

