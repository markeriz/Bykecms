<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsPagesController extends Controller {

    // 
    // CMS Home 
    //
    public function home() {
        return view('cms_pages/home');
    }

    //
    // Set Language
    //
    public function set_language(Request $request) {

        if ($request->get('language')) {

            //$cms_language = \App\CmsLanguage::where('code', $request->get('language') )->first();

            //Session::put('cms_language_id', $cms_language['id']);

            //Session::put('cms_language_code', $cms_language['code']);

            $locale = \App::setLocale($request->get('language'));

        }

        return redirect('/cms');

    }
}
