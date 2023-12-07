<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest; 


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //display all posts
    public function showPosts() {
        $posts = DB::table('posts')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->join('categories', 'posts.categories_id', '=', 'categories.id')
                ->select('posts.*', 'users.name', 'categories.title as cat_title')
                ->get();
        return response()->json($posts);
    }

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
