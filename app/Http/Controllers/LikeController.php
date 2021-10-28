<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Posting;

class LikeController extends Controller

{
    public function create(Request $request) {
        $post_id = $request->post_id;
        $user_id = Auth::user()->id;
        
        $post = Posting::find($post_id);
        $post->users()->attach($user_id);

        return redirect('/');
    }
}