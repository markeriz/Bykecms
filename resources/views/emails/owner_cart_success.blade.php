<h2>{{ __('New order').' #'.$cart->id }}</h2>
{{ $cart->name }}
<br/>
{{ $cart->address }}, {{ $cart->city }}
<br/>
{{ $cart->sum }} Eur
<br/>
<br/>
<a href="{{ url('/order/'.$cart->hash)}}">
   {{ url('/order/'.$cart->hash)}}
</a>
<br/>
<br/>
{{ __('Email sent from')}} {{ c('cms-title')}}