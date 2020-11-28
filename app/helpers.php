<?php 
// 
// Getting Config from DB
//
function c($slug) {
   $c = \App\Models\CmsConfig::where('slug', $slug)->first();
   if (!empty($c)) {
      return $c->value;
   } else {
      return '';
   }
}
?>