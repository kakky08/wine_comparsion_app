@extends('layouts.app')

@section('content')
{{-- nav --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light ps-3 pe-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('items_list.index') }}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="{{ route('items_list.index') }}">ワインを探す</a>
                <a class="nav-link" href="{{ route('memo.index') }}">メモ帳</a>
                <a class="nav-link" href="#">お気に入り</a>
                <a class="nav-link" href="{{ route('mypage.index') }}">マイページ</a>
                <a class="nav-link" href="#">ログアウト</a>
            </div>
        </div>
    </div>
</nav>
{{-- nav --}}
<div class="h-100 container-fluid">
    <div class="row h-100">
        {{-- サイドバー ここから--}}
        <div class="col-md-3 pt-5" style="background-color:rgb(209, 209, 209);">
            <a href="{{ route('memo.add') }}" class="btn btn-success">メモ作成</a>
        </div>
        {{-- サイドバー ここまで--}}

        {{-- 右のカラム --}}
        <div class="col-md-7 px-4 pt-5" style="background-color:rgb(219, 219, 219);">
                        <div>
                            <h5>{{ $memo->title }}</h5>
                            <h6>{{ $memo->kind }}</h6>
                        </div>
            <form action="/memo/{{ $memo->id }}", method="post">
                @csrf
                @method('patch')
                <div>
                    <input type="text" name='title' value="{{ $memo->title }}" placeholder="{{ $memo->title }}">
                    <input type="number" name='kind' value='{{ $memo->kind }}' placeholder="{{ $memo->kind }}">
                    <button type="submit" class="btn btn-success">実行する</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
