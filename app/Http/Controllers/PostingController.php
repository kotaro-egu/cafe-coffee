<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Posting;

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
      $posts = new Posting;
      $form = $request->all();
      if (isset($form['image'])) {
          $path = $request->file('image')->store('public/image');
      
          $posts->image_path = basename($path);;
      } else {
          $posts->image_path = null;
      }

      unset($form['_token']);

      unset($form['image']);

      $posts->fill($form);
      $posts->save();

      return redirect('posting/create');
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
}
