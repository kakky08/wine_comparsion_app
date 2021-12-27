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
            {{-- <a href="{{ route('memo.create') }}" class="btn btn-success">メモ作成</a> --}}
            <form method="POST">
                @csrf
                <input type="hidden" name='folder_id'>
                <input type="text" name="folder_name" placeholder="フォルダ名">
                <button type="submit" class="btn btn-success" formaction="{{ route('folder.add') }}">作成</button>
                <button type="submit" class="btn btn-danger" formaction="{{ route('folder.delete') }}">削除</button>
            </form>
            @if ($folders->count() === 0)
            <p>フォルダがありません</p>
            @else
            @foreach ($folders as $folder)
            <a
            href="{{ route('folder.select', ['id' => $folder->id]) }}"
            class="{{ $select_folder === $folder->id ? 'active' : ''}}">
            {{ $folder->folder_name }}
            </a>
        @endforeach
        @endif
        </div>
        {{-- サイドバー ここまで--}}
        {{-- memoリスト一覧 ここから --}}
        <div class="col-md-2 p-0" style="background-color:white;">
           {{--  @if ($memos->count() === 0)
                <p>メモがありません</p>
            @endif
            @foreach ($memos as $memo)
                <div style="border: 1px solid #ccc">
                    <a href="{{ route('memo.select', ['id' => $memo->id]) }}" class="list-group-item list-group-item-action @if($select_memo){{ $select_memo->id == $memo->id ? 'active' : '' }} @endif">
                    <h5>{{ $memo->title }}</h5>
                    <h6>{{ $memo->kind }}</h6>
                </a>
                </div>  --}}
            {{-- @endforeach --}}
            {{-- <div class="border-bottom item-center">
                <h3>ワインの名前</h3>
                <div class="row">
                    <div class="col-md-12">
                        <i class="fas fa-star fa-lg"></i>
                        <i class="fas fa-star fa-lg"></i>
                        <i class="fas fa-star fa-lg"></i>
                        <i class="fas fa-star fa-lg"></i>
                        <i class="fas fa-star fa-lg"></i>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- memoリスト一覧 ここから --}}
        {{-- 右のカラム --}}
        <div class="col-md-7 px-4 pt-5" style="background-color:rgb(219, 219, 219);">
                   {{--  @if ($select_memo)
                        <div>
                            <h5>{{ $select_memo->title }}</h5>
                            <h6>{{ $select_memo->kind }}</h6>
                            <a href="/memo/{{ $select_memo->id}}/edit" class="btn btn-success">メモの編集</a>
                        </div>
                    @endif --}}


        </div>
    </div>
</div>
@endsection
