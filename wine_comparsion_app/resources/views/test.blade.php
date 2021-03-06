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

            <!-- Modal ここから -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <h3>ワインの種類</h3>
                                <div class="row">
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            赤ワイン
                                        </label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            白ワイン
                                        </label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            ロゼ
                                        </label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            スパークリング
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal ここまで -->
        </div>
            {{-- サイドバー --}}
            {{-- 右のカラム --}}
        <div class="col-md-9 px-4 pt-5" style="background-color:rgb(219, 219, 219);">
            {{-- {{ $test }} --}}
            {{ $items['title'] }}
            {{-- {{ $items['price'] }} --}}
            {{-- @for ($i = 0; $i < 5; $i++)
                {{ $items['title'] }}
                {{ $items['price'] }}
            @endfor --}}
        </div>
    </div>
</div>
@endsection
