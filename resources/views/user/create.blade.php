@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-10 col-md-7 col-lg-5 row justify-content-center mb-5">

            <form action="/admin/user/create" method="POST" class="form">
                <h2 class="mb-4">Create User</h2>
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input required type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input required type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>     
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark btn-sm" >Save</button>
                    <a href="/admin/users" class="btn btn-outline-danger btn-sm" >Cancel</a>
                </div>            
            </form>

        </div>


    </div>
</div>
@endsection
