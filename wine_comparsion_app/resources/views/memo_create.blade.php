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
        @for ($i = 1; $i <= 5 ; $i++)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="comprehensive_evaluation"  value="{{ $i }}" id="{{ 'comprehensive_evaluation_' . $i }}">
                <label class="form-check-label" for="{{ 'comprehensive_evaluation_' . $i }}">
                    {{ $i }}
                </label>
            </div>
        @endfor
    </div>
    {{-- 評価カテゴリー:香り --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">香り</label>
        @for ($i = 1; $i <= 5 ; $i++)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="flavor"  value="{{ $i }}" id="{{ 'flavor_' . $i }}">
                <label class="form-check-label" for="{{ 'flavor_' . $i }}">
                    {{ $i }}
                </label>
            </div>
        @endfor
    </div>
    {{-- 評価カテゴリー:苦味 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">苦味</label>
        @for ($i = 1; $i <= 5 ; $i++)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bitter_taste"  value="{{ $i }}" id="{{ 'bitter_taste_' . $i }}">
                <label class="form-check-label" for="{{ 'bitter_taste_' . $i }}">
                    {{ $i }}
                </label>
            </div>
        @endfor
    </div>
    {{-- 評価カテゴリー:余韻 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">余韻</label>
        @for ($i = 1; $i <= 5 ; $i++)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="afterglow"  value="{{ $i }}" id="{{ 'afterglow_' . $i }}">
                <label class="form-check-label" for="{{ 'afterglow_' . $i }}">
                    {{ $i }}
                </label>
            </div>
        @endfor
    </div>
    {{-- 評価カテゴリー:旨味 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">旨味</label>
        @for ($i = 1; $i <= 5 ; $i++)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="taste"  value="{{ $i }}" id="{{ 'taste_' . $i }}">
                <label class="form-check-label" for="{{ 'taste_' . $i }}">
                    {{ $i }}
                </label>
            </div>
        @endfor
    </div>
    {{-- 評価カテゴリー:濃さ --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">濃さ</label>
        @for ($i = 1; $i <= 5 ; $i++)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bodied"  value="{{ $i }}" id="{{ 'bodied_' . $i }}">
                <label class="form-check-label" for="{{ 'bodied_' . $i }}">
                    {{ $i }}
                </label>
            </div>
        @endfor
    </div>
    {{-- 評価カテゴリー:甘味 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">甘味</label>
        @for ($i = 1; $i <= 5 ; $i++)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sweet_taste"  value="{{ $i }}" id="{{ 'sweet_taste_' . $i }}">
                <label class="form-check-label" for="{{ 'sweet_taste_' . $i }}">
                    {{ $i }}
                </label>
            </div>
        @endfor
    </div>
    {{-- 評価カテゴリー:果実味 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">果実味</label>
        @for ($i = 1; $i <= 5 ; $i++)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fruit_taste"  value="{{ $i }}" id="{{ 'fruit_taste_' . $i }}">
                <label class="form-check-label" for="{{ 'fruit_taste_' . $i }}">
                    {{ $i }}
                </label>
            </div>
        @endfor
    </div>
    {{-- 評価カテゴリー:酸味 --}}
    <div class="input-group">
        <label for="exampleFormControlInput1" class="form-label">酸味</label>
        @for ($i = 1; $i <= 5 ; $i++)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="acidity_taste"  value="{{ $i }}" id="{{ 'acidity_taste_' . $i }}">
                <label class="form-check-label" for="{{ 'acidity_taste_' . $i }}">
                    {{ $i }}
                </label>
            </div>
        @endfor
    </div>

    <div class="mb-3 input-group">
        <label for="content" class="form-label">メモ</label>
        <textarea class="form-control" id="content" rows="3" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-success">作成</button>

</form>

@endsection
