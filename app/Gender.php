<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    //
    protected $table='genders';
    protected $primaryKey = 'id';
    protected $fillable=['gender'];
    public $timestamps=false;

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('id','imagen','descripcion','estado');
    }
}
