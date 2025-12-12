@extends('layouts.auth')

@section('title', 'プロフィール設定')

@section('content')
<div class="container" style="max-width: 520px;">
    <h2>プロフィール設定</h2>
    <form method="POST" action="/mypage/profile" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="text-center">
            <div class="profile-avatar"></div>
            <label class="btn-secondary mt-12" for="profile_image">画像を選択する</label>
            <input id="profile_image" type="file" name="profile_image" accept="image/*" style="display:none;">
            @error('profile_image')
                <div class="error" style="margin-top:6px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-24">
            <label for="name">ユーザー名</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-12">
            <label for="postal_code">郵便番号</label>
            <input id="postal_code" type="text" name="postal_code" value="{{ old('postal_code') }}">
            @error('postal_code')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-12">
            <label for="address">住所</label>
            <input id="address" type="text" name="address" value="{{ old('address') }}">
            @error('address')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-12">
            <label for="building">建物名</label>
            <input id="building" type="text" name="building" value="{{ old('building') }}">
            @error('building')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-primary mt-18" formnovalidate>更新する</button>
    </form>
</div>
@endsection

