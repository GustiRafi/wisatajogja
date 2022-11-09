<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class comentController extends Controller
{
    public function create ($id) 
    {
        $name = $this->input->post('name');
            $email = $this->input->post('email');
            $coment = $this->input->post('coment');
            $data=array('name'=>$name,"email"=>$email,"coment"=>$coment,'categori_id'=>$id);
            comment::insert($data);
            echo "Record inserted successfully";
    }
}