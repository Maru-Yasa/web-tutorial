@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-10">
            <h2>Add Post</h2>
            <form action="/admin/post/add" method="POST" class="form mt-5 mb-5">
                @csrf
                <input type="text" placeholder="Untitled" name="judul" class="form-control form-control-lg mb-2 border-0">              
                <div class="form-floating col-12 my-3">
                    <textarea name="desc" id="" class="form-control" placeholder="descibe your content here!" rows="3"></textarea>
                    <label for="">Desc</label>
                </div>
                <input id="x" type="hidden" name="content">
                <trix-editor input="x"></trix-editor>
                <button type="submit" class="btn btn-dark mt-3">Save</button>
                <a class="btn btn-outline-danger mt-3" href="/admin">cancel</a>
            </form>
        </div>

    </div>
</div>
@endsection
