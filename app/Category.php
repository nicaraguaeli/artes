<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='categories';
    protected $primaryKey = 'id';
    protected $fillable=['nombre','estado'];
    public $timestamps=false;

    public function genders()
    {
        return $this->belongsToMany(Gender::class)->withPivot('id','imagen','descripcion','estado');
    }
}
