<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editView(Request $req, $id)
    {
        $user = User::all()->where('id',$id)->firstOrFail();
        return view('user/edit', $data=['user' => $user]);
    }

    public function edit(Request $req, int $id)
    {
        $validate = $req->validate([
            'email' => 'email',
            'name' => 'string'
        ]);

        if($req->password !== null){
            $user = User::all()->where('id', $id)->firstOrFail();
            $arr = ['email' => $req->email, 'name' => $req->name, 'password' => Hash::make($req->password)];
            $user->update($arr);
            $user->save();
            return redirect('/admin');  
        }

        $user = User::all()->where('id', $id)->firstOrFail();
        $arr = ['email' => $req->email, 'name' => $req->name, 'password' => $user->password];

        $user->update($arr);
        $user->save();

        return redirect()->back();
    }

    public function view(Request $req)
    {
        $users = User::all();
        return view('users/show', $data=['users' => $users ]);
    }

    public function createView(Request $req)
    {
        return view('user/create');
    }

    public function create(Request $req)
    {
        $validate = $req->validate([
            'email' => 'string|email|required',
            "name" => 'required|string|min:3',
            'password' => 'required|string|min:3'
        ]);
        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);
        return redirect('/admin/users')->with('msg', "Berhasil membuat user baru");

    }

    public function delete(Request $req, $id)
    {
        User::all()->where('id', $id)->firstOrFail()->delete();
        return redirect()->back()->with('msg', "Berhasil menghapus user dengan id $id");
    }
}
