@extends('layouts.admin')
@section('title', '投稿新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>投稿作成/new posting!</h2>
                <form action="{{ action('PostingController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル/title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div><br>
                    
                    <div class="form-group row">
                        <label class="col-md-2">mapURL</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="map_url" value="{{ old('title') }}">
                        </div>
                    </div><br>
                    
                    <div class="form-group row">
                        <label class="col-md-2">本文/text</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div><br>
                    
                    <div class="form-group row">
                        <label class="col-md-2">photo(required)</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div><br>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="送信/posting!">
                </form>
            </div>
        </div>
    </div>
@endsection