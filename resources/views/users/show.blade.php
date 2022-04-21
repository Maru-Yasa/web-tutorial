@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-12 row justify-content-center mb-5">
            <h2>All Users</h2>
            <div class="col-12 mb-3">
                <a class="btn btn-dark btn-sm" href="/admin/user/create"> <i class="bi bi-plus"></i> Create</a>
                @if (\Session::has('msg'))
                    <div class="alert alert-dark mt-2" role="alert">
                        {{ \Session::get('msg') }}
                    </div>
                @endif
            </div>
            <table id="userTable" class="table">
                <thead class="bg-dark text-white">
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Created at</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    @foreach ($users as $item)
                        <tr>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->email }} </td>
                            <td> {{ $item->created_at }} </td>
                            <td>
                                <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-dark btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                <a href="/admin/user/{{ $item->id }}/delete" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
<script>
    $(document).ready( function () {
    $('#userTable').DataTable();
} );
</script>
<style>
    .page-link{
        background-color: white !important;
        border-color: #efefef !important;
        color: black !important;
    }
</style>
@endsection
