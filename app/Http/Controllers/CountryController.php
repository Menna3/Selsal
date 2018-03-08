<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
class CountryController extends Controller
{
    
    public function addCountry(Request $request)
    {
         
        try
        {
            $country = new Country();
            $country->name = $request->name;
           
            if($country->save())
            {
                return response()->json(["status" => "success", "response" => $country]);    
            }    
        }
        catch(Exception $e)
        {
            
            return response()->json(["status" => "failed", "error" => "country wasn't saved"]);
        }

    }
    
    public function getAllCountries()
    {
        return response()->json(Country::all());
    }
    
    public function getCountryById($id)
    {
        return response()->json(Country::findOrFail($id));
    }
     public function deleteCountry($id)
    {
        
        try
        {
            Country::findOrFail($id)->delete();
            return response()->json(["status" => "success", "response" => "Country deleted"]);
        }
        catch(ModelNotFoundException $ex)
        {
            return response()->json(["status" => "failed", "error" => "Can't find Country with this id"]);
        }
    }
    
}
