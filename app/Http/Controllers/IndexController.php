<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class IndexController extends Controller
{
    /*
     * Main Function on /
     * Displays the main information and 10 last publications
     * @return View and $posts Post
     * */
    public function index(){

        $posts=DB::table('Posts')
            ->leftJoin('users', 'Posts.id_user', '=', 'users.id')
            ->select(
                [
                    'Posts.id',
                    'Posts.title',
                    'Posts.description',
                    'Posts.views',
                    'Posts.created_at',
                    'users.name'
                ])
            ->orderBy('id', 'desc')->limit(10)->get();
        return view('index')->with(['posts'=>$posts]);
    }

    /*
     * Show publication page
     * $id - publication number
     * @return View and $post Post
     * */
    public function show($id){
        DB::table('Posts')->where('id',$id)->increment('views');

        $post=DB::table('Posts')
            ->leftJoin('users', 'Posts.id_user', '=', 'users.id')
            ->select(
                [
                    'Posts.id',
                    'Posts.title',
                    'Posts.text',
                    'Posts.views',
                    'Posts.created_at',
                    'users.name'
                ])
            ->where('Posts.id',$id)->first();
        return view('show')->with(['post'=>$post]);
    }

    /*
     * Show blog information :
     * - Count all publications
     * - Most popular publication
     * - Last update post
     * @return View, $count_all Int, $popular_post Post, $last_update_post Post
     * */

    public function info(){
        $count_all = DB::table('Posts')->count('id');
        $popular_post = DB::table('Posts')
            ->leftJoin('users', 'posts.id_user', '=', 'users.id')
            ->select(
                [
                    'Posts.id',
                    'Posts.title',
                    'Posts.views',
                    'users.name'
                ])
            ->orderBy('Posts.views', 'desc')
            ->first();

        $last_update_post = DB::table('Posts')
            ->select(
                [
                    'id',
                    'title',
                    'updated_at'
                ])
            ->orderBy('updated_at', 'desc')
            ->first();
        return view('info')->with([
            'count_all'=>$count_all,
            'popular_post'=>$popular_post,
            'last_update_post'=>$last_update_post
        ]);
    }

    /*
     * Contact
     * Request $request -> Post parametrs
     * Saving to the database 'Mails' : mail,text
     * Sending mail to administrator => $to
     * @return View, send = 1 Int => Show the user that the request was successful
     * */
    public function SendMail(Request $request){
        $from = $request->all()['mail'];
        $text = $request->all()['text'];

        $to = "stas.evgen9@gmail.com";

        $this->validate($request,[
            'mail' => 'required',
            'text' => 'required'
        ]);

        DB::table('Mails')->insert([
            ['mail' => $from, 'text' => $text]
        ]);

        $header = "From: <".$from."> \r\n";
        mail($to, "Новое обращение", $text, $header);

        return view('contact')->with(['send'=>1]);
    }
}
