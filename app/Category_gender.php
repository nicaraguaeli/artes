<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_gender extends Model
{
    //
    protected $table='category_gender';
    protected $primaryKey = 'id';
    protected $fillable=['imagen','descripcion','estado','category_id','gender_id'];
    public $timestamps=false;
}
