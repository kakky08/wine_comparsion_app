@extends('layouts.items_list_base')

@section('items')
            {{-- ワイン詳細ここから --}}
            <div class="container mb-5">
                <div class="row g-2">
                    {{-- {{ dd($grape_name) }} --}}
                    <p>{{ $item->name }}</p>
                    <p>{{ $item->content }}</p>
                    <p>{{ $type_name->type }}</p>
                    <p>{{ $country_name->country }}</p>
                    <p>{{ $grape_name->grape }}</p>
                    {{-- {{dd($is_favorite)}} --}}
                    <button
                    type="submit"
                    formaction="{{ route($is_favorite ? 'favorite.add' : 'favorite.delete') }}"
                    class="btn {{ $is_favorite ? 'btn-success' : 'btn-danger'}}"
                    name="favorite" vlaue="{{ $item->id }}">追加</button>
                    <button>お気に入り</button>
                    <form method="GET" action="{{ route('drink.comparison') }}">
                        <button type="submit" name="search" value="{{ $item->id }}">このワインの飲み比べワインを探す</button>
                    </form>
                    <a href="{{ route('drink.comparison') }}"  >検索</a>
                </div>
            </div>
            {{-- ワイン一覧ここまで --}}
@endsection
