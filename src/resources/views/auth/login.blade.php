@extends('layouts.auth')

@section('title', 'ログイン')

@section('content')
<div class="container">
    <h2>ログイン</h2>
    <form method="POST" action="/login" novalidate>
        @csrf
        <div class="mt-12">
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
            @error('email', 'login')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-12">
            <label for="password">パスワード</label>
            <input id="password" type="password" name="password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
            @error('password', 'login')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn-primary mt-18" formnovalidate>ログインする</button>
        <a class="link-muted" href="/register">会員登録はこちら</a>
    </form>
</div>
@endsection

