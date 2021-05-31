<?php

namespace Database\Seeders;

use App\Models\VideoCategory;
use App\Models\VideoSubCategoryOne;
use App\Models\VideoSubCategoryTwo;
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
            1 => ['Intermediate'],
            2 => ['Advance'],
        ];
        $vcs = VideoCategory::all();
        foreach ($vcs as $vc) {
            foreach ($cSubCategories as $vsc) {
                $c = new VideoSubCategoryOne;
                $c->category_id = $vc->id;
                $c->name = $vsc[0];
                $c->thumb_img = "uploads/thumbImages/1.png";
                $c->expected_result = "Expected Result";
                $c->bullet_point_one = "Bullet point one";
                $c->male_img = "uploads/thumbImages/1.png";
                $c->male_image_description = "male des";
                $c->female_img = "uploads/thumbImages/1.png";
                $c->female_image_description = "female des";
                $c->save();
            }
        }

        $c1s1 = ['Full Body', 'Shape It', 'Body Shape', 'On all fours-Core exercise', 'Upper Body', 'Pilates'];
        foreach ($c1s1 as $cs) {
            $c = new VideoSubCategoryTwo;
            $c->category_id = 1;
            $c->sub_category_one_id = 1;
            $c->name = $cs;
            $c->thumb_img = "uploads/thumbImages/2.png";
            $c->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
            $c->save();
        }

        $c1s2 = ['Full Body', 'Cardio and Abs', 'TABATA', 'Power Boost', 'Sore Core', 'Twister', 'Power Cardio'];
        foreach ($c1s2 as $cs) {
            $c = new VideoSubCategoryTwo;
            $c->category_id = 1;
            $c->sub_category_one_id = 2;
            $c->name = $cs;
            $c->thumb_img = "uploads/thumbImages/2.png";
            $c->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
            $c->save();
        }

        $c1s3 = ['Full Body', 'Athletic', 'Insane Abs', 'High and Higher', 'Strength', 'Cardio'];
        foreach ($c1s3 as $cs) {
            $c = new VideoSubCategoryTwo;
            $c->category_id = 1;
            $c->sub_category_one_id = 3;
            $c->name = $cs;
            $c->thumb_img = "uploads/thumbImages/2.png";
            $c->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
            $c->save();
        }

        $c2s4 = ['Full Body', 'Apple Butt', 'Shape It', 'PT’s Choice', 'Back', 'Inner Thighs'];
        foreach ($c2s4 as $cs) {
            $c = new VideoSubCategoryTwo;
            $c->category_id = 2;
            $c->sub_category_one_id = 4;
            $c->name = $cs;
            $c->thumb_img = "uploads/thumbImages/2.png";
            $c->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
            $c->save();
        }

        $c2s5 = ['Full Body', 'Booty Bootcamp', 'Butt Lift', 'Tabata Core', 'Down To Earth', 'Hamstrings', 'Sore Core'];
        foreach ($c2s5 as $cs) {
            $c = new VideoSubCategoryTwo;
            $c->category_id = 2;
            $c->sub_category_one_id = 5;
            $c->name = $cs;
            $c->thumb_img = "uploads/thumbImages/2.png";
            $c->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
            $c->save();
        }

        $c2s6 = ['Full Body', 'Muscle Definer', 'Beach Body', 'Abs of Steel', 'Triceps', 'Flamingo'];
        foreach ($c2s6 as $cs) {
            $c = new VideoSubCategoryTwo;
            $c->category_id = 2;
            $c->sub_category_one_id = 6;
            $c->name = $cs;
            $c->thumb_img = "uploads/thumbImages/2.png";
            $c->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
            $c->save();
        }

        $c3s7 = ['Full Body', 'Calorie Burn', 'Belly Burn', 'Bikini Body', 'Body Shape', 'Light'];
        foreach ($c3s7 as $cs) {
            $c = new VideoSubCategoryTwo;
            $c->category_id = 3;
            $c->sub_category_one_id = 7;
            $c->name = $cs;
            $c->thumb_img = "uploads/thumbImages/2.png";
            $c->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
            $c->save();
        }

        $c3s8 = ['Full Body', 'Apple Butt', 'Cardio All The Day', 'Butt Lift', 'Shape It', 'Body Shape', 'Cardio', 'Back and Front'];
        foreach ($c3s8 as $cs) {
            $c = new VideoSubCategoryTwo;
            $c->category_id = 3;
            $c->sub_category_one_id = 8;
            $c->name = $cs;
            $c->thumb_img = "uploads/thumbImages/2.png";
            $c->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
            $c->save();
        }

        $c3s9 = ['Full Body', 'Belly Burn', 'From-tastic', 'Athletic', 'No Limits'];
        foreach ($c3s9 as $cs) {
            $c = new VideoSubCategoryTwo;
            $c->category_id = 3;
            $c->sub_category_one_id = 9;
            $c->name = $cs;
            $c->thumb_img = "uploads/thumbImages/2.png";
            $c->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
            $c->save();
        }


    }
}
