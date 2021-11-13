@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Success!!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   You are logged in!
                   <div style="text-align:center">
                    <a class="btn-primary btn" href="https://1aba965f28ab49eab49987b8d40c938b.vfs.cloud9.us-east-2.amazonaws.com" 
                    style="">Accesss to TOP page!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
