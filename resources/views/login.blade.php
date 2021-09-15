@extends('layout')
@section('content')


    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-6 mt-5">
                <form method="post" action="{{ route('login.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="password" type="password">
                    </div>
                    <button class="btn btn-success">LOGIN</button>
                </form>
            </div>
        </div>
    </div>

@endsection
