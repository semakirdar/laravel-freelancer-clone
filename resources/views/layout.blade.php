<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <title>Freelancer</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <div class="nav-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center m-auto">
                <div class="p-2">
                    <a href="{{route('home')}}"><img style="height: 80px" class="img-fluid"
                                                     src="{{asset('images/freelance-logo.png')}}"></a>
                </div>
                <div class="d-flex">
                    @guest()
                        <a href="{{ route('register') }}" class="btn btn-danger btn-sm me-4">REGISTER</a>

                        <a href="{{ route('login') }}" class="btn btn-danger btn-sm">LOGIN</a>
                    @endauth
                    @auth()
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-danger btn-sm">LOGOUT</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                </ul>
            </div>
            <div class="float-end">
                <ul class="nav">
                    @auth()
                        <li class="nav-item">
                            <a href="{{ route('profile', ['id' => auth()->user()->id])  }}" class="nav-link">Profile</a>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>
</header>

<div>
    @yield('content')
</div>


<footer></footer>
<script src="{{ asset('js/app.js') }}"></script>

@if ($errors->any())
    <script>
    toastr.error( '{{ implode(' ', $errors->all()) }}');
    </script>
@endif

</body>
</html>
