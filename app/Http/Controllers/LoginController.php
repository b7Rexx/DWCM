<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('Login.login');
    }

    function loginAction(Request $request)
    {
        $login = ['name' => $request->name, 'password' => $request->pass];
        if (Auth::guard('web')->attempt($login)) {
            return redirect()->intended('admin-home');
        } else {
            return redirect()->to(route('login'))->with('fail', 'Failed to login');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout(); // log the user out of our application
        return redirect()->to('/'); // redirect the user to the login screen
    }

}
