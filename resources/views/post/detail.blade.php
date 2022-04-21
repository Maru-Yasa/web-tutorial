@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 py-5 bg-gray text-center" style="background-color: #efefefef;">
    <i class="bi bi-calendar-date-fill" style="font-size: 70px;"></i>
    <h1>Daily Masasi</h1>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">

        @if (isset($post))
            <div class="col-10">
                <h1 class="mb-5 fw-bold text-center"> {{ $post->judul }} </h1>
                <hr class="mb-5">
                {!! $post->content !!}
            </div>
        @endif

    </div>
</div>
@endsection
