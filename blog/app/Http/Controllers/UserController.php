<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('is_admin');
    }

    public function index()
    {
        $users = User::orderBy('created_at','desc')->get();
        return view('users.index')->with('users' ,$users);

    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
       $this->validate($request , [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],

       ]);

      $user =  User::create([
        'name' => $request->name ,
        'email' => $request->email ,
        'password' => Hash::make($request->password ),
    ]);

    $profile = Profile::create([
        'province' => 'Kirkuk',
        'user_id'	 =>$user->id,
        'gender' => 'Male',
        'bio'	 => 'Hello world',
        'facebook' => 'https://www.facebook.com',
       ]);

         return redirect()->route('users');

    }


    public function destroy($id)
    {
        $user =  User::find($id);
        $user->profile->delete($id);
        $user->delete();
        return redirect()->route('users');
    }




    public function admin($id)
    {
        $user =  User::find($id);
        $user->is_admin = 1;
        $user->save();
        return redirect()->route('users');
    }

    public function notAdmin($id)
    {
        $user =  User::find($id);
        $user->is_admin = 0;
        $user->save();
        return redirect()->route('users');
    }



    public function search(Request $request)
    {
        $q = $request->q;
        $user =  User::Where('name' , 'LIKE' , '%' . $q .'%')
                       ->orWhere('email' , 'LIKE' , '%' . $q .'%')->get();

                     //  dd($user);

        $users = User::orderBy('created_at','desc')->get();

                       if ( $user->count() > 0) {
                        return view('users.index')
                        ->withDetails($user)->withQuery($q)->with('users',$users);
                       }
                       else{
                        // $users = User::orderBy('created_at','desc')->get();
                        return view('users.index')
                        ->withMessage('Not found'  )->with('users',$users);
                       }





    }



}
