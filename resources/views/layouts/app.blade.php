<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FestFood!') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/counter.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'FestFood!') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                                
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();                                    
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        @auth

        <!-- Default dropup button -->
        <footer class="fixed-bottom">
            <div class="float-right btn-group dropup">
                <button type="button" class="btn btn-secondary btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Order 🛒
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    
                @if (Session::get('myOrder') != null)
                    <script>console.log("myOrder" + Session::get('myOrder'));</script>
                    <a class="dropdown-item" href="#">
                        <table class="table table-hover" id="orderTable">
                            @foreach (Session::get('myOrder') as $element)
                                    <tr>
                                        <td>
                                            {{$element->amount}}
                                        </td>
                                        <td>
                                            {{$element->name}}
                                        </td>
                                        <td>
                                            {{$element->price}}€
                                        </td>
                                    </tr>
                            @endforeach
                        </table>
                    </a>
                    <div class="dropdown-item" href="#">Total: <span class="float-right" id="totalPrice"> 2€</span></div>
                    <div class="d-flex btn btn-primary justify-content-center"><a href="order" style="color: white; text-decoration:none;">Finish order</a></div>
                @else
                    <a class="dropdown-item" href="#">No items added yet! Add something to your order.</a>
                @endif
          

                </div>
            </div>
        </footer>
            
        @endauth

    </div> 

    {{-- @section('script') --}}
</body>
</html>

<script>
    window.onload = function() {
        var total = 0;
        var orderTbl = document.getElementById("orderTable");

        if (orderTbl){
            for (var i = 0; i < orderTbl.rows.length; i++) {
                var td = orderTbl.rows[i].cells[2].innerHTML;
                td = td.replace('€','');
                
                total = total + parseFloat(td);
            }

            document.getElementById("totalPrice").innerHTML = "" + total + "€";
        }
    };
</script>

