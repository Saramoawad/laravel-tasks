<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/test", function(){
    return view("test");
});


Route::get('/posts', function(){
    $posts=[
       [ "id"=>1,
        "title"=>"title 1",
        "body"=>"post body 1",
        "created_by"=>"sara"],

        [ "id"=>2,
        "title"=>"title 2",
        "body"=>"post body 2",
        "created_by"=>"sara"],

        [ "id"=>3,
        "title"=>"title 3",
        "body"=>"post body 3",
        "created_by"=>"sara"],

    ];
    return view("posts.index",["posts"=>$posts]);
});

// --
Route::get('/posts/{id}', function($id){

    $post=[
        "id"=>$id,
        "title"=>"title 1",
        "body"=>"post body 2",
        "created_by"=>"sara",
    ];
    return view("posts.view",["post"=>$post]);
})->where ('id','[0-9]+');
// --
Route::get("/posts/create", function(){
    return view("posts.create");
});
// ---
Route::post("/posts", function(){
    return "Done";
});
// --

Route::get('/posts/{id}/edit', function($id){
    $post = [
        "id" => $id,
        "title"=>"Title",
        "body"=>"Body",
        "created_by" => "sara",
    ];
    return view("posts.edit", ["post"=>$post]);
})->where('id', '[0-9]+');

Route::get('/posts/{id}/delete', function($id){
    $post = [
        "id"=> $id,
        "title"=> "Title",
        "body"=> "Body",
        "created_by"=> "sara",
    ];
    return view("posts.delete", ["post"=>$post]);
})->where('id', '[0-9]+');


