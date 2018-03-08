<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
         
        try
        {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->qty = $request->qty;
            $product->rate = $request->rate;
            $product->price = $request->price; 
            if($product->save())
            {
                return response()->json(["status" => "success", "response" => $product]);    
            }    
        }
        catch(Exception $e)
        {
            
            return response()->json(["status" => "failed", "error" => "Product wasn't saved"]);
        }

    }
    
    public function getAllProducts()
    {
        return response()->json(Product::all());
    }
    
    public function getProductById($id)
    {
        return response()->json(Product::findOrFail($id));
    }
     public function deleteProduct($id)
    {
        
        try
        {
            Product::findOrFail($id)->delete();
            return response()->json(["status" => "success", "response" => "Product deleted"]);
        }
        catch(ModelNotFoundException $ex)
        {
            return response()->json(["status" => "failed", "error" => "Can't find product with this id"]);
        }
    }
    
    
}
