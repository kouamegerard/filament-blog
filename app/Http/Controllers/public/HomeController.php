<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $featured = Post::is_featured();
        $latest = Post::take(2)->orderBy("created_at", "DESC")->offset(1)->get();
        $related = Post::take(5)->orderBy("created_at", "DESC")->offset(3)->get();
        $posts = Post::take(4)->orderBy("created_at", "DESC")->get();
        $events = Post::take(4)->orderBy("created_at", "DESC")->get();
        return view('home', compact("featured","latest","related", "posts", "events"));
    }
}
