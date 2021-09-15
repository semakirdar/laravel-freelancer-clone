@extends('layout')
@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-6 mt-5">
                <form method="post" action="{{ route('job.bid.update', ['id' => $bid->id]) }}">
                    @csrf
                    <div class="mb-3">
                        <label>Price</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="price" value="{{ $bid->price }}">
                    </div>
                    <div class="mb-3">
                        <label>Estimated Day</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="estimated_day" value="{{ $bid->estimated_day }}">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="description" value="{{ $bid->description }}">
                    </div>

                    <button class="btn btn-success">SAVE</button>
                </form>
            </div>
        </div>
    </div>

@endsection


