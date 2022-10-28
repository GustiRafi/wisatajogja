<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logo;
use Illuminate\Support\Facades\Storage;

class logoController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.logo',[
            'logos' => logo::all(),
            'logo' => logo::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'logo' => ['image','mimes:jpeg,png,jpg,gif,svg'],
        ]);

        if($request->file('logo'))
        {
            if($request->oldlogo)
            {
                Storage::delete($request->oldlogo);
            }
            $validate['logo'] = $request->file('logo')->store('logo');
        }

        logo::where('id',$id)->update($validate);

        return redirect()->back()->with('success','Logo has been updated');
    }
}