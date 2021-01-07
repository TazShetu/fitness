<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class MusicController extends Controller
{

    public function upload()
    {
        if (Auth::user()->isAbleTo('music')) {
            return view('music.upload.index');
        } else {
            abort(403);
        }
    }


    public function uploadStore(Request $request)
    {
        if (Auth::user()->isAbleTo('music')) {
            $request->validate([
                'title' => 'required',
                'music' => 'required|file',
            ]);
            $v = new Music;
            $v->title = $request->title;

            $img = $request->music;
            $img_name = time() . urlencode(str_replace(" ", "_", $img->getClientOriginalName()));
            $a = $img->move('uploads/music', $img_name);
            $d = 'uploads/music/' . $img_name;
            $v->music = $d;

            $getID3 = new \getID3;
            $music_file = $getID3->analyze('uploads/music/' . $img_name);
            // Get the duration in string, e.g.: 4:37 (minutes:seconds)
//            $duration_string = $video_file['playtime_string'];
            // Get the duration in seconds, e.g.: 277 (seconds)
            $duration_seconds = $music_file['playtime_seconds'];
            $v->length = $duration_seconds;
            $v->save();

            if (Cache::has('music')) {
                Cache::forget('music');
                $a = Music::all();
                Cache::put('music', $a, now()->addMonths(1));
            }
            Session::flash('success', "The Music has benn uploaded successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


}
