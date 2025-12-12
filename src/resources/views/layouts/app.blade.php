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
            justify-content: space-between;
        }
        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .header img.logo {
            height: 28px;
        }
        .search-bar {
            width: 300px;
            height: 34px;
            padding: 6px 12px;
            border: none;
            border-radius: 2px;
            font-size: 13px;
            background: #fff;
        }
        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .header-link {
            color: #fff;
            text-decoration: none;
            font-size: 13px;
        }
        .header-link:hover {
            text-decoration: underline;
        }
        .btn-exhibit {
            padding: 6px 16px;
            background: #fff;
            color: #000;
            border: 1px solid #fff;
            border-radius: 2px;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-exhibit:hover {
            background: #f5f5f5;
        }
        .tabs {
            display: flex;
            background: #fff;
            border-bottom: 1px solid #e5e5e5;
            padding: 0 20px;
        }
        .tab {
            padding: 12px 20px;
            font-size: 14px;
            color: #666;
            text-decoration: none;
            border-bottom: 2px solid transparent;
            transition: all 0.2s;
        }
        .tab.active {
            color: #ff6464;
            border-bottom-color: #ff6464;
        }
        .tab:hover {
            color: #ff6464;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 24px;
        }
        .product-card {
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .product-image {
            width: 100%;
            height: 200px;
            background: #e5e5e5;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .product-image::after {
            content: '商品画像';
            position: absolute;
            color: #999;
            font-size: 12px;
        }
        .product-image:has(img)::after {
            display: none;
        }
        .product-image img {
            display: block;
        }
        .sold-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            background: #ff6464;
            color: #fff;
            padding: 4px 8px;
            border-radius: 2px;
            font-size: 11px;
            font-weight: bold;
        }
        .product-name {
            padding: 12px;
            font-size: 13px;
            color: #333;
            text-align: center;
        }
        .empty-message {
            text-align: center;
            padding: 60px 20px;
            color: #999;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-left">
            <a href="/">
                <img class="logo" src="{{ asset('logo_img/COACHTECHヘッダーロゴ.png') }}" alt="COACHTECH">
            </a>
            <form method="GET" action="{{ request()->routeIs('products.mylist') ? route('products.mylist') : route('products.index') }}" style="display: flex;" id="search-form">
                <input 
                    type="text" 
                    name="search" 
                    class="search-bar" 
                    placeholder="なにをお探しですか?" 
                    value="{{ request('search') }}"
                    onkeypress="if(event.key === 'Enter') { event.preventDefault(); document.getElementById('search-form').submit(); }"
                >
            </form>
        </div>
        <div class="header-right">
            @auth
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="header-link" style="background: none; border: none; cursor: pointer; color: #fff; font-size: 13px;">ログアウト</button>
                </form>
                <a href="{{ route('profile.edit') }}" class="header-link">マイページ</a>
                <a href="#" class="btn-exhibit">出品</a>
            @else
                <a href="{{ route('login') }}" class="header-link">ログイン</a>
                <a href="{{ route('register') }}" class="header-link">会員登録</a>
            @endauth
        </div>
    </header>

    <div class="tabs">
        <a href="{{ route('products.index', ['search' => request('search')]) }}" class="tab {{ $activeTab === 'recommended' ? 'active' : '' }}">
            おすすめ
        </a>
        <a href="{{ route('products.mylist', ['search' => request('search')]) }}" class="tab {{ $activeTab === 'mylist' ? 'active' : '' }}">
            マイリスト
        </a>
    </div>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

