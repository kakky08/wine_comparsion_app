@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.exec.register') }}">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                             <ul class="mb-0 mt-0">
                             @foreach ($errors->all as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                        </div>

                        @endif
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-right">あなたの好きなタイプはどちらですか？</label>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="radio" name="type" id="type_red" value="option1">
                                <label class="form-check-label" for="type_red">赤ワイン</label>
                            </div>
                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="radio" name="type" id="type_white" value="option2">
                                <label class="form-check-label" for="type_white">白ワイン</label>
                            </div>
                           {{--  <div class="col-md-6">
                                <input id="type" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                        </div>
                        {{-- 生産国を選択 --}}
                        {{-- <div class="input-group">
                            <label for="exampleFormControlInput1" class="form-label">生産国を選択</label>
                            <select name="country_id">
                                @foreach ($countries as $country)
                                <option value="{{ $country['id'] }}">{{ $country['country']}}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
