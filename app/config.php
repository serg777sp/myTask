<?php
//Переменные

Flight::set('flight.views.path', 'app/Views'); //Каталог с видами
Flight::set('site','task.progforce.loc'); //имя сайта
Flight::set('dbname','pftask'); //Имя базы данных
Flight::set('dbuser','root'); //Пользователь базы данных
Flight::set('dbpass','secret'); //Пароль от базы данных

//Мои функции (можно было вынести в отдельный файл)
Flight::map('myAsset', function(){
    return 'http://'.Flight::get('site').'/myassets/';  
});
Flight::map('Url', function($filename){
    return 'http://'.Flight::get('site').'/'.$filename;  
});
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname='.Flight::get('dbname'),Flight::get('dbuser'),Flight::get('dbpass')));