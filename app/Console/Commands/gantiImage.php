<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Wisata;
class gantiImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maruf:ganteng';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Maruf ganteng sekali';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (Wisata::all() as $key => $wisata) {
            $image = $wisata->image;
            $_allImage = explode(',', $image);
            $_raw_src = [];
            foreach ($_allImage as $key => $_img) {
                if($_img != 'None'){

                }
                $imageData = base64_encode(file_get_contents($_img));
                $src = 'data: '.mime_content_type($_img).';base64,'.$imageData;
                $_raw_src[] = $src;
                info('berhasil mengupdate '.$image);
            }
            $wisata->update([
                'image' => implode(',', $_raw_src)
            ]);
        }
        return 0;
    }
}
