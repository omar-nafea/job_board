<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, Post $post)
    {
        $comment = Comment::create([
            'post_id' => $post->id,
            'comment' => $request->comment,
            'likes' => 0,
        ]);
        return redirect()->route('posts.show', $post->id)->with('success', 'Comment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $comment->load('post');
        $post = $comment->post;
        $comments = Comment::where('post_id', $post->id)->get();
        return view('posts.showComments', ['post' => $post, 'comments' => $comments, "pageTitle" => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $postId = $comment->post_id;
        $comment->delete();
        return redirect()->route('posts.show', $postId)->with('success', 'Comment deleted successfully');
    }
}
