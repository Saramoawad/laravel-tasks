<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResoure;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index(){
        $posts = Post::all();
        return PostResoure::collection($posts);
    }
    function store(Request $request){
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('assets/images','public');
        }else{
            $imagePath = null;
        }
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->image=$imagePath;
        $post->save();
        return new PostResoure($post);
    }
    function show(string $id){
        $post = Post::find($id);
        return new PostResoure($post);
    }
    function update(Request $request , string $id){
        return $request->all();
        $post = Post::find($id);
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('assets/images','public');
        }else{
            $imagePath = $post->image;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->image=$imagePath;
        $post->save();
        return new PostResoure($post);
    }
    function destroy(string $id){
        Post::destroy($id);
        return "Done";
    }
}
