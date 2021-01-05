<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class VideoCategoryController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAbleTo('video_category')) {
            $categories = VideoCategory::all();
            return view('videos.category.index', compact('categories'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo('video_category')) {
            $request->validate([
                'name' => 'required|unique:video_categories,name',
            ]);
            $c = new VideoCategory;
            $c->name = $request->name;
            $c->description = $request->description;
            $c->save();
            Session::flash('success', "The Video Category has been created successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($cid)
    {
        if (Auth::user()->isAbleTo('video_category')) {
            $cedit = VideoCategory::find($cid);
            if ($cedit) {
                $categories = VideoCategory::all();
                return view('videos.category.edit', compact('categories', 'cedit'));
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $cid)
    {
        if (Auth::user()->isAbleTo('video_category')) {
            $request->validate([
                'name' => 'required',
            ]);
            $cedit = VideoCategory::find($cid);
            if ($cedit) {
                if ($cedit->name != $request->name) {
                    $request->validate([
                        'name' => 'unique:video_categories,name',
                    ]);
                }
                $cedit->name = $request->name;
                $cedit->description = $request->description;
                $cedit->update();
                Session::flash('success', "The Video Category has been updated successfully.");
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
        if (Auth::user()->isAbleTo('video_category')) {
            $cedit = VideoCategory::find($cid);
            if ($cedit) {
                dd('VideoCategoryController destroy()');
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }
}
