@extends('layouts.cms')

@section('content')

    @if (!empty($cms_tag)) 
        <h1>{{__('Tag')}}: {{$cms_tag->name}} <a class="btn" href="{{ route('cms_tags.create') }}">{{__('Create Tag')}}</a>  </h1>
    @else 
        <h1>{{__('Tags')}} <a class="btn" href="{{ route('cms_tags.create') }}">{{__('Create Tag')}}</a>  </h1>
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
                                * {{__('Set as homepage')}}
                            @endif
                            @if ($cms_tag->status == 0 )
                                <br/>
                                * {{__('Set Active')}}
                            @endif
                            {!! Form::hidden("tags[$cms_tag->id]", $cms_tag->id) !!}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('cms_tags.edit',$cms_tag->id) }}">{{__('Edit')}}</a>
                            <a class="btn btn-primary" href="{{ url('/cms_tag_delete/'.$cms_tag->id) }}" onclick="return confirm('{{__('Do you really want to delete?')}}')">{{__('Delete')}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <p> 
                * {{__('Click on the name and drag to a position you want')}}.
            </p>
            
            <button class="btn btn-black"><i class="fas fa-sync-alt"></i> {{__('Save changed positions')}}</button>

        {!! Form::close() !!}

    @else 
        <p> 
            {{__('Nothing to show yet')}}.
        </p>
    @endif



@endsection