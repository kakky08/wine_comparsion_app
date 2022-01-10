@extends('layouts.items_list_base')

@section('items')
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
                                    <a href="{{ route('item.detail.information', ['id' => $recommendation->id]) }}" class="btn btn-primary">詳細へ</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
@endsection
