<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function list()
    {
        $comments = Comment::all();
        $items = [];
        foreach ($comments as $comment) {
            $items[] = [
                'id' => $comment->id,
                'name' => $comment->name,
                'comment' => $comment->comment,
            ];
        }
        return response()->json($items);
    }
}
