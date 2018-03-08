<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomerController extends Controller
{
    public function addCustomer(Request $request)
    {
         
        try
        {
            $customer = new Customer();
            $customer->fname= $request->fname;
            $customer->lname = $request->lname;
            $customer->type = $request->type;
            $customer->email= $request->email;
            $customer->password = $request->password;
            $customer->country = $request->country;
            $customer->city = $request->city;
            $customer->address= $request->address;
            $customer->phone = $request->phone;
            $customer->points= $request->points	;


            if($customer->save())
            {
                return response()->json(["status" => "success", "response" => $customer]);    
            }    
        }
        catch(Exception $e)
        {
            
            return response()->json(["status" => "failed", "error" => "Customer wasn't saved"]);
        }

    }
    
    public function getAllCustomers()
    {
        return response()->json(Customer::all());
    }
    
    public function getCustomerById($id)
    {
        return response()->json(Customer::findOrFail($id));
    }
    
    public function deleteCustomer($id)
    {
        
        try
        {
            Customer::findOrFail($id)->delete();
            return response()->json(["status" => "success", "response" => "Customer deleted"]);
        }
        catch(ModelNotFoundException $ex)
        {
            return response()->json(["status" => "failed", "error" => "Can't find customer with this id"]);
        }
    }
}
