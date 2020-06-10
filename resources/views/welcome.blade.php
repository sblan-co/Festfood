@extends('layouts.app')

@section('content')

    <div class="container my-auto">

    @if(Session::get('info'))
        <div class="alert alert-success">
            {{ Session::get('info') }}
        </div>
    @endif
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
