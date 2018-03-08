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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'];
    
}
