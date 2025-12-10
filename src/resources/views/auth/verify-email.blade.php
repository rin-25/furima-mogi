@extends('layouts.auth')

@section('title', 'メール認証')

@section('content')
<div class="container" style="max-width: 520px;">
    <p class="text-center" style="margin-bottom: 20px; font-size: 13px; line-height: 1.6;">
        登録していただいたメールアドレスに認証メールを送付しました。<br>
        メール認証を完了してください。
    </p>
    <div class="text-center">
        <button class="btn-secondary" type="button">認証はこちらから</button>
    </div>
    <div class="text-center mt-18">
        <a class="link-muted" href="#">認証メールを再送する</a>
    </div>
</div>
@endsection

