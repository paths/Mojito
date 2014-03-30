<?php

/**
 * Copyright (c) mojito
 * We Use Lucene
 */

require_once ('Zend/Search/Lucene.php');
//require_once ('CN_Lucene_Analyzer.php');

class MojDoSearch{
    
    var $index_path;
    var $code_type;
    
    function MojDoSearch(){
        
        
    }
    
    function setIdxPath($path){
        $this->index_path = $path;
    }
    
    function setEncoded($type){
        $this->code_type = $type;
    }
    
    function getDocCount(){
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8());
        $index = new Zend_Search_Lucene($this->index_path, !is_dir($this->index_path));
        
        $length = $index->count();
        return $length;
    }

    function search($word){
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8());
        $index = new Zend_Search_Lucene($this->index_path, !is_dir($this->index_path));
        //Zend_Search_Lucene_Analysis_Analyzer::setDefault(new CN_Lucene_Analyzer());
        $query = Zend_Search_Lucene_Search_QueryParser::parse($word, $this->code_type);
        $hits = $index->find($query);
        
        $retArr = array();
        
        $length = count($hits);
        $i = 0;
        //for ($i=0; $i<$length; $i++) {
        foreach ($hits as $hit) {
            $retArr[$i]['title'] = $hit->email;
            $retArr[$i]['desc'] = $hit->email;
            $retArr[$i]['link'] = $hit->email;
            $i++;
        }
        
        return $retArr;
        //return $length;
    }
    
    function insert($field, $word){
        //Zend_Search_Lucene_Analysis_Analyzer::setDefault(new CN_Lucene_Analyzer());
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8());
        if(file_exists($this->index_path.'write.lock.file')){
            $index = new Zend_Search_Lucene($this->index_path, !is_dir($this->index_path));
        }else{
            $index = new Zend_Search_Lucene($this->index_path, is_dir($this->index_path));
        }
        $doc = new Zend_Search_Lucene_Document();
        $doc->addField(Zend_Search_Lucene_Field::Text($field, $word, $this->code_type));
        $index->addDocument($doc);
        $index->commit();
    }
    
    function delete($id){
        $index = new Zend_Search_Lucene($this->index_path, true);
        $index->delete($id);
    }
    
    /*优化*/
    function optimization(){
        $index = new Zend_Search_Lucene($this->index_path, true);
        $index->optimize();
    }
}
