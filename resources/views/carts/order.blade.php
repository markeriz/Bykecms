@extends('layouts.order')

@section('content')

<div class="row" style="padding-top:1rem;">
  <div class="col-md-3">
   <a href="{{ url('/') }}">
		{{c('web-title')}}
	</a>
  </div>
</div>
<hr/>
@if (!empty($cms_cart))
	<div class="row" style="padding-bottom:1rem;">
		<div class="col-md-12" style="text-align:center">
			<b>{{ __('Order') }}</b>
			<br/>
			{{ __('Order Number') }}: 
			@if (!empty($cms_cart->unique_nb) and $cms_cart->unique_nb>73)
				<b>{{ $cms_cart->unique_nb }}</b>
			@else
				<b>{{ $cms_cart->id }}</b>
			@endif
			<br/>
			{{ date('Y-m-d', strtotime($cms_cart->created_at)) }}
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<b>{{ __('Seller') }}</b>
			<br/>
			{!! c('web-seller-details-for-order') !!}
		</div>
		<div class="col-md-6" style="text-align:right">
		<b>{{ __('Buyer') }}</b>
			<br/>
			{{ $cms_cart->name }}

			@if (!empty($cms_cart->company_code)) 
				<br/>
				{{ $cms_cart->company_code }}
			@endif

			@if (!empty($cms_cart->vat))
				<br/>
				<span class="gray">{{ __('VAT') }}:</span> {{ $cms_cart->vat }}
			@endif

			<br/>
			{{ $cms_cart->address }},

			@if (!empty($cms_cart->city))
            {{ $cms_cart->city }}
			@endif 

			@if ($cms_cart->post_code)
				<br/>
            <span class="gray">{{ __('Postcode') }}:</span> {{ $cms_cart->post_code }}
			@endif

			@if (!empty($cms_cart->phone))
				<br/>
				{{ $cms_cart->phone }}
			@endif

			@if (!empty($cms_cart->email))
				<br/>
				{{ $cms_cart->email }}
			@endif

			@if (!empty($cms_cart->payment_method))
				<br/>
				{{ __($cms_cart->payment_method->name) }}
			@endif

	
		</div>
	</div>
	<br/>
	<br/>

	<?php 
	$whole_sum = 0;
	?>
    
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>
					{{ __('Name') }}
					</th>
					<th style="text-align:right">
					{{ __('Quant.') }}
					</th>
					<th style="text-align:right">
					{{ __('Price') }}
					</th>
					<th style="text-align:right">
					{{ __('Sum') }}
					</th>
				</tr>
			</thead>
			<tbody>
			
			@foreach ($cms_cart->cart_items as $cart_item)
				<?php 
				$product_price = round($cart_item->price/100*115, 2);
				$price_with_vat = round($product_price/100*121, 2);
                ?>
				<tr>
					<td>
						<a href="{{ url('/bit/'.$cart_item->bit->slug) }}">
							{{ $cart_item->name }}bit
						</a>
					
					</td>
					<td style="text-align:right">
						{{ $cart_item->quantity }}
					</td>
					<td style="text-align:right">

						{{ $price_with_vat }} Eur 
					</td>
					<td style="text-align:right">
						{{ $price_with_vat * $cart_item->quantity }} Eur
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<table>
			<thead>
				<tr>
					<td style="text-align:right; font-weight:bolder">
					{{ __('Total') }}: {{ $cms_cart->sum }} Eur
					</td>
				</tr>
			</thead>
		</table>

	<hr/>

	<div>

		{{ __('Payment description') }}: <b>{{ __('Order Number') }} <?php echo $cms_cart->id ?></b>

	</div>

@endif

@endsection

