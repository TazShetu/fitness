<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use App\Models\VideoSubCategoryOne;
use App\Models\VideoSubCategoryTwo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VideoSubCategoryTwoController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAbleTo('video_sub_category_two')) {
            $subCategoriesTwo = VideoSubCategoryTwo::orderBy('id', 'DESC')->paginate(5);
            foreach ($subCategoriesTwo as $sb) {
                $sb['category_name'] = VideoCategory::find($sb->category_id)->name;
                $sb['sub_category_name'] = VideoSubCategoryOne::find($sb->sub_category_one_id)->name;
            }
            $subCategoriesOne = VideoSubCategoryOne::all();
            foreach ($subCategoriesOne as $sb) {
                $sb['category_name'] = VideoCategory::find($sb->category_id)->name;
            }
            return view('videos.subCategoryTwo.index', compact('subCategoriesTwo','subCategoriesOne'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo('video_sub_category_two')) {
            $request->validate([
                'sub_category_id' => 'required',
                'name' => 'required',
                'thumb_img' => 'required|file',
            ]);
            $sc1 = new VideoSubCategoryTwo;
            $cid = VideoSubCategoryOne::find($request->sub_category_id)->category_id;
            $sc1->category_id = $cid;
            $sc1->sub_category_one_id = $request->sub_category_id;
            $sc1->name = $request->name;
            $sc1->description = $request->description;
            $img = $request->thumb_img;
            $img_name = time() . str_replace(" ", "_", $img->getClientOriginalName());
            $a = $img->move('uploads/thumbImages/subCategoryTwo', $img_name);
            $d = 'uploads/thumbImages/subCategoryTwo/' . $img_name;
            $sc1->thumb_img = $d;
            $sc1->save();
            Cache::forget('all');
            $this->allCache();
            if (Cache::has('video_sub_categories_two'."$sc1->sub_category_one_id")) {
                Cache::forget('video_sub_categories_two'."$sc1->sub_category_one_id");
                $a = VideoSubCategoryTwo::where('sub_category_one_id', $sc1->sub_category_one_id)->get();
                Cache::put('video_sub_categories_two'."$sc1->sub_category_one_id", $a, now()->addMonths(1));
            }
            Session::flash('success', "The Video Sub Category Two has been created successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($cid)
    {
        if (Auth::user()->isAbleTo('video_sub_category_two')) {
            $scTwoedit = VideoSubCategoryTwo::find($cid);
            if ($scTwoedit) {
                $subCategoriesTwo = VideoSubCategoryTwo::all();
                foreach ($subCategoriesTwo as $sb) {
                    $sb['category_name'] = VideoCategory::find($sb->category_id)->name;
                    $sb['sub_category_name'] = VideoSubCategoryOne::find($sb->sub_category_one_id)->name;
                }
                $subCategoriesOne = VideoSubCategoryOne::all();
                foreach ($subCategoriesOne as $sb) {
                    $sb['category_name'] = VideoCategory::find($sb->category_id)->name;
                }
                return view('videos.subCategoryTwo.edit', compact('subCategoriesTwo', 'scTwoedit', 'subCategoriesOne'));
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $cid)
    {
        if (Auth::user()->isAbleTo('video_sub_category_two')) {
            $request->validate([
                'sub_category_id' => 'required',
                'name' => 'required',
            ]);
            $cedit = VideoSubCategoryTwo::find($cid);
            if ($cedit) {
                $caid = VideoSubCategoryOne::find($request->sub_category_id)->category_id;
                $cedit->category_id = $caid;
                $cedit->sub_category_one_id = $request->sub_category_id;
                $cedit->name = $request->name;
                $cedit->description = $request->description;
                if ($request->hasFile('thumb_img')) {
                    if (file_exists($cedit->thumb_img)) {
                        unlink($cedit->thumb_img);
                    }
                    $img = $request->thumb_img;
                    $img_name = time() . str_replace(" ", "_", $img->getClientOriginalName());
                    $a = $img->move('uploads/thumbImages/subCategoryTwo', $img_name);
                    $d = 'uploads/thumbImages/subCategoryTwo/' . $img_name;
                    $cedit->thumb_img = $d;
                }
                $cedit->update();
                Cache::forget('all');
                $this->allCache();
                if (Cache::has('video_sub_categories_two'."$cedit->sub_category_one_id")) {
                    Cache::forget('video_sub_categories_two'."$cedit->sub_category_one_id");
                    $a = VideoSubCategoryTwo::where('sub_category_one_id', $cedit->sub_category_one_id)->get();
                    Cache::put('video_sub_categories_two'."$cedit->sub_category_one_id", $a, now()->addMonths(1));
                }
                Session::flash('success', "The Video Sub Category Two has been updated successfully.");
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
        if (Auth::user()->isAbleTo('video_sub_category_two')) {
            $cedit = VideoSubCategoryOne::find($cid);
            if ($cedit) {
                dd('VideoSubCategoryTwoController destroy()');
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

}
