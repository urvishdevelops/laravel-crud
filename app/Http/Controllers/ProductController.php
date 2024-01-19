<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   function index(){
    return view('products.index');
   }
   function create(){
    return view('products.create');
   }
   function storeProduct(Request $request){
        dd($request->all());
   }
}
