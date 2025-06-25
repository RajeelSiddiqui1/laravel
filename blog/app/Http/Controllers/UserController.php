<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    function users()
    {
        $users = DB::table('users')->get();
        if (empty($users)) {
            echo "no data";
        } else {
            return view('users', ['users' => $users]);
        }
        // $users = DB::table('users')->get();

    }

    function getFormApi()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $data = json_decode($response->body());
        $limiteddata = array_slice($data, 0, 9);
        return view('cards', ['data' => $limiteddata]);
    }

    function addUser(Request $request){
        $request->session()->flash('message','user add succssfully');
        return redirect('user');
    }
}
