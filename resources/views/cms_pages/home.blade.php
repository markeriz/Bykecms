@extends('layouts.cms')

@section('content')

   <h1>{{__('Home')}}</h1>
   <p> 
      {{__('Welcome to Content Management System')}} {{c('cms-title')}}.
   </p>
   <p>
      <b>{{__('Your website contains')}}:</b>
      <br/>
      {{__('Bits')}}: <?php echo DB::table('bits')->count();?>
      <br/>
      {{__('Photos')}}: <?php echo DB::table('photos')->count();?>
      <br/>
      {{__('Configurations')}}: <?php echo DB::table('configs')->count();?>
      <br/>
      {{__('Tags')}}: <?php echo DB::table('tags')->count();?>
   </p>
@stop
