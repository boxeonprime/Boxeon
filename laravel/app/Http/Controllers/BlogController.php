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
            ->get()[0];

        if (isset($b)) {
            $test = $b;
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

                    "h2" => $blog['topics'][0],

                    "paragraphs" =>

                    $blog['hb'],

                ],

                "li2" => [

                    "h2" => $blog['topics'][1],

                    "paragraphs" =>

                    $blog['hb'],

                ],
                "li3" => [

                    "h2" => $blog['topics'][2],
                    "h41" => $blog['rech4'][0] ?? '',
                    "h42" => $blog['rech4'][1] ?? '',

                    "recipe" => [

                        "recipe1" => [

                            "paragraphs" =>

                            $blog['rec'],

                        ],
                        "recipe2" => [

                            "paragraphs" =>

                            $blog['rec2'] ?? '',

                        ],
                    ],
                ],
                "li4" => [

                    "h2" => $blog['topics'][3],

                    "instructions" =>

                    $blog['in'],

                ],

                "li5" => [

                    "h2" => $blog['topics'][4],

                    "paragraphs" =>

                    $blog['rv'],

                ],
                "li6" => [

                    "h2" => $blog['topics'][5],

                    "paragraphs" =>

                    $blog['si'],

                ],
                "li7" => [

                    "h2" => $blog['topics'][6],

                    "paragraphs" =>

                    $blog['pe'],

                ],

                "li8" => [

                    "h2" => $blog['topics'][7],

                    "paragraphs" =>

                    $blog['wh'],

                ],
                "li9" => [

                    "h2" => $blog['topics'][8],

                    "paragraphs" =>

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
