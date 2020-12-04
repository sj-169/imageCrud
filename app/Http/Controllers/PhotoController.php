<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Photo::all();
        return view('photos.index', compact('profiles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $profile = new Photo;
        $profile->name = $request->input('name');
        if ($request->hasFile('photo')) {
           $file = $request->file('photo');
           $extension = $file->getClientOriginalExtension();
           $filename = time().".". $extension;
           $file->move('public/images',$filename);
            $profile->photo = $filename;


        }
        else{
            return $request;
            $profile->photo="";
        }
        $profile->save();

        return redirect()->route('photos.index')
            ->with('success', 'profile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {

        $profile = $photo;
        return view('photos.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $profile = $photo;
        $profile->name = $request->input('name');
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".". $extension;
            $file->move('public/images',$filename);
            $profile->photo = $filename;


        }
        else{
            return $request;
            $profile->photo="";
        }
        $profile->save();

        return redirect()->route('photos.index')
            ->with('success', 'profile created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return redirect()->route('photos.index')
            ->with('success','Profile deleted successfully');
    }
}
