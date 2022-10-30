<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\logo;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class editProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.account.profile',[
            'logos' => logo::all(),
        ]);
    }

    public function change(Request $request,$id)
    {
        $validate = $request->validate([
            'name' => ['required','max:255','min:10'],
            'email' => ['required','email'],
            'image' => ['image','mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if($request->file('image'))
        {
            if($request->oldimage)
            {
                Storage::delete($request->oldimage);
            }
            $validate['image'] = $request->file('image')->store('profile');
        }

        User::where('id',$id)->update($validate);

        return redirect()->back()->with('success','data has been updated');
    }
}