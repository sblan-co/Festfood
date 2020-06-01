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
            
            
            // echo "<script>console.log('YA EXISTE UNA ORDEN');</script>";
        
            $currentOrder = session()->get('myOrder');
            $productOnOrder = $this->searchProductId($currentOrder, $request->burger_id); // array_search("'product_id': $request->burger_id", session()->get('myOrder'));
            
            // echo "<script>console.log('DESPUES DE SEARCH');</script>";
            // echo "<script>console.log('ELEMENTO Nº   '+$productOnOrder);</script>";

            if ($productOnOrder != -1){
                // echo "<script>console.log('ILLO YA TIENES BORGUEZAS '+$productOnOrder);</script>";
        
                $nProduct = session()->get('myOrder')[$productOnOrder]->amount;
                session()->get('myOrder')[$productOnOrder]->amount = $nProduct + $request->burger_amount;
            }  
            else{
                $this->addProduct($request->burger_id, $request->burger_name, $request->burger_amount, $request->burger_price);
            }
        }
        else{
            $this->addProduct($request->burger_id, $request->burger_name, $request->burger_amount, $request->burger_price);
        }

        return redirect()->route('burgers');
    }

    private function addProduct($bgId, $bgName, $bgAmount, $bgPrice){
        $product = new Order;
        $product->user_id = Auth::user()->id;
        $product->product_id = $bgId;
        $product->name = $bgName;
        $product->price = $bgPrice*$bgAmount;
        $product->amount = $bgAmount;
        session()->push("myOrder", $product);
        // echo "<script>console.log('CURRENT BURGER '+JSON.stringify($product));</script>";
    }

    private function searchProductId($array, $id){
        $i = 0;
        $found = false;

        $tam = sizeof($array);

        // echo "<script>console.log('tamaño del array'+$tam);</script>";

        do{
            // $iddd = $array[$i]["product_id"];
            // echo "<script>console.log('entro al while'+$i);</script>";
            // echo "<script>console.log('busco a'+$iddd);</script>";
            if ($array[$i]["product_id"] == $id){
                // echo "<script>console.log('LO ENCUENTRA');</script>";
                $found = true;
            }
            $i++;
        }while(!$found && $i < sizeof($array));

        if ($found){
            $i--;
        } else {
            $i = -1;
        }

        // echo "<script>console.log('DENTRO'+$i);</script>";
        return $i;
    }
}