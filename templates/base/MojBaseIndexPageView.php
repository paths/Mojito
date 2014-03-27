<?php

/**
 * Copyright (c) mojito
 * extends base class
 */
require_once ( MOJ_DIRECTORY_PATH_INC.'header.inc.php' );

moj_import('MojDoPageView');
moj_import('MojDoMap');


class MojBaseIndexPageView extends MojDoPageView{
    
    protected $ProTpl;
    
    protected $ProArrPageView;
    
    function MojBaseIndexPageView() {
        parent::MojDoPageView();
        
        $ProArrPageView = array();
    }
    
    function addParam($arrParam)
    {
        if(!is_array($arrParam))
        {
            return;
        }
        foreach ($arrParam as $ikey => $aValue){
            //$smarty->assign($ikey, $aValue);
            $this->ProArrPageView[$ikey] = $aValue;
        }
    }
    
    function setTpl($aTpl)
    {
        $this->ProTpl = $aTpl;
    }


    function getTpl()
    {
        return $this->ProTpl;
    }

    function show($oPluginTpl){
        if(is_array($this->ProArrPageView))
        {
            foreach($this->ProArrPageView as $ikey => $aValue){
                $oPluginTpl->assign($ikey, $aValue);
            }
        }
        
        $oPluginTpl->display($this->getTpl());
    }
    
    function genMainView() {
        
    }
}