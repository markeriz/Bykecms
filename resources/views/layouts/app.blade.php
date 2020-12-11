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
        <link rel="stylesheet" href="{{ url('/custom.css') }}">

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
    <body class="antialiased">
        
        <div class="container top-menu">
            <div class="row"> 
                <div class="col-sm-3 col-xs-8"> 
                    <a href="{{ url('/') }}">
                        <span style="font-size:110%; font-weight:400; color:#E20070;">{{c('web-title')}}</span>
                    </a>
                </div>
                <div class="col-sm-9 hide-sm-down top-menu-right" style="text-align:right;"> 
                        <?php 
                        $navigation_tags = DB::table('tags')->where([['parent_id', NULL], ['status', 1]])->orderBy('position', 'asc')->get();
                        ?>
                        @foreach ($navigation_tags as $tag)
                            <?php 
                            $childs = DB::table('tags')->where('parent_id', $tag->id)->orderBy('position', 'asc')->get();
                            ?>
                            @if (!empty($childs[0]))
                                &nbsp;
                                <div class="dropdown">
                                    <a class="dropbtn">
                                        {{ $tag->name }}
                                    </a>
                                    <div class="dropdown-content">
                                        @foreach ($childs as $child)
                                            <a href="{{ url('/'.$child->slug) }}">{{ $child->name }}</a>
                                        @endforeach
                                    </div>
                                </div> 
                            @else 
                                &nbsp;&nbsp;<a href="{{ url('/'.$tag->slug) }}">{{ $tag->name }}</a>
                            @endif 
                        @endforeach
                </div>
                <div class="top-menu-mobile col-xs-4 hide-md-up">
                    <i class="fas fa-bars" id="toggle"></i>
                    
                </div>
                
            </div>
            <div class="hide-md-up">
                <div class="top-menu-mobile-nav">
                    @foreach ($navigation_tags as $tag)
                        
                        <?php 
                        $childs = DB::table('tags')->where('parent_id', $tag->id)->orderBy('position', 'asc')->get();
                        ?>
                        
                        @if (!empty($childs[0]))
                            {{ $tag->name }}
                             <br/>
                            @foreach ($childs as $child)
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('/'.$child->slug) }}">{{ $child->name }}</a>
                                <br/>
                            @endforeach 
                        @else 
                            <a href="{{ url('/'.$tag->slug) }}">{{ $tag->name }}</a>
                            <br/>
                        @endif
                            
                    @endforeach
                </div>
            </div>
        </div>

        @if(Request::is('/') or Request::is('home') or Request::is('contact'))
            <div class="container" style="max-width:1000px;">
                <img src="{{ url('/hero.jpg') }}" style="width:100%; border-radius:10px; margin-bottom:1rem;">
            </div>
        @endif

        <div class="container">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            @yield('content')

            <div style="clear:both;"></div>

        </div>

        <?php /* Render Query Area in Homepage, Contacts pages */ ?>
        @if(Request::is('/') or Request::is('home') or Request::is('contact'))
            @include('layouts.partials.fast_query')
        @endif 
        
        

        <div class="container" style="text-align:center">
            <hr/>
            <a href="https://Bykecms.com" target="_blank">Bykecms</a> Webstore Demo</a>
        </div>

        <div style="height:3rem"></div>

        {!! c('web-google-analytics') !!}

    </body>
</html>
