<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductPhotos extends Model
{
    use Notifiable;
    
    protected $table='ProductPhotos';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path'
    ];

    public function photo(){
        
        return $this->belongsTo('App\Product');
    }
    

}
