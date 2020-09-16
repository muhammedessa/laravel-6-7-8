<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('posts.index' ,compact('posts') );
    }

    public function create()
    {
        return view('posts.create'  );
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show' ,compact('post') );
    }


}
