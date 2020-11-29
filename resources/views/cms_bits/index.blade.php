@extends('layouts.cms')

@section('content')

    @if (!empty($cms_tag))
        <h1>{{ $cms_tag->name }} <a class="btn" href="{{ route('cms_bits.create', ['tag_id'=>$cms_tag->id]) }}">{{__('Create Bit')}}</a></h1>
    @elseif (!empty($parent_cms_bit))
        <h1>{{ $parent_cms_bit->name }} <a class="btn" href="{{ route('cms_bits.create', ['parent_id'=>$parent_cms_bit->id]) }}">{{__('Create Bit')}}</a></h1>
    @endif    
    
    @if (!empty($cms_bits[0]))

        @include('_partials.sortable_js')

        {!! Form::open(['url'=>'cms_bit_positions', 'method'=>'post']) !!}
            
            <table  id="sort" class="table table-bordered">
                <tbody>
                    @foreach ($cms_bits as $cms_bit)
                        <tr>
                            <td style="padding-right:0;">
                                @if (!empty($cms_bit->photo))
                                    <a href="{{ route('cms_bits.edit',$cms_bit->id) }}">
                                        <img src="{{ url('/photos/'.$cms_bit->photo->id.'/'.$cms_bit->photo->filename) }}" style="height:40px;">
                                    </a>
                                @endif
                            </td>
                            <td style="padding-left:0;">
                                <a href="{{ route('cms_bits.edit',$cms_bit->id) }}" class="black">
                                    {{ $cms_bit->name }}

                                </a>
                                @if ($cms_bit->bit_type_id==2)
                                    <span style="font-size:100%"><i class="fas fa-shopping-basket"></i></span>
                                @endif

                                @if (count($cms_bit->cms_photos)>1)
                                    <p>
                                        @foreach($cms_bit->cms_photos as $photo)
                                            <img src="{{ url('/photos/'.$photo->id.'/'.$photo->filename) }}" style="height:30px; opacity:0.5">
                                        @endforeach
                                    </p>
                                @endif 

                                {!! Form::hidden("bits[$cms_bit->id]", $cms_bit->id) !!}
                            </td>
                            <td>
                                <?php /* <a class="btn btn-info" href="{{ route('cms_bits.show',$cms_bit->id) }}">Rodyti</a> */ ?>
                                <?php 
                                $childs = \App\Models\CmsBit::where('parent_id', $cms_bit->id)->count();
                                ?>
                                
                                    <a href="{{ url('/cms_bits?parent_id='.$cms_bit->id) }}">{{$childs}} {{__('Blocks')}} </a>
                                    &nbsp;
                                
 
                                <a href="{{ url('/cms_bit_delete/'.$cms_bit->id) }}" onclick="return confirm('{{__('Do you really want to delete?')}}')">{{__('Delete')}}</a>
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