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
                @foreach($posts as $index => $post)
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
                              <form name="favorite" action="{{ action('LikeController@create') }}" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="post_id" value="{{ $post->id }}">
                                       
                                {{ csrf_field() }}

                                @if ($post->users()->exists())
                                    <a href="javascript:favorite[{{$index}}].submit()"><i class="fas fa-heart text-danger"></i></a>
                                @else
                                    <a href="javascript:favorite[{{$index}}].submit()"><i class="far fa-heart"></i></a>
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