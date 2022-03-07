<?php

namespace App\Http\Controllers;

use App\Models\Post as ModelsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = ModelsPost::orderBy('id', 'DESC')->get();
        return \view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('posts.create')->with('success', 'Post has created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'body' => 'required', 'cover_image' => 'image|nullable|max:1999']);

        //handl image upload
        if($request->hasFile('cover_image')){
            // Get Filename with Extention
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //fileToStore
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);

        } else{
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new ModelsPost;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return \redirect('/posts')->with('sucess', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = ModelsPost::find($id);
        return view('posts.show')->with('posts', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = ModelsPost::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Please Register Your Account TO Perfom This Actions');
        }
        return view('posts.edit')->with('posts', $post);
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

        //handl image upload
        if($request->hasFile('cover_image')){
            // Get Filename with Extention
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //fileToStore
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);

        }

        $this->validate($request, ['title' => 'required', 'body' => 'required']);
        $post = ModelsPost::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return \redirect('/posts')->with('sucess', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = ModelsPost::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Please Register Your Account TO Perfom This Actions');
        }
        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images'.$post->cover_image);
        }
        $post->delete();
        return \redirect('/posts')->with('success', 'Post Removed');
    }
}
