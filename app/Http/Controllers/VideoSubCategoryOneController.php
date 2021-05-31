<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use App\Models\VideoSubCategoryOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VideoSubCategoryOneController extends Controller
{

    public function index()
    {
        if (Auth::user()->isAbleTo('video_sub_category_one')) {
            $subCategoriesOne = VideoSubCategoryOne::all();
            foreach ($subCategoriesOne as $sb) {
                $sb['category_name'] = VideoCategory::find($sb->category_id)->name;
            }
            $categories = VideoCategory::all();
            return view('videos.subCategoryOne.index', compact('subCategoriesOne', 'categories'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo('video_sub_category_one')) {
            $request->validate([
                'category_id' => 'required',
                'name' => 'required',
                'thumb_img' => 'required|file',
                'expected_result' => 'required',
                'bullet_points' => 'required',
                'male_img' => 'required|file',
                'male_image_description' => 'required',
                'female_img' => 'required|file',
                'female_image_description' => 'required',
            ]);
            $sc1 = new VideoSubCategoryOne;
            $sc1->category_id = $request->category_id;
            $sc1->name = $request->name;
            $img = $request->thumb_img;
            $img_name = time() . str_replace(" ", "_", $img->getClientOriginalName());
            $a = $img->move('uploads/thumbImages/subCategoryOne', $img_name);
            $d = 'uploads/thumbImages/subCategoryOne/' . $img_name;
            $sc1->thumb_img = $d;
            $sc1->expected_result = $request->expected_result;
            foreach ($request->bullet_points as $i => $bt) {
                if ($i == 0) {
                    $sc1->bullet_point_one = $bt;
                } elseif ($i == 1) {
                    $sc1->bullet_point_two = $bt;
                } else {
                    $sc1->bullet_point_three = $bt;
                }
            }
            $img = $request->male_img;
            $img_name = time() . str_replace(" ", "_", $img->getClientOriginalName());
            $a = $img->move('uploads/thumbImages/subCategoryOne/Male', $img_name);
            $d = 'uploads/thumbImages/subCategoryOne/Male/' . $img_name;
            $sc1->male_img = $d;
            $sc1->male_image_description = $request->male_image_description;
            $img = $request->female_img;
            $img_name = time() . str_replace(" ", "_", $img->getClientOriginalName());
            $a = $img->move('uploads/thumbImages/subCategoryOne/Female', $img_name);
            $d = 'uploads/thumbImages/subCategoryOne/Female/' . $img_name;
            $sc1->female_img = $d;
            $sc1->female_image_description = $request->female_image_description;
            $sc1->save();
            Cache::forget('all');
            $this->allCache();
            if (Cache::has('video_sub_categories_one' . "$sc1->category_id")) {
                Cache::forget('video_sub_categories_one' . "$sc1->category_id");
                $a = VideoSubCategoryOne::where('category_id', $sc1->category_id)->get();
                Cache::put('video_sub_categories_one' . "$sc1->category_id", $a, now()->addMonths(1));
            }
            Session::flash('success', "The Video Sub Category One has been created successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($cid)
    {
        if (Auth::user()->isAbleTo('video_sub_category_one')) {
            $scOneedit = VideoSubCategoryOne::find($cid);
            if ($scOneedit) {
                $subCategoriesOne = VideoSubCategoryOne::all();
                foreach ($subCategoriesOne as $sb) {
                    $sb['category_name'] = VideoCategory::find($sb->category_id)->name;
                }
                $categories = VideoCategory::all();
                return view('videos.subCategoryOne.edit', compact('categories', 'scOneedit', 'subCategoriesOne'));
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $cid)
    {
        if (Auth::user()->isAbleTo('video_sub_category_one')) {
            $request->validate([
                'category_id' => 'required',
                'name' => 'required',
                'expected_result' => 'required',
                'bullet_points' => 'required',
                'male_image_description' => 'required',
                'female_image_description' => 'required',
            ]);
            $cedit = VideoSubCategoryOne::find($cid);
            if ($cedit) {
                $cedit->category_id = $request->category_id;
                $cedit->name = $request->name;

                if ($request->hasFile('thumb_img')) {
                    if (file_exists($cedit->thumb_img)) {
                        unlink($cedit->thumb_img);
                    }
                    $img = $request->thumb_img;
                    $img_name = time() . str_replace(" ", "_", $img->getClientOriginalName());
                    $a = $img->move('uploads/thumbImages/subCategoryOne', $img_name);
                    $d = 'uploads/thumbImages/subCategoryOne/' . $img_name;
                    $cedit->thumb_img = $d;
                }
                $cedit->expected_result = $request->expected_result;
                foreach ($request->bullet_points as $i => $bt) {
                    if ($i == 0) {
                        $cedit->bullet_point_one = $bt;
                    } elseif ($i == 1) {
                        $cedit->bullet_point_two = $bt;
                    } else {
                        $cedit->bullet_point_three = $bt;
                    }
                }
                if ($request->hasFile('male_img')) {
                    if (file_exists($cedit->male_img)) {
                        unlink($cedit->male_img);
                    }
                    $img = $request->male_img;
                    $img_name = time() . str_replace(" ", "_", $img->getClientOriginalName());
                    $a = $img->move('uploads/thumbImages/subCategoryOne/Male', $img_name);
                    $d = 'uploads/thumbImages/subCategoryOne/Male/' . $img_name;
                    $cedit->male_img = $d;
                }
                $cedit->male_image_description = $request->male_image_description;
                if ($request->hasFile('female_img')) {
                    if (file_exists($cedit->female_img)) {
                        unlink($cedit->female_img);
                    }
                    $img = $request->female_img;
                    $img_name = time() . str_replace(" ", "_", $img->getClientOriginalName());
                    $a = $img->move('uploads/thumbImages/subCategoryOne/Female', $img_name);
                    $d = 'uploads/thumbImages/subCategoryOne/Female/' . $img_name;
                    $cedit->female_img = $d;
                }
                $cedit->female_image_description = $request->female_image_description;
                $cedit->update();
                Cache::forget('all');
                $this->allCache();
                if (Cache::has('video_sub_categories_one' . "$cedit->category_id")) {
                    Cache::forget('video_sub_categories_one' . "$cedit->category_id");
                    $a = VideoSubCategoryOne::where('category_id', $cedit->category_id)->get();
                    Cache::put('video_sub_categories_one' . "$cedit->category_id", $a, now()->addMonths(1));
                }
                Session::flash('success', "The Video Sub Category One has been updated successfully.");
                return redirect()->back();
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function destroy($cid)
    {
        if (Auth::user()->isAbleTo('video_sub_category_one')) {
            $cedit = VideoSubCategoryOne::find($cid);
            if ($cedit) {
                dd('VideoSubCategoryOneController destroy()');
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }
}
