@extends('layout')
@section('content')

    <div class="profile">
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-12 col-md-12 col-lg-8 m-auto text-center align-items-center justify-content-center">
                    <div class="profile-image d-inline-block mb-3">
                        @auth
                            @if(auth()->user()->id == $profile->user->id)
                                <form method="post" enctype="multipart/form-data"
                                      action="{{ route('profile.store', ['id' => $profile->user->id]) }}"
                                      id="avatar-form">
                                    @csrf
                                    <input type="file" id="inputFile" name="image">
                                    <i class="fas fa-camera" id="addIcon"></i>
                                    <button type="submit" id="saveBtn"></button>
                                </form>
                            @endif
                        @endauth
                        @if(!empty($profile->user->getFirstMediaUrl()))
                            <img width="200" height="200" class="rounded-circle"
                                 src="{{ $profile->user->getFirstMediaUrl()}}">
                        @else
                            <img width="200" height="200" class="rounded-circle"
                                 src="{{ asset('images/profile-img.png') }}">
                        @endif
                    </div>
                    <div class="mb-2 fw-bold">
                        {{$profile->user->name}}
                    </div>
                    <div class="mb-3">
                        {{$profile->bio}}
                    </div>
                    <div class="mb-4">
                        Kayıt Tarihi: {{ $profile->user->created_at }}
                    </div>
                    @auth
                        @if(auth()->user()->id == $profile->user->id)
                            <div class="new-job mb-3">
                                <a class="text-decoration-none text-white " href="{{ route('job.create') }}"><i
                                        class="far fa-plus-square me-2"></i>New Job Create</a>
                            </div>
                        @endif
                    @endauth
                    <div>
                        @foreach($jobs as $job)
                            <div class="row d-flex justify-content-center align-items-center mb-4">
                                <div class="col-sm-12 col-md-12 col-lg-8">

                                    <div class="card profile-card shadow-lg p-5">
                                        @auth()
                                        @if(auth()->user()->id == $profile->user->id)
                                            <a class="text-decoration-none text-dark profile-edit top-20"
                                               href="{{ route('job.edit', ['id'=> $job->id]) }}"><i
                                                    class="fas fa-edit me-2"></i>Edit</a>
                                        @endif
                                        @endauth
                                        <div class="card-header">
                                            <a class="text-decoration-none text-dark job-title"
                                               href="{{route('detail', ['id' => $job->id])}}"><h3>{{ $job->title }}</h3>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <p>{{ $job->category->name }}</p>
                                            <p class="text-muted">Job No:{{ $job->id }}</p>
                                            <div
                                                class="job-info d-flex justify-content-between align-items-center my-3">
                                                <div>
                                                    <p>Yayın tarihi: {{ $job->created_at }}</p>
                                                    <p>Yaklaşık bütçe:{{ $job->budget }}</p>
                                                </div>
                                                <div>
                                                    <p>Teslim süresi:{{ $job->delivery_time }}</p>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
