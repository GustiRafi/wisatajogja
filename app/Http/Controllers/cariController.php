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
}