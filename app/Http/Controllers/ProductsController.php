<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Product;

class ProductsController extends Controller
{
    public function getProducts(){
        $products = Product::all();
        // dd($products)''
        return view('products.index', compact('products'));
    }

    public function getProductsDetail($id){
        $products = Product::find($id);
        return view('products.detail', compact('products'));
    }
}
