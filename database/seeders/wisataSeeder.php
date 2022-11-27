<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\wisata;

class wisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // wisata::truncate();
        $heading = true;
        $input_file = fopen(base_path("database/data/wisata2.csv"),"r");
        $lenght = feof($input_file);
        while (($record = fgetcsv($input_file,$lenght,";")) != false )
        {
            if(!$heading){
                $wisata = [
                    "nama" => $record[1],
                    "categori_id" => $record[4],
                    "slug" => $record[2],
                    "addres" => $record[5],
                    "maps" => $record[6],
                    "deskripsi" => $record[7],
                    "fasilitas" => $record[8],
                    "tiket_price" => $record[9],
                    "jam_buka" => $record[10],
                    "rute" => $record[11],
                    "image" => $record[13],
                    'is_verified' => 1,
                ];
                
                wisata::create($wisata);
            }

            $heading = false;
        }
        fclose($input_file);
    }
}