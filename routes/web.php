<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Post;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',function(){
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'My firt post1','body'=>'I love laravel1']);
    $user->posts()->save($post);
});

Route::get('/read',function(){
    $user = User::findOrFail(1);

    foreach ($user->posts as $post){
        echo $post->title . '     ' . $post->body . '<br>';
    }
});

Route::get('/update',function(){
    $user = User::findOrFail(1);

    $user->posts()->where('id','=',2)->update(['title'=>'Laravel','body'=>'Laravel is awesome']);
});

Route::get('/delete',function(){
    $user = User::findOrFail(1);

    $user->posts()->where('id',2)->delete();
});



