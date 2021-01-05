<?php

namespace Database\Seeders;

use App\Models\VideoCategory;
use App\Models\VideoSubCategoryOne;
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

        $cSubCategories = [
            0 => ['Beginner'],
            1 => ['Intern'],
            2 => ['Advance'],
        ];
        $vcs = VideoCategory::all();
        foreach ($vcs as $vc) {
            foreach ($cSubCategories as $vsc) {
                $c = new VideoSubCategoryOne;
                $c->category_id = $vc->id;
                $c->name = $vsc[0];
                $c->save();
            }
        }



    }
}
