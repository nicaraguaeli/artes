<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable=['codigo','nombre','precio','descripcion','materiales','estado','category_gender_id','size_id'];


     public function pictures()
    {
        return $this->belongsToMany(Picture::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('id','cantidad','precio','talla','color');
    }

    
}

