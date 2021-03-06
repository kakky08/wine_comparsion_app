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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ワイン名</th>
                        <th scope="col">説明</th>
                        <th scope="col">種類</th>
                        <th scope="col">生産国</th>
                        <th scope="col">ブドウの種類</th>
                        <th scope="col">生産国による味わい</th>
                        <th scope="col">ブドウによる味わい</th>
                        <th scope="col">味わいマップ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr data-href="{{ route('category.delete', ['id' => $item['id']]) }}">
                            <th scope="row">{{ $item['id'] }}</th>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['content'] }}</td>
                            <td>{{ $item['types_id'] }}</td>
                            <td>{{ $item['countries_id'] }}</td>
                            <td>{{ $item['grapes_id'] }}</td>
                            <td>{{ $item['country_taste'] }}</td>
                            <td>{{ $item['grape_taste'] }}</td>
                            <td>{{ $item['taste_category'] }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <a href="{{ route('item.detail', ['id' => 1]) }}">移動</a>
        </div>
    </div>
</div>
@endsection
