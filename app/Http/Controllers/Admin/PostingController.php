<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostingController extends Controller
{
    //
  public function add()
  {
    return view('admin.posting.create');
  }

  public function create(Request $request)
  {
    return redirect('admin/news/create');
  }  
}

