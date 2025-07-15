<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Pagination\CursorPaginator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(3);
         return view('posts.index', ['posts' => $posts, "pageTitle" => "Posts List"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create', ["pageTitle" => "Create Post"]);
        // Post::factory()->count(1000)->create();
        // $post->categories()->attach(2);
        // return redirect('/posts');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // TODO: Create a new post
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);        
        return view('posts.show', ['post' => $post, "pageTitle" => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('posts.edit', ['post' => $post, "pageTitle" => $post->title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // TODO: Update the post
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // TODO: Delete the post
        
    }
}
