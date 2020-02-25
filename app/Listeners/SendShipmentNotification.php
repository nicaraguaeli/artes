<?php

namespace App\Listeners;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviaCorreo;
use Auth;

class SendShipmentNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle()
    {
        //
        if(Auth::user()->rol =='tienda')
        {
             $to_name = 'artesApp';
        $to_email = 'moncadaeli567@gmail.com';
        $data = array('name'=>Auth::user()->name, 'body' => 'Hola Gabriel Sevilla','tel'=>Auth::user()->telefono);

  Mail::send('emails.orders.shipped', $data, function($message) use ($to_name, $to_email) {$message->to($to_email, $to_name)->subject('Tienes un pedido');$message->from(Auth::user()->email,Auth::user()->name);});
        }

         if(Auth::user()->rol =='cliente')
        {
        $to_name = 'artesApp';
        $to_email = 'digitalmedianicaragua@gmail.com';
        $data = array('name'=>Auth::user()->name, 'body' => 'Hola Gabriel Sevilla','tel'=>Auth::user()->telefono);

  Mail::send('emails.orders.shipped', $data, function($message) use ($to_name, $to_email) {$message->to($to_email, $to_name)->subject('Tienes un pedido');
    $message->from(Auth::user()->email,Auth::user()->name);

});
        }

    }

       
}
