<?php 
// Get CMS Language
if (Session::get('cms_language_code')=='') {
    Session::put('cms_language_code', 'lt');
    Session::put('cms_language_id', 1);
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{c('cms-title')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        <!-- CSS Grid -->
        <link rel="stylesheet" href="{{ url('/grid.css') }}">

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

                    {{ Html::link('/cms', c('cms-title'), ['class'=>'gray']) }}

                    &nbsp;

                    {{ Html::link('/cms_tags',__('Tags'), ['class'=>'gray']) }}

                    &nbsp;

                    {{ Html::link('/cms_configs',__('Configs'), ['class'=>'gray']) }}

                    &nbsp;

                    {{ Html::link('/cms_users',__('Users'), ['class'=>'gray']) }}

                    &nbsp;
                    &nbsp;

                    <i class="fas fa-external-link-alt gray"></i> {!! Html::link('/',__('Website'), ['class'=>'gray', 'target'=>'_blank']) !!}
                    
                    <?php 
                    //
                    // Todo: Changing Language
                    //
                    /*
                    &nbsp;
                    &nbsp;

                    <i class="fas fa-globe-europe gray"></i>
                    
                    {{ Html::link('/set_cms_language?language=en', 'En', ['class'=>'gray']) }}

                    {{ Html::link('/set_cms_language?language=lt', 'Lt', ['class'=>'gray']) }}
                    */
                    ?>

                    <div style="float:right">

                        <a class="dropdown-item gray" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} <i class="fas fa-sign-out-alt gray"></i>
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
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 gray:bg-gray-900 sm:items-center sm:pt-0">
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
                            <div><a href="{{ url('/cms_bits?tag_id='.$tag->id) }}" class="black">{{ $tag->name }}</a></div>
                            <?php 
                            $childs = DB::table('tags')->where('parent_id', $tag->id)->orderBy('position', 'asc')->get();
                            ?>
                            @if (!empty($childs[0]))
                                @foreach ($childs as $child)
                                    <div style="padding-left:1rem;">
                                        <a href="{{ url('/cms_bits?tag_id='.$child->id) }}" class="black">
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
            return confirm("Ar tikrai norite trinti?");
        });
    </script>

    </body>
</html>
