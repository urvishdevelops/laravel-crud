<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   public function index()
   {
      $products = Product::get();

      return view('products.index', ['products' => $products]);
   }
   public function create()
   {
      return view('products.create');
   }
   public function storeProduct(Request $request)
   {
      // Validate data

      $request->validate([
         'name' => 'required',
         'description' => 'required',
         'image' => 'required'
      ]);



      $file = $request->file('image')->extension();

      $imageName = time() . '.' . $file;


      $request->file('image')->move(public_path("products"), $imageName);

      $product = new Product;

      $product->image = $imageName;

      $product->name = $request->name;

      $product->description = $request->description;

      $product->save();

      return redirect()->route('products.index')->with(['message'=> 'Product inserted successfully!']);
   }

   public function edit($id)
   {
      $product = Product::where('id', $id)->first();
      return view('products.edit', ['product' => $product]);
   }
   public function update(request $request, $id)
   {

      // Validate data

      $request->validate([
         'name' => 'required',
         'description' => 'required',
         'image' => 'nullable'
      ]);

      $product = Product::where('id', $id)->first();

      if (isset($request->image)) {
         $file = $request->file('image')->extension();
         $imageName = time() . '.' . $file;
         $request->file('image')->move(public_path("products"), $imageName);
         $product->image = $imageName;
      }

      $product->name = $request->name;

      $product->description = $request->description;

      $product->save();

      // return back()->withSuccess('Product updated Successfully!!');
      return redirect()->route('products.index')->with(['message' => 'Product updated Successfully!!']);
   }


   public function destroy($id)
   {
      $product = Product::find($id);

      if ($id != null) {
         $product->delete();
         return redirect()->route('products.index')->with(['message' => 'Product Deleted!!']);
      } else {
         return redirect()->route('products.index')->with(['message' => 'Product Deleted!!']);
      }
   }
}