@extends('layouts.memo')

@section('memo')
<form method="POST" action="{{ route('memo.add')}}" class="row g-3">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    {{-- フォルダの選択 --}}
    <div class="input-group">
        <label for="folder" class="form-label">フォルダを選択</label>
        <select name="folder_id">
            @foreach ($folders as $folder)
            <option value="{{ $folder['id'] }}" id="folder" @if($select_folder){{$select_folder->id == $folder->id ? 'selected' : ''}}@endif>
                {{ $folder['name']}}
            </option>
            @endforeach
        </select>
    </div>
    {{-- ワイン名を入力 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">ワイン名を入力</label>
        <input type="text" name="name">
    </div>
    {{-- ワインのタイプを選択 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">ワインのタイプを選択</label>
        <select name="type_id">
            @foreach ($types as $type)
            <option value="{{ $type['id'] }}">{{ $type['type']}}</option>
            @endforeach
        </select>
    </div>
    {{-- 生産国を選択 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">生産国を選択</label>
        <select name="country_id">
            @foreach ($countries as $country)
            <option value="{{ $country['id'] }}">{{ $country['country']}}</option>
            @endforeach
        </select>
    </div>
    {{-- ブドウの種類を選択 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">ブドウの種類を選択</label>
        <select name="grape_id">
            @foreach ($grapes as $grape)
            <option value="{{ $grape['id'] }}">{{ $grape['grape']}}</option>
            @endforeach
        </select>
    </div>
    {{-- 香りを選択 --}}
   {{--  <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">フォルダを選択</label>
        <select name="folder_id">
            @foreach ($folders as $folder)
            <option value="{{ $folder['id'] }}">{{ $folder['name']}}</option>
            @endforeach
        </select>
    </div> --}}
    {{-- <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">香りを選択</label>
        <select name="aroma_category_id">
            @foreach ($aroma_categories as $aroma_category)
            <option value="{{ $aroma_category['id'] }}">{{ $aroma_category['aroma_type']}}</option>
            @endforeach
        </select>
    </div> --}}
    {{-- 総合評価 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">総合評価</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="comprehensive_evaluation"  value="1" id="comprehensive_evaluation_1">
            <label class="form-check-label" for="comprehensive_evaluation_1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="comprehensive_evaluation"  value="2" id="comprehensive_evaluation_2">
            <label class="form-check-label" for="comprehensive_evaluation_2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="comprehensive_evaluation"  value="3" id="comprehensive_evaluation_3">
            <label class="form-check-label" for="comprehensive_evaluation_3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="comprehensive_evaluation"  value="4" id="comprehensive_evaluation_4">
            <label class="form-check-label" for="comprehensive_evaluation_4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="comprehensive_evaluation"  value="5" id="comprehensive_evaluation_5">
            <label class="form-check-label" for="comprehensive_evaluation_5">
                5
            </label>
        </div>
    </div>
    {{-- 評価カテゴリー:香り --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">香り</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flavor"  value="1" id="flavor_1">
            <label class="form-check-label" for="flavor_1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flavor"  value="2" id="flavor_2">
            <label class="form-check-label" for="flavor_2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flavor"  value="3" id="flavor_3">
            <label class="form-check-label" for="flavor_3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flavor"  value="4" id="flavor_4">
            <label class="form-check-label" for="flavor_4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flavor"  value="5" id="flavor_5">
            <label class="form-check-label" for="flavor_5">
                5
            </label>
        </div>
    </div>
    {{-- 評価カテゴリー:苦味 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">苦味</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bitter_taste"  value="1" id="bitter_taste_1">
            <label class="form-check-label" for="bitter_taste_1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bitter_taste"  value="2" id="bitter_taste_2">
            <label class="form-check-label" for="bitter_taste_2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bitter_taste"  value="3" id="bitter_taste_3">
            <label class="form-check-label" for="bitter_taste_3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bitter_taste"  value="4" id="bitter_taste_4">
            <label class="form-check-label" for="bitter_taste_4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bitter_taste"  value="5" id="bitter_taste_5">
            <label class="form-check-label" for="bitter_taste_5">
                5
            </label>
        </div>
    </div>
    {{-- 評価カテゴリー:余韻 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">余韻</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="afterglow"  value="1" id="afterglow_1">
            <label class="form-check-label" for="afterglow_1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="afterglow"  value="2" id="afterglow_2">
            <label class="form-check-label" for="afterglow_2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="afterglow"  value="3" id="afterglow_3">
            <label class="form-check-label" for="afterglow_3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="afterglow"  value="4" id="afterglow_4">
            <label class="form-check-label" for="afterglow_4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="afterglow"  value="5" id="afterglow_5">
            <label class="form-check-label" for="afterglow_5">
                5
            </label>
        </div>
    </div>
    {{-- 評価カテゴリー:旨味 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">旨味</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="taste"  value="1" id="taste_1">
            <label class="form-check-label" for="taste_1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="taste"  value="2" id="taste_2">
            <label class="form-check-label" for="taste_2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="taste"  value="3" id="taste_3">
            <label class="form-check-label" for="taste_3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="taste"  value="4" id="taste_4">
            <label class="form-check-label" for="taste_4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="taste"  value="5" id="taste_5">
            <label class="form-check-label" for="taste_5">
                5
            </label>
        </div>
    </div>
    {{-- 評価カテゴリー:濃さ --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">濃さ</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bodied"  value="1" id="bodied_1">
            <label class="form-check-label" for="bodied_1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bodied"  value="2" id="bodied_2">
            <label class="form-check-label" for="bodied_2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bodied"  value="3" id="bodied_3">
            <label class="form-check-label" for="bodied_3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bodied"  value="4" id="bodied_4">
            <label class="form-check-label" for="bodied_4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bodied"  value="5" id="bodied_5">
            <label class="form-check-label" for="bodied_5">
                5
            </label>
        </div>
    </div>
    {{-- 評価カテゴリー:甘味 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">甘味</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sweet_taste"  value="1" id="sweet_taste_1">
            <label class="form-check-label" for="sweet_taste_1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sweet_taste"  value="2" id="sweet_taste_2">
            <label class="form-check-label" for="sweet_taste_2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sweet_taste"  value="3" id="sweet_taste_3">
            <label class="form-check-label" for="sweet_taste_3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sweet_taste"  value="4" id="sweet_taste_4">
            <label class="form-check-label" for="sweet_taste_4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sweet_taste"  value="5" id="sweet_taste_5">
            <label class="form-check-label" for="sweet_taste_5">
                5
            </label>
        </div>
    </div>
    {{-- 評価カテゴリー:果実味 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">果実味</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="fruit_taste"  value="1" id="fruit_taste_1">
            <label class="form-check-label" for="fruit_taste_1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="fruit_taste"  value="2" id="fruit_taste_2">
            <label class="form-check-label" for="fruit_taste_2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="fruit_taste"  value="3" id="fruit_taste_3">
            <label class="form-check-label" for="fruit_taste_3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="fruit_taste"  value="4" id="fruit_taste_4">
            <label class="form-check-label" for="fruit_taste_4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="fruit_taste"  value="5" id="fruit_taste_5">
            <label class="form-check-label" for="fruit_taste_5">
                5
            </label>
        </div>
    </div>
    {{-- 評価カテゴリー:酸味 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">酸味</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="acidity_taste"  value="1" id="acidity_taste_1">
            <label class="form-check-label" for="acidity_taste_1">
                1
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="acidity_taste"  value="2" id="acidity_taste_2">
            <label class="form-check-label" for="acidity_taste_2">
                2
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="acidity_taste"  value="3" id="acidity_taste_3">
            <label class="form-check-label" for="acidity_taste_3">
                3
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="acidity_taste"  value="4" id="acidity_taste_4">
            <label class="form-check-label" for="acidity_taste_4">
                4
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="acidity_taste"  value="5" id="acidity_taste_5">
            <label class="form-check-label" for="acidity_taste_5">
                5
            </label>
        </div>
    </div>

    <div class="mb-3 input-group">
        <label for="content" class="form-label">メモ</label>
        <textarea class="form-control" id="content" rows="3" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-success">作成</button>

</form>

@endsection
