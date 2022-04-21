<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\page_view;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ItemNotFoundException;

class PostController extends Controller
{

    public function index(Request $req)
    {
        return view('post/add');
    }

    public function add(Request $req)
    {
        Post::create([
            "judul" => $req['judul'],
            "content" => $req['content'],
            "desc" => $req['desc'],
            "author" => Auth::user()->id
        ]);

        return redirect('/admin');
    }

    public function editView(Request $req, int $id)
    {
        try {
            $post = Post::all()->where('id',$id)->firstOrFail();
            return view('post/edit',$data=["post" => $post]);
        } catch (ItemNotFoundException $e) {
            $error = "Post dengan id $id tidak ditemukan";
            return view('post/edit',$data = ['error' => $error]);
        }
    }

    public function edit(Request $req, int $id)
    {
        $post = Post::all()->where('id', $req->id)->firstOrFail();
        $post->update($req->except(['id']));
        $post->save();
        return redirect("/admin/post/$id/edit");
    }

    public function detailView(Request $req, int $id)
    {
        $post = Post::all()->where('id',$id)->firstOrFail();
        $ip = $_SERVER['REMOTE_ADDR'];
        $test_visitor = page_view::all()->where('ip',$ip)->where('post_id',$post->id);
        if (!empty($test_visitor)) {
            page_view::create([
                "ip" => $ip,
                "post_id" => $id
            ]);
        }
        return view('post/detail', $data=["post" => $post]);
    }

    public function delete(Request $req, int $id)
    {
        Post::all()->where('id',$id)->firstOrFail()->delete();
        return redirect('/admin');
    }

    public function getAll()
    {
        return Post::all();
    }

    public function findById($id)
    {
        return Post::all()->where('id',$id);
    }

}
