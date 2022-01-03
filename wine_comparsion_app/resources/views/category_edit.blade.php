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
                <a class="nav-link active" aria-current="page" href="{{ route('product.registration') }}">商品管理</a>
                <a class="nav-link" href="{{ route('show.item.add')}}">商品の追加</a>
                <a class="nav-link" href="{{ route('category.edit') }}">カテゴリの追加</a>
                <a class="nav-link" href="{{ route('category.delete')}}">カテゴリの削除</a>
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
            <form method="POST" action="{{ route('type.add') }}">
                @csrf
                <label for="exampleFormControlInput1" class="form-label">ワインの種類を追加</label>
                <input type="text" name="type" placeholder="ワインの種類">
                <button type="submit" class="btn btn-success">追加</button>
            </form>
            <form method="POST" action="{{ route('country.add') }}">
                @csrf
                <label for="exampleFormControlInput1" class="form-label">生産国を追加</label>
                <input type="text" name="country" placeholder="生産国">
                <button type="submit" class="btn btn-success">追加</button>
            </form>
            <form method="POST" action="{{ route('grape.add') }}">
                @csrf
                <label for="exampleFormControlInput1" class="form-label">ブドウ名を追加</label>
                <input type="text" name="grape" placeholder="ブドウ名">
                <input type="number" name="value" placeholder="固定値">
                <button type="submit" class="btn btn-success">追加</button>
            </form>

        </div>
    </div>
</div>
@endsection
