<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{

    
    use Notifiable;
    
    protected $table='Order';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderNumber' , 'orderDate' , 'status', 'paymentMethod' , 'tax' , 'shippingCost' , 'shippingDate' , 'totalPrice' , 'notes'
    ];


    public function order(){
        
        return $this->belongsTo('App\Customer');
    }
    
    public function order(){
        
        return $this->belongsTo('App\User');
    }
    
    public function order(){
        
        return $this->belongsTo('App\Shipper');
    }
    
    public function order(){
        
        return $this->belongsTo('App\City');
    }
    
}
