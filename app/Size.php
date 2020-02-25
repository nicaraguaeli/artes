<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    protected $table = 'sizes';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre_s','sizes'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
