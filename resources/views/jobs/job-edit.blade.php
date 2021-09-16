@extends('layout')
@section('content')


    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-6 mt-5">
                <form method="post" action="{{ route('job.update', ['id' => $job->id]) }}">
                    @csrf
                    <div class="mb-3">
                        <label>Title</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="title" value="{{ $job->title }}">
                    </div>
                    <div class="mb-3">
                        <label>Body</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="body" value="{{ $job->body }}">
                    </div>
                    <div class="mb-3">
                        <label>Budget</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="budget" value="{{ $job->budget }}">
                    </div>
                    <div class="mb-3">
                        <label>Delivery Time</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="delivery_time" value="{{ $job->delivery_time }}">
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option {{$category->id == $job->category_id ? 'selected' : ' ' }}
                                    value="{{ $category->id }}">
                                    {{ $category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success">SAVE</button>
                </form>
            </div>
        </div>
    </div>

@endsection

