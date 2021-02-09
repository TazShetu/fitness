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
            $musics = Music::all();
            return view('music.upload.index', compact('musics'));
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
            $img_name = time() . str_replace(" ", "_", $img->getClientOriginalName());
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


    public function destroy($mid)
    {
        if (Auth::user()->isAbleTo('music')) {
            $v = Music::find($mid);
            unlink($v->music);
            $v->delete();
            if (Cache::has('music')) {
                Cache::forget('music');
                $a = Music::all();
                Cache::put('music', $a, now()->addMonths(1));
            }
            Session::flash('success', "The music has benn deleted successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($mid)
    {
        if (Auth::user()->isAbleTo('music')) {
            $medit = Music::find($mid);
            $musics = Music::all();
            return view('music.edit', compact('musics','medit'));
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $mid)
    {
        if (Auth::user()->isAbleTo('music')) {
            $request->validate([
                'title' => 'required',
            ]);
            $v = Music::find($mid);
            $v->title = $request->title;
            $v->update();
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
