<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends ApiController
{
    public function index()
	{	
		$users = User::all();

		return $this->showAll($users);

	}

    public function store(Request $request)
    {
    	$rules = [
            'name' => 'required',
            'surname' => 'required',
            'telephone' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $user = User::create($data);

        return $this->showOne($user);
    }
}
