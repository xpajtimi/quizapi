<?php

use App\Videos;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('videos/{id}', function ($id) {
//    try {
//    	     $name = Videos::findOrFail($id);
//    	     $filename = explode('/', $name->featured);

//    	     $file = asset('/videos/'. $filename[4]);
//          return $file;
         
// } catch(Exception $e) {

//            //    return view('welcome');
//          return $e;
// }
// });

Route::get('storage/{filename}', function ($filename)
{
    $path = asset($filename);
     dd(File::exists($path));
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);

    dd($file);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", 'video/mp4');

    return $response;
});