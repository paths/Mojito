<?php

require_once 'classes/MojWaterfallModule.php';

if(!empty($_POST("begin")) && !empty($_POST("end"))){
    
    $oMod = new MojWaterfallModule();
    
    $b_idx = $_POST("begin");
    $e_idx = $_POST("end");
    
    $retArr = array();
    $retArr = $oMod->getNewPhotoView($b_idx, $e_idx);
    
    $retXML = "〈?xml version=\"1.0\" encoding=\"gb2312\" ?〉<path>";
    
    foreach ($retArr as $key => $value) {
        $retXML .= "<img>";
        $retXML .= $value;
        $retXML .= "</img>";
    }
    
    $retXML .= "</path>";
    
    echo $retXML;
}