@extends('layouts.app')

@section('content')
{{-- nav --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light ps-3 pe-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">ワインを探す</a>
                <a class="nav-link" href="#">メモ帳</a>
            <a class="nav-link" href="#">お気に入り</a>
            <a class="nav-link" href="#">マイページ</a>
            <a class="nav-link" href="#">ログアウト</a>
            </div>
        </div>
    </div>
</nav>
{{-- nav --}}
<div class="h-100 container-fluid">
    <p>プロフィールの更新</p>
    <form method="POST">
        @csrf
        <input type="text" name="edit_name" value="{{ $auth->name }}">
        <input type="email" name="edit_email" value="{{ $auth->email }}">
        <button type="submit" class="btn btn-success" formaction="{{ route('profile.update') }}">更新</button>
    </form>
</div>
@endsection
