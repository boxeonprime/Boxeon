<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
        return view('blog.index', compact('user', $user));
    }

    public function comment(Request $request)
    {
        $blogID = $request["blog_id"];
        $name = $request["name"];
        $stars = $request["stars"];
        $comment = $request["message"];
        DB::table("comments")->insert(["name"=>$name,"stars"=>$stars, "message"=>$comment, "blog_id"=>$blogID]);
        Session::flash('message', 'Comment posted');
       return Redirect::to(url()->previous());
    }
}
