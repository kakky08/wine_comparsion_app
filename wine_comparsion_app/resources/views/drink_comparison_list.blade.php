@extends('layouts.items_list_base')

@section('items')
            {{-- ワイン詳細ここから --}}
            <div class="container mb-5">
                <div class="row g-2">
                    @foreach ($results as $result)
                        <p>{{ $result->name }}</p>
                    @endforeach

            {{-- Modal start --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBack">
                検索条件を絞る
            </button>
            <div class="modal" id="staticBack" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- form start --}}
                        <form method="GET" action="{{ route('search.detail')}}" id="search" class="row g-3">
                            {{-- type select --}}
                            <div class="row col-12">
                                <label for="inputState" class="form-label">ワインのタイプを選択</label>
                                <div class="col-6">
                                    <p>現在のワインの種類は:{{ $item->type_id }}</p>
                                </div>
                                <div class="col-6">
                                    <select name="type" id="inputState" class="form-select">
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{$type->id == $item->type_id ? 'selected' : ''}}>{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- country select --}}
                            <div class="col-12">
                                <label for="inputState" class="form-label">生産国を選択</label>
                                <select name="country" id="inputState" class="form-select">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{$country->id == $item->country_id ? 'selected' : ''}}>{{ $country->country}}</option>
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
                </div>
            </div>
            {{-- ワイン一覧ここまで --}}
@endsection
