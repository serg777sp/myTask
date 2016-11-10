<?php

namespace App\Controllers;

use Flight;
use App\Models\Post;

class PostController extends Controller {
    
    public function add(){
        $data = Flight::request()->data;
        if($data->submit){
            $files = Flight::request()->files;
            $post = new Post();
            $post->create($data,$files);
            Flight::redirect('/posts');
        }
        $viewData = [
            'title' => 'Add Post' 
        ];
        Flight::render('posts/add',$viewData);
    }
    
    public function show($id){
        $post = Post::find($id);
        $viewData = [
            'title' => 'Post - '.$post->title,
            'post' => $post
        ];
        Flight::render('posts/show',$viewData);
    }
    
    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        Flight::redirect('/posts');
    }

        public function paginate($page){
        $pagInfo['count'] = 6;
        $pagInfo['page'] = (int)$page;
        $pagination = Post::paginate($pagInfo);
        $viewData = [
            'title' => 'All posts(pagination)',
            'posts' => $pagination['posts'],
            'paginator' => $pagination['paginator']
        ];        
        Flight::render('posts/posts',$viewData);  
    }
    
    public function generate(){
        Post::generate();
        Flight::redirect('/posts');
    }
}
