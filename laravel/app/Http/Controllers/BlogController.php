<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
       
        $user = Auth::user();
        return view('blog.index', compact('user', $user));
    }


    public function post(Request $request)
    {
       
        $user = Auth::user();
        return view('blog.post', compact('user', $user));
    }
}
