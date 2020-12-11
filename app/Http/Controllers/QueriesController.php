<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\CmsQuery;
use App\Mail\SendQuery;

class QueriesController extends Controller {

   public function send_query(Request $request, $slug = null) {
      $query = CmsQuery::create($request->all());
      \Mail::to(c('web-send-email-on-order'))->send(new SendQuery($query));
      
      return view('queries/send_query');
   }
}
