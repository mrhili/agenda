<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

use ArrayHolder;

use App\{User};

class AdminController extends Controller
{
    //

    public function addUserEdit(Request $request, User $user){
      $infoUser = array_except( $request->all(),['_token']);

      $user->fill( $infoUser )->save();

      alert()->success('Success','Les informations son changer avec succes');

      return redirect()->back()->withInput();
    }

    public function users($role = null){

      return view('back.users.list');


    }

    public function addUser($role = null){

      if($role == null  ){
        $kind = "";
        $role_id = 0;
      }else{
        $kind =  ArrayHolder::roles( $role ) ;
        $role_id = $role;
      }

      return view('back.users.add', compact('kind', 'role_id'));

    }

    public function addUserPost(Request $request){

      $array = array_except( $request->all(), ['_token','img']);

      if( $request->hasFile( 'img' ) ){


    		$array["img"] = CommonPics::storeFile($request->img , 'users' );

    	}

      $array["password"] = bcrypt($request->password );

      $user = User::create($array);

      if($user){

        Alert::success('User est créer avec succes', 'Congrlations');

        return redirect()->route('users.show', $user->id);


      }else{

      }


      return $array;
    }
}
