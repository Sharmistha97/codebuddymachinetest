<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('user/home');
        }

        return redirect('user/login');
    }
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        // validation
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only(
            'username',
            'password'
        );

        // set the remember me cookie if the user check the box
        $remember = ($request->has('remember')) ? true : false;

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            return $this->redirectTo();
        }

        return redirect('user/login')->withErrors(['invalid' => 'Invalid credentials.']);
    }


    public function logout()
    {        
        Auth::guard('admin')->logout();
        return redirect('user/login');
    }
}
