<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class AuthController extends Controller
{
    public function LoginProcess(Request $request)
    {


        $data=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);


        if (auth()->attempt($data))
        {
            return redirect('/f');
        }
        else{
            return redirect()->back();
        }

    }

    public function Showlogin()
    {
        return view('admin.user.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
