<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
Use App\Models\logo;

class sendEmailController extends Controller
{
    public function send(Request $req)
    {
        $validate = $req->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email'],
            'request' => ['required']
        ]);


        Mail::send('request.sendemail-templete', array(
            'name' => $validate['name'],
            'email' => $validate['email'],
            'request' => $validate['request'],
            'logo' => logo::all(),
        ), function($message) use ($req){
            $message->from($req->email);
            $message->to('gustirafi49@gmail.com', 'Wonderfull Jogja Team')->subject('Request Website');
        });

        return redirect()->back()->with('success','Thanks for contact me,i will read your message soon');
    }
}