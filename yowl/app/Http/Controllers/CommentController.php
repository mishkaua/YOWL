<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function getComments() {
        $comments = DB::table('comments')
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('comments.*', 'users.name')
        ->get();
        return response()->json($comments);
    }

    public function addComment (Request $request) {
        $comment = new Comment;
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->created_at = $request->created_at;
        $comment->save();
        return response()->json([
            "message" => "Comment added."
        ], 201);
    }
}
