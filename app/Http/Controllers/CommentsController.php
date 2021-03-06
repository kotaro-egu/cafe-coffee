<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest; 

use App\Comment; 
 
class CommentsController extends Controller

{
     public function add($posting_id){
        return view('comments.create')->with('posting_id',$posting_id);
     }
    
     public function store(CommentRequest $request)
    {
        $savedata = [
            'user_id' => $request->user_id,
            'text' => $request->text,
            'posting_id' => $request->posting_id,
        ];
      
        $comment = new Comment;
        $comment->fill($savedata)->save();
        
        return redirect('/');
    }

}

