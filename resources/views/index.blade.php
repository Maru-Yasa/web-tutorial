@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 py-5 bg-gray text-center" style="background-color: #efefefef;">
    <i class="bi bi-calendar-date-fill" style="font-size: 70px;"></i>
    <h1>Daily Masasi</h1>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-12 row justify-content-center mb-5">
            <h2>All Post</h2>
            <div class="col-10 row justify-content-center mt-3">

                @foreach ($posts as $item)
                <div class="card col-11 col-md-4  mx-2 my-2">
                    <div class="card-header bg-white">
                        {{ $item->created_at }}
                    </div>
                    <div class="card-body">
                        <a class="card-title fs-4 fw-bold text-dark" href="/post/detail/{{ $item->id }}" style="text-decoration: none">
                            {{ $item->judul }}
                        </a>
                        <p class="my-desc">
                            {{ $item->desc }}
                        </p>
                    </div>
                    <div class="card-body row">
                        <a href="/post/detail/{{ $item->id }}" class="btn btn-outline-dark mt-auto">Baca</a>
                    </div>
                </div>
            @endforeach

            </div>
        </div>

    </div>
</div>
@endsection
