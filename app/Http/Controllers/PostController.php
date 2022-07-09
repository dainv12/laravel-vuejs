<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\PostRepositoryInterface;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Http\Resources\PostResource;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    protected $post;
    public function __construct(PostRepositoryInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = $this->post->getFearturePost();
        // $postUser = User::find(1)->posts;
        // $postCategory = Category::find(40)->posts;
        // // dd($postCategory);
        // return view('posts',compact('posts'));

        return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
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
}
