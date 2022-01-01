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
        {{-- サイドバー ここから--}}
        <div class="col-md-3 pt-5" style="background-color:rgb(209, 209, 209);">

        </div>
        {{-- サイドバー ここまで--}}
        {{-- memoリスト一覧 ここから --}}
        <div class="col-md-2 p-0" style="background-color:white;">


        </div>
        <div class="col-md-7 px-4 pt-5" style="background-color:rgb(219, 219, 219);">
            <form method="POST" action="{{ route('product.registration') }}">
                @csrf
                <input type="hidden" name='user_id' value={{ $user_id }}>
                <input type="text" name="name" placeholder="ワイン名">
                <textarea name="content" rows="6"></textarea>
                <input type="radio" name="level" value="ok"> 完全に理解した</label>
                <select name="type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type['id'] }}">{{ $type['type']}}</option>
                    @endforeach
                </select>
                <select name="countries_id">
                    @foreach ($countries as $country)
                        <option value="{{ $country['id'] }}">{{ $country['country']}}</option>
                    @endforeach
                </select>
                <div class="input-group mb-3">
                    <select class="form-select" name="grapes_id">
                        @foreach ($grapes as $grape)
                            <option value="{{ $grape['id'] }}">{{ $grape['id']['grapes'] }}</option>
                        @endforeach
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <input type="number" class="form-control" name="value">
                </div>
                <select name="grapes_id">
                    @foreach ($countries as $country)
                        <option value="{{ $country['id'] }}">{{ $country['country']}}</option>
                    @endforeach
                </select>
            </form>

        </div>
    </div>
</div>
@endsection
