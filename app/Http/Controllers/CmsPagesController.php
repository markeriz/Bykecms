<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsPagesController extends Controller {

   //public function __construct() {
   //   $this->middleware('auth');
   //}


    public function home() {
        return view('cms_pages/home');
    }
}
