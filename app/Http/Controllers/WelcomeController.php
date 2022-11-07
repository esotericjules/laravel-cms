<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // $search = request()->query('search');
        // if ($search) {
        //     $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(2);
        // } else {
        //     $posts = Post::simplePaginate(2);
        // }
        return view('welcome')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', Post::searched()->simplePaginate(2));
    }
}