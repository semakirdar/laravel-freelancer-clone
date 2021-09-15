@extends('layout')
@section('content')

    <div class="hero d-flex justify-content-center align-items-center">
        <div class="hero-content">
            <h1 class="text-white text-center">
                ARADIĞINIZ UZMANA ULAŞMANIN EN KOLAY YOLU
            </h1>
        </div>
    </div>
    <div class="jobs p-4">
        <div class="card  shadow-lg p-3">
            <div class="card-body">
                <table class=" table table-striped">
                    <tr>
                        <th>title</th>
                        <th>body</th>
                        <th>user name</th>
                        <th>category name</th>
                        <th>bids count</th>

                    </tr>
                    @foreach($jobs as $job)
                        <tr>
                            <td><a class="text-decoration-none text-dark"
                                   href="{{ route('detail', ['id' => $job->id]) }}">{{ $job->title }}</a></td>
                            <td>{{ $job->body }}</td>

                            <td><a class="text-decoration-none text-dark"
                                   href="{{route('profile', ['id'=>$job->user->id])}}">{{ $job->user->name }}</a></td>
                            <td>{{ $job->category->name }}</td>
                            <td>{{ $job->bids_count }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
