<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('katalog.index',[
            'product' => $products
        ]);
    }
}
