<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Category;

class CategoryController extends Controller
{
     public function addCategory(Request $request)
    {
         
        try
        {
            $category = new Category();
            $category->categoryName = $request->categoryName;
            $category->description = $request->description;
            $category->photo = $request->photo;
            if($category->save())
            {
                return response()->json(["status" => "success", "response" => $category]);    
            }    
        }
        catch(Exception $e)
        {
            
            return response()->json(["status" => "failed", "error" => "Category wasn't saved"]);
        }

    }
    
    public function getAllCategories()
    {
        return response()->json(Category::all());
    }
    
    public function getCategoryById($id)
    {
        return response()->json(Category::findOrFail($id));
    }
    
    public function deleteCategory($id)
    {
        
        try
        {
            Category::findOrFail($id)->delete();
            return response()->json(["status" => "success", "response" => "Category deleted"]);
        }
        catch(ModelNotFoundException $ex)
        {
            return response()->json(["status" => "failed", "error" => "Can't find category with this id"]);
        }
    }
    
}
