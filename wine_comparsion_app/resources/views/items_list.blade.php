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
            <h3 class="border-bottom border-danger border-2 mb-4">あなたにおすすめのワイン</h3>
            {{-- おすすめ一覧ここから --}}
            <div class="container mb-5">
                <div class="row g-2">
                    {{-- {{dd($type_id)}} --}}
                    {{-- {{ dd($country_taste) }} --}}

                    {{-- {{dd($recommendations)}} --}}

                    @if ($recommendations->count() === 0)
                        <p>アイテムがありません</p>
                    @endif
                    @foreach ($recommendations as $recommendation)
                        <div class="col-3">
                            <div class="p-3 border bg-light"><img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $recommendation->name }}</h5>
                                    <p class="card-text"></p>
                                    <a href="#" class="btn btn-primary">詳細へ</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-3">
                        <div class="p-3 border bg-light"><img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="p-3 border bg-light">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="p-3 border bg-light">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="p-3 border bg-light">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- おすすめ一覧ここまで --}}
            <h3 class="border-bottom border-danger border-2 mb-4">ワイン一覧</h3>
            {{-- ワイン一覧ここから --}}
            <div class="container mb-5">
                <div class="row g-2">
                    @if ($items->count() === 0)
                        <p>アイテムがありません</p>
                    @endif
                    @foreach ($items as $item)
                        <div class="col-3">
                            <div class="p-3 border bg-light"><img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text"></p>
                                    <a href="#" class="btn btn-primary">詳細へ</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- ワイン一覧ここまで --}}
            {{-- pagination ここから --}}
            <nav aria-label="Page navigation example col-6">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            {{-- pagination ここまで --}}


        </div>
    </div>
</div>
@endsection
