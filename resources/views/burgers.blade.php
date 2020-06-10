@extends('layouts.app')

@section('content')
        
<div class="container">
    @if(Session::get('orderError'))
        <div class="alert alert-danger">
            {{ Session::get('orderError') }}
        </div>
    @endif
    <div class="row">
        @foreach ($burgers as $burger)        
            <div class="col grid"> 
                <figure class="effect-milo" data-toggle="modal" data-target="#{{$burger->name}}Detail">
                    <img src={{ $burger->image }} style="height: 200px" alt="img25"/>
                    <figcaption>
                        <h2>{{ $burger->name }}</h2>
                        <p>{{ $burger->description }}</p>
                    </figcaption>			                    
                </figure>

                <div class="modal fade" data-backdrop="static" data-keyboard="false" id="{{ $burger->name}}Detail" tabindex="-1" role="dialog" aria-labelledby="{{ $burger->name}}Detail" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $burger->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('burgers.store') }}" method="POST">
                            @csrf
                                <div class="modal-body">
                                    <img src={{ $burger->image }} style="height: 200px" alt="img25"/>
                                    <p>{{ $burger->description }}</p>
                                </div>
                                <div class="modal-footer">
                                    <div class="col-5 justify-content">
                                        <button type="button" class="btn btn-primary" onclick="sumar('{{$burger->id}}')">+</button>
                                        <input type="number" style="width: 20%; text-align: right;" min="1" max="100" value="1" name="burger_amount" id="{{$burger->id}}Amount">
                                        <button type="button" class="btn btn-primary" onclick="restar('{{$burger->id}}')">-</button>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end">
                                        <span id="{{$burger->id}}Price" style="visibility: hidden;">{{$burger->price}}</span><span id="{{$burger->id}}PriceAmount">{{$burger->price}}</span><span>€</span>
                                        <button type="submit" class="btn btn-primary mr-2" >Add</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>                
                                </div> 
                                <input type="hidden" value={{$burger->id}} name="burger_id">  
                                <input type="hidden" value={{$burger->name}} name="burger_name">  
                                <input type="hidden" value={{$burger->price}} name="burger_price">  
                            </form>      
                        </div>      
                    </div>
                </div>
            </div>
               
        @endforeach

    </div>
</div>

<script>
    function sumar(bgId){
        var num = parseInt(document.getElementById(bgId+"Amount").value);
        document.getElementById(bgId+"Amount").value = num + 1;     
        price(bgId, num + 1);
    }

    function restar(bgId){
        var num = parseInt(document.getElementById(bgId+"Amount").value);
        if (num > 1){
            document.getElementById(bgId+"Amount").value = num - 1;
            price(bgId, num - 1);
        }
    }

    function price (bgId, number){
        var price = parseFloat(document.getElementById(bgId+"Price").innerHTML);
        document.getElementById(bgId+"PriceAmount").innerHTML = number * price;
    }
</script>
@endsection


{{-- console.log("My Order: {{Session::get('myOrder')}}"); --}}
