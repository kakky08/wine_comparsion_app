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
            <form method="POST" action="{{ route('search.keyword')}}" class="row mb-4">
                @csrf
                <h3>ワインの名前で検索する</h3>
                <div class="col-md-10">
                    <input type="text" name="keyword" class="form-control" placeholder="ワインの名前">
                </div>
                    <button type="submit" class="btn btn-primary col-md-2">検索</button>
            </form>
            {{-- Modal Button  --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                もっと詳しく検索する
            </button>

            {{-- Modal start --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Launch static backdrop modal
            </button>
            <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- form start --}}
                        <form method="GET" action="{{ route('search.detail')}}" id="search" class="row g-3">
                            {{-- type select --}}
                            <div class="col-12">
                                <label for="inputState" class="form-label">ワインのタイプを選択</label>
                                <select name="type" id="inputState" class="form-select">
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- country select --}}
                            <div class="col-12">
                                <label for="inputState" class="form-label">生産国を選択</label>
                                <select name="country" id="inputState" class="form-select">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        {{-- form end --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                        <button type="submit" class="btn btn-primary" form="search">検索</button>
                    </div>
                    </div>
                </div>
            </div>
            {{-- Modal end --}}
            {{-- Accordion start --}}
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        ワインの種類で選ぶ
                    </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <ul>
                            @foreach ($types as $type)
                                <a href="{{ route('select.by.type', ['id' => $type->id]) }}"><li>{{ $type->type}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- Accordion end --}}
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
