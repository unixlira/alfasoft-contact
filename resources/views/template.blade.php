<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="icon" href="https://www.alfasoft.pt/assets/images/favicon.ico" sizes="192x192" />
        <!--[if !mso]><!-->
        <title>Contact Management</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-info bg-info">
            <div class="container">
                <a class="navbar-brand text-white" href="/">
                    <img src="https://www.alfasoft.pt/assets/images/logo.png" alt="" width="170px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        @auth
                            <span class="nav-link text-white p-2 btn-sm m-1 nav-link-custom">
                                Hello, {{ Auth::user()->name }}
                            </span>
                            <a class="nav-link btn btn-outline-light p-2 btn-sm m-1 nav-link-custom" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logoff
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a class="nav-link btn btn-outline-light p-2 btn-sm m-1 nav-link-custom" href="{{ route('login') }}">Login</a>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <div id="loader" class="loader-container" style="display: none">
                <div class="loader"></div>
            </div>
            @yield('content')
        </div>
        <br>
        <footer class="footer fixed-bottom bg-info">
            <div class="container">
                <p>
                    <span class="text-white fw-bold">&copy; 2023 by</span>
                    <a class="text-decoration-none link-lira text-white fw-bold" href="https://unixlira.github.io">
                        José Lira
                    </a>
                </p>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        @stack('scripts')
        <script>
            $('[data-toggle="tooltip"]').tooltip();

            $('.pagination li.page-item a.page-link').addClass('btn btn-sm');

            $('.pagination li.page-item span.page-link').addClass('btn btn-sm');

            function showLoader() {
                $('#loader').show();
            }

            function hideLoader() {
                $('#loader').hide();
            }
        </script>
    </body>
</html>
