<?php

namespace App\Http\Controllers;

use App\Models\CmsConfig;
use Illuminate\Http\Request;

use Collective\Html\Eloquent\FormAccessible;

class CmsConfigsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cms_configs = \App\Models\CmsConfig::all();
        //d('Here');

        //return 'hi';
        return view('cms_configs.index', compact('cms_configs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cms_config = new \App\Models\CmsConfig;
        return view('cms_configs.create', compact('cms_config'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        CmsConfig::create($request->all());

        return redirect()->route('cms_configs.index')->with('success',__('Saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Config  $cms_config
     * @return \Illuminate\Http\Response
     */
    public function show(CmsConfig $cms_config)
    {
      return view('cms_configs.show',compact('cms_config'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config  $cms_config
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsConfig $cms_config)
    {
        return view('cms_configs.edit',compact('cms_config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $cms_config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsConfig $cms_config)
    {

        $cms_config->update($request->all());

        return redirect()->route('cms_configs.index')->with('success',__('Saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Config  $cms_config
     * @return \Illuminate\Http\Response
     */
    public function destroy(CmsConfig $cms_config)
    {
      $cms_config->delete();

       return redirect()->route('cms_configs.index')->with('success',__('Saved'));
    }
}

