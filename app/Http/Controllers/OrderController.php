<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // echo "<script>console.log('INDEX DE ORDER');</script>";
        return view('order');
    }

    public function storeOrder(Request $request)
    {
        $i = 0;
        $ltId = 1;
        $burgers = session()->get('myOrder');

        do{
            $newOrder = new Order();
            $newOrder->user_id = Auth::user()->id;
            $newOrder->product_id = $burgers[$i]->product_id;
            $newOrder->amount = $burgers[$i]->amount;

            $newOrder->save();

            $i++;
        }while($i < sizeof($burgers));
        
        session()->forget('myOrder');
        session()->put("info", 'Order succesfully placed. It will be ready in 10 min.');
        return view('welcome');
    }
}