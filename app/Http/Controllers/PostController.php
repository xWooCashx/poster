<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts', ['postsToShow' => $posts]);
    }

    public function indexTop()
    {
        $posts = Post::orderBy('upvotes','desc')->paginate(10);
        return view('posts', ['postsToShow' => $posts]);
    }
    public function indexUser($id)
    {
        $posts = Post::where('user_id',$id)->orderBy('created_at','desc')->paginate(10);
        return view('posts', ['postsToShow' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $image = $request->file('file');

        $path = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $path);
        $post = new Post();
        $post->title = $request->title;
        $post->path = $path;
        $post->created_at = now();
        $post->user_id = \Auth::user()->id;
        $post->save();
        return view('post')->with('success', 'Image Uploaded Successfully')->with('post', $post);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view("post", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      //dd("deleted".$post->title);
        $post->delete();
        return redirect('/posts')->with("deleted","Your post were deleted");
    }
}
