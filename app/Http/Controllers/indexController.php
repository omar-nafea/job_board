<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;


class indexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $categories = Category::all();
        $posts = Post::paginate(4);
        return view('index', ["pageTitle" => "Home", "categories" => $categories, "posts" => $posts]);
    }
}
