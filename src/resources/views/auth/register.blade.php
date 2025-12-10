@extends('layouts.auth')

@section('title', '会員登録')

@section('content')
<div class="container">
    <h2>会員登録</h2>
    <form method="POST" action="/register" novalidate>
        @csrf
        <div class="mt-12">
            <label for="name">ユーザー名</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-12">
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-12">
            <label for="password">パスワード</label>
            <input id="password" type="password" name="password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-12">
            <label for="password_confirmation">確認用パスワード</label>
            <input id="password_confirmation" type="password" name="password_confirmation">
        </div>
        <button type="submit" class="btn-primary" formnovalidate>登録する</button>
        <a class="link-muted" href="/login">ログインはこちら</a>
    </form>
</div>
@endsection

