<?php

namespace App\Http\Controllers;

use App\Videos;
use Illuminate\Http\Request;

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
