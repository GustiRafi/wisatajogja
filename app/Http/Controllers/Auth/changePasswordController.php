<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\logo;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class changePasswordController extends Controller
{
    public function index()
    {
        return view('dashboard.account.password',[
            'logos' => logo::all(),
        ]);
    }

    public function changepassword(Request $request)
    {
        
        if(!Hash::check($request->currentpassword,Auth::user()->password))
        {
            return redirect()->back()->with('error1','Your current password does not matches');
        }

        if(Hash::check($request->newpassword,Auth::user()->password))
        {
            return redirect()->back()->with('error2','New Password cannot be same as your current password');
        }

        if($request->confirmpassword !== $request->password )
        {
            return redirect()->back()->with('error3','Your confirmation password does not matches');
        }

        $validate = $request->validate([
            'password' => 'required|min:6',
        ]);
        $validate["password"] = Hash::make($request->password);

        User::where('id',Auth::user()->id)->update($validate);

        return redirect()->back()->with('success','Password changed successfully !');
    }
}