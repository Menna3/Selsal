<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
use Notifiable;
    
    protected $table='Product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' , 'description' , 'qty' , 'price' , 'rate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    
    public function photos()
    {
        return $this->hasMany('App\ProductPhotos');
    }
    
    public function orders()
    {
        
        return $this->belongsToMany('App\Order');
    }
    
    public function carts(){
        
        return $this->belongsToMany('App\Cart');
    }
}
