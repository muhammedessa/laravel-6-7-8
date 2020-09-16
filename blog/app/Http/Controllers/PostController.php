<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $posts = Post::orderBy('created_at' , 'DESC')->get();
        return view('posts.index')->with('posts',$posts);
    }

    public function postsTrashed()
    {
        $posts = Post::onlyTrashed()->where('user_id', Auth::id())->get();
        return view('posts.trashed')->with('posts',$posts);
    }

    public function create()
    {
        $tags = Tag::all();
        if ($tags->count() == 0) {
            return   redirect()->route('tag.create');
        }
        return view('posts.create')->with('tags' ,  $tags);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>  'required',
            'content' =>  'required',
            'tags' =>  'required',
            'photo' =>  'required|image',
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);

        $post = Post::create([
            'user_id' =>  Auth::id(),
            'title' =>  $request->title,
            'content' =>   $request->content,
            'photo' =>  'uploads/posts/'.$newPhoto,
            'slug' =>   str_slug($request->title),
        ]);
        $post->tag()->attach($request->tags);

        return redirect()->back() ;

    }


    public function show( $slug)
    {
        $tags = Tag::all();
        $post = Post::where('slug' , $slug )->first();
       // dd($post);
        // if ($post === null) {
        //     return redirect()->back() ;
        // }
        return view('posts.show')->with('post',$post)
        ->with('tags',$tags);
    }


    public function edit(  $id)
    {
        $tags = Tag::all();
       // $post = Post::find( $id ) ;
        $post = Post::where('id' , $id )->where('user_id', Auth::id())->first();
         if ($post === null) {
            return redirect()->back() ;
        }
        return view('posts.edit')->with('post',$post)
        ->with('tags',$tags);
    }

    public function update(Request $request,  $id)
    {
        $post = Post::find( $id ) ;
        $this->validate($request,[
            'title' =>  'required',
            'content' =>  'required'
        ]);

     //   dd($request->all());

    if ($request->has('photo')) {
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);
        $post->photo ='uploads/posts/'.$newPhoto ;
    }

    $post->title = $request->title;
    $post->content = $request->content;
    $post->save();
    $post->tag()->sync($request->tags);
    return redirect()->back() ;

    }

    public function destroy( $id)
    {
        //dd($id);
       // $post = Post::find( $id ) ;

        $post = Post::where('id' , $id )->where('user_id', Auth::id())->first();
        if ($post === null) {
           return redirect()->back() ;
       }

        $post->delete($id);
        return redirect()->back() ;
    }


    public function hdelete( $id)
    {
        $post = Post::withTrashed()->where('id' ,  $id )->first() ;
        $post->forceDelete();
        return redirect()->back() ;
    }

    public function restore( $id)
    {
        $post = Post::withTrashed()->where('id' ,  $id )->first() ;
        $post->restore();
        return redirect()->back() ;
    }
}
