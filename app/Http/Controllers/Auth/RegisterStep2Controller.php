<?php
namespace App\Http\Controllers\Auth;

use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterStep2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        // echo "<script>console.log('Llego al showForm' );</script>";
        return view('auth.register_step2');
    }


/*  NOT FINISHED tengo que aclarar como son las relaciones 1:N, tienen tabla intermedia o no??
        - En caso de que no, debo añadir a lo que hay dentro de postForm  
            foreach ($request->['addresses'] as $address){
                $aux = new Address;
                $aux -> street = $address['street'];
                $aux -> number = $address['number'];
                $aux -> postcode = $address['postcode'];

                /// Optional
                $aux -> floor = $address['floor'];
                $aux -> apartment = $address['apartment'];

                // Add row to addresss table
                address()->add($aux));
            }
               

*/


    public function postForm(Request $request)
    {
        auth()->user()->update($request->only(['phone']));
        return redirect()->route('home');
    }
}

