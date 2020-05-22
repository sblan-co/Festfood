@extends('layouts.app')

@section('content')

    {{-- Añadir el nav --}}

    <div class="container my-auto">

        <div class="row justify-content-center display-1 m-2">
            FestFood!
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col"><a href="burgers">Burgers 🍔</a></div>
            <div class="col">Pizzas 🍕 <span class="badge badge-secondary">Coming soon!</span></div>
            <div class="col">Kebabs 🥙 <span class="badge badge-secondary">Coming soon!</span></div>
            <div class="col">Chicken 🍗 <span class="badge badge-secondary">Coming soon!</span></div>
            <div class="col">Sides 🍟 <span class="badge badge-secondary">Coming soon!</span></div>
            <div class="col">Drinks 🥤 <span class="badge badge-secondary">Coming soon!</span></div>

            {{-- <a href="">Hot Drinks ☕</a> <span class="badge badge-secondary">Coming soon!</span>
            <a href="">Ice-Cream 🍦</a> <span class="badge badge-secondary">Coming soon!</span> --}}
        </div>
    </div>

{{-- 
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
                <a href="">Ice-Cream 🍦</a> <span class="badge badge-secondary">Coming soon!</span>
            </div>
        </div>
    </div> --}}

    @auth

        <footer class="fixed-bottom">
            <div class="float-right btn-group dropup">
                <button type="button" class="btn btn-secondary btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Order 🛒
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    
                {{-- Lista dinámica de los elementos del pedido --}}
                
                    <a class="dropdown-item" href="#">1x CheeseBurger 2€</a>
                    <a class="dropdown-item" href="#">Total: </a><span class="float-right"> 2€</span>
                    <button class="btn btn-primary">Finish order</button>

                </div>
            </div>
        </footer>

    @endauth





@endsection
