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
        } else {
            $this->newAttributes['img_name'] = NULL;
        }
        $this->newAttributes['created_at'] = time();
        $this->newAttributes['updated_at'] = time();
//        var_dump($this); die();
        $this->save();
    }
    
    public static function all(){
        return parent::all(self::$table, self::class);
    }
    
    public static function find($id){
        return parent::find($id, self::$table, self::class);
    }
    
    public function delete(){
        parent::delete($this->id, static::$table);
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
    return \Flight::Url('upload/img/no.jpg');    
    }
    
    public static function generate(){
        //тут генератор 10 постов
        for ($i = 0; $i < 10; $i++) {
            $post = new Post();
            $post->newAttributes['title'] = 'Gerate'.rand(0, 1000);
            $post->newAttributes['text'] = 'Gerate generate generate generate generate generate generate '
                    . 'generate generate generate generate generate generate generate generate generate '
                    . 'generate generate generate generate generate generate generate generate generate generate generate generate '
                    . 'generate generate generate generate generate generate generate generate generate ';
            $post->newAttributes['img_name'] = NULL;
            $post->newAttributes['created_at'] = time();
            $post->newAttributes['updated_at'] = time();
//            var_dump($post); die();
            $post->save();
        }
    }
}
