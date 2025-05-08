<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPosts = Post::paginate(2);
        return view('posts.all-posts', ["allPosts" => $allPosts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateRequest $request)
    {
        // dd($request);
        // $user = User::where('email',$request->email);
        // dd($user->first()->id);
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('assets/images','public');
        }else{
            $imagePath = null;
        }
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->image=$imagePath;
        $post->save();
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            return view('posts.view-post', ["post" => $post]);
        };
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            return view('posts.edit-post', ["post" => $post]);
        };
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateRequest $request, string $id)
    {

        $post = Post::find($id);
        if($request->hasFile('image')){
            if($post && $post['image'] && Storage::disk('public')->exists($post->image)){
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('assets/images','public');
        }else{
            $imagePath = $post->image;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->image=$imagePath;
        $post->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if($post && $post['image'] && Storage::disk('public')->exists($post->image)){
            Storage::disk('public')->delete($post->image);
        }
        Post::destroy($id);
        return redirect('/posts');
    }
}
