<?php

class Helper
{
    private $status = ['active','deactive','delete'];

    public static function parseStatus($status){
        return $this->status[$status-1];
    }
    //  ------------------------------- string
    public static function shortString($string="",$length=10){
        if(strlen($string) <= $length){
            return $string;
        }
        return substr($string,$length);
    }


    // -------------------------------- array

    public static function find($array,$key,$value){
        $findIndex = $this->findIndex($array,$key,$value);
        if($findIndex>-1){
            return $array[$findIndex];
        }
        return null;
    }

    public static function findIndex($array,$key,$value){
        return array_search($value, array_column($arr, $key));
    }

    public static function sortByField($array,$field){
        usort($array, function(){
            return strcmp($a[$field], $b[$field]);
        });
        return $array;
    }
    //-- validate
    public static function jsonValid($json){
        try {
            $json = json_decode($json);
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }


}
