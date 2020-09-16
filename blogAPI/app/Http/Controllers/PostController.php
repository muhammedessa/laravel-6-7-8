<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;

class PostController extends BaseController
{

    public function index()
    {
    $posts = Post::all();
    return $this->sendResponse(PostResource::collection($posts), 'Posts retrieved Successfully!' );
    }


    public function userPosts($id)
    {
    $posts = Post::where('user_id' , $id)->get();
    return $this->sendResponse(PostResource::collection($posts), 'Posts retrieved Successfully!' );
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'title'=>'required',
            'description'=>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validate Error',$validator->errors() );
        }

        $user = Auth::user();
        $input['user_id'] = $user->id;
        $post = Post::create($input);
        return $this->sendResponse($post, 'Post added Successfully!' );

    }


    public function show($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return $this->sendError('Post not found!' );
        }
        return $this->sendResponse(new PostResource($post), 'Post retireved Successfully!' );

    }

    public function update(Request $request, Post $post)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'title'=>'required',
            'description'=>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation error' , $validator->errors());
        }


        if ( $post->user_id != Auth::id()) {
            return $this->sendError('you dont have rights' , $validator->errors());
        }
        $post->title = $input['title'];
        $post->description = $input['description'];
        $post->save();

        return $this->sendResponse(new PostResource($post), 'Post updated Successfully!' );

    }

    public function destroy(Post $post)
    {
        $errorMessage = [] ;

        if ( $post->user_id != Auth::id()) {
            return $this->sendError('you dont have rights' , $errorMessage);
        }
        $post->delete();
        return $this->sendResponse(new PostResource($post), 'Post deleted Successfully!' );

    }
}
