<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customizes extends Model
{
    //
    protected $table='customizes';
    protected $primaryKey = 'id';
    protected $fillable=['pendiente','enviado','confirmado','tipo','user_id'];
}
