<?php 
class Translate {
    private $_lang = [];
    private $locale = 'en';
    public function __construct($locale){
      $this->locale = $locale; 
      $this->_lang = []; // sync to file lang
    }
    public function getMessages(){
        return $this->_lang;
    }
    public function requireField(){
        return true;
    }
    public function wrongFormatField(){
        return true;
    }

    // DB
    public function existInDB(){
        return true;
    }
    public function notExistDB(){
        return true;
    }
    
}