<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categori;
use App\Models\logo;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class categoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categori',[
            'categoris' => categori::orderBy('id','desc')->get(),
            'logos' => logo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => ['required','max:255'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg']
        ]);

        $validate['slug'] = SlugService::createSlug(categori::class, 'slug', $request->nama,['unique' => true]);
        $validate['image'] = $request->file('image')->store('categori');
        categori::create($validate);

        return redirect('/dashboard/categori')->with('success', 'New post has been added');
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
        //
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
        $categori = categori::find($id);
        $validate = $request->validate([
            'nama' => ['required','max:255'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg']
        ]);

        if($request->slug != $categori->slug)
        {
            $validate['slug'] = SlugService::createSlug(categori::class, 'slug', $request->nama,['unique' => true]);
        }
        
        if($request->file("image"))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('categori');
        }
        categori::where('id', $id)->update($validate);

        return redirect('/dashboard/categori')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        categori::where('id', $id)->delete();
        if($request->oldimage)
        {
            Storage::delete($request->oldimage);
        }

        return redirect('/dashboard/categori')->with('success', 'Post has been deleted');
    }

    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(categori::class, 'slug', $request->nama);
        return response()->json([
            'slug' => $slug
        ]);
    }
}