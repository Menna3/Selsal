<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
    
    public function addOrder(Request $request)
    {
         
        try
        {
            $order = new Order();
           $order ->orderNumber = $request->orderNumber;
            $order ->	orderDate = $request->orderDate;
            $order ->status = $request->status;
            $order ->paymentMethod	 = $request->paymentMethod	;
            $order ->tax = $request->tax; 
            $order ->shippingCost = $request->shippingCost; 
            $order ->shippingDate = $request->shippingDate; 
            $order ->totalPrice = $request->totalPrice; 
            $order ->notes = $request->notes; 
         
            
            if($order ->save())
            {
                return response()->json(["status" => "success", "response" => $order ]);    
            }    
        }
        catch(Exception $e)
        {
            
            return response()->json(["status" => "failed", "error" => "Order wasn't saved"]);
        }

    }
    
    public function getAllOrders()
    {
        return response()->json(Order::all());
    }
    
    public function getOrderById($id)
    {
        return response()->json(Order::findOrFail($id));
    }
    public function deleteOrder($id)
    {
        
        try
        {
            Order::findOrFail($id)->delete();
            return response()->json(["status" => "success", "response" => "order deleted"]);
        }
        catch(ModelNotFoundException $ex)
        {
            return response()->json(["status" => "failed", "error" => "Can't find order with this id"]);
        }
    }
    
    
    
    public function updateOrder($id, Request $request)
   {
       try
        {
            $order = Order::findOrFail($id);
           $order ->orderNumber = $request->orderNumber;
            $order ->	orderDate = $request->orderDate;
            $order ->status = $request->status;
            $order ->paymentMethod	 = $request->paymentMethod	;
            $order ->tax = $request->tax; 
            $order ->shippingCost = $request->shippingCost; 
            $order ->shippingDate = $request->shippingDate; 
            $order ->totalPrice = $request->totalPrice; 
            $order ->notes = $request->notes;
            $order->save();
            
            return response()->json(["status" => "success", "response" => "order updated"]);
        }
        catch(ModelNotFoundException $ex)
        {
            return response()->json(["status" => "failed", "error" => "Can't find order with this id"]);
        }
    
   }
}
