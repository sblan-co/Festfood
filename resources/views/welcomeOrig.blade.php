{{-- SOY EL ORIGINAAAAAAAAAAAAL --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FestFood!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    FestFood!
                </div>

                <div class="links">
                    <a href="burgers">Burgers 🍔</a>
                    <a href="">Pizzas 🍕</a> <span class="badge badge-secondary">Coming soon!</span>
                    <a href="">Kebabs 🥙</a> <span class="badge badge-secondary">Coming soon!</span>
                    <a href="">Chicken 🍗</a> <span class="badge badge-secondary">Coming soon!</span>
                    <a href="">Sides 🍟</a> <span class="badge badge-secondary">Coming soon!</span>
                    <a href="">Drinks 🥤</a> <span class="badge badge-secondary">Coming soon!</span>
                    {{-- <a href="">Hot Drinks ☕</a> <span class="badge badge-secondary">Coming soon!</span>
                    <a href="">Ice-Cream 🍦</a> <span class="badge badge-secondary">Coming soon!</span> --}}
                </div>
            </div>
        </div>

        @auth

            <footer class="fixed-bottom">
                <div class="float-right btn-group dropup">
                    <button type="button" class="btn btn-secondary btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Order 🛒
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        
                    {{-- Lista dinámica de los elementos del pedido --}}
                    
                        <a class="dropdown-item" href="#">1x CheeseBurger </a>

                    </div>
                </div>
            </footer>

        @endauth

    </body>
</html>
