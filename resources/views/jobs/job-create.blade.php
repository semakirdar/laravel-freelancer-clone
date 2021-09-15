@extends('layout')
@section('content')


    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-6 mt-5">
                <form method="post" action="{{ route('job.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Title</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label>Body</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="body">
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                    </div>
                    <div class="mb-3">
                        <select name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success">SAVE</button>
                </form>
            </div>
        </div>
    </div>

@endsection

