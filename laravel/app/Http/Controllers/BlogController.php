<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if ($user = Auth::user()) {
            $id = auth()->user()->id;
          
        }else{
            
            $id = null;
        }

        $blogID = $request["blog_id"];
        $name = $request["name"];
        $stars = $request["stars"];
        $comment = $request["message"];
        DB::table("comments")->insert(["name" => $name, "user_id"=> $id, "stars" => $stars, "message" => $comment, "blog_id" => $blogID]);
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

            $products = DB::table("products")
            ->select("id", "name")
            ->get();

        return view('school.recipes.publisher', compact('user', $user))
        ->with("products", $products)
            ->with("blog", $blog);
    }

    public function get(Request $request)
    {
        $user = Auth::user();

        $products = DB::table("products")
        ->select("id", "name")
        ->get();

        if (empty($request["id"])) {

       
            
       //     return view('posts', compact('shareComponent'));

            $blog = DB::table("blog")
                ->get();


            Session::flash('message', 'Ready.');
            return view('school.recipes.publisher', compact('user', $user))
                ->with("json", '')
                ->with("products", $products)
                ->with("blog", $blog);

        }
        $blogID = $request["id"];

        $edit = DB::table("blog")
            ->where("id", "=", $blogID)
            ->get()[0];

        $blog = DB::table("blog")
            ->get();
        $json = json_decode($edit->json);

        Session::flash('message', 'Begin.');
        return view('school.recipes.publisher', compact('user', $user))
            ->with("blog", $blog)
            ->with("products", $products)
            ->with("json", $json)
            ->with("edit", $edit);
    }
    public function save(Request $request)
    {
        $user = Auth::user();
        $new = $request->all();

        $id = $new["id"];

        $b = DB::table("blog")
            ->where("id", "=", $id)
            ->get();

        if (isset($b[0])) {
            $test = $b[0];
        }

        $json = self::createJson($new);

        $products = DB::table("products")
        ->select("id", "name")
        ->get();

    

        if (isset($test->id)) {
           
            DB::table("blog")
                ->where("id", "=", $id)
                ->update([

                    "json" => $json,
                    "keywords" => $new["keywords"],
                    "category" => $new["category"],
                    "uri" => $new["uri"],
                    "blurb" => $new["blurb"],
                    "products" => json_encode($new["products"]),
                    "short_title" => $new["short_title"],

                ]);

        } else {

            DB::table("blog")
                ->where("id", "=", $id)
                ->insert([

                    "json" => $json,
                    "keywords" => $new["keywords"],
                    "category" => $new["category"],
                    "uri" => $new["uri"],
                    "blurb" => $new["blurb"],
                    "products" => json_encode($new["products"]),
                    "short_title" => $new["short_title"],
                ]);

        }

        $blog = DB::table("blog")
            ->get();
        Session::flash('message', 'Saved.');
        return view('school.recipes.publisher', compact('user', $user))
            ->with("json", '')
            ->with("products", $products)
            ->with("blog", $blog);

    }

    public function createJson($blog)
    {

      //  dd( $blog['ul']);

        $user = Auth::user();
        $num = count($blog);

        $json = [

            "title" => $blog['title'],
            "short_title" => $blog['short_title'],
            "p1" => $blog["p1"],
            "p2" => $blog["p2"],

            "text" => [
                "tableOfContents" =>

                $blog['topics']

                ,
                "content" => [

                    "h2" => $blog['topics'][0], // // What are moin moin's health benefits?

                    "paragraphs" =>

                    $blog['hb'],

                ],

                "li2" => [

                    "h2" => $blog['topics'][1], // Can pregnant women eat moin moin?

                    "paragraphs" =>

                    $blog['preg'],

                ],
                "li3" => [

                    "h2" => $blog['topics'][2],  // Out favorite recipe

                    "recipe" => 


                            $blog['rec'],

                   
                    ],
                ],
                "li4" => [

                    "h2" => $blog['topics'][3], // How to cook moin moin?

                    "instructions" =>

                    $blog['in'],

                ],

                "li5" => [

                    "h2" => $blog['topics'][4], //Recipe variations

                    "paragraphs" =>

                    $blog['rv'],

                ],
                "li6" => [

                    "h2" => $blog['topics'][5], // Tips and tricks

                    "paragraphs" =>

                    $blog['tt'],

                ],
                "li7" => [

                    "h2" => $blog['topics'][6],  // Serving and storage instructions

                    "paragraphs" =>

                    $blog['si'],

                ],

                "li8" => [

                    "h2" => $blog['topics'][7], // What to eat it with?

                    "paragraphs" =>

                    $blog['pe'],

                ],
                "li9" => [

                    "h2" => $blog['topics'][8], // Where to find Moin Moin near  you?

                    "paragraphs" =>

                    $blog['wh'],

                ],
                "li10" => [

                    "h2" => $blog['topics'][9], // Last but not least

                    "paragraphs" =>[

                    $blog['c'],

                ],

            ],
            "inserts" => [

                "uls" => [

                    $blog['ul'] ?? '',

                ],
                "subs" => [

                    $blog['sub'] ?? '',
                ],

            ],
            "img" => $blog['img'],
            "videoID" => $blog['videoID'],

        ];

        return json_encode($json);
    }
}

 


