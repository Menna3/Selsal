<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;
    
    protected $table='Category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categoryName', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];
    
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
