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
        $new = $request->all();

        $json = self::createJson($new);

        $blog = DB::table("blog")
            ->get();

        return view('school.recipes.publisher', compact('user', $user))
            ->with("json", '')
            ->with("blog", $blog);

    }

    public function createJson($blog)
    {
    
       $user = Auth::user();
       $num = count($blog);

        for($i=0; $i < $num; $i++){

            echo $blog->rr . $i;
        }

        $body = [

          
        ];

        $json = [

            "title"=> $blog->title,
            "p1"=> $blog->p1,
            "p2"=>$blog->p2,
            "text"=>[
                "tableOfContents"=>[

                    "li1"=> $blog->li1,
                    "li2"=> $blog->li2,
                    "li3"=> $blog->li3,
                    "li4"=> $blog->li4,
                    "li5"=> $blog->li5,
                    "li6"=> $blog->li6,
                    "li7"=> $blog->li7,
                    "li10"=> $blog->li8,
                    "li11"=> $blog->li9,
                    "li18"=> $blog->li10,
                    "li19"=> $blog->li0

                ],
                "content"=>[

                        "h2"=> "",
                        "paragraphs"=> [
                            "p"=> "",
                            "p1"=> "",
                            "p2"=> "",
                            "p3"=> "",
                            "p4"=> ""
                    
                        ]

                ],

                $body


            ],
            "img"=>$blog->img,
            "videoID"=>$blog->videoID
        ];

        return json_encode($json);
    }
}
