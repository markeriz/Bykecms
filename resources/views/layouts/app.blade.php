<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>byBO design&reg;</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap" rel="stylesheet">


        <link rel="stylesheet" href="{{ url('/flexboxgrid.css') }}">

        <link rel="stylesheet" href="{{ url('/app.css') }}">

    </head>
    <body class="antialiased">
        <?php 
        //dd(Session::get('bits'));
        ?>
        <script
			  src="https://code.jquery.com/jquery-1.12.4.min.js"
			  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
              crossorigin="anonymous"></script>
              

        <div class="container top-menu">
            <div style="height:1rem"></div>
            <div class="row"> 
                <div class="col-md-3"> 
                    <a href="{{ url('/') }}">
                        <img src="{{ url('/logo.png') }}" style="width:150px;">
                    </a>
                </div>
                <div class="col-md-9" style="text-align:right;"> 
                        <?php 
                        $navigation_tags = DB::table('tags')->where([['parent_id', NULL], ['status', 1]])->orderBy('position', 'asc')->get();
                        ?>
                        @foreach ($navigation_tags as $tag)
                            &nbsp;&nbsp;<a href="{{ url('/'.$tag->slug) }}">{{ $tag->name }}</a>
                        @endforeach
                </div>
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

        <script>
        $(".delete").on("submit", function(){
            return confirm('{{__('Do you really want to delete?')}}');
        });
    </script>

    </body>
</html>
