<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
class IndexController extends Controller
{
    public function index(Request $req)
    {
        $posts = Post::all();
        return view('index', $data=['posts' => $posts]);
    }
}
