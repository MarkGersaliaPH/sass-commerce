<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\Transaction;

class HomeController extends Controller
{
    //

    public function index()
    {
        $data['popular_items'] = Product::All();
        $data['featured_stores'] = Store::All();

        $order = Transaction::with('orders')->find(1);  
        return view('home', $data);
    }
}
