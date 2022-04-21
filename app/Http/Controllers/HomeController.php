<?php

namespace App\Http\Controllers;

use App\Models\page_view;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        for ($i=0; $i < count($posts); $i++) { 
            $posts[$i]['views_count'] = count(page_view::all()->where('post_id', $posts[$i]['id']));
        }
        return view('home', $data=['posts' => $posts]);
    }
}
