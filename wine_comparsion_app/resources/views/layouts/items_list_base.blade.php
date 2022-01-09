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
                <a class="nav-link" href="{{ route('mymemo.index') }}">メモ帳</a>
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
        {{-- サイドバー --}}
        <div class="col-md-3 pt-5" style="background-color:white;">
            <form class="row mb-4">
                <h3>ワインの名前で検索する</h3>
                <div class="col-md-10">
                    <input type="text" class="form-control" placeholder="ワインの名前">
                </div>
                    <button type="submit" class="btn btn-primary col-md-2">検索</button>
            </form>
            {{-- モーダルウィンドウbutton --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                もっと詳しく検索する
            </button>
            <form method="GET" action="{{ route('search.type')}}">
                <div class="input-group">
                    <label for="exampleFormControlInput1" class="form-label">ワインのタイプを選択</label>
                    <select name="type">
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    条件を変更する
                </button>
            </form>
            <form method="GET" action="{{ route('search.country') }}">
                {{-- 生産国を選択 --}}
                <div class="input-group">
                    <label for="exampleFormControlInput1" class="form-label">生産国を選択</label>
                    <select name="country">
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->country}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    条件を変更する
                    </button>
                </div>
            </form>
        </div>
            {{-- サイドバー --}}
            {{-- 右のカラム --}}
        <div class="col-md-9 px-4 pt-5" style="background-color:rgb(219, 219, 219);">
            @yield('items')
        </div>
    </div>
</div>
@endsection
