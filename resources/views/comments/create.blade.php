  @extends('layouts.admin')
  @section('title', '投稿新規作成')
  @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>コメント返信/add comments</h2>
                <form action="{{ action('CommentsController@store') }}" method="post" enctype="multipart/form-data">
                  <input
                    name="user_id"
                    type="hidden"
                    value="{{ Auth::id() }}"
                  >
                   <input
                    name="posting_id"
                    type="hidden"
                    value="{{ $posting_id }}"
                  >
                  
  @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="text" rows="20">{{ old('text') }}</textarea>
                        </div>
                    </div>
                    
                     {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="送信/posting submit!">
                </form>
            </div>
        </div>
    </div>
@endsection