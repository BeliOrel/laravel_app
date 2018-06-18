<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // connect with post
//use DB;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // we need a few exceptions beacause we want
        // that guests see posts but tthey should not change or create them
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$posts = Post::all(); //fetch all the data in this model/table
      //$posts = Post::where('title', 'Post Two');
      //$posts = DB::select('SELECT * FROM posts');
      //$posts = Post::orderBy('title', 'desc')->take(1)->get(); //limit to 1 post
      // asc/desc order (text)
      //$posts = Post::orderBy('title', 'desc')->get();

      $posts = Post::orderBy('created_at', 'desc')->paginate(10); //pagination; 10 per page
      return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
          'title' => 'required',
          'body' => 'required'
        ]);

        // Create Post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save(); //save to DB

        // redirect
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     * Takes care of the individual posts
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // fetch data from DB as an object
        $post = Post::find($id);

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // fetch data from DB as an object
      $post = Post::find($id);

      // Check for correct user
      if(auth()->user()->id !== $post->user_id){
        return redirect('/posts')->with('error', 'Unauthorized Page');
      }

      return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // Validation
      $this->validate($request, [
        'title' => 'required',
        'body' => 'required'
      ]);

      $post = Post::find($id);
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      $post->save(); //save to DB

      return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
          return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $post->delete(); //delete from DB

        return redirect('/posts')->with('success', 'Post Removed');
    }
}
