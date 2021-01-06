<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\VideoSubCategoryOne;
use App\Models\VideoSubCategoryTwo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{

    public function upload()
    {
        if (Auth::user()->isAbleTo('video')) {
            $subCategoriesTwo = VideoSubCategoryTwo::all();
            $subCategoriesOne = VideoSubCategoryOne::all();
            foreach ($subCategoriesOne as $sb) {
                $sb['category_name'] = VideoCategory::find($sb->category_id)->name;
            }
            return view('videos.upload.index', compact('subCategoriesTwo', 'subCategoriesOne'));
        } else {
            abort(403);
        }
    }


    public function uploadStore(Request $request)
    {
        if (Auth::user()->isAbleTo('video')) {
            $request->validate([
                'sub_category_one_id' => 'required',
                'sub_category_two_id' => 'required',
                'title' => 'required',
                'instruction' => 'required',
                'calorie' => 'required|min:0.01',
                'video' => 'required|file',
            ]);
            $v = new Video;
            $cid = VideoSubCategoryOne::find($request->sub_category_one_id)->category_id;
            $v->category_id = $cid;
            $v->sub_category_one_id = $request->sub_category_one_id;
            $v->sub_category_two_id = $request->sub_category_two_id;
            $v->title = $request->title;
            $v->instruction = $request->instruction;
            $v->calorie = $request->calorie;

            $img = $request->video;
            $img_name = time() . urlencode(str_replace(" ", "_", $img->getClientOriginalName()));
            $a = $img->move('uploads/videos', $img_name);
            $d = 'uploads/videos/' . $img_name;
            $v->video = $d;

            $getID3 = new \getID3;
            $video_file = $getID3->analyze('uploads/videos/' . $img_name);
            // Get the duration in string, e.g.: 4:37 (minutes:seconds)
//            $duration_string = $video_file['playtime_string'];
            // Get the duration in seconds, e.g.: 277 (seconds)
            $duration_seconds = $video_file['playtime_seconds'];
            $v->length = $duration_seconds;
            $v->save();

            if (Cache::has('video' . "$v->sub_category_two_id")) {
                Cache::forget('video' . "$v->sub_category_two_id");
                $a = Video::where('sub_category_two_id', $v->sub_category_two_id)->get();
                Cache::put('video' . "$v->sub_category_two_id", $a, now()->addMonths(1));
            }
            Session::flash('success', "The video has benn uploaded successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }

}