<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function post_comment(Request $request){
        $comment = new Comment();
        $comment->article_id = $request->article_id;
        $comment->full_name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->message;
        $comment->save();
        return redirect()->back();
    }
}
