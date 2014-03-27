<?php
/**
 * Copyright (c) mojito
 * 
 */

class MojDoJavaBridge extends MojDoMistake{
    
    protected $oJavaObj;
    
    function MojDoJavaBridge(){
        parent::DoMistake();
        
    }
    
    function setObject($javaPath){
        
        $oJavaObj = new Java($javaPath);
        
    }
}


