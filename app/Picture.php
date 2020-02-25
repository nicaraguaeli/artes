<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
    protected $table='pictures';
    protected $primaryKey = 'id';
    protected $fillable=['imagen'];
    public $timestamps=false;
    
    public function products()
    {
        
        return $this->belongsToMany(Product::class);
    }
}
