<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function RegisterView(){
        return view('auth.register');
    }

    function register(Request $request ){

        $validator = Validator::make($request->all(),[
           "name"=>"required",
           "email"=>"required | email | unique:users,email",
           "password"=>"required | confirmed",
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $user = new User;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = hash::make($request->password);
       

       if(!$user->save()){
        session()->flash('error','Error in register');
        return redirect()->route('auth.register');
       }else{
         session()->flash('success','Register successfully completed');
        return redirect()->route('auth.loginview');
       }
      
    }

    function LoginView(){
        return view('auth.login');
    }


    function login(Request $request){
        $validator = Validator::make($request->all(),[
              'email'    => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $creditional = $request->only('email','password');

        if(Auth::attempt($creditional)){
             session()->flash('success', 'Logged in successfully!');
            return redirect()->route('products.index');
        }else {
            return redirect()->back()->with('error', 'Invalid credentials')->withInput();
        }
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
         return redirect()->route('auth.loginview')->with('success', 'Logged out successfully.');
    }
}
