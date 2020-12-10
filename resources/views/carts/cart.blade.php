@extends('layouts.app')

@section('content')

<h1>Cart</h1>

@if ( Session::has('bits') and count(Session::get('bits'))>0 )

	<?php 
	$whole_sum = 0;
   ?>
   
	<div class="hide-sm-down">
      
      <hr/>

		{{ Form::open(array('url' => 'change_quantity')) }}
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>
						 &nbsp;
					</th>
					<th>
						Name
					</th>
					<th style="text-align:right">
						Quant.
					</th>
					<th style="text-align:right">
						Price
					</th>
					<th style="text-align:right">
						Sum
					</th>
				</tr>
			</thead>
			<tbody>
			
			@foreach (Session::get('bits') as $bit_session_key=>$bit_session)
                <?php 
                $bit = \App\Models\CmsBit::find($bit_session['id']);
                ?>
				<tr>
					<td>
						@if ( !empty($bit) and !empty($bit_session['photo_id'] ) )
							<?php 
							$photo = \App\Models\CmsPhoto::find($bit_session['photo_id']);
							?>
							<a href="{{ url('/'.$bit->slug) }}">
							    <img src="{{ url('photos/'.$photo->id.'/thumb.'.$photo->filename) }}" style="width:50px">
                     </a>
						@elseif ( !empty($bit) and !empty($bit->photo) )
							<a href="{{ url('/'.$bit->slug) }}">
							    <img src="{{ url('photos/'.$bit->photo->id.'/thumb.'.$bit->photo->filename) }}" style="width:50px">
                     </a>
                  @endif
					</td>
					<td>
						<a href="{{ url('/'.$bit->slug) }}">
							{{ $bit->name }}
						</a>
                        
					</td>
					<td style="text-align:right">
						<?php 
						//{{= text_field_tag 'quantity['+i.id.to_s+']', i.quantity, {:style=>'width:50px; float:right'} }}
						?>
						<input type="texfield" name="bits[{{$bit_session_key}}]" value="{{ $bit_session['quantity'] }}" style="width:40px;">
                        <div style="padding-top:5px;">
                            <a href="{{ url('/remove_item/'.$bit_session_key) }}" style="font-size:90%">Remove</a>
                        </div>
					</td>
					<td style="text-align:right">
						@if ( !empty($bit->old_price) )
							<span style="text-decoration: line-through;" class="light_gray">
                        &euro;{{ $bit->old_price }}
							</span>
						@endif
						&euro;{{ $bit->price }}
					</td>
					<td style="text-align:right">
						&euro;{{ number_format($bit->price * $bit_session['quantity'], 2) }}
					</td>
				</tr>
				<?php 
				$whole_sum = $whole_sum + ( $bit->price * $bit_session['quantity'] );
				?>
			@endforeach
			</tbody>
		</table>

      <hr/>

      <table>
         <thead>
             <tr>
                 <td>
                     <button type="submit" class="btn btn-black">
                        <i class="fas fa-sync-alt"></i>&nbsp;
                        Recalculate Quantities
                     </button>
                 </td>
                 <td style="text-align:right; font-weight:bolder">
                     Total: &euro;{{ number_format($whole_sum, 2) }}
                 </td>
             </tr>
         </thead>
      </table>
         
		{{ Form::close() }}
	</div>

	<div class="hide-md-up">

		{{ Form::open(array('url' => 'change_quantity')) }}

		@foreach (Session::get('bits') as $bit_session_key=>$bit_session)
			<div style="margin-top:1rem; border:1px solid rgb(230,230,230); padding:5px; padding-top:1rem; border-radius:5px; text-align:center;">
                <?php 
                $bit = \App\Models\CmsBit::find($bit_session['id']);
                ?>
				
						@if ( !empty($bit) and !empty($bit_session['photo_id'] ) )
							<?php 
							$photo = \App\Models\CmsPhoto::find($bit_session['photo_id']);
							?>
							<a href="{{ url('/'.$bit->slug) }}">
							    <img src="{{ url('photos/'.$photo->id.'/thumb.'.$photo->filename) }}" style="width:80px; padding-bottom:1rem">
                     </a>
						@elseif ( !empty($bit) and !empty($bit->photo) )
							<a href="{{ url('/'.$bit->slug) }}">
							    <img src="{{ url('photos/'.$bit->photo->id.'/thumb.'.$bit->photo->filename) }}" style="width:80px; padding-bottom:1rem">
                     </a>
                  @endif

						<br/>
						
						<a href="{{ url('/'.$bit->slug) }}">
							<strong>
								{{ $bit->name }}
							</strong>
						</a>
						
						<br/>

						<span style="line-height:180%;">

							@if ( !empty($bit->old_price) )
								<span style="text-decoration: line-through;" class="light_gray">
                           &euro;{{ $bit->old_price }}
								</span>
							@endif
							Price: &euro;{{ $bit->price }}, Sum: &euro;{{ number_format($bit->price * $bit_session['quantity'], 2) }}
						</span>

						<div style="background:rgb(240,240,240); padding:1rem; border-radius:5px; margin-top:1rem;">
							<?php 
							//{{= text_field_tag 'quantity['+i.id.to_s+']', i.quantity, {:style=>'width:50px; float:right'} }}
							?>
							Quantity: <input type="texfield" name="bits[{{$bit_session_key}}]" value="{{ $bit_session['quantity'] }}" style="width:50px;">
							<div style="padding-top:5px;">
								<a href="{{ url('/remove_item/'.$bit_session_key) }}" style="font-size:90%">Remove</a>
							</div>
						</div>
			
				</div>
			@endforeach

         <table>
            <thead>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-black">
                            <i class="fas fa-sync-alt"></i>&nbsp;
                            Recalculate Quantities
                        </button>
                    </td>
                    <td style="text-align:right; font-weight:bolder">
                        Total: &euro;{{ number_format($whole_sum, 2) }}
                    </td>
                </tr>
            </thead>
         </table>
         
			{{ Form::close() }}
   </div>
   
   <hr/>

	<div style=" text-algin:right">

		<script>
			$( document ).ready(function() {
				$("#company_fields_btn").click(function() {
					$("#options_field").hide();
					$("#company_fields").show();
				});
				$("#person_fields_btn").click(function() {
					$("#options_field").hide();
					$("#person_fields").show();
				});
			});
		</script>

      <div style="padding-top:1rem; line-height:150%;" id="options_field">
          <div>
              <button type="submit" id="person_fields_btn" class="btn btn-black" style="float:right">Buy as a private person &rarr;</button>
          </div>
          <div style="clear:both;">
              <button type="submit" id="company_fields_btn" class="btn btn-black" style="float:right">Buy as a company &rarr;</button>
          </div>
      </div>



			

			<div style="display:none" id="person_fields">
                <a href="{{ url('/prekiu-krepselis') }}">&larr; Go back</a>
				<br/>
				<br/>
				<h2>Buy as a private person</h2>
            
            <hr/>

                  {{ Form::open(array('url' => 'create_cart')) }}

                    {{ Form::hidden('sum', $whole_sum) }}

				    <div class="field">
                        <label>Name and Surname</label>
                        {{ Form::text('name') }}
				    </div>
				    	
				    <div class="field">
                        <label>City</label>
                        {{ Form::text('city') }}
				    </div>

				    <div class="field">
                        <label>Street name, house number, flat numeris (for delivery)</label>
				        {{ Form::text('address') }}
				    </div>

				    <div class="field">
                        <label>Postcode</label>
				        {{ Form::text('postcode') }}
				    </div>

				    <div class="field">
                        <label>Email</label>
				        {{ Form::text('email') }}
				    </div>

				    <div class="field">
                        <label>Phone number</label>
				        {{ Form::text('phone') }}
				    </div>

				    <div class="field">
                      <label>Payment method</label>
				      {{ Form::select('payment_method_id', \App\Models\CmsPaymentMethod::where('status', 1)->orderBy('position', 'asc')->pluck('name', 'id')->toArray()) }}
				    </div>
                
                <hr/>

				    <div class="field" style="padding-top:1rem;">
                        <button type="submit" id="buy_btn" class="next btn" style="float:right">Confirm Order &raquo;</button>
				    </div>
                  {{ Form::close() }}
			</div>

			<div style="display:none" id="company_fields">
                <a href="{{ url('/prekiu-krepselis') }}">&larr; Go back</a>
				<br/>
				<br/>
            <h2>Buy as a company</h2>
            
            <hr/>

                {{ Form::open(array('url' => 'create_cart')) }}

                    {{ Form::hidden('company', true) }}
                    {{ Form::hidden('sum', $whole_sum) }}

				    <div class="field">
                        <label>Company name</label>
				        {{ Form::text('name') }}
				    </div>

				    <div class="field">
                        <label>Company code</label>
				        {{ Form::text('company_code') }}
				    </div>

				    <div class="field">
                        <label>VAT code (optional)</label>
				        {{ Form::text('vat') }}
				    </div>

				    <div class="field">
                        <label>City</label>
				        {{ Form::text('city') }}
				    </div>

				    <div class="field">
                        <label>Street name, house number, flat numeris (for delivery)</label>
				        {{ Form::text('address') }}
				    </div>

				    <div class="field">
                        <label>Postcode</label>
				        {{ Form::text('postcode') }}
				    </div>

				    <div class="field">
                        <label>Email</label>
				        {{ Form::text('email') }}
				    </div>

				    <div class="field">
                        <label>Phone number</label>
				        {{ Form::text('phone') }}
				    </div>

				     <div class="field">
                        <label>Name and Surname of person who is responsible for this order</label>
				        {{ Form::text('worker') }}
				    </div>
				    
				    <div class="field">
                      <label>Payment method</label>
					  {{ Form::select('payment_method_id', [null=>''] + \App\Models\CmsPaymentMethod::where('status', 1)->orderBy('position', 'asc')->pluck('name', 'id')->toArray()) }}
				    </div>
                
                <hr/>

				    <div class="field" style="padding-top:1rem;">
                        <button type="submit" id="buy_btn" class="next btn" style="float:right">Confirm Order &raquo;</button>
				    </div>

                {{ Form::close() }}
            </div>
	</div> 

	<script>
	    $(".next").click(function() {
		    var empty = $(this).parent().parent().find("input").filter(function() {
		        return this.value === "";
		    });
		    if(empty.length) {
		        alert('Pease fill in all fields');
		        return false;
		    }
		});
	</script>


@else   

    <p>Your cart is empty.</p>

@endif

@endsection

