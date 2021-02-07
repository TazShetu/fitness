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
            return view('videos.subCategoryOne.index', compact('subCategoriesOne','categories'));
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
            ]);
            $sc1 = new VideoSubCategoryOne;
            $sc1->category_id = $request->category_id;
            $sc1->name = $request->name;
            $sc1->description = $request->description;
            $sc1->save();
            Cache::forget('all');
            $this->allCache();
            if (Cache::has('video_sub_categories_one'."$sc1->category_id")) {
                Cache::forget('video_sub_categories_one'."$sc1->category_id");
                $a = VideoSubCategoryOne::where('category_id', $sc1->category_id)->get();
                Cache::put('video_sub_categories_one'."$sc1->category_id", $a, now()->addMonths(1));
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
            ]);
            $cedit = VideoSubCategoryOne::find($cid);
            if ($cedit) {
                $cedit->category_id = $request->category_id;
                $cedit->name = $request->name;
                $cedit->description = $request->description;
                $cedit->update();
                Cache::forget('all');
                $this->allCache();
                if (Cache::has('video_sub_categories_one'."$cedit->category_id")) {
                    Cache::forget('video_sub_categories_one'."$cedit->category_id");
                    $a = VideoSubCategoryOne::where('category_id', $cedit->category_id)->get();
                    Cache::put('video_sub_categories_one'."$cedit->category_id", $a, now()->addMonths(1));
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
