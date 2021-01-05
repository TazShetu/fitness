<?php

namespace Database\Seeders;

use App\Models\VideoCategory;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{

    public function run()
    {
        $vCategories = [
            0 => ['Get Fit'],
            1 => ['Get Strong'],
            2 => ['Loose Weight'],
        ];

        foreach ($vCategories as $vc) {
            $c = new VideoCategory;
            $c->name = $vc[0];
            $c->save();
        }
    }
}
