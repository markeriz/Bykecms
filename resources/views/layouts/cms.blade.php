<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IBI CMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Font Awesome Icons --> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        
        <!-- FlexBoxGrid -->
        <link rel="stylesheet" href="{{ url('/flexboxgrid.css') }}">

        <!-- Cms CSS -->
        <link rel="stylesheet" href="{{ url('/cms.css') }}">

    </head>
    <body class="antialiased">
        <script
			  src="https://code.jquery.com/jquery-1.12.4.min.js"
			  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
              crossorigin="anonymous"></script>
              

        <div class="container">
            <div style="height:1rem"></div>
            <div class="row top-navigation"> 
                <div class="col-md-12"> 

                    {{ Html::link('/cms',__('Home')) }}

                    &nbsp;

                    {{ Html::link('/cms_tags',__('Tags')) }}

                    &nbsp;

                    {{ Html::link('/cms_configs',__('Configurations') ) }}

                    &nbsp;

                    {{ Html::link('/cms_users',__('Users')) }}

                    &nbsp;

                    {{ Html::link('/',__('Open Website').' &raquo;', ['target'=>'_blank']) }}

                    <div style="float:right">

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{__('Logout')}}
                        </a>

                    </div>

                    &nbsp;
                    
                    <?php
                    /* 
                    @if (Auth::check())
                        <i>{{ Auth::user()->name }}</i>
                    @endif
                    */
                    ?>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    
                </div>
            </div>
        </div>

        <?php 
        /*
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif

        </div>
        */
        ?>

        <div class="container">
            
            <div class="row "> 
                <div class="col-md-3 left-navigation">
                        <?php 
                        $navigation_tags = DB::table('tags')->where([['parent_id', NULL],['status', 1]])->orderBy('position', 'asc')->get();
                        ?>
                        @foreach ($navigation_tags as $tag)
                            <div><a href="{{ url('/cms_bits?tag_id='.$tag->id) }}">{{ $tag->name }}</a></div>
                            <?php 
                            $childs = DB::table('tags')->where('parent_id', $tag->id)->orderBy('position', 'asc')->get();
                            ?>
                            @if (!empty($childs[0]))
                                @foreach ($childs as $child)
                                    <div style="padding-left:1rem;">
                                        <a href="{{ url('/cms_bits?tag_id='.$child->id) }}">
                                            {{ $child->name }}
                                            
                                        </a>
                                    </div>
                                @endforeach
                            @endif

                        @endforeach
                </div>
                <div class="col-md-9 right-content">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>

        </div>
        <script>
        $(".delete").on("submit", function(){
            return confirm("{{__('Do you really want to delete?')}}");
        });
    </script>

    </body>
</html>
