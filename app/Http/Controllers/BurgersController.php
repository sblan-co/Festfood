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
        if(Auth::user()){            
            if (session()->get('myOrder') != null){                
                $currentOrder = session()->get('myOrder');
                $productOnOrder = $this->searchProductId($currentOrder, $request->burger_id); 

                if ($productOnOrder != -1){        
                    $nProduct = session()->get('myOrder')[$productOnOrder]->amount;
                    session()->get('myOrder')[$productOnOrder]->amount = $nProduct + $request->burger_amount;

                    $priceProduct = session()->get('myOrder')[$productOnOrder]->price;
                    session()->get('myOrder')[$productOnOrder]->price = $priceProduct + $request->burger_price;

                }  
                else{
                    $this->addProduct($request->burger_id, $request->burger_name, $request->burger_amount, $request->burger_price);
                }
            }
            else{
                $this->addProduct($request->burger_id, $request->burger_name, $request->burger_amount, $request->burger_price);
            }
        }
        else{            
            session()->put("orderError", 'You must be a user to make an order. Log In or Register now! 😊 ');
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
    }

    private function searchProductId($array, $id){
        $i = 0;
        $found = false;

        do{
            if ($array[$i]["product_id"] == $id){
                $found = true;
            }
            $i++;
        }while(!$found && $i < sizeof($array));

        if ($found){
            $i--;
        } else {
            $i = -1;
        }

        return $i;
    }
}