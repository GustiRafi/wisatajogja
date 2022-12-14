<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wisata;
use App\Models\categori;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 
use App\Models\logo;

class wisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.wisata',[
            'wisatas' => wisata::orderBy('id','desc')->where('is_verified',1)->get(),
            'categoris' => categori::all(),
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
            'categori_id' => ['required'],
            'addres' => ['required','max:255'],
            'maps' => ['required'],
            'deskripsi' => ['required'],
            'fasilitas' => ['required'],
            'tiket_price' => ['required','max:255'],
            'jam_buka' => ['required'],
            'rute' => ['required'],
            'image.*' => ['required','image','mimes:jpeg,png,jpg,gif,svg']
        ]);
        
        if($request->hasfile('image'))
        {
            foreach ($request->file('image') as $key => $file) 
            {
            $var = date_create();
            $time = date_format($var, 'YmdHis');
            $imageName = $time . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/storage/wisata/', $imageName);
            $arr[] = '/storage/wisata/'.$imageName;
            }
            $image = implode(",", $arr);
            $validate['image'] = $image ;
        }
        
        $validate['slug'] = SlugService::createSlug(wisata::class, 'slug', $request->nama,['unique' => true]);
        $validate['is_verified'] = true ;
        wisata::create($validate);

        return redirect('/dashboard/wisata')->with('success', 'New post has been added');
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
        $wisata = wisata::find($id);

        $validate = $request->validate([
            'nama' => ['required','max:255'],
            'categori_id' => ['required'],
            'addres' => ['required','max:255'],
            'maps' => ['required'],
            'deskripsi' => ['required'],
            'fasilitas' => ['required'],
            'tiket_price' => ['required','max:255'],
            'jam_buka' => ['required'],
            'rute' => ['required'],
            'image.*' => ['image','mimes:jpeg,png,jpg,gif,svg']
        ]);


        if($request->slug != $wisata->slug)
        {
            $validate['slug'] = SlugService::createSlug(wisata::class, 'slug', $request->nama,['unique' => true]);
        }
        if($request->file("image"))
        {
            if($wisata->image)
            {
                foreach(explode(',',$wisata->image) as $img)
                {
                    $img_arr[] = $img;
                }
                File::delete($img_arr);
            }
            foreach ($request->file('image') as $file) 
            {
            $var = date_create();
            $time = date_format($var, 'YmdHis');
            $imageName = $time . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->move(base_path() . '/public/storage/wisata/', $imageName);
            $arr[] = '/storage/wisata/'.$imageName;
            }
            $image = implode(",", $arr);
            $validate['image'] = $image ;
        }

        wisata::where('id', $id)->update($validate);

        return redirect('/dashboard/wisata')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $wisata = wisata::find($id);
        foreach(explode(',',$wisata->image) as $img)
        {
            $img_arr[] = $img;
        }
        File::delete($img_arr);

        wisata::where('id', $id)->delete();
        
        return redirect('/dashboard/wisata')->with('success', 'Post has been deleted');
    }
}