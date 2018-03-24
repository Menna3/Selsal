<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;
    
    protected $table='Customer';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname' , 'lname' , 'type' , 'email' , 'password' , 'country' , 'city' , 'address' , 'phone', 'points'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token'];
    
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
    
    public function notifications(){
        
        return $this->belongsToMany('App\Notification');
    }
}
        
        
