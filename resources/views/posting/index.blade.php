@extends('layouts.front')
@section('title', '登録済み投稿一覧')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <h2>投稿一覧/postlists</h2>
              </form>
            </div>
        </div>
        
        <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                
                        
                        <div class="card card-padding" style="width: 54rem;">
                           <p>{{ $post->created_at->format('Y/m/d(D)H:i') }}</p>
                           <p>{{ $post->user->id }}:{{ $post->user->name }}</p>

                         @if ($post->image_path)
                            <h5 class="card-title"> {{ str_limit($post->title, 200) }}</h5>
                            <img src="{{ asset('storage/image/' . $post->image_path) }}" class="card-img-top">
                         @endif
            
                          <p class="card-text">{{ str_limit($post->body, 1500) }}</p>
                 
                          <div align="right">
                              <form action="{{ action('LikeController@create') }}" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="post_id" value="{{ $post->id }}">
                                       
                                {{ csrf_field() }}
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-heart-fill" viewBox="0 0 16 16">
                                 <path d=<i class="far fa-heart"></i>>
                                 </svg>
                                        
                                @if ($post->users()->exists())
                                <input class="like" type="submit" value="いいね!/Likes!">
                                @else
                                <input class="no-like" type="submit" value="いいね!/Likes!">
                                @endif
                                       
                                 </form>
                                   {{ $post->users()->count() }}
                                </div>
　　　　　　　　　　　
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection