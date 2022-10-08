<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
        DB::table("comments")->insert(["name" => $name, "stars" => $stars, "message" => $comment, "blog_id" => $blogID]);
        Session::flash('message', 'Comment posted');
        return Redirect::to(url()->previous());
    }

    public function edit(Request $request)
    {
        $user = Auth::user();

        //$blogID = $request["blog_id"];
        $blog = DB::table("blog")
        // ->where("id", "=", $blogID)
            ->get();

        return view('school.recipes.publisher', compact('user', $user))
            ->with("blog", $blog);
    }

    public function get(Request $request)
    {
        $user = Auth::user();

        if (empty($request["id"])) {

            $blog = DB::table("blog")
                ->get();

            return view('school.recipes.publisher', compact('user', $user))
                ->with("json", '')
                ->with("blog", $blog);

        }
        $blogID = $request["id"];

        $edit = DB::table("blog")
            ->where("id", "=", $blogID)
            ->get()[0];

        $blog = DB::table("blog")
            ->get();
        $json = json_decode($edit->json);
        return view('school.recipes.publisher', compact('user', $user))
            ->with("blog", $blog)
            ->with("json", $json)
            ->with("edit", $edit);
    }
    public function save(Request $request)
    {
        $user = Auth::user();
        $new = json_encode($request->all());

        $blog = DB::table("blog")
            ->get();

        return view('school.recipes.publisher', compact('user', $user))
            ->with("json", '')
            ->with("blog", $blog);

    }

    public function createJson(Request $request)
    {
        $user = Auth::user();
        $blog = json_encode($request["blog"]);
        $json = [];

        return $json;
    }
}
