@extends('layouts.cms')

@section('content')

   <h1>Pradžia</h1>
   <p> 
      Sveiki atvykę į interneto svetainės valdymo erdvę.
   </p>
   <p>
      <b>Svetainės techniniai duomenys:</b>
      <br/>
      Įrašų: <?php echo DB::table('bits')->count();?>
      <br/>
      Nuotraukų: <?php echo DB::table('photos')->count();?>
      <br/>
      Nustatymų: <?php echo DB::table('configs')->count();?>
      <br/>
      Žymės: <?php echo DB::table('tags')->count();?>
   </p>

   <p> 
      <label>Specifinis duomenų atvaizdavimas:</label> 
      {{ Html::link('/cms_bits','Visų įrašų sąrašas') }}
@stop
