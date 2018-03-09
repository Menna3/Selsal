<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    use Notifiable;
    
    protected $table='Cart';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'active' , 'expiryDate'
    ];

    public function cart(){
        
        return $this->belongsTo('App\Customer');
    }
}
