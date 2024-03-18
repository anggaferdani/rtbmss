<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login() {
        return view('pages.authentication.login');
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            'user_name' => 'required',
            'password' => 'required',
        ]);
    
        $user = DB::table('sys_user')->where('user_name', $request->user_name)->first();
    
        if ($user && $user->password === $request->password) {
            if ($user->access_id == 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Your account has been deactivated. Please contact support for assistance.');
            }
        } else {
            return back()->with('error', 'The username or password you entered is incorrect. Please try again.');
        }
    }
    

    public function logout() {
        Auth::guard('web')->logout();

        return redirect()->route('login')->with('success', 'You have been successfully logged out.');
    }
}
