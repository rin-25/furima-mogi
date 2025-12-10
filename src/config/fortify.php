<?php

use Laravel\Fortify\Features;

return [
    'guard' => 'web',

    'passwords' => 'users',

    'username' => 'email',

    'email' => 'email',

    'views' => true,

    'home' => '/home',

    'prefix' => '',

    'domain' => null,

    'limiters' => [
        // 開発中はログイン試行制限を無効化して 429 を防ぐ
        'login' => null,
        'two-factor' => 'two-factor',
    ],

    'paths' => [
        'login' => null,
        'logout' => null,
        'password' => [
            'request' => null,
            'reset' => null,
        ],
        'register' => null,
        'user' => null,
        'email-verification' => null,
        'two-factor' => [
            'challenge' => null,
        ],
    ],

    'redirects' => [
        'login' => '/mypage/profile',   // ログイン後
        'logout' => '/',
        'register' => '/email/verify',  // 新規登録後はメール認証へ
    ],

    'middleware' => ['web'],

    'features' => [
        Features::registration(),
        Features::emailVerification(),
        // ログインはデフォルト有効
        // パスワードリセット等は今回は未使用
    ],
];


