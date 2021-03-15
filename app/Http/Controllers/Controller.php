<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\VideoSubCategoryOne;
use App\Models\VideoSubCategoryTwo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function allCache()
    {
        $a = VideoCategory::all();
        foreach ($a as $b) {
            $sc1s = VideoSubCategoryOne::where('category_id', $b->id)->get();
            $b['categories'] = $sc1s;
            foreach ($b['categories'] as $sc1) {
                $sc2s = VideoSubCategoryTwo::where('sub_category_one_id', $sc1->id)->get();
                $sc1['subCategories'] = $sc2s;
                foreach ($sc1['subCategories'] as $sc2) {
                    $sc2id = $sc2->id;
                    $vs = Video::where('sub_category_two_id', $sc2id)->get();
                    $sc2['totalCalories'] = round($vs->sum('calorie'), 2);
                    $sc2['videos'] = $vs;
                }
            }
        }
        Cache::put('all', $a, now()->addMonths(1));
        return $a;
    }
}
