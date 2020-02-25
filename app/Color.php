<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table = 'colors';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre_c'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

