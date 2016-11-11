<?php

namespace App\Controllers;

use Flight;
use App\Models\Post;

class Controller {
       
    public function index(){
        $viewData = [
            'title' => 'My task > Home'
        ];
        Flight::render('index',$viewData);
    }
    
    public function Posts(){
        $viewData = [
            'title' => 'All posts',
            'posts' => Post::all(),
        ];        
        Flight::render('posts/posts',$viewData);        
    }
    
    public function tableCreate(){
        //Создание таблицы прям в контроллере, хотя подключений к базе тут не должно быть =) (MVC)
        $db = Flight::db();
        $query = "CREATE TABLE IF NOT EXISTS
                    `posts` (
                        `id` INT(11) NOT NULL AUTO_INCREMENT,
                        `title` VARCHAR(30) NOT NULL,
                        `text` VARCHAR(500) NOT NULL,
                        `img_name` VARCHAR(30),
                        `created_at` INT(11),
                        `updated_at` INT(11),

                        PRIMARY KEY(`id`)
                    )
                ";
        $STH = $db->prepare($query);
        $STH->execute();
        Flight::redirect('/');
    }
}

