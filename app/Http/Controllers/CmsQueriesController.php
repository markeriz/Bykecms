<?php

namespace App\Http\Controllers;

use App\Models\CmsQuery;
use Illuminate\Http\Request;

use Collective\Html\Eloquent\FormAccessible;

class CmsQueriesController extends Controller
{

    public function index()
    {
        $cms_queries = \App\Models\CmsQuery::orderBy('id', 'desc')->get();
        //d('Here');

        //return 'hi';
        return view('cms_queries.index', compact('cms_queries'));
    }

    public function show(CmsQuery $cms_query)
    {
      return view('cms_queries.show',compact('cms_query'));
    }

    public function destroy(CmsQuery $cms_query)
    {
      $cms_query->delete();

       return redirect()->route('cms_queries.index')->with('success',__('Saved'));
    }
}

