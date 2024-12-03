<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_ENV') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- Bootstrap Library CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    {{-- Styles --}}
    <link rel="stylesheet" href="Css/login.css">
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('store-users') }}" method="POST">
                @csrf
                <h1 class="title-login">Nueva Cuenta</h1>
                {{-- <div class="social-container">
                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
                    <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social"><i class="bi bi-google"></i></a>
                    <a href="#" class="social"><i class="bi bi-linkedin"></i></a>
                </div> --}}
                <span>o use su correo para registrarse</span>
                <input type="text" name="userName" placeholder="Nombre" />
                <input type="text" name="userLastName" placeholder="Apellido" />
                <input type="email" name="userEmail" placeholder="Email" />
                <button>Registrarse</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            @if (session('message'))
                <div class="mt-2 mx-3">
                    <span style="margin-top: 5% !important"> <mark>{{ session('message') }}</mark> </span>
                </div>
            @endif

            <form action="{{ route('validateLogin') }}" method="POST">
                @csrf
                <h1 class="title-login">Ingrese</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social"><i class="bi bi-google"></i></a>
                    <a href="#" class="social"><i class="bi bi-linkedin"></i></a>
                </div>
                <span>o use su cuenta</span>
                <input type="email" placeholder="Email" name="email" />
                <input type="password" placeholder="Password" name="password" />
                <a class="forget-background" href="#" data-bs-toggle="modal" id="forgotPassword"
                    data-bs-target="#infoModal">¿Olvido su contraseña?</a>
                <button>Ingresar</button>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bienvenido!</h1>
                    <p>Para mantener conectado con nosotros, por favor ingrese con su información personal.</p>
                    <button class="ghost" id="signIn">Ingresar</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hola Amigo!</h1>
                    <p>Ingrese los detalles de su información personal y inicie la jornada con nosotros.</p>
                    <button class="ghost" id="signUp">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Creado con <i class="fa fa-heart"></i> por
            <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
            - Lea como Creo esto y como usted puede unirse al reto.
            <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">aqui</a>.
        </p>
    </footer>


    {{-- Se incluye modal olvido contraseña --}}
    @include('modals.info')


    {{-- JQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- General Js --}}
    <script src="Js/login.js"></script>

    {{-- Axios Library --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Bootstrap Library JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>


    {{-- Facebook Script SDK  --}}
    {{-- <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '{your-app-id}',
                cookie: true,
                xfbml: true,
                version: '{api-version}'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));



        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });


        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
    </script> --}}

</body>

</html>
