<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->
        <title>artesapp</title>
        
        <link type="text/css" rel="stylesheet" href="{{asset('css/app.css')}}"  >
        
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
       <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        
        

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      

     

    
        
        
        <!-- Styles -->
        <style>
            html, body {
                
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: auto;
                margin: 0;
                
            }

          
        </style>
        <script>
        function myFunction() {
   
   var element = document.getElementById("aside-menu");  
   
   element.classList.toggle("on");
   $(document).ready(function(){
    

  });
   
}
    </script>

    </head>
    <body>
      
       
       
            
             @yield('main')
      

    
    
     
    </body>
</html>
