<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Posting;
use Auth;
use Storage;
class PostingController extends Controller
{
    
  public function add()
  {
    return view('posting.create');
  }

  public function create(Request $request)
  {
   
      // このファンクションを実行することによってデータベースのnewsテーブルにデータが追加される
      $this->validate($request, Posting::$rules);
      $post = new Posting;
      $post->user_id = Auth::id();
      $form = $request->all();
      if (isset($form['image'])) {
          $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
          $post->image_path = Storage::disk('s3')->url($path);   
      } else {
          $post->image_path = "";
      }

      unset($form['_token']);

      unset($form['image']);

      $post->fill($form);
      $post->save();

      return redirect('/');
  } 

  public function index(Request $request)
  {
    $cond_title = $request->cond_title;
    if ($cond_title != '') {
      // 検索されたら検索結果を取得する
      $posts = Posting::where('title', $cond_title)->get();
    } else {
      // それ以外はすべてのニュースを取得する
      $posts = Posting::all();
    }
    
    return view('posting.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

  public function update(Request $request)
  {
    $this->validate($request, Post::$rules);
    $posts = Post::find($request->id);
    $posts_form = $request->all();
    if ($request->remove == 'true') {
        $posts_form['image_path'] = null;
    } elseif ($request->file('image')) {
        $path = $request->file('image')->store('public/image');
        $posts_form['image_path'] = basename($path);
    } else {
      $posts_form['image_path'] = $posts->image_path;
    }

    unset($posts_form['_token']);
    unset($posts_form['image']);
    unset($posts_form['remove']);
    $posts->fill($posts_form)->save();

    return redirect('post/');
    }
    
     public function edit(Request $request)
   {
       // Profile Modelからデータを取得する
       $posting = Posting::find($request->id);
       if (empty($posting)) {
         abort(404);    
       }
       return view('posting.edit', ['posting_form' => $posting]);
   }
    
}