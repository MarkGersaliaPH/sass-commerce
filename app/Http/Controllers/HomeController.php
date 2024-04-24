<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;

class HomeController extends Controller
{
    //

    public function index()
    {
        $data['popular_items'] = Product::All();
        $data['featured_stores'] = Store::All();

        return view('home', $data);
    }
}
