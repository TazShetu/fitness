<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/v1/login', [ApiController::class, 'loginu']);

// add to resolve error route login not defined (route login is predefined)
// so when email password does not match laravel auto redirects to login route and show unauthorized....
Route::get('/login/fail', [ApiController::class, 'loginFail'])->name('loginFail');

Route::get('/v1/categories', [ApiController::class, 'getCategories'])->middleware(['auth:api', 'scope:user']);
Route::get('/v1/category/{cid}/sub_categories_one', [ApiController::class, 'getSubCategoriesOne'])
    ->middleware(['auth:api', 'scope:user']);
Route::get('/v1/category/{cid}/sub_category_one/{scid}/sub_category_two', [ApiController::class, 'getSubCategoriesTwo'])
    ->middleware(['auth:api', 'scope:user']);
Route::get('/v1/category/{cid}/sub_category_one/{sc1id}/sub_category_two/{sc2id}/videos', [ApiController::class, 'getVideosFromSidTwo'])
    ->middleware(['auth:api', 'scope:user']);
Route::get('/v1/music', [ApiController::class, 'getMusic'])->middleware(['auth:api', 'scope:user']);

Route::get('/v1/all', [ApiController::class, 'all'])->middleware(['auth:api', 'scope:user']);



