<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
    
        if ($products->isEmpty()) {
            return response()->json(['data' => $products, 
                'HttpStatus' => 400]);
        }
    
        return response()->json(['data' => $products, 
            'HttpStatus' => 200]);
    }

    public function getProductsbyName($name){
        $products = Product::where('name', 'like', '%' . $name . '%') ->get();

        if ($products->isEmpty()) {
            return response()->json(['data' => $products, 
                'HttpStatus' => 400]);
        }
    
        return response()->json(['data' => $products, 
            'HttpStatus' => 200]);
    }


    /*
        {
            "name": "producto1",
            "value":1
        }
    */

    public function postProduct(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'value' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['HttpStatus' => 400]);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->value = $request->value;

        if(Product::where('name', $product->name)->first()){
            return response()->json([ 'HttpStatus' => 409]);
        }
        $product->save();

        return response()->json([ 'HttpStatus' => 201]);
    }


    public function putProduct($id, Request $request){

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['HttpStatus' => 400]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'value' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['HttpStatus' => 400]);
        }

        $product->name = $request->name;
        $product->value = $request->value;
        $product->save();

        if(Product::where('name', $product->name)->first()){
            return response()->json([ 'HttpStatus' => 409]);
        }

        return response()->json(['HttpStatus' => 200]);
    }

    public function deleteProduct($id){
        $product = Product::find($id);

        if ($product === null) {
           return response()->json(['HttpStatus' => 400]);
        }

        $product -> delete();
        return response()->json(['HttpStatus' => 200]);
         
    }



}
