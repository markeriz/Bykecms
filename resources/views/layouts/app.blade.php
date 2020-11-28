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

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script> 
        $( document ).ready(function() {
            $(".fas.fa-bars").click(function(){
            $(".top-menu-mobile-nav").slideToggle();
            });
        });
        </script>

    </head>
    <body class="antialiased">
        
        <div class="container top-menu">
            <div class="row"> 
                <div class="col-sm-3 col-xs-8"> 
                    <a href="{{ url('/') }}">
                        <span style="font-size:110%; font-weight:400; color:red;">{{c('web-title')}}</span>
                    </a>
                </div>
                <div class="col-sm-9 hide-sm-down" style="text-align:right;"> 
                        <?php 
                        $navigation_tags = DB::table('tags')->where([['parent_id', NULL], ['status', 1]])->orderBy('position', 'asc')->get();
                        ?>
                        @foreach ($navigation_tags as $tag)
                            &nbsp;&nbsp;<a href="{{ url('/'.$tag->slug) }}">{{ $tag->name }}</a>
                        @endforeach
                </div>
                <div class="top-menu-mobile col-xs-4 hide-md-up">
                    <i class="fas fa-bars" id="toggle"></i>
                    
                </div>
                
            </div>
            <div class="top-menu-mobile-nav">
                @foreach ($navigation_tags as $tag)
                    <a href="{{ url('/'.$tag->slug) }}">{{ $tag->name }}</a>
                    <br/>
                @endforeach
            </div>
        </div>

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
