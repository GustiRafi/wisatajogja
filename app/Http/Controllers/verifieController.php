<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logo;
use App\Models\wisata;
use App\Models\cover;
use App\Models\categori;
use App\Models\contact;
use App\Models\sosmed;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;

class verifieController extends Controller
{
    public function index()
    {
        return view('dashboard.wisata-baru',[
            'wisatas' => wisata::orderBy('id','desc')->where('is_verified',0)->get(),
            'categoris' => categori::all(),
            'logos' => logo::all(),
        ]);
    }

    public function verifie($id)
    {
        $validate['is_verified'] = true ;
        $wisata = wisata::firstWhere('id',$id);
        wisata::where('id', $id)->update($validate);

        // send email notification to uploader
        Mail::send('request.acc-wisata', array(
            'wisata_nama' => $wisata->nama,
            'uploader' => $wisata->uploader_name,
            'tanggal_kirim' => $wisata->created_at,
            'cover' => cover::first(),
            'logos' => logo::all(),
            'cover' => cover::first(),
            'contact' => contact::all(),
            'sosmeds' => sosmed::all(),
        ), function($message) use ($wisata){
            $message->from('wonderfullyogya@gmail.com');
            $message->to($wisata->uploader_email, $wisata->uploader_name)->subject('Persetujuan penambahan wisata baru');
        });

        return redirect('/dashboard/wisata-baru')->with('success', 'New wisata has been verified');
    }

    public function tambahkan(Request $request)
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
            'image.*' => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
            'uploader_name' => ['required'],
            'uploader_email' =>['required','email']
        ]);

        // dd($validate);
        
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
        $validate['is_verified'] = false ;
        wisata::create($validate);

        // send email notification to admin
        Mail::send('request.wisata-baru', array(
            'wisata_nama' => $validate['nama'],
            'wisata_addres' => $validate['addres'],
            'wisata_deskripsi' => $validate['deskripsi'],
            'wisata_rute' => $validate['rute'],
            'wisata_fasilitas' => $validate['fasilitas'],
            'wisata_tiket_price' => $validate['tiket_price'],
            'wisata_jam_buka' => $validate['jam_buka'],
            'name' => $validate['uploader_name'],
            'email' => $validate['uploader_email'],
        ), function($message) use ($request){
            $message->from($request->uploader_email);
            $message->to('wonderfullyogya@gmail.com', 'Wonderfull Jogja Team')->subject('Wisata Baru');
        });

        return redirect()->back()->with('success','Terima Kasih telah membantu kami mendata wisata');
    }

    public function delete(Request $request,$id)
    {
        $wisata = wisata::find($id);
        // send email notification to uploader
        Mail::send('request.not-acc-wisata', array(
            'wisata_nama' => $wisata->nama,
            'uploader' => $wisata->uploader_name,
            'tanggal_kirim' => $wisata->created_at,
            'cover' => cover::first(),
            'logos' => logo::all(),
            'cover' => cover::first(),
            'contact' => contact::all(),
            'sosmeds' => sosmed::all(),
        ), function($message) use ($wisata){
            $message->from('wonderfullyogya@gmail.com');
            $message->to($wisata->uploader_email, $wisata->uploader_name)->subject('Persetujuan penambahan wisata baru');
        });
        foreach(explode(',',$wisata->image) as $img)
        {
            $img_arr[] = $img;
        }
        File::delete($img_arr);

        wisata::where('id', $id)->delete();
        
        return redirect('/dashboard/wisata-baru')->with('success', 'Post has been deleted');
    }
}