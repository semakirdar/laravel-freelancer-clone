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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('job.create') }}">New Job</a>
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


<footer>
    <div class="footer">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="footer-item">
                    <img style="height: 80px" class="img-fluid text-muted"
                         src="{{asset('images/freelance-logo.png')}}">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="footer-item">

                    <ul class="mb-0">
                        <h6><strong>KATEGORİLER</strong></h6>
                        @foreach($categories as $category)

                            <li class="list-unstyled">
                                <a class="text-decoration-none text-dark" href="#">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="footer-item">
                    <ul class="mb-0">
                        <h6><strong>GİZLİLİK VE KULLANIM</strong></h6>
                        <li class="list-unstyled">Kullanıcı Sözleşmesi</li>
                        <li class="list-unstyled">Gizlilik Politikası</li>
                        <li class="list-unstyled">Güvenli Ticaret</li>
                        <li class="list-unstyled">Yardım</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="footer-item">
                    <ul class="mb-0">
                        <h6><strong>SOSYAL MEDYA</strong></h6>
                        <li class="list-unstyled"><i class="fas fa-phone-volume me-2"></i>0850 885 00 22</li>
                        <li class="list-unstyled">
                            <i class="fab fa-facebook-f me-3"></i>
                            <i class="fab fa-instagram me-3"></i>
                            <i class="fab fa-twitter me-3"></i>
                            <i class="fab fa-linkedin"></i>
                        </li>


                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>

@if ($errors->any())
    <script>
        toastr.error('{{ implode(' ', $errors->all()) }}');
    </script>
@endif

</body>
</html>
