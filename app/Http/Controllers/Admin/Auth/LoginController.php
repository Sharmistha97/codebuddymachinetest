<?php

namespace App\Http\Controllers\Admin\Auth;

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
            return redirect('admin/home');
        }

        return redirect('admin/login');
    }
    public function showLoginForm()
    {
        return view('admin.auth.login');
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

        return redirect('admin/login')->withErrors(['invalid' => 'Invalid credentials.']);
    }


    public function logout()
    {        
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
