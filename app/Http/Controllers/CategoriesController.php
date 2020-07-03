<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'cat_nama' => 'required|min:2',
            'cat_text' => 'required',
        ],[
            'cat_nama.required' => 'Nama Kategori Tidak Boleh Kosong',
            'cat_text.required' => 'Keterangan Tidak Boleh Kosong'
        ]);
        $categories = new Categories([
            'cat_nama'=>$request->input('cat_nama'),
            'cat_text'=>$request->input('cat_text')
        ]);
        $categories->save();
        return redirect('categories')->with('status', 'Data Berhasil Ditambah!');
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
        $categories = Categories::find($id);
        return view('categories/update', compact('categories'));
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
            'cat_nama' => 'required|min:2',
            'cat_text' => 'required',
        ]);

        $categories=Categories::find($id);
        $categories->cat_nama=$request->input('cat_nama');
        $categories->cat_text=$request->input('cat_text');
        $categories->save();
        return redirect('categories')->with('status', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=Categories::find($id);
        $categories->delete();
        return redirect('categories')->with('status', 'Data Berhasil Dihapus!');
    }
}
