@if (!empty($bit->childs[0]) and count($bit->childs)>0)
    <a class="btn btn-primary" href="{{ url('/'.$bit->slug) }}">find out more</a>
@endif
@if ($bit->product_button==1) 
    <p>
        &euro;{{$bit->price}}
    </p>
    <a class="btn btn-primary" href="{{ url('/add-to-cart/'.$bit->parent_id) }}">Add to cart</a>
@endif
@if (count($bit->childs)==0 and $bit->bit_type_id==2)
    <p>
        &euro;{{$bit->price}}
    </p>
    <a class="btn btn-primary" href="{{ url('/add-to-cart/'.$bit->id) }}">Add to cart</a>
@endif
<div style="clear:both"></div>