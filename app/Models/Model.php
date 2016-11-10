<?php

namespace App\Models;

use Flight;

class Model {
    
    public $newAttributes = [];
        
    protected function setAttributes($data){
        foreach($data as $key => $value){
            if(in_array($key,$this->fields)){
                $this->newAttributes[$key] = $value;
            }
        }
    }
    
    protected function save(){
        $db = $this->connectDB();
        $query = $this->getCreateQuery();
        $STH = $db->prepare($query);  
        $STH->execute($this->newAttributes);
    }
    
    public static function all($table,$class){
        $db = self::connectDB();
        $query = 'SELECT * FROM `'.$table.'`';
        $STH = $db->prepare($query);
        $STH->execute();
        return $STH->fetchAll($db::FETCH_CLASS, $class);
    }
    
    public static function find($id,$table,$class){
        $db = self::connectDB();
        $query = 'SELECT * FROM `'.$table.'` WHERE `id`='.$id;
        $STH = $db->prepare($query);
        $STH->execute();
        return $STH->fetchObject($class);
    }    

    private function getCreateQuery(){
        $a = [];
        foreach ($this->fields as $value){
            $a[] = ':'.$value;
        }
        return 'INSERT INTO `'.static::$table.'` ('.implode(',', $this->fields).') VALUES ('.implode(',', $a).')';
    }
    
    public static function getTotal(){
        $db = self::connectDB();
        $query = 'SELECT count(*) FROM `'. static::$table.'`';
        $STH = $db->prepare($query);
        $STH->execute();
        return $STH->fetch();
    }
    
    public function getPaginateItems($offset,$rows,$table,$class){
        $db = self::connectDB();
        $query = 'SELECT * FROM `'.$table.'` LIMIT '.$offset.','.$rows;
        $STH = $db->prepare($query);
        $STH->execute();
        return $STH->fetchAll($db::FETCH_CLASS, $class);        
    }


    protected static function connectDB(){
        $db = Flight::db();
        $STH = $db->prepare("SET NAMES 'utf8'");  
        $STH->execute();
        return $db;
    }
}
