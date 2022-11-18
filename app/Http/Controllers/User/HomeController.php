<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
     /**
     * HomeController list method.
     *
     */
    public function index(Request $req)
    {
        $users = User::latest()->paginate(10);
        return view('user.pages.home',compact('users'));
    }
}
