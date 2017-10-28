<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return redirect
     */
    public function index()
    {
        return redirect('home/add');
    }

    /**
     * Add new publication page
     *
     * @return View or redirect
     */
    public function add()
    {
        if (Auth::check())
        {
            return view('admin/add');
        }else{
            return redirect('home');
        }
    }

    /**
     * Display all publications for edit
     *
     * @return View or redirect
     */
    public function edit()
    {
        if (Auth::check())
        {
            $posts = Post::select(['id','title','description','created_at','updated_at','views'])->orderBy('id', 'desc')->get();
            return view('admin/edit')->with(['posts'=>$posts]);
        }else{
            return redirect('home');
        }
    }

    /**
     * Edit publication page
     *
     * @return View or redirect
     */
    public function EditPost($id)
    {
        if (Auth::check())
        {
            $post=Post::select(['id','title','description','text','created_at','views'])->where('id',$id)->first();
            return view('admin/EditPost')->with(['post'=>$post]);
        }else{
            return redirect('home');
        }
    }

    /*
     * Add new publication in blog
     * Request $request -> Post parametrs
     * return view(), send = 1 Int => Show the user that the request was successful
     * */
    public function AddPost(Request $request)
    {
        if (Auth::check())
        {
            $this->validate($request,[
                'title' => 'required|max:300|unique:Posts',
                'description' => 'required|unique:Posts',
                'text' => 'required'
            ]);
            $data = $request->all();
            $post = new Post;
            $post->fill($data);
            $post->id_user = Auth::id();
            $post->save();
            $id = $post->id;
            return redirect()->route('show',[
                $id
            ]);
        }else{
            return redirect('home');
        }
    }

    /*
    * Save publication with new parametrs
    * Request $request -> Post parametrs
    * Int $idPost
    * return redirect
    * */
    public function SavePost($idPost, Request $request)
    {
        if (Auth::check())
        {
            $this->validate($request,[
                'title' => 'required|max:300|unique:Posts,title,'.$idPost,
                'description' => 'required|unique:Posts,description,'.$idPost,
                'text' => 'required'
            ]);
            $data = $request->all();
            $post = App\Post::find($idPost);
            $post->fill($data);
            $post->id_user = Auth::id();
            $post->save();

            return redirect()->route('show',[
                $idPost
            ]);
        }else{
            return redirect('home');
        }
    }

    /**
     * Delete publication
     *
     * @return redirect
     */
    public function DeletePost($idPost)
    {
        $post = App\Post::find($idPost);
        $post->delete();
        return redirect('home/edit');
    }
}
