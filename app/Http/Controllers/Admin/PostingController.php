<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Posting;

class PostingController extends Controller
{

  public function add()
  {
    return view('admin.posting.create');
  }

 public function create(Request $request)
  {
      // このファンクションを実行することによってデータベースのnewsテーブルにデータが追加される
      $this->validate($request, Posting::$rules);
      $post = new Posting;
      $form = $request->all();
      if (isset($form['image'])) {
          $path = $request->file('image')->store('public/image');
          //$path = Storage::disk('s3')->putFile('/',$form['image'],'public');
          $post->image_path = Storage::disk('s3')->url($path);
      } else {
          $post->image_path = null;
      }

      unset($form['_token']);

      unset($form['image']);

      $post->fill($form);
      $oost->save();

      return redirect('admin/posting/create');
  }

}
