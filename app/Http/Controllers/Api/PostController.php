<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        // $posts = Post::with(['category', 'tags'])->get();
        $posts = Post::with(['category', 'tags'])->paginate(3);

        return response()->json(
            [
                'success' => true,
                'results' => $posts
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        if ($post) {
            return response()->json(
                [
                    'success' => true,
                    'result' => $post
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'result' => "this post doesn't exists"
                ]
            );
        }
    }
}