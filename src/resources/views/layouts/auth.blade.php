<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'COACHTECH')</title>
    <style>
        body {
            margin: 0;
            font-family: "Helvetica Neue", Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
        }
        .header {
            background: #000;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 20px;
        }
        .header img.logo {
            height: 28px;
        }
        .container {
            max-width: 420px;
            margin: 32px auto 40px;
            background: #fff;
            padding: 32px 28px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        h1, h2, h3, h4, h5, h6 {
            margin: 0 0 24px;
            text-align: center;
            font-weight: 700;
            font-size: 18px;
        }
        label {
            display: block;
            font-size: 12px;
            margin-bottom: 6px;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            height: 34px;
            padding: 6px 8px;
            border: 1px solid #c7c7c7;
            border-radius: 2px;
            box-sizing: border-box;
            font-size: 13px;
            background: #fff;
        }
        .btn-primary {
            width: 100%;
            height: 40px;
            margin-top: 18px;
            background: #ff6464;
            color: #fff;
            border: none;
            border-radius: 2px;
            font-size: 13px;
            cursor: pointer;
        }
        .btn-primary:active {
            opacity: 0.9;
        }
        .link-muted {
            display: block;
            margin-top: 12px;
            text-align: center;
            font-size: 12px;
            color: #4a6fa5;
            text-decoration: none;
        }
        .error {
            margin-top: 6px;
            font-size: 11px;
            color: #d22;
        }
        .profile-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #e5e5e5;
            margin: 0 auto 12px;
        }
        .btn-secondary {
            display: inline-block;
            padding: 6px 12px;
            font-size: 12px;
            background: #f5f5f5;
            border: 1px solid #c7c7c7;
            border-radius: 3px;
            cursor: pointer;
            color: #333;
            text-decoration: none;
        }
        .text-center { text-align: center; }
        .mt-12 { margin-top: 12px; }
        .mt-18 { margin-top: 18px; }
        .mt-24 { margin-top: 24px; }
    </style>
</head>
<body>
    <header class="header">
        <img class="logo" src="{{ asset('logo_img/COACHTECHヘッダーロゴ.png') }}" alt="COACHTECH">
    </header>

    @yield('content')
</body>
</html>

