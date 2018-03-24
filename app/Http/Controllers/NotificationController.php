<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
     public function addNotification(Request $request)
    {
         
        try
        {
            $notification = new Notification();
            $notification->type = $request->type;
            $notification->about = $request->about;
            $notification->content = $request->content;
            
            if($notification->save())
            {
                return response()->json(["status" => "success", "response" => $notification]);    
            }    
        }
        catch(Exception $e)
        {
            
            return response()->json(["status" => "failed", "error" => "Notification wasn't saved"]);
        }

    }
    
    public function getAllNotifications()
    {
        return response()->json(Notification::all());
    }
    
    public function getNotificationById($id)
    {
        return response()->json(Notification::findOrFail($id));
    }
    
    public function deleteNotification($id)
    {
        
        try
        {
            Notification::findOrFail($id)->delete();
            return response()->json(["status" => "success", "response" => "Notification deleted"]);
        }
        catch(ModelNotFoundException $ex)
        {
            return response()->json(["status" => "failed", "error" => "Can't find notification with this id"]);
        }
    }
}
