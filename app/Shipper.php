<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shipper extends Model
{
    use Notifiable;
    
    protected $table='Shipper';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' , 'phone'  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'];
    
    public function orders()
    {
        return $this->hasMany('App\Orders');
    }
}
