<div class="mt-4 mb-4">
    <a href="{{ route('bbs.create') }}" class="btn btn-primary">
        投稿の新規作成
    </a>
</div>

@if (session('poststatus'))
    <div class="alert alert-success mt-4 mb-4">
        {{ session('poststatus') }}
    </div>
@endif