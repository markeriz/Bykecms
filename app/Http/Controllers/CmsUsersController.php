<?php

namespace App\Http\Controllers;

use App\Models\CmsUser;
use Illuminate\Http\Request;

use Collective\Html\Eloquent\FormAccessible;

use Hash;

class CmsUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $cms_users = \App\Models\CmsUser::all();

      return view('cms_users.index', compact('cms_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cms_user = new \App\Models\CmsUser;
        $cms_user->status=1;
        return view('cms_users.create', compact('cms_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = $request->all();
        $r['password'] = Hash::make($request->password);
        CmsUser::create($r);

        return redirect()->route('cms_users.index')->with('success',__('Saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $cms_user
     * @return \Illuminate\Http\Response
     */
    public function show(CmsUser $cms_user)
    {
        return view('cms_users.show',compact('cms_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $cms_user
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsUser $cms_user)
    {
        return view('cms_users.edit',compact('cms_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $cms_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsUser $cms_user)
    {
        $r = $request->all();
        $r['password'] = Hash::make($request->password);
        $cms_user->update($r);

        return redirect()->route('cms_users.index')->with('success',__('Saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $cms_user
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cms_user = \App\Models\CmsUser::findOrFail($id);
		$cms_user->delete();
        return redirect()->route('cms_users.index')->with('success',__('Saved'));
    }

}

