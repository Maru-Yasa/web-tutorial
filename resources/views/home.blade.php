@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-10 text-center">
            <i class="bi bi-person-circle mb-0" style="font-size: 100px;"></i>
            <h2 class="mt-0">Halo, {{ Auth::user()->name }}</h2>
            <span>
                <a href="/admin/user/{{ Auth::user() ->id }}/edit" class="btn btn-sm btn-dark"> <i class="bi bi-pencil-fill"></i> Edit Profile</a>
                <a href="/admin/post/add" class="btn btn-outline-dark btn-sm"><i class="bi bi-plus"> </i> Post</a>    
            </span>
        </div>
    <div class="col-10 mt-5 row justify-content-center mb-5">
            <h2 class="">All Post</h2>
            <div class="col-12 row justify-content-center mt-5">
                @foreach ($posts as $item)
                <div class="card col-12 col-md-4 mx-2 my-2">
                    <div class="card-body">
                        <a class="card-title fs-4 fw-bold text-dark" href="/post/detail/{{ $item->id }}" style="text-decoration: none">
                            {{ $item->judul }}
                        </a>
                        <p class="my-desc">
                            {{ $item->desc }}
                        </p>
                        <a href="/post/detail/{{ $item->id }}">Selengkapnya</a>
                    </div>
                    <div class="card-body row">
                        <div class="col-8 mt-auto">
                            <a href="/admin/post/{{ $item->id }}/edit" class="btn btn-dark btn-sm"> <i class="bi bi-pencil-fill"></i> Edit</a>
                            <a href="/admin/post/{{ $item->id }}/delete" class="btn btn-outline-danger btn-sm"> <i class="bi bi-trash-fill"></i> Delete</a>       
                        </div>
                        <div class="col-3 py-1 mt-auto">
                            <span class="">
                                {{ $item->views_count }} <i class="bi bi-eye-fill"></i>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

        </div>


    </div>
</div>
@endsection
