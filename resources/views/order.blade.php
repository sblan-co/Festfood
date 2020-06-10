@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Order</div>

                <div class="card-body">
                    @guest
                        <div class="alert alert-success" role="alert">
                            404 | ERROR
                        </div>
                    @else
                        <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                            <table class="table table-hover" id="finalTable">
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
                                            <td>
                                                <button class="btn btn-primary">Edit</button>
                                                <button class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        Total price:
                                    </td>
                                    <td></td>
                                    <td id="finalPrice">2</td>
                                </tr>
                                <tr>
                                    <td><button class="btn btn-primary" type="submit">Confirm Order</button></td>
                                </tr>
                            </table>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var total = 0;
    var orderTbl = document.getElementById("finalTable");

    for (var i = 0; i < orderTbl.rows.length-2; i++) {
        var td = orderTbl.rows[i].cells[2].innerHTML;
        td = td.replace('€','');
        
        total = total + parseFloat(td);
    }

    document.getElementById("finalPrice").innerHTML = "" + total + "€";
</script>
@endsection

