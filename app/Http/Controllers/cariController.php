<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wisata;

class cariController extends Controller
{
    public function cari(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            if($request->wisata != "")
            {
                $wisata = wisata::where('nama','LIKE','%'.$request->wisata."%")->get();
                $countWisata = count($wisata);
                
                if($wisata)
                {
                    foreach($wisata as $item)
                    {
                        foreach(explode(',',$item->image) as $img)
                        {
                            $image='<img src="'.$img.'" class="w-100 img-fluid" alt="" srcset="">';
                        }
                        $output.= '<a href="/detail-wisata/'.$item->slug.'" class="text-decoration-none">
                        <div class="card mb-2">
                            <div class="row row-cols-2">
                                <div class="col-4">'.
                                $image.'
                                </div>
                                <div class="col-8">
                                    <div class="py-2">'.
                                        '<h5>'.$item->nama .'</h5>
                                        <p>'.$item->categori->nama.'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>';
                        // $output.= '<a href="/detail-wisata/'.$item->slug.'">'.$item->nama.'</a>';
                    }
                }
                if($countWisata == 0)
                {
                    $output.= '<p>'. 'No Result For '. $request->wisata . ' </p>';
                }
            }
            return response($output);
        }
    }

    public function cariwilayah(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $wisata = wisata::where('addres','LIKE','%'.$request->wilayah."%")->where('categori_id',$request->kategori)->get();
            $countWisata = count($wisata);
            if($wisata)
            {
                foreach($wisata as $item)
                {
                    foreach(explode(',',$item->image) as $img)
                    {
                        $image='<img src="'.$img.'" class="w-100 img-fluid" alt="" srcset="">';
                    }
                    $output.= '<div class="col-lg-4 col-md-5 col-sm-10 p-3">
                    <a href="/detail-wisata/'.$item->slug.'">
                        <div class="mb-3">'.$image.'
                            <div class="card-body">
                                <h5 class="card-title m-4">'.$item->nama.'</h5>
                            </div>
                        </div>
                    </a>
                </div>';
                            // $output.= '<a href="/detail-wisata/'.$item->slug.'">'.$item->nama.'</a>';
                    }
            }
            if($countWisata == 0)
                {
                    $output.= '<div class="col-lg-12 text-black p-3 mx-5">
                    <img src="/assets/img/notfund.png" class="w-100 text-center">
                    </div>';
                }
            return response($output);
        }
    }
}