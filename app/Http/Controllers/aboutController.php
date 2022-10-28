<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\about;
use App\Models\logo;
use Illuminate\Support\Facades\Storage;

class aboutController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.about',[
            'about' => about::all(),
            'logos' => logo::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => ['required','max:255','min:10'],
            'deskripsi' => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if($request->file('image'))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('about');
        }

        about::where('id',$id)->update($validate);

        return redirect()->back()->with('success','data has been updated');
    }
}