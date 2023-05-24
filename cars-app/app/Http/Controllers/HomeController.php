<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\user;

class HomeController extends Controller
{

    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->name == 'Admin') {
                return view('admin.admin');
            } else {
                return view('user.user');
            }
        }
        else {
            return redirect()->back();
        }
    }

    public function index() {
        return view('user.home');
    }
}
