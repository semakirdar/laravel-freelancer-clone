@extends('layout')
@section('content')




    <div class="job-detail my-5">

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="card shadow-lg p-5">
                    <h3>{{ $job->title }}</h3>
                    <p>{{ $job->category->name }}</p>
                    <p class="text-muted">Proje No:{{ $job->id }}</p>
                    <div class="job-info d-flex justify-content-between align-items-center my-3">
                        <div>
                            <p>Yayın tarihi: {{ $job->created_at }}</p>
                            <p>Yaklaşık bütçe: 100$</p>
                        </div>
                        <div>
                            <p>Teslim süresi:</p>
                            <p>
                                <i class="fab fa-facebook-f"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-linkedin"></i>
                            </p>
                        </div>
                    </div>
                    <div>
                        <h5>Açıklama</h5>
                        {{ $job->body }}
                    </div>
                    @foreach($job->skills as $skill)
                        <div>
                            {{ $skill->name }}
                        </div>
                    @endforeach
                    @auth()

                        <div class="row justify-content-center align-items-center">
                            <div class="col-sm-12 col-md-12 col-lg-7">
                                <div class="card mt-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div>Teklifler</div>

                                        @if(auth()->user()->id != $job->user->id)
                                            <div>
                                                <a class="btn btn-danger btn-sm"
                                                   href="{{ route('job.bid.create', ['id' => $job->id]) }}">Teklif
                                                    ver</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>Image</th>
                                                <th>User</th>
                                                @if(auth()->user()->id == $job->user->id)
                                                    <th>Price</th>
                                                @endif
                                                <th>Description</th>
                                                <th>Estimated day</th>
                                                <th>Action</th>

                                            </tr>
                                            @if(count($job->bids) > 0)
                                                @foreach($job->bids as $bid)
                                                    <tr>
                                                        <td>
                                                            <img width="50" height="50"
                                                                 src="{{$bid->user->getFirstMediaUrl() }}">
                                                        </td>

                                                        <td>{{ $bid->user->name }}</td>

                                                        @if(auth()->user()->id == $job->user->id)
                                                            <td>{{ $bid->price }}</td>
                                                        @endif

                                                        <td>{{ $bid->estimated_day }}</td>
                                                        <td>{{ $bid->description }}</td>
                                                        <td>
                                                            @if(auth()->user()->id == $bid->user->id)
                                                                <a href="{{ route('job.bid.edit', ['id' => $bid->id]) }}">
                                                                    <i  class="fas fa-pencil-alt text-dark bid-edit-icon"></i>
                                                                </a>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6"><h6>HENÜZ TEKLİF YAPILMADI</h6></td>
                                                </tr>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>


@endsection
