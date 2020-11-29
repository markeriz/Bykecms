@extends('layouts.cms')

@section('content')

    <h1>{{__('Orders')}}</h1>

    {{ $cms_carts->links() }}
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">{{__('No')}}</th>
                <th scope="col">{{__('Buyer')}}</th>
                <th scope="col">{{__('Sum')}}</th>
                <?php 
                /*
                <th scope="col">Kaina</th>
                */
                ?>
                <th scope="col">{{__('Date')}}</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cms_carts as $cms_cart)
           
                <tr>
                    <th scope="row">{{ $cms_cart->id }}</th>
                    <td>
                        <b>{{ $cms_cart->name }}</b>
                        <br/>
                        {{ $cms_cart->email }}
                        <br/>
                        {{ $cms_cart->phone }}
                        <br/>
                        {{ $cms_cart->address }}, {{ $cms_cart->city }}
                    </td>
                    <td>
                        &euro;{{ $cms_cart->sum }} 
                    
                    </td>
                    <?php 
                    /*
                    <td>
                        {{ $price_with_vat }}
                    </td>
                    */
                    ?>
                    <td>
                    {{ date('Y-m-d', strtotime($cms_cart->created_at)) }}
                    <br/>
                    {{ date('H:i:s', strtotime($cms_cart->created_at)) }}
                    </td>
                    <td>
                        <a href="{{ url('/order/'.$cms_cart->hash) }}" class="btn btn-primary">
                            {{__('Show')}}
                        </a>

                        <?php 
                        /*
                        <div style="padding-top:1rem;">
                            <a href="{{ url('/cms_carts/destroy/'.$cms_cart->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Ar tikrai norite trinti?" > Trinti </a>

                        </div>
                        */
                        ?>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cms_carts->links() }}

@endsection

