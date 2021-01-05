<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Passport;

class ApiController extends Controller
{
    public function loginFail()
    {
        return response()->json([
            'error' => 'Token Error'
        ], 401);
    }




    public function loginu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } elseif (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->is_app == 1) {
                $responseArray = [];
//            Passport::personalAccessTokensExpireIn(now()->addHour(1));
//            Passport::personalAccessTokensExpireIn(now()->addWeeks(1));
//            Passport::personalAccessTokensExpireIn(now()->addMonths(1));
                Passport::personalAccessTokensExpireIn(now()->addDays(365));

                $responseArray['token'] = $user->createToken('userToken', ['user'])->accessToken;
                $responseArray['expire'] = "365 days from now";

                return response()->json($responseArray, 200);
            } else {
                return response()->json([
                    'error' => 'unauthorized'
                ], 401);
            }
        } else {
            return response()->json([
                'error' => 'unauthorized'
            ], 401);
        }
    }


    public function getCategories()
    {
        if (Cache::has('video_categories')) {
            $a = Cache::get('video_categories');
        } else {
            $a = VideoCategory::all();
            Cache::put('video_categories', $a, now()->addMonths(1));
        }
        $responseArray = [];
        $responseArray['data'] = $a;
        return response()->json($responseArray, 200);
    }



}
