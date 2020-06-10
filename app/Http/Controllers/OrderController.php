<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // Almacenar ordene en DB
        // Retrieve latest id registered as ltId
        // $ltId = ;
        
        session()->forget('myOrder');
        session()->put("info", 'Order succesfully placed. It will be ready in 10 min.');
        return view('welcome');
    }
}