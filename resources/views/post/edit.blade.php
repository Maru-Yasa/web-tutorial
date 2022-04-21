@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        @if (isset($error))
            <div class="col-10 text-center">
                <i class="bi bi-search" style="font-size: 100px"></i>
                <h1>{{ $error }}</h1>
                <a href="/admin" class="btn btn-outline-dark">Kembali</a>
            </div>
        @else
        <div class="col-10">
            <h2>Edit Post</h2>
            <form action="/admin/post/{{ $post->id }}/edit" method="POST" class="form mt-5 mb-5">
                @csrf
                <input type="hidden" value="{{ $post->id }}" name="id">
                <input type="text" placeholder="Untitled" value="{{ $post->judul }}" name="judul" class="form-control fs-1 form-control-lg mb-2 border-0">
                <textarea name="desc" id="" class="col-12 my-3" placeholder="descibe your content here!" rows="3">{{ $post->desc }}</textarea>
                <input id="x" type="hidden" value="{{ $post->content }}" name="content">
                <trix-editor class="bg-white" input="x"></trix-editor>
                <button type="submit" class="btn btn-dark mt-3">Save</button>
                <a class="btn btn-outline-danger mt-3" href="/admin">cancel</a>
            </form>
        </div>
        @endif

    </div>
</div>
@endsection
