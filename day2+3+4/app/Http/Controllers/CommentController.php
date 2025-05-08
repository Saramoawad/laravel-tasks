<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allComments = Comment::all();
        return view('comments.all-comments', ["allComments" => $allComments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create-comment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $post = Post::find($request->post_id);
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content;
        $comment->commentTable_type = Post::class;
        $comment->commentTable_id = $request->post_id;
        $comment->save();
        return redirect("/posts/$request->post_id");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            return view('comments.view-comment', ["comment" => $comment]);
        };
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Post::find($id);
        if ($comment) {
            return view('comments.edit-comment', ["comment" => $comment]);
        };
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::find($id);
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();
        return redirect('/comments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Comment::destroy($id);
        return redirect('/comments');
    }
}
