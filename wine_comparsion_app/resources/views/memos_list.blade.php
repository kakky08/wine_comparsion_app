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
            <!-----省略----->
        {{-- <form class="w-100 h-100" method="post">
            @csrf
            <input type="hidden" name="folder_id" value="{{ $select_folder->id }}" />
            <div id="memo-menu">
                <!-----ここから変更する----->
                <button type="submit" class="btn btn-danger" formaction="{{ route('folder.delete') }}">ファイルの削除</button>
                <!-----ここまで変更する----->
                <button type="submit" class="btn btn-success" formaction="{{ route('folder.add') }}">ファイルの追加</button>
            </div>
        </form> --}}
             {{-- <button type="submit" class="btn btn-danger" value="{{ $select_folder->id }}" formaction="{{ route('folder.delete')}}">ファイルの削除</button> --}}
            <a href="{{ route('folder.add') }}" class="btn btn-success">フォルダの作成</a>
            <a href="{{ route('folder.delete', ['id' => $select_folder->id] )}}" class="btn btn-danger">フォルダの削除</a>
            @if ($folders->count() === 0)
                <div class="pl-3 pt-3 h5 text-info text-center">
                    メモがありません。
                </div>
            @endif
            @foreach ($folders as $folder)
                <a href="{{ route('folder.select', ['id' => $folder->id])}}"
                    class="list-group-item list-group-item-action @if($select_folder){{$select_folder->id == $folder->id ? 'active' : ''}}@endif">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $folder->folder_name }} </h5>
                    <small>{{ date('Y/m/d H:i', strtotime($folder->updated_at)) }}</small>
                </div>
                </a>
            @endforeach
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
