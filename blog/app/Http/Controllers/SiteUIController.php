<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;

class SiteUIController extends Controller
{

    public function index()
    {
        $tags = Tag::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        $first_post = Post::orderBy('created_at', 'desc')->first();
        $second_post = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first();
        return view('siteui.index')
        ->with('first_post',$first_post)
        ->with('second_post',$second_post)
        ->with('third_post',$third_post)
        ->with('posts',$posts)
        ->with('tags',$tags);
    }

    public function showPost($slug)
    {
        $tags = Tag::all();

        $tags = Tag::all();
        $post = Post::where('slug' , $slug )->first();

        return view('siteui.show')->with('post',$post)
        ->with('tags',$tags);
    }



    public function tag($id)
    {
        $tag = Tag::find($id);

        return view('siteui.tag')->with('tag',$tag);
    }

}
