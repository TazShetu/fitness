<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\VideoSubCategoryOne;
use App\Models\VideoSubCategoryTwo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ACLController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    public function role()
    {
        if (Auth::user()->isAbleTo('role')) {
            $roles = Role::where('id', '>', '3')->get();
            $permissions = Permission::all();
            return view('role.index', compact('roles', 'permissions'));
        } else {
            abort(403);
        }
    }


    public function roleStore(Request $request)
    {
        if (Auth::user()->isAbleTo('role')) {
            $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'displayName' => 'required',
                'permission' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $r = new Role;
                $r->name = $request->name;
                $r->display_name = $request->displayName;
                $r->save();
                foreach ($request->permission as $m) {
                    $r->attachPermission($m);
                }
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('success', "The role has been created successfully.");
                return redirect()->back();
            } else {
                Session::flash('unSuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function roleEdit($rid)
    {
        if (Auth::user()->isAbleTo('role') && ($rid * 1) > 3) {
            $redit = Role::find($rid);
            if ($redit) {
                $roles = Role::where('id', '>', '3')->get();
                $permissions = Permission::all();
                $pedits = $redit->permissions()->get();
                return view('role.edit', compact('redit', 'roles', 'permissions', 'pedits'));
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function roleUpdate(Request $request, $rid)
    {
        if (Auth::user()->isAbleTo('role') && ($rid * 1) > 3) {
            $this->validate($request, [
                'name' => 'required',
                'displayName' => 'required',
                'permission' => 'required',
            ]);
            $r = Role::find($rid);
            if ($r->name != $request->name) {
                $this->validate($request, [
                    'name' => 'unique:roles,name',
                ]);
            }
            DB::beginTransaction();
            try {
                $r->name = $request->name;
                $r->display_name = $request->displayName;
                $r->update();
                foreach ($request->permission as $m) {
                    $p[] = Permission::find($m);
                }
                $r->syncPermissions($p);
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('success', "The role has been updated successfully.");
                return redirect()->route('role');
            } else {
                Session::flash('unSuccess', "Something went wrong :(");
                return redirect()->route('role');
            }

        } else {
            abort(403);
        }
    }


    public function roleDestroy($rid)
    {
        if (Auth::user()->isAbleTo('role') && (($rid * 1) > 3)) {
            $r = Role::find($rid);
            if ($r) {
                $a = User::whereRoleIs([$r->name])->get();
                if (count($a) > 0) {
                    Session::flash('unSuccess', "Can not delete Role with assigned users !");
                    return redirect()->back();
                } else {
                    $r->delete();
                    Session::flash('success', "The Role has bees deleted successfully");
                    return redirect()->back();
                }
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function permission()
    {
        if (Auth::user()->isAbleTo('permission')) {
            $ps = Permission::all();
            return view('permission.index', compact('ps'));
        } else {
            abort(403);
        }
    }


    public function permissionEdit($pid)
    {
        if (Auth::user()->isAbleTo('permission')) {
            $pedit = Permission::find($pid);
            if ($pedit) {
                $ps = Permission::all();
                return view('permission.edit', compact('ps', 'pedit'));
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function permissionUpdate(Request $request, $pid)
    {
        if (Auth::user()->isAbleTo('permission')) {
            $this->validate($request, [
                'displayName' => 'required',
                'description' => 'required',
            ]);
            $p = Permission::find($pid);
            $p->display_name = $request->displayName;
            $p->description = $request->description;
            $p->update();
            Session::flash('success', "The Permission has been updated successfully.");
            return redirect()->route('permission');
        } else {
            abort(403);
        }
    }



    public function test()
    {
        $a = VideoCategory::all();
        foreach ($a as $b) {
            $sc1s = VideoSubCategoryOne::where('category_id', $b->id)->get();
            $b['subCategoriesOne'] = $sc1s;
            foreach ($b['subCategoriesOne'] as $sc1) {
                $sc2s = VideoSubCategoryTwo::where('sub_category_one_id', $sc1->id)->get();
                $sc1['subCategoriesTwo'] = $sc2s;
                foreach ($sc1['subCategoriesTwo'] as $sc2) {
                    $vs = Video::where('sub_category_two_id', $sc2->id)->get();
                    $sc2['videos'] = $vs;
                }
            }
        }
        dd($a);
    }





}
