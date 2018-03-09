<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Review extends Model
{
    use Notifiable;
    
    protected $table='Review';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description' 
    ];

    public function review(){
        
        return $this->belongsTo('App\Customer');
    }
    
    public function review(){
        
        return $this->belongsTo('App\Product');
    }
}
