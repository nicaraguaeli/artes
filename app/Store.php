<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //

	protected $table = 'stores';
    protected $primaryKey = 'id';

    protected $fillable = ['ubicacion','estado','user_id'];

    

}
