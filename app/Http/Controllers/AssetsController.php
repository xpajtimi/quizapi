<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;
use Illuminate\Filesystem\response;
use Illuminate\Support\Facades\Storage;


class AssetsController extends ApiController
{

	public function index()
	{

		$assets = Asset::all();
     

		return $this->showAll($assets);

	}

    public function getAsset($id)
    {
  		$asset = Asset::findOrFail($id);

  		$name = $asset->name;
  		$files = Storage::files('public/assets');

  		//dd($files);

  		//$filename = explode('/' , $name);
  		//dd($filename);
       // $fileContents = Storage::get('/assets/' . $filename[3]);
     	//dd(public_path('\assets\\' . $filename[3]));
     	return response()->file('storage/assets/myasset');
       // return response()->download(Storage::get($files[0]));

    }
}
