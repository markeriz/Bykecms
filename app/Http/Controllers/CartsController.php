<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Debugbar;
use Session;

use Illuminate\Support\Facades\Mail;
use App\mail\SendMailable;
//use App\mail\ClientCart;


class CartsController extends Controller {

    public function show_bill($hash) {
        $cms_cart = \App\Models\CmsCart::where('nb', $hash)->first();
        $page_title = 'Bill';
        $noindex = 1;
        return view('carts.show_bill',compact('cms_cart', 'page_title', 'noindex'));
    }

    //
    // Add To Cart
    //
    public function add_to_cart (Request $request, $id) {
      $bit = \App\Models\CmsBit::find($request->id);

      //
      // Add to cart if we have all needed parameters
      //
      $bit_session = array(
          'id'=>$request->id,
          'quantity'=>1,
          'photo_id'=>$bit->photo->id
          //'height_id'=>$request['height_id']
      );
      Session::push('bits', $bit_session);
      //Session::forget('bits');

      return redirect('/prekiu-krepselis')->with('success', 'Added Successfully');
    }

    //
    // Create Cart
    //
    public function create_cart(Request $request) {

        //
        // Creating Cart
        //
        if ( Session::has('bits') ) {
            debug($request);
            $cart = new \App\Models\CmsCart;
            $cart->sum = $request->sum;
            $cart->name = $request->name;
            $cart->address = $request->address;
            $cart->city = $request->city;
            $cart->company_code = $request->company_code;
            $cart->postcode = $request->postcode;
            $cart->vat = $request->vat;
            $cart->phone = $request->phone;
            $cart->worker = $request->worker;
            $cart->email = $request->email;
            $cart->payment_method_id = $request->payment_method_id;
            $cart->company = $request->company;
            $cart->client_note = $request->client_note;
            $cart->hash = hash('ripemd160', time());
            if ($request->ip()!='::1') {
                $cart->ip = $request->ip();
            }
            // Get Unique Nb
            $unique = \App\Models\CmsCart::orderBy('number', 'desc')->first();
            if (empty($unique)) {
               $cart->number = 1;
            } else {
               $cart->number = $unique->number+1;
            }
            $cart->save();
            
            //
            // Creating Cart Sessions
            //
            foreach(Session::get('bits') as $bit_session) {
                $bit = \App\Models\CmsBit::find($bit_session['id']);
                $cb = new \App\Models\CmsCartBit;
                $cb->bit_id = $bit->id;
                $cb->cart_id = $cart->id;
                $cb->photo_id = $bit_session['photo_id'];
                $cb->quantity = $bit_session['quantity'];
                $cb->price = $bit['price'];
                $cb->name = $bit['name'];
                $cb->old_price = $bit['old_price'];
                $cb->save();
            }
            
            Session::forget('bits');
            
            //
            // Send Mail for Webstore Owner
            //
            if (config('app.env') === 'local') {
                \Mail::to(c('cms-send-email-on-order'))->send(new SendMailable($cart));
            } else {
                
                \Mail::to(c('cms-send-email-on-order'))->send(new SendMailable($cart));
            }
            
            // 
            // Send Mail for Client
            //
            //\Mail::to($cart->email)->send(new ClientCart($cart->id));

            return view('carts/create_cart', compact('cart'));
        } else {
            return view('carts/create_cart_fail');
        }

        
    } 

    //
    // Show Cart
    //
    public function show_cart(Request $request) {
        Debugbar::info($request->path());
        $page_title = 'Cart';
        $noindex = 1;
        return view('carts/show_cart', compact('page_title', 'noindex'));
    }

    //
    // Change Quantity
    //
    public function change_quantity(Request $request) {
        debug($request);
        foreach($request->bits as $bit_id => $bit_value) {
            Session::put('bits.'.$bit_id.'.quantity', $bit_value);
        }
        debug(Session::get('bits'));
        return back()->with('success', 'Quantity has been changed');
    }

    //
    // Remove CmsBit
    //
    public function remove_item(Request $request, $id) {
        Session::forget('bits.'.$id);
        return back()->with('success', 'Removed Successfully');
    }

}
