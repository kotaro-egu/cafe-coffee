<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment; 

class CommentController extends Controller
{
     public function store(CommentRequest $request)
    {
        $savedata = [
            'user_id' => $request->user_id,
            'text' => $request->text,
            'posting_id' => $request->posting_id,
        ];
 
        $comment = new Comment;
        $comment->fill($savedata)->save();
 
        return redirect()->route('bbs.show', [$savedata['posting_id']])->with('commentstatus','コメントを投稿しました');
    }
}
