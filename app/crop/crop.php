<?php

namespace App\Crop;
use Image;
class Crop

{
  function cortador($image, $rut, $ancho, $tiempo)
  {
     
    
     
     $imagen = Image::make($image);
     
     $ruta = $rut;

     

     $imagen->resize($ancho, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
}); 
        $imagen->save($ruta.$tiempo);     

  			
  }

  
     
}