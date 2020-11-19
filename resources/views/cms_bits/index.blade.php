@extends('layouts.cms')

@section('content')

    @if (!empty($cms_tag))
        <h1>{{ $cms_tag->name }} <a class="btn" href="{{ route('cms_bits.create', ['tag_id'=>$cms_tag->id]) }}">Kurti blokelį</a></h1>
    @elseif (!empty($parent_cms_bit))
        <h1>{{ $parent_cms_bit->name }} <a class="btn" href="{{ route('cms_bits.create', ['parent_id'=>$parent_cms_bit->id]) }}">Kurti blokelį</a></h1>
    @endif    
    
    @if (!empty($cms_bits[0]))

        @include('_partials.sortable_js')

        {!! Form::open(['url'=>'cms_bit_positions', 'method'=>'post']) !!}
            
            <table  id="sort" class="table table-bordered">
                <tbody>
                    @foreach ($cms_bits as $cms_bit)
                        <tr>
                            <td>
                                {{ $cms_bit->name }}
                                @if ($cms_bit->bit_type_id==2)
                                    <span style="font-size:100%"><i class="fas fa-shopping-basket"></i></span>
                                @endif
                                <p>
                                    @foreach($cms_bit->cms_photos as $photo)
                                        <img src="{{ url('/nuotraukos/'.$photo->id.'/'.$photo->filename) }}" style="height:30px; opacity:0.5">
                                    @endforeach
                                </p>
                                {!! Form::hidden("bits[$cms_bit->id]", $cms_bit->id) !!}
                            </td>
                            <td>
                                <?php /* <a class="btn btn-info" href="{{ route('cms_bits.show',$cms_bit->id) }}">Rodyti</a> */ ?>
                                <?php 
                                $childs = \App\Models\CmsBit::where('parent_id', $cms_bit->id)->count();
                                ?>
                                <a class="btn btn-primary" href="{{ url('/cms_bits?parent_id='.$cms_bit->id) }}">Blokelių viduje ({{$childs}})</a>
                                <a class="btn btn-primary" href="{{ route('cms_bits.edit',$cms_bit->id) }}">Redaguoti</a>
                                <a class="btn btn-primary" href="{{ url('/cms_bit_delete/'.$cms_bit->id) }}" onclick="return confirm('Ar tikrai norite trinti?')">Trinti</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {!! Form::submit('Išsaugoti naują rikiavimą', array('class'=>'btn btn-primary')) !!}

            <p> 
                * Spauskite ant pavadinimo ir laikydami tempkite norėdami pakeisti rikiavimą.
            </p>

        {!! Form::close() !!}

    @else 
        <p> 
            Blokelių nėra. Spauskite "Kurti blokelį".
        </p>
    @endif

@endsection