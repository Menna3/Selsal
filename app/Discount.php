<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Discount extends Model
{
    use Notifiable;
    
    protected $table='Discount';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type' , 'currentPercentage'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'];
    
        public function orders(){
        
        return $this->belongsToMany('App\Order');
    }
    

}
