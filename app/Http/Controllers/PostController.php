<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class PostController extends Controller
{
    public function index(){
        return view('posts.index',[
            // composer clockwork tool to fix N+1 issue
            'posts'=>Post::latest()->filter(request('search', 'category'))
                ->paginate(100)
        ]);
    }
    public function show(Post $post){
        return view('posts.show',[
            'post'=> $post
        ]);
    }
}

