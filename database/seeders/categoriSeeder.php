<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\categori;

class categoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // categori::truncate();
        $heading = true;
        $input_file = fopen(base_path("database/data/categori.csv"),"r");
        while (($record = fgetcsv($input_file,1000,";")) != false )
        {
            if(!$heading){
                $categori = [
                    "nama" => $record[0],
                    "slug" => $record[0],
                    "image" => $record[0],
                ];
                categori::create($categori);
            }

            $heading = false;
        }
        fclose($input_file);
    }
}