<?php

/**
 * Copyright (c) mojito
 * We Use Lucene
 */
require_once ('Zend/Search/lucene.php');
require_once ('CN_Lucene_Analyzer.php');

require_once(MOJ_DIRECTORY_PATH_CLASSES . 'MojDoJavaBridge.php');

class MojDoSearch{
    
    var $index_path;
    var $code_type;
    
    function MojDoSearch(){
        parent::MojDoJavaBridge();
        
    }
    
    function setIdxPath($path){
        $this->index_path = $path;
    }
    
    function setEncoded($type){
        $this->code_type = $type;
    }

    function search($word){
        $index = new Zend_Search_Lucene($this->index_path);
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new CN_Lucene_Analyzer());
        $query = Zend_Search_Lucene_Search_QueryParser::parse($word, "UTF-8");
        $hits = $index->find($query);
        
        $retArr = array();
        
        $length = count($hits);
        for ($i=0; i<$length; $i++) {
            $retArr[i]['title'] = $hits[i]->title;
            $retArr[i]['desc'] = $hits[i]->desc;
            $retArr[i]['link'] = $hits[i]->link;
        }
        
        return $retArr;
    }
    
    function insert($field, $word){
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new CN_Lucene_Analyzer());
        $index = new Zend_Search_Lucene($this->index_path, true);
        $doc = new Zend_Search_Lucene_Document();
        $doc->addField(Zend_Search_Lucene_Field::Text($field, $word, 'UTF-8'));
        $index->addDocument($doc);
        $index->commit();
    }
    
    function delete($id){
        $index = new Zend_Search_Lucene($this->index_path, true);
        $index->delete($id);
    }
    
    /*优化*/
    function optimization(){
        
    }
}
