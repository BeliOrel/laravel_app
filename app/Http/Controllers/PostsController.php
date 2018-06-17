<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // connect with post
//use DB;

class PostsController extends Controller
{
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
      
      $posts = Post::orderBy('title', 'desc')->paginate(10); //pagination; 10 per page
      return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
