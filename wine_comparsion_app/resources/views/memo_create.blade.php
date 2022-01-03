@extends('layouts.memo')

@section('memo')
    <label for="exampleFormControlInput1" class="form-label">フォルダを選択</label>
        <select name="country">
            @foreach ($folders as $folder)
                <option value="{{ $folder['id'] }}">{{ $folder['name']}}</option>
            @endforeach
        </select>
    <input type="text">
@endsection
