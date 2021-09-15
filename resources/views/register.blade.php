@extends('layout')
@section('content')


    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-6 mt-5">
                <form method="post" action="{{ route('register.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Name</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="name">
                    </div>
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
                    <div class="mb-3">
                        <label>Password Again</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="password_confirmation" type="password">
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="image">
                    </div>
                    <button class="btn btn-success">SAVE</button>
                </form>
            </div>
        </div>
    </div>

@endsection

