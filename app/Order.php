<?php

namespace App;
use App\Events\OrderShipped;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = ['pendiente','enviado','confirmado','tipo','user_id','store_id'

    ];

    protected $dispatchesEvents = [
        'updated' => OrderShipped::class,
       
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('id','cantidad','precio','talla','color');
    }
}
