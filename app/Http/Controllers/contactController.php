<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\logo;

class contactController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.contact',[
            'contact' => contact::all(),
            'logos' => logo::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'addres' => ['required','max:255','min:10'],
            'email' => ['required','max:255','min:10','email'],
            'no_telp' => ['required'],
        ]);

        contact::where('id',$id)->update($validate);

        return redirect()->back()->with("success",'contact has been updated');
    }
}