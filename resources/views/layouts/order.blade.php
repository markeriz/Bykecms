<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{c('web-title')}}</title>

        <!-- Fonts, external -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        <!-- grid, style -->
        <link rel="stylesheet" href="{{ url('/grid.css') }}">
        <link rel="stylesheet" href="{{ url('/app.css') }}">

        <?php /* <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> */ ?>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

        <script> 
        $( document ).ready(function() {
            $(".fas.fa-bars").click(function(){
            $(".top-menu-mobile-nav").slideToggle();
            });
        });
        </script>

    </head>
      
   <body>

      <div class="container">

      @if ($message = Session::get('success'))
         <div class="alert alert-success">
            {{ $message }}
         </div>
      @endif

      @yield('content')

      <div style="clear:both; height:3rem"></div>

      </div>

   </body>

</html>