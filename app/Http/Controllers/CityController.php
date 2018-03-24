<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
     public function addCity(Request $request)
    {
         
        try
        {
            $city = new City();
            $city->name= $request->name;
            $city->tax = $request->tax;
            $city->shippingCost = $request->shippingCost;
            
            if($city->save())
            {
                return response()->json(["status" => "success", "response" => $city]);    
            }    
        }
        catch(Exception $e)
        {
            
            return response()->json(["status" => "failed", "error" => "City wasn't saved"]);
        }

    }
    
    public function getAllCities()
    {
        return response()->json(City::all());
    }
    
    public function getCityById($id)
    {
        return response()->json(City::findOrFail($id));
    }
    
    public function deleteCity($id)
    {
        
        try
        {
            City::findOrFail($id)->delete();
            return response()->json(["status" => "success", "response" => "City deleted"]);
        }
        catch(ModelNotFoundException $ex)
        {
            return response()->json(["status" => "failed", "error" => "Can't find city with this id"]);
        }
    }
}
