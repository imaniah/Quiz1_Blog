<?php

namespace App\Http\Controllers;
use App\Photo;
use App\Post;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo['photo'] = Photo::all();
        return view('photo.index')->with($photo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photo['post'] = Post::all();
        return view('photo.create')->with($photo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo_date' => 'required',
            'photo_title' => 'required',
            'photo_slug' => 'required',
            'photo_text' => 'required',
        ],[
            'photo_date.required' => 'Tanggal Tidak Boleh Kosong',
            'photo_title.required' => 'Title Tidak Boleh Kosong',
            'photo_slug.required' => 'Slug Tidak Boleh Kosong',
            'photo_text.required' => 'Keterangan Tidak Boleh Kosong'
        ]);
        $photo = new Photo;
        $photo->photo_post_id = $request->input('photo_post_id');
        $photo->photo_date = $request->input('photo_date');
    	$photo_title = $request->file('photo_title');
        $photo->photo_title = $photo_title->getClientOriginalName();
        $photo_title->move(public_path('upload'),$photo_title->getClientOriginalName());
        $photo->photo_slug = $request->input('photo_slug');
        $photo->photo_text = $request->input('photo_text');

        $photo->save();
        return redirect('photo')->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo['photo'] = photo::find($id);
        $photo['post'] = Post::all();
    	return view('photo.update')->with($photo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'photo_date' => 'required',
            'photo_title' => 'required',
            'photo_slug' => 'required',
            'photo_text' => 'required',
        ]);
        $photo = photo::find($id);
        $photo->photo_post_id = $request->input('photo_post_id');
    	$photo->photo_date = $request->input('photo_date');
    	$photo_title = $request->file('photo_title');
        $photo->photo_title = $photo_title->getClientOriginalName();
        $photo_title->move(public_path('upload'),$photo_title->getClientOriginalName());
        $photo->photo_slug = $request->input('photo_slug');
        $photo->photo_text = $request->input('photo_text');
        $photo->save();
        return redirect('photo')->with('status', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo=photo::find($id);
        $photo->delete();
        return redirect('photo')->with('status', 'Data Berhasil Dihapus!');
    }
}
