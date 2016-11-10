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
}

