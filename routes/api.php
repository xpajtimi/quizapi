<?php

use Illuminate\Http\Request;

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

Route::name('test')->get('usernames', 'UsersController@index');
Route::name('test')->post('username', 'UsersController@store');

//Route::resource('videos', 'VideosController', ['except' => ['create', 'edit']]);
//Route::resource('assets', 'AssetsController', ['except' => ['create', 'edit']]);

Route::get('get-videos', 'VideosController@index');

Route::get('get-video/{video}', 'VideosController@getVideo')->name('getVideo');

Route::get('get-asset/{name}', 'AssetsController@getAsset')->name('getAsset');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('storage/{filename}', function ($filename)
// {
//     $path = storage_path('public\\' . $filename);
//    var_dump($path);
//    // dd(File::exists($path));
//     if (!File::exists($path)) {
//        // abort(404);
//     }

//     $file = File::get($path);
//     $type = File::mimeType($path);

//     $response = Response::make($file, 200);
//     $response->header("Content-Type", 'video/mp4');

//     return $response;
// });