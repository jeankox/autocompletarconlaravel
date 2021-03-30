<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function products(){
        return view('products');
    }

    public function getProducts(Request $request){
        $search = $request->search;

        $products = Products::orderby('name','asc')->where('name','like','%'.$search . '%')->limit(5)->get();

        $response=array();

        foreach ($products as $product){
            $response[]= array("label"=>$product->name);
        }

        return response()->json($response);
      
    }

}
