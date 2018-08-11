<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Adress};
class DashboardController extends Controller
{
    //

    public function index(){
      $informations = Adress::all()->count();
      $users = User::where('role', 0)->count();
      $admins = User::where('role', 2)->count();
      $workers = User::where('role', 1)->count();
      return view('back.dashboard.index', compact('admins','users', 'workers', 'informations'));
    }
}
