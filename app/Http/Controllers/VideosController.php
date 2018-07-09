<?php

namespace App\Http\Controllers;

use App\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;




class VideosController extends ApiController
{

	public function index()
	{

		$videos = Videos::all();
     

		return $this->showAll($videos);

	}
    public function show($id)
    {
        $video = Videos::findOrFail($id);

        return $this->showOne($video);
    }

    public function getVideo($id)
    {
     $video = Videos::findOrFail($id);
    $name = $video->featured;
    $filename = explode('/' , $name);
     // dd($directory);
   
    //$fileContents = Storage::get('/videos/'. $filename[4]);
     
  $fileContents = asset('/videos/'. $filename[4]);
  //  $fileContents = asset('storage/videos/1515589138videoplayback.mp4');
  //  return response()->file('storage/videos/1515589138videoplayback.mp4');
   return response($fileContents, 200)
                  ->header('Content-Type', 'video/mp4');
  // dd(File::exists($fileContents));
   // $fileContents = Storage::get($filename[4]);
  // $fileContents = Storage::get($name);
   // dd($fileContents);
  // $response = Response::make($fileContents, 200);
 //  dd($response);

      // return response()->download($url);

     
    }
    
    public function store(Request $request)
    {

    	$rules = [
    		'featured' => 'required|file',
    	];

    	$this->validate($request, $rules);

    	$featured = $request->featured;

    	$featured_new_name = time().$featured->getClientOriginalName();

    	$featured->move('videos', $featured_new_name);

        $video = Videos::create([

        	'featured' => 'videos/' . $featured_new_name,

        ]);


        return $this->showOne($video);
    }
}
