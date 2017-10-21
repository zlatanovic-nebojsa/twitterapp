<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;


class UserController extends Controller
{
    public function index(User $user)
    {
    	$followers = Auth::user()->followers;
    	return view('users.index')->with([
    		'user' => $user,
    		'followers' => $followers
    	]);
    }

    public function follow(Request $request, User $user)
    {
    	if ($request->user()->canFollow($user)) {
    		$request->user()->following()->attach($user);
    	}

    	return redirect()->back();
    }

    public function unfollow(Request $request, User $user)
    {
    	if ($request->user()->canUnfollow($user)) {
    		$request->user()->following()->detach($user);
    	}

    	return redirect()->back();
    }
}
