@extends('layouts.cms')

@section('content')

    @if (!empty($cms_tag)) 
        <h1>Žymė: {{$cms_tag->name}} <a class="btn" href="{{ route('cms_tags.create') }}">Kurti žymę</a>  </h1>
    @else 
        <h1>Žymės <a class="btn" href="{{ route('cms_tags.create') }}">Kurti žymę</a>  </h1>
    @endif 

    

    @include('_partials.sortable_js')

    @if (!empty($cms_tags[0]))
        {!! Form::open(['url'=>'cms_tag_positions', 'method'=>'post']) !!}
            
            <table id="sort" class="table table-bordered">
                <tbody>
                @foreach ($cms_tags as $cms_tag)

                    @if ($cms_tag->status == 0 )
                        <tr style="background:rgb(230,230,230);">
                    @else 
                        <tr> 
                    @endif
                        <td>
                            <?php 
                            $childs = DB::table('tags')->where('parent_id', $cms_tag->id)->count();
                            ?>
                            @if ($childs > 0 )
                                <a href="{{ url('/cms_tags?parent_id='.$cms_tag->id) }}"><b>{{ $cms_tag->name }} ({{$childs}})</b></a>
                            @else 
                                <b>{{ $cms_tag->name }}</b>
                            @endif
                            @if ($cms_tag->home > 0 )
                                <br/>
                                * pradinė žymė 
                            @endif
                            @if ($cms_tag->status == 0 )
                                <br/>
                                * žymė neaktyvi
                            @endif
                            {!! Form::hidden("tags[$cms_tag->id]", $cms_tag->id) !!}
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('cms_tags.show',$cms_tag->id) }}">Rodyti</a>
                            <a class="btn btn-primary" href="{{ route('cms_tags.edit',$cms_tag->id) }}">Redaguoti</a>
                            <a class="btn btn-primary" href="{{ url('/cms_tag_delete/'.$cms_tag->id) }}" onclick="return confirm('Ar tikrai norite trinti?')">Trinti</a>
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
            Žymių nėra. Spauskite "Kurti žymę".
        </p>
    @endif



@endsection