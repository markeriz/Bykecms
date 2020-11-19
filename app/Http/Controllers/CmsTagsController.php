<?php

namespace App\Http\Controllers;

use App\Models\CmsTag;
use Illuminate\Http\Request;

use Collective\Html\Eloquent\FormAccessible;

class CmsTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('parent_id')!='') {
            $cms_tag = \App\Models\CmsTag::find($request->input('parent_id'));
            $cms_tags = \App\Models\CmsTag::where('parent_id', $request->input('parent_id'))->orderBy('position', 'asc')->get();
        } else {
            $cms_tag = '';
            $cms_tags = \App\Models\CmsTag::where('parent_id', null)->orderBy('position', 'asc')->get();
        }
        //d('Here');
        $show = $request->input('show');

        //return 'hi';
        return view('cms_tags.index', compact('cms_tags', 'cms_tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cms_tag = new \App\Models\CmsTag;
        $cms_tag->status=1;
        return view('cms_tags.create', compact('cms_tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        CmsTag::create($request->all());

        return redirect()->route('cms_tags.index')->with('success','Žymė sukurta sėkmingai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $cms_tag
     * @return \Illuminate\Http\Response
     */
    public function show(CmsTag $cms_tag)
    {
        return view('cms_tags.show',compact('cms_tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $cms_tag
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsTag $cms_tag)
    {
        return view('cms_tags.edit',compact('cms_tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $cms_tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsTag $cms_tag)
    {

        $cms_tag->update($request->all());

        return redirect()->route('cms_tags.index')->with('success','Žymė atnaujinta sėkmingai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $cms_tag
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cms_tag = \App\Models\CmsTag::findOrFail($id);
        $childs = \App\Models\CmsTag::where('parent_id', $id)->get();
        foreach($childs as $child) {
            $child->delete();
        }
		$cms_tag->delete();
        return back()->with('success','Žymė ištrinta sėkmingai');
    }

    public function save_positions(Request $request) {

        $positions = $request->input('tags');
        //asort($positions);
        $i=1;
        foreach($positions as $id=>$position) {
            $pos = \App\Models\CmsTag::find($id);//->update(['position'=>3]);
            $pos['position']=$i;
            $pos->save();
            $i++;
        }
        return back();
    }
}

