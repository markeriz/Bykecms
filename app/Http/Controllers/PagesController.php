<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {

   public function bits(Request $request, $slug = null) {

      //
      // This is Tag or Bit?
      //
      if (!empty($slug) and $slug!='' ) {
         $tag = \App\Models\CmsTag::where('slug', $slug)->first();
         
         // get $bits from childs
         if (empty($tag)) {
            $bit = \App\Models\CmsBit::where('slug', $slug)->first();
            
            if (!empty($bit->childs[0])) {
               $bits = $bit->childs;
            } else {
               $bits[0] = $bit;
            }

         // get $bits from tag
         } else {
            $bits = $tag->bits;
         }

      // go to home Tag
      } else {
         $tag = \App\Models\CmsTag::where([['home', 1], ['status', 1]])->first();
         if (empty($tag)) {
            $tag = \App\Models\CmsTag::where('status', 1)->orderBy('position', 'asc')->first();
         }
         $bits = $tag->bits;
      }

      if (empty($bit)) {
         $bit='';
      }
      if (empty($bits)) {
         $bits='';
      }
      
      if (!empty($tag) or !empty($bit)) {
         return view('pages/bits', compact('bits', 'tag', 'bit'));
      } else {
         return redirect('/');
      }
   }

   public function bit(Request $request, $slug = null) {
      $bit = \App\Models\CmsBit::where('slug', $slug)->first();
      return view('pages/bit', compact('bit'));
   }
}
