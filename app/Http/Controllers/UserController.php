<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // add
use App\Micropost; // add

class UsersController extends Controller
{
    
    
    //original function
    public function index()
    {
        $user = \Auth::user();
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
            'user' => $user,
        ]);
    }
    
      public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    //follow function
     public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    //favorite
    public function favorings($id)
    {
        $user = User::find($id);
        
        $favorings = $user->favorings()->paginate(10);

        $data = [
            'user' => $user,
            
            'microposts' => $favorings,
        ];

        $data += $this->counts($user);

        return view('users.favorings', $data);
    }

    
   
}

