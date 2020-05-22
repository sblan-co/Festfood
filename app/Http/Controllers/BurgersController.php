<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BurgersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $burgers = Product::orderBy('id','asc')->get();
        
        if (session()->get('myOrder') != null){
            $order = implode(',', session()->get('myOrder'));
            echo "<script>console.log('My Order: '+$order);</script>";
        }
        
        return view('burgers', compact('burgers'));
    }

    public function createOrder(Request $request){
        // If the product is already listed in the order, we must add the amount
        
        if (session()->get('myOrder') != null){        
            
            
            echo "<script>console.log('YA EXISTE UNA ORDEN');</script>";
        

            $productOnOrder = $this->searchProductId((session()->get('myOrder')), ($request->burger_id)); // array_search("'product_id': $request->burger_id", session()->get('myOrder'));
            
            echo "<script>console.log('DESPUES DE SEARCH');</script>";
            echo "<script>console.log('DENTRO'$productOnOrder);</script>";

            if ($productOnOrder == sizeof(session()->get('myOrder'))){
            
            
                echo "<script>console.log('ILLO YA TIENES BORGUEZAS '+$productOnOrder);</script>";
        

                //Probably won't work
                $nProduct = session()->get('myOrder')[$productOnOrder]->burger_amount;
                session()->get('myOrder')[$productOnOrder]->burger_amount = $nProduct + $request->burger_amount;
            }  
            else{
                $this->addProduct($request->burger_id, $request->burger_amount);
            }
        }
        else{
            $this->addProduct($request->burger_id, $request->burger_amount);
        }

        return redirect()->route('burgers');
    }

    private function addProduct($bgId, $bgAmount){
        $product = new Order;
        $product->user_id = Auth::user()->id;
        $product->product_id = $bgId;
        $product->amount = $bgAmount;
        session()->push("myOrder", $product);
    }

    private function searchProductId($array, $id){
        $i = 0;
        $found = false;

        do{
            echo "<script>console.log('ME ATASCO AQUÍ :(');</script>";
            $iddd = $array[$i]["product_id"];
            echo "<script>console.log('entro al while'$iddd);</script>";
            if ($array[$i]["product_id"] == $id){
                $found = true;
            }
            $i++;
        }while(!$found && $i < sizeof($array));

        echo "<script>console.log('DENTRO'$i);</script>";
        return $i-1;
    }
}