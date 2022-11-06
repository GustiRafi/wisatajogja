<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cover;
use App\Models\logo;
use Illuminate\Support\Facades\Storage;

class coverController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.cover',[
            'logos' => logo::all(),
            'covers' => cover::all(),
        ]);
    }

    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if($request->file('image'))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('jumbotron');
        }

        cover::where('id',$id)->update($validate);

        return redirect()->back()->with('success','jumbotron has been updated');
    }
}