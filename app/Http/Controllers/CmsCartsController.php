<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Debugbar;

class CmsCartsController extends Controller {

    public function index(Request $request) {
        $cms_carts = \App\Models\CmsCart::orderBy('id', 'desc')->paginate(15);
        return view('cms_carts.index', compact('cms_carts'));
    }


    public function show($id) {
        $cms_cart = \App\Models\CmsCart::find($id);
        return view('cms_carts.view',compact('cms_cart'));
    }

    public function edit($id) {
    	$cms_bike = \App\Models\Bike::find($id);
        //Debugbar::info($cms_bike);
        //return 'liuks';
        $photo_upload = 1;
        $filters = $cms_bike->bike_filters->pluck('bike_category_id')->toArray();
        return view('cms_bikes.edit',compact('cms_bike', 'photo_upload', 'filters'));
    }

    //
    // Destroy
    //
    public function destroy(Request $request, $id) {
        $cms_cart = \App\Models\CmsCart::find($id);
        $cms_cart->cart_items()->delete();
        $cms_cart->delete();

        return back()->with('success', 'Sąskaita sėkmingai ištrinta.');
        
    }

    //
    //
    // Update
    //
    //
    public function update(Request $request, $id) {
    
        //
        // SAVE BIKE PARAMS
        //
        $cms_bike = \App\Models\Bike::find($id);
        $cms_bike->name = $request->name;
        $cms_bike->price = $request->price;
        $cms_bike->old_price = $request->old_price;
        $cms_bike->code = $request->code;
        $cms_bike->popular = $request->popular;
        $cms_bike->status = $request->status;
        $cms_bike->save();
        return back()->with('success', 'Informacija sėkmingai išsaugota');
    }

}