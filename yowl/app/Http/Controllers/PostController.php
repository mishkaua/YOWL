<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest; 
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['author'])->paginate(10);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $post = Post::with(['author'])->where('id',$id)->first();
       return PostResource::collection($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
       /*  $data = $request->validated();
        $post = Post::where('id', $id)->first();
        $post->update($data);
        return new PostResource($post); */

        $data = $request->validated();
        $data = array_filter($data);
        Post::where('id', $id)->update($data);
        return response()->json(['msg' => 'Post updated successfully!!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Post::where('id', $id)->delete();
       return response()->json(['msg' => 'Post deleted successfully!']);
    }
}
