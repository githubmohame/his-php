<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    public function SignUp(){
        $error=array();
        //array_push($error,'kiiii');
        //dd(User::all());
        return view('signup',['error'=>$error]);
    }    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser( )
    {
        //dd('ooooo');
        $error=array();
        //array_push($error,'kiiii');
        //dd(User::all());
        $request=Request();
        if(User::where('email', '=',$request['email'])->count()>0){
            array_push($error,'the email is aready used');
        }
        if($request['password']!==$request['password_confirmation']){
            array_push($error,'the confirm should be like password');
        }
        if(count($error)>0){
            return view('signup',['error'=>$error]);
        }
        //dd($request->all());
        $password=\Hash::make($request['password']);
        User::create([
            'email'=>$request['email'] ,
            'password'=>$password,
            'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'address'=>$request['address'],
        ]);
        return 'scusses';
    }


}
