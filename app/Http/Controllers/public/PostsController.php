<?php

namespace App\Http\Controllers\public;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $posts = Post::all();

        return view( 'public/posts', compact("posts") );
    }

    public function post( Post $post, $slug ) {
        $single = $post->post($slug);
        // dump($single);
        // dump($single->user());
        return view( 'public.post.single', compact("single"));
    }

}
