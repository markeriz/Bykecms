<?php

namespace App\Http\Controllers;

use App\Models\CmsBit;
use Illuminate\Http\Request;

use Collective\Html\Eloquent\FormAccessible;

class CmsBitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        if ($request->input('tag_id')!='') {
            $cms_tag = \App\Models\CmsTag::find($request->input('tag_id'));
            $cms_bits = \App\Models\CmsBit::where('tag_id', $request->input('tag_id'))->orderBy('position', 'asc')->get();
            $parent_cms_bit = '';
        } elseif ($request->input('parent_id')!='') {
            $cms_bits = \App\Models\CmsBit::where('parent_id', $request->input('parent_id'))->orderBy('position', 'asc')->get();
            $parent_cms_bit = \App\Models\CmsBit::where('id', $request->input('parent_id'))->first();
            $cms_tag = '';
        } else {
            $cms_tag = '';
            $cms_bits = \App\Models\CmsBit::all();
            $parent_cms_bit = '';
        }

        return view('cms_bits.index', compact('cms_bits', 'cms_tag', 'parent_cms_bit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cms_bit = new \App\Models\CmsBit;
        $cms_bit->status=1;
        if (!empty($request->input('tag_id'))) {
            $cms_tag = \App\Models\CmsTag::find($request->input('tag_id'));
            $parent_cms_bit = '';
        } elseif (!empty($request->input('parent_id'))) {
            $parent_cms_bit = \App\Models\CmsBit::find($request->input('parent_id'));
            $cms_tag = '';
        } 
        return view('cms_bits.create', compact('cms_bit', 'cms_tag', 'parent_cms_bit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cms_bit = CmsBit::create($request->all());

        if ($cms_bit['parent_id']!='') {
            $parent_cms_bit = \App\Models\CmsBit::find($cms_bit['parent_id']);
        }

        // Giving bit_id to photos
        \App\Models\CmsPhoto::where('random', $request['random'])->update(['bit_id'=>$cms_bit->id, 'random'=>NULL]);
        
        //  PHOTO POSITIONS
        //  * same code on update & store actions
        if (!empty($request['uploaded_photos'])) {
            $max_position = max($request['uploaded_photos']);
            foreach ($request['uploaded_photos'] as $photo_id) {
                $max_position = $max_position - 1;
                \App\Models\CmsPhoto::where('id', $photo_id)->update(array('position' => $max_position));
            }
        }

        // Save Photo Descriptions 
        //dd($request['descriptions']);
        if (!empty($request['descriptions'])) {
            foreach ($request['descriptions'] as $id=>$value) {
                \App\Models\CmsPhoto::where('id', $id)->update(array('description' => $value));
            }
        }

        // Redirect by tag.
        if (!empty($parent_cms_bit)) {
            return redirect('/cms_bits?parent_id='.$parent_cms_bit->id)->with('success',__('Saved'));
        } else {
            return redirect('/cms_bits?tag_id='.$request->input('tag_id'))->with('success',__('Saved'));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bit  $cms_bit
     * @return \Illuminate\Http\Response
     */
    public function show(CmsBit $cms_bit)
    {
      return view('cms_bits.show',compact('cms_bit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bit  $cms_bit
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsBit $cms_bit)
    {
        if ($cms_bit->tag_id>0) {
            $cms_tag = \App\Models\CmsTag::find($cms_bit->tag_id);
            $parent_cms_bit = '';
        } else {
            $parent_cms_bit = \App\Models\CmsBit::find($cms_bit->parent_id);
            $cms_tag = '';
        }
        return view('cms_bits.edit',compact('cms_bit', 'cms_tag', 'parent_cms_bit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bit  $cms_bit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsBit $cms_bit)
    {

        $cms_bit->update($request->all());

        //  PHOTO POSITIONS
        //  * same code on update & store actions
        if (!empty($request['uploaded_photos'])) {
            $max_position = max($request['uploaded_photos']);
            foreach ($request['uploaded_photos'] as $photo_id) {
                $max_position = $max_position - 1;
                \App\Models\CmsPhoto::where('id', $photo_id)->update(array('position' => $max_position));
            }
        }

        // Save Photo Descriptions 
        if (!empty($request['descriptions'])) {
            foreach ($request['descriptions'] as $id=>$value) {
                \App\Models\CmsPhoto::where('id', $id)->update(array('description' => $value));
            }
        }

        // Redirect by tag.
        if ($cms_bit->parent_id!='') {
            return redirect('/cms_bits?parent_id='.$cms_bit->parent_id)->with('success',__('Saved'));
        } else {
            return redirect('/cms_bits?tag_id='.$cms_bit->tag_id)->with('success',__('Saved'));
        }

        return redirect('/cms_bits?tag_id='.$cms_bit->tag_id)->with('success',__('Saved'));
    }

    // Delete
    public function delete($id)
    {
        $cms_bit = \App\Models\CmsBit::findOrFail($id);
        $photos = \App\Models\CmsPhoto::where('bit_id', $id)->get();
        foreach($photos as $photo) {
            $dir = public_path('photos').'/'.$photo->id;
		    array_map('unlink', glob("$dir/*.*"));
		    rmdir($dir);
            $photo->delete();
        }
        $tag_id = $cms_bit->tag_id;
		$cms_bit->delete();
        return back()->with('success',__('Deleted'));
    }

    // Save Positions
    public function save_positions(Request $request) {
        $positions = $request->input('bits');
        $i=1;
        foreach($positions as $id=>$position) {
            $pos = \App\Models\CmsBit::find($id);
            $pos['position']=$i;
            $pos->save();
            $i++;
        }
        return back();
    }
}

