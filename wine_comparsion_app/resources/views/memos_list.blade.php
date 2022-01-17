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
        <div class="col-md-2 pt-5" style="background-color:rgb(209, 209, 209);">
            {{-- create_folder start --}}
            <form method="POST" action="{{ route('create.folder')}}" class="row g-3">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <div class="col-9">
                    <input type="text" name="folder" class="form-control"  placeholder="フォルダ名を入力">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary mb-3">作成</button>
                </div>
            </form>
            {{-- create_folder end --}}

            @if ($folders->count() === 0)
                <div class="pl-3 pt-3 h5 text-info text-center">
                    フォルダがありません。
                </div>
            @endif

            {{-- folder_list start --}}
            @foreach ($folders as $folder)
                <div class="list-group list-group-flush">
                    <a href="{{ route('folder.select', ['folder' => $folder->id ]) }}"
                        class="list-group-item list-group-item-action p-3 {{-- {{$select_folder->id == $folder->id ? 'active' : ''}} --}}"
                        >
                        <h5 class="mb-1"><span class="me-3"><i class="fas fa-folder"></i></span>{{ $folder->name }}</h5>
                    </a>
                </div>
            @endforeach
            {{-- folder_list end --}}

        </div>
        {{-- サイドバー ここまで--}}
        {{-- memoリスト一覧 ここから --}}
        <div class="col-md-2 p-0" style="background-color:white;">

            <a href="{{ route('createView') }}">メモの作成</a>
            @foreach ($memos as $memo)
                <p>{{ $memo->name }}</p>
            @endforeach
            {{-- @foreach ($memos_list as $memo)
                <a href="{{ route('memo.select', ['id' => $memo->id]) }}"><p>{{ $memo->name}}</p></a>
            @endforeach --}}
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
        <div class="col-md-8 px-4 pt-5" style="background-color:rgb(219, 219, 219);">
            {{-- {{ dd($memos) }} --}}

            {{-- @foreach ($memos as $memo)
                <p>{{ $memo->name }}</p>
            @endforeach --}}
            {{-- {{dd($memo)}} --}}
            {{-- @if ($memos_list->count() !== 0)
                <p>{{ $memo->name }}</p>
                <a href="{{ route('memo.editView',['id' => $memo->id]) }}">編集</a>
            @endif --}}

            {{-- @if ($memo == null)
                <p>メモがありません</p>
            @endif --}}
            {{-- @if ($memo->id === 1)
                <p>{{ $memo->name }}</p>
            @endif --}}
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
