@extends('layouts.front')
@section('title', '登録済み投稿一覧')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <h2>投稿一覧/postlists</h2>
        </div>
    </div>
        
    <div class="posts col-md-8 mx-auto mt-3">
        @foreach($posts as $index => $post)
            <div class="post">
                <div class="card card-padding" style="width: 54rem;">
                    <p>
                        <span class="posted-time">{{ $post->created_at->format('Y/m/d(D)H:i') }}</span>
                        <span>{{ $post->user->id }}:{{ $post->user->name }}</span>
                    </p>
                    
                    @if ($post->image_path)
                        <h5 class="card-title"> {{ str_limit($post->title, 200) }}</h5>
                        <img src="{{ asset('storage/image/' . $post->image_path) }}" class="card-img-top">
                    @endif
                    <p class="card-text">{{ str_limit($post->body, 1500) }}</p>
                    <div align="left">
                        <form name="favorite" action="{{ action('LikeController@create') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                       
                            {{ csrf_field() }}

                            @if ($post->users()->exists())
                                <a href="javascript:document.getElementsByName('favorite')[{{$index}}].submit();"><i class="fas fa-heart text-danger"></i></a>
                            @else
                                <a href="javascript:document.getElementsByName('favorite')[{{$index}}].submit();"><i class="far fa-heart"></i></a>
                            @endif
                        </form>
                        
                        {{ $post->users()->count() }}
                    </div>
                          
                    <div>
                        <p align="right">
                            <a href="{{ action('CommentsController@add',['posting_id' => $post->id]) }}" role="button" class="btn btn-outline-dark btn-light btn w-25">投稿返信/add comment</a> 
                        </p>
                        
                        <p>🖌返信コメント/reply🖋</p>
                           
                        @if ($post->comments)
                            @foreach($post->comments as $comment)
                            <div>
                                <p>
                                    <span class="card-text">{{ $comment->user->name}}</span>
                                    <span>{{ $post->created_at->format('Y/m/d(D)H:i') }}</span>
                                </p>  
                                
                                <p>
                                    <span class="card-text">{{ str_limit($comment->text, 1500) }}</span>
                                </p>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <hr color="#c0c0c0">
        @endforeach    
    </div>
    <div id="page_top"><a href="#"></a></div>
@endsection