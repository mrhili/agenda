<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  User
};

class UserController extends Controller
{
    //

    public function showUser(User $user){

      return view('back.users.show', compact('user'));

    }
}
