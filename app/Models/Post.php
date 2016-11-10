<?php

namespace App\Models;

use JasonGrimes\Paginator;


class Post extends Model {
    
    protected $fields = ['title','text','img_name','created_at','updated_at'];

    public static $table = 'posts';
    
    public function create($data,$files = ''){
        $this->setAttributes($data);
        if(!empty($files->pic)){
            move_uploaded_file($files->pic['tmp_name'],'upload/img/'.$files->pic['name']);
            $this->newAttributes['img_name'] = $files->pic['name'];
        }
        $this->newAttributes['created_at'] = time();
//        var_dump($this); die();
        $this->save();
    }
    
    public static function all(){
        return parent::all(self::$table, self::class);
    }
    
    public static function find($id){
        return parent::find($id, self::$table, self::class);
    }
    
    public static function paginate($params){
        $pagination = [];
        $total = self::getTotal()[0];
        $offset = 0;
        if($params['page'] > 1){
            $offset = $params['count']*$params['page']-$params['count'];
        }
        $pagination['paginator'] = new Paginator($total, $params['count'], $params['page'], '/posts/page/(:num)');
        $pagination['posts'] = self::getPaginateItems($offset,$params['count'], static::$table,self::class);
        return $pagination;
    }    
    public function getPrevText(){
        return substr($this->text,0,120).' ...';
    }
    
    public function getImgUrl(){
        if($this->img_name != NULL){
            return \Flight::Url('upload/img/'.$this->img_name);
        }
    return \Flight::Url('upload/img/noImage.jpg');    
    }
}
