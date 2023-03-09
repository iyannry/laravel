<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title ='';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' in ' . $author->name;
        }
        return view('posts', [
            "title" => "All Posts". $title,
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
            
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single post",
            "active" => 'posts',
            "post" => $post
        ]);
    }

    public function home(){
        $title = 'Home';
        $active = 'home';

        $posts = Post::orderBy('created_At', 'desc')->take(5)->get();
        $datas = Post::where('category_id', '2')->orderBy('created_At', 'asc')->take(5)->get();
        $popular = Post::orderBy('created_At', 'asc')->skip(5)->take(1)->get();
        $carousels = Carousel::get();

        return view('home', compact('posts', 'title', 'active', 'datas', 'popular', 'carousels'));
    }
}
